setwd("W:/www")
require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))
#database connection

S_ID <- 26
#hardcoded student ID, waiting for PHP connection to remove

sql <- sprintf("DELETE FROM Schedules WHERE Student_ID ='%s'", S_ID)
dbSendQuery(mydb,sql)
#delete current schedule so new schedule will replace it

sql <- sprintf("SELECT Courses FROM Student WHERE Student_ID='%s'", S_ID)
Courses <- fetch(dbSendQuery(mydb,sql),n=-1)
Course_List <- gsub("\r\n","' , '",Courses)
#get list of courses for student

sql <- sprintf("SELECT * FROM Courses WHERE Course_ID IN ('%s')", Course_List)
Class_Times <- fetch(dbSendQuery(mydb,sql),n=-1)
#get class times for all student's courses

sql <- sprintf("SELECT * FROM Assignments WHERE Course_ID IN ('%s')", Course_List)
Assignments <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all assignments for student's courses

sql <- sprintf("SELECT * FROM Exam WHERE Course_ID IN ('%s')", Course_List)
Exams <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all exams for student's courses

sql <- sprintf("SELECT * FROM Events WHERE Student_ID='%s'", S_ID)
Events <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all events entered by student

sql <- sprintf("SELECT Wake_Time FROM Student WHERE Student_ID='%s'", S_ID)
Wake_Time <- fetch(dbSendQuery(mydb,sql),n=-1)
sql <- sprintf("SELECT Sleep_Time FROM Student WHERE Student_ID='%s'", S_ID)
Sleep_Time <- fetch(dbSendQuery(mydb,sql),n=-1)
#get sleep time from student input

Schedule <- as.data.frame(matrix('Empty', ncol = 110, nrow = 48))
colnames(Schedule) <- seq(as.Date("2021/1/19"), as.Date("2021/5/8"), by = "day")
rownames(Schedule) <- rep(seq(0,23,by=1),each=2) + seq(0,.3,by=.3)
#create blank schedule

for(r in 1:nrow(Schedule)){
  for(c in 1:ncol(Schedule)){
    start_time <-as.numeric(gsub(":","",Sleep_Time)) / 10000 #set start time for sleep
    end_time <-as.numeric(gsub(":","",Wake_Time)) / 10000 #set end time for sleep
    while(start_time < end_time){
      Schedule[as.character(start_time),c] <- 'Sleep'
      if(start_time==round(start_time)){
        start_time <- start_time + .3
      }
      else {
        start_time <- start_time + .7
      }
    }
  }
}
#insert sleep hours into Schedule so no events scheduled while student is sleeping

for(r in 1:nrow(Class_Times)){
  for(c in 1:ncol(Schedule)){
    if(Class_Times[r,"Day"]==strftime(colnames(Schedule[c]), "%a")){
    start_time <-as.numeric(gsub(":","",(Class_Times[r,"Course_Start_Time"]))) / 10000
    end_time <-as.numeric(gsub(":","",(Class_Times[r,"Course_End_Time"]))) / 10000
    while(start_time < end_time){
      Schedule[as.character(start_time),c] <- sprintf("Attend %s", Class_Times[r,"Course_ID"])
      if(start_time==round(start_time)){
      start_time <- start_time + .3
      }
      else {
        start_time <- start_time + .7
      }
    }
    }
  }
}
#insert course dates and times into Schedule

for(r in 1:nrow(Events)){
  for(c in 1:ncol(Schedule)){
    if(colnames(Schedule[c])==Events[r,"Event_Date"]){
      start_time <-as.numeric(gsub(":","",(Events[r,"Event_Start_Time"]))) / 10000
      end_time <-as.numeric(gsub(":","",(Events[r,"Event_End_Time"]))) / 10000
      while(start_time < end_time){
        Schedule[as.character(start_time),c] <- Events[r,"Event_Name"]
        if(start_time==round(start_time)){
          start_time <- start_time + .3
        }
        else {
          start_time <- start_time + .7
        }
      }
    }
  }
}
#insert events into Schedule

for(r in 1:nrow(Exams)){
  for(c in 1:ncol(Schedule)){
    if(colnames(Schedule[c])==Exams[r,"Exam_Date"]){
      start_time <-as.numeric(gsub(":","",(Exams[r,"Exam_Start_Time"]))) / 10000
      end_time <-as.numeric(gsub(":","",(Exams[r,"Exam_End_Time"]))) / 10000
      while(start_time < end_time){
        Schedule[as.character(start_time),c] <- sprintf("%s in %s", Exams[r,"Exam_Name"], Exams[r,'Course_ID'])
        if(start_time==round(start_time)){
          start_time <- start_time + .3
        }
        else {
          start_time <- start_time + .7
        }
      }
    }
  }
}
#insert exams into Schedule

colnames(Assignments) <- colnames(Exams[,-5])
Tasks <- rbind(Exams[,-5],Assignments)
Task_order <- order(Tasks$Exam_Date,Tasks$Exam_Start_Time) 
Ordered_tasks <- Tasks
for(i in 1:length(Task_order)){
  Ordered_tasks[i,] <- Tasks[Task_order[i],]
}
#Sorting studying tasks by earliest deadline

for(i in 1:nrow(Events)){
  if(is.na(Events$Assignment_Or_Exam_Name[i]) | is.na(Events$Course_ID[i])){
    Events$Assignment_Or_Exam_Name[i] <- 'None'
    Events$Course_ID[i] <- 'None'
  }
}
#if Event not associated with exam or assignment, set associated columns to 'None' to avoid NA complications

for(i in 1:nrow(Ordered_tasks)){
  for(g in 1:nrow(Events)){
    if((Ordered_tasks$Exam_Name[i]==Events$Assignment_Or_Exam_Name[g]) && (Ordered_tasks$Course_ID[i]==Events$Course_ID[g])){
      start_time <-as.numeric(gsub(":","",(Events$Event_Start_Time[g]))) / 10000
      end_time <-as.numeric(gsub(":","",(Events$Event_End_Time[g]))) / 10000
      Ordered_tasks$Suggested_Study_Time[i] <- Ordered_tasks$Suggested_Study_Time[i] - (end_time-start_time)
    }
  }
}
#Count study events towards Suggested_Study_Time for the event's respective assignments or exams

freetime_quantum <- function(Free_time_quantum_type1){
  if (Free_time_quantum_type1 >= 60){
    return(1)
  }
  else {
    return(0)
  }
}
#freetime time quantum's impact on objective value

study_quantum <- function(Study_time_quantum){
  if (Study_time_quantum >= 180){
    return(1)
  }
  else {
    return(0)
  }
}
#study time quantum's impact on objective value

ObjFunc2 <- function(Study_time_quantum, Free_time_quantum_type1){
  ObjVal <- freetime_quantum(Free_time_quantum_type1) + study_quantum(Study_time_quantum)
  return(ObjVal)
}
#objective function - calculates penalties from exceeding study time quantum or freetime time quantum



for(c in 1:ncol(Schedule)){
  for(r in 1:nrow(Schedule)){
    if(Schedule[r,c]!='Empty'){
        study_time_quantum <- 0
         freetime_quantum_type1 <- 0
         #setting time quantums
    }
    for(i in 1:nrow(Ordered_tasks)){
      if(Schedule[r,c]=='Empty'){
        if((colnames(Schedule[c]) <= Ordered_tasks$Exam_Date[i]) && Ordered_tasks$Suggested_Study_Time[i] > 0){
          if((colnames(Schedule[c]) == Ordered_tasks$Exam_Date[i]) && (as.numeric(rownames(Schedule[r,])) >= Ordered_tasks$Exam_Start_Time[i])){
            next #skip tasks that are in the past
          }
          study_obj_val <- ObjFunc2(study_time_quantum+30,freetime_quantum_type1) #objective value if current 30 mins was scheduled as a study task
          freetime_obj_val <- ObjFunc2(study_time_quantum,freetime_quantum_type1+30) #objective value if current 30 mins was scheduled as freetime
          if((study_obj_val==min(study_obj_val,freetime_obj_val) | (freetime_obj_val==study_obj_val))){
            Schedule[r,c] <- sprintf("Study %s for %s", Ordered_tasks$Exam_Name[i], Ordered_tasks$Course_ID[i])
            study_time_quantum <- study_time_quantum + 30
            Ordered_tasks$Suggested_Study_Time[i] <- Ordered_tasks$Suggested_Study_Time[i] - .5
            freetime_quantum_type1 <- 0
            #schedule study task i in current 30 min block
          }
          if((freetime_obj_val==min(freetime_obj_val,study_obj_val)) && (freetime_obj_val!=study_obj_val)){
            Schedule[r,c] <- 'Freetime/Break'
            freetime_quantum_type1 <- freetime_quantum_type1 + 30
            study_time_quantum <- 0
            #Schedule freetime/break for current 30 min block
          }
         }
      }
     
    }
  }
}

 for(c in 1:ncol(Schedule)){
   for(r in 1:nrow(Schedule)){
     sql <- sprintf("INSERT INTO Schedules (Student_ID,Event_Name,Event_Time,Event_Date) VALUES (%s,'%s','%s','%s')", S_ID, Schedule[r,c], rownames(Schedule[r,]),colnames(Schedule[c]))
     dbSendQuery(mydb,sql)
   }
 }
#insert schedule into database

all_cons <- dbListConnections(MySQL())
for (mydb in all_cons){
  dbDisconnect(mydb)
  #disconnect from database
}
