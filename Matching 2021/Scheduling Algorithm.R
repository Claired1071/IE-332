ObjFunc <- function(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,ActualStudyHr,ActualWorkHr,TotalHr){
  ObjVal <- ((IdealStudyHr/TotalHr)*(IdealStudyHr-ActualStudyHr)) +
    ((IdealWorkHr/TotalHr)*(IdealWorkHr-ActualWorkHr)) +
    ((IdealFreetimeHr/TotalHr)*(IdealFreetimeHr-ActualFreetimeHr))
}

require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

S_ID <- 1111111111

sql <- sprintf("SELECT Courses FROM Student WHERE Student_ID='%s'", S_ID)

Courses <- fetch(dbSendQuery(mydb,sql),n=-1)
Course_List <- sub("\r\n","' , '",Courses)

sql <- sprintf("SELECT * FROM Course WHERE Course_ID IN ('%s')", Course_List)

Class_Times <- fetch(dbSendQuery(mydb,sql),n=-1)

all_cons <- dbListConnections(MySQL())
for (mydb in all_cons){
  dbDisconnect(mydb)
}

SleepHr <- c(0:8)
IdealWorkHr <- 7
IdealFreetimeHr <- 40
IdealStudyHr <- 40

Schedule <- as.data.frame(matrix('Empty', ncol = 110, nrow = 24))
Schedule[SleepHr,] <- 'Sleep'
for(r in 1:nrow(Class_Times)){
  for(c in 1:ncol(Schedule)){
    start_time <-as.numeric(sub(":00:00","",(Class_Times[r,"Course_Start_Time"])))
    end_time <-as.numeric(sub(":00:00","",(Class_Times[r,"Course_End_Time"])))
    Schedule[start_time:end_time,] <- sprintf("Attend %s", Class_Times[r,"Course_ID"])
  }
}

ActualWorkHr <- 0
ActualStudyHr <- 0
ActualFreetimeHr <- 0
TotalHr <- sum(IdealFreetimeHr,IdealStudyHr,IdealWorkHr)




for(c in 1:ncol(Schedule)){
  for(r in 1:nrow(Schedule)){
    if (Schedule[r,c]=='Empty'){
    if (ActualStudyHr<IdealStudyHr){
    StudyVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,(ActualStudyHr+1),ActualWorkHr,TotalHr)
    }
    if (ActualWorkHr<IdealWorkHr){
    WorkVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,ActualStudyHr,(ActualWorkHr+1),TotalHr)
    }
    if (ActualFreetimeHr<IdealFreetimeHr){
    FreetimeVar <- ObjFunc(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,(ActualFreetimeHr+1),ActualStudyHr,ActualWorkHr,TotalHr)
    }
    print(c(StudyVar,WorkVar,FreetimeVar,ActualStudyHr,ActualWorkHr,ActualFreetimeHr))
    if ((ActualStudyHr<IdealStudyHr) & (StudyVar==min(StudyVar,WorkVar,FreetimeVar))){
      Schedule[r,c] <- 'Study'
      ActualStudyHr <- ActualStudyHr + 1
    } 
    if ((ActualWorkHr<IdealWorkHr) & (WorkVar==min(StudyVar,WorkVar,FreetimeVar))){
      Schedule[r,c] <- 'Work'
      ActualWorkHr <- ActualWorkHr + 1
    } 
    if((ActualFreetimeHr<IdealFreetimeHr) & (FreetimeVar==min(StudyVar,WorkVar,FreetimeVar))){
      Schedule[r,c] <- 'Freetime'
      ActualFreetimeHr <- ActualFreetimeHr + 1
    }
    }
    }
  if ((c %% 7)==0){
    ActualStudyHr <- 0
    ActualWorkHr <- 0
    ActualFreetimeHr <- 0
  }
}
