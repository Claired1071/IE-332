ObjFunc <- function(IdealFreetimeHr,IdealStudyHr,IdealWorkHr,ActualFreetimeHr,ActualStudyHr,ActualWorkHr,TotalHr){
  ObjVal <- ((IdealStudyHr/TotalHr)*(IdealStudyHr-ActualStudyHr)) +
    ((IdealWorkHr/TotalHr)*(IdealWorkHr-ActualWorkHr)) +
    ((IdealFreetimeHr/TotalHr)*(IdealFreetimeHr-ActualFreetimeHr))
}
Schedule <- as.data.frame(matrix('Empty', ncol = 110, nrow = 24))
IdealWorkHr <- 7
IdealFreetimeHr <- 60
IdealStudyHr <- 40
SleepHr <- c(1:8)
ActualWorkHr <- 0
ActualStudyHr <- 0
ActualFreetimeHr <- 0
TotalHr <- sum(IdealFreetimeHr,IdealStudyHr,IdealWorkHr)

Schedule[SleepHr,] <- 'Sleep'

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
