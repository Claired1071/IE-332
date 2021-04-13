ObjFunc <- function(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,ActualStudyHr,ActualWorkHr,TotalHr){
  ObjVal <- ((IdealStudyHr/TotalHr)*(IdealStudyHr-ActualStudyHr)) +
    ((IdealWorkHr/TotalHr)*(IdealWorkHr-ActualWorkHr)) +
    ((IdealFreetimeHr/TotalHr)*(IdealFreetimeHr-ActualFreetimeHr))
}
#objective function to minimize uncompleted goals - goals are inputted weekly number of hours that they wish to study, work, or have freetime
require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))
#database connection

S_ID <- 1111111111
#hardcoded student ID (to error check while I'm creating this code)

sql <- sprintf("SELECT Courses FROM Student WHERE Student_ID='%s'", S_ID)
Courses <- fetch(dbSendQuery(mydb,sql),n=-1)
Course_List <- gsub("\r\n","' , '",Courses)
#get list of courses for student
sql <- sprintf("SELECT * FROM Courses WHERE Course_ID IN ('%s')", Course_List)

Class_Times <- fetch(dbSendQuery(mydb,sql),n=-1)
#get class times for all student's courses

sql <- sprintf("SELECT * FROM Assignment WHERE Course_ID IN ('%s')", Course_List)
Assignments <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all assignments for student's courses

sql <- sprintf("SELECT * FROM Exam WHERE Course_ID IN ('%s')", Course_List)
Exams <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all exams for student's courses

sql <- sprintf("SELECT * FROM Events WHERE Student_ID='%s'", S_ID)
Events <- fetch(dbSendQuery(mydb,sql),n=-1)
#get all events entered by student
all_cons <- dbListConnections(MySQL())
for (mydb in all_cons){
  dbDisconnect(mydb)
#disconnect from database
}


SleepHr <- c(0:8)
IdealWorkHr <- 7
IdealFreetimeHr <- 40
IdealStudyHr <- 10
#hardcoded place holded for ideal goal hours
TotalHr <- sum(IdealWorkHr,IdealStudyHr,IdealFreetimeHr)


Schedule <- as.data.frame(matrix('Empty', ncol = 110, nrow = 24,))
colnames(Schedule) <- seq(as.Date("2021/1/19"), as.Date("2021/5/8"), by = "day")
#create blank schedule

Schedule[SleepHr,] <- 'Sleep'
#insert sleep hours into Schedule so no events scheduled while student is sleeping

for(r in 1:nrow(Class_Times)){
  for(c in 1:ncol(Schedule)){
    if(Class_Times[r,"Day"]==strftime(colnames(Schedule[c]), "%a")){
    start_time <-as.numeric(sub(":00:00","",(Class_Times[r,"Course_Start_Time"])))
    end_time <-as.numeric(sub(":00:00","",(Class_Times[r,"Course_End_Time"])))
    Schedule[start_time:(end_time-1),c] <- sprintf("Attend %s", Class_Times[r,"Course_ID"])
    }
  }
}
#insert course dates and times into Schedule

for(r in 1:nrow(Events)){
  for(c in 1:ncol(Schedule)){
    if(colnames(Schedule[c])==Events[r,"Event_Date"]){
    start_time <-as.numeric(sub(":00:00","",(Events[r,"Event_Start_Time"])))
    end_time <-as.numeric(sub(":00:00","",(Events[r,"Event_End_Time"])))
    Schedule[start_time:(end_time-1),c] <- Events[r,"Event_Name"]
    }
  }
}
#insert events into Schedule

for(r in 1:nrow(Exams)){
  for(c in 1:ncol(Schedule)){
    if(colnames(Schedule[c])==Exams[r,"Exam_Date"]){
      start_time <-as.numeric(sub(":00:00","",(Exams[r,"Exam_Start_Time"])))
      end_time <-as.numeric(sub(":00:00","",(Exams[r,"Exam_End_Time"])))
      Schedule[start_time:(end_time-1),c] <- sprintf("%s in %s", Exams[r,"Exam_Name"], Exams[r,'Course_ID'])
    }
  }
}
#insert exams into Schedule

ActualWorkHr <- 0
ActualStudyHr <- 0
ActualFreetimeHr <- 0
#set Actual variables to zero and add all ideal hours to prepare for algorithm

for(c in 1:ncol(Schedule)){
  for(r in 1:nrow(Schedule)){
    
    if (Schedule[r,c]=='Empty'){
      if (ActualStudyHr<IdealStudyHr){
        StudyVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,(ActualStudyHr+1),ActualWorkHr,TotalHr)
      #evaluates obj func if the current hour is scheduled as a "study" hour
      }
      if (ActualWorkHr<IdealWorkHr){
        WorkVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,ActualStudyHr,(ActualWorkHr+1),TotalHr)
        #evaluates obj func if the current hour is scheduled as a "work" hour
      }
      if (ActualFreetimeHr<IdealFreetimeHr){
        FreetimeVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,(ActualFreetimeHr+1),ActualStudyHr,ActualWorkHr,TotalHr)
        #evaluates obj func value if the current hour is scheduled as a "freetime" hour
      }
      if ((ActualStudyHr<IdealStudyHr) & (StudyVar==min(StudyVar,WorkVar,FreetimeVar))){
        Schedule[r,c] <- 'Study'
        ActualStudyHr <- ActualStudyHr + 1
        #schedules current hour as "study" if study gave minimum objective value
      } 
      if ((ActualWorkHr<IdealWorkHr) & (WorkVar==min(StudyVar,WorkVar,FreetimeVar))){
        Schedule[r,c] <- 'Work'
        ActualWorkHr <- ActualWorkHr + 1
        #schedules current hour as "work" if study gave minimum objective value
      } 
      if((ActualFreetimeHr<IdealFreetimeHr) & (FreetimeVar==min(StudyVar,WorkVar,FreetimeVar))){
        Schedule[r,c] <- 'Freetime'
        ActualFreetimeHr <- ActualFreetimeHr + 1
        #schedules current hour as "freetime" if study gave minimum objective value
      }
    }
  }
  if ((c %% 7)==0){
    ActualStudyHr <- 0
    ActualWorkHr <- 0
    ActualFreetimeHr <- 0
    #resets actual hours achieved every week
  }
}
