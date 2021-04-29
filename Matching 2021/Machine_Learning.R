require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

Assignment_Name <- 'A1'
Course_ID <- 'IE 23000-001'

sql <- sprintf("SELECT Suggested_Study_Time FROM Assignments WHERE Assignment_Name='%s' AND Course_ID ='%s'", Assignment_Name, Course_ID)
Suggested_Time <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT (SELECT Feedback_morehours) - (SELECT Feedback_lesshours) FROM Feedback WHERE Assignment_Name='%s' AND Course_ID ='%s'", Assignment_Name, Course_ID)
Difference <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT GPA, Year, Major FROM Student WHERE Student_ID IN (SELECT Student_ID FROM Feedback WHERE Assignment_Name='%s' AND Course_ID ='%s')", Assignment_Name, Course_ID)
Student_info <- fetch(dbSendQuery(mydb,sql),n=-1) 
for (i in 1:length(Student_info$Year)) {
  if(Student_info$Year[i] == 'Freshmen') 
    Student_info$Year[i] = 1
  if(Student_info$Year[i] == 'Sophomore')
    Student_info$Year[i] = 2
  if(Student_info$Year[i] == 'Junior') 
    Student_info$Year[i] = 3
  if(Student_info$Year[i] == 'Senior') 
    Student_info$Year[i] = 4
}

Total_time <- rep(Suggested_Time, length(Difference)) + Difference

df <- data.frame(Total_time, Student_info)
dt <- df[, -4]

Kmeans_model <- kmeans(kt, centers = 6, nstart = 10)
aggregate(df, by = list(cluster=Kmeans_model$centers), mean)
Cluster_means <- Kmeans_model$centers


all_cons <- dbListConnections(MySQL())
for (mydb in all_cons){
  dbDisconnect(mydb)
#disconnect from database
}

