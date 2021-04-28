mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

Assignment_Name <- A1
Course_ID <- IE 23000-001

sql <- sprintf("SELECT Suggested_Study_Time FROM Assignments WHERE Assignment_Name='%s' AND Course_ID ='%s'", Assignment_Name, Course_ID)
Suggested_Time <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT (SELECT Feedback_morehours) - (SELECT Feedback_lesshours) FROM Feedback WHERE Assignment_Name='%s' AND Course_ID ='%s'", Assignment_Name, Course_ID)
Difference <- fetch(dbSendQuery(mydb,sql),n=-1)

#sql <- sprintf("SELECT Email FROM Feedback WHERE Assignment_Name='%s'AND Course_ID ='%s'", Assignment_Name, Course_ID)
#Email_ID <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT GPA, Year, Major FROM Student WHERE Student_ID IN (SELECT Student_ID FROM Feedback WHERE Assignment_Name='%s' AND Course_ID ='%s'", Assignment_Name, Course_ID))
Student_info <- fetch(dbSendQuery(mydb,sql),n=-1) 

#sql <- sprintf("SELECT Year FROM Student WHERE email='%s'", email)
#Year <- fetch(dbSendQuery(mydb,sql),n=-1)

#sql <- sprintf("SELECT Major FROM Student WHERE email='%s'", email)
#Major <- fetch(dbSendQuery(mydb,sql),n=-1)

#Query <- SELECT (SELECT A.Suggested_Study_Time) + (SELECT F.Feedback_morehours) - (SELECT F.Feedback_lesshours) AS total_time, S.GPA, S.Year, S.Major 
#FROM Student S, Feedback F, Assignment A
#WHERE A.Assignment_Name = F.Assignment_Name AND S.email = F.email
Total_time <- Suggested_Time + Difference

df <- data.frame(Total_time, Student_info)
#df <- dbGetQuery(mydb, Query)
fviz_nbclust(df, kmeans, method = "wss")

Kmeans_model <- kmeans(df, cluster = 6, nstart = 10)
aggregate(df, by = list(cluster=Kmeans_model$cluster), mean)
Cluster_means <- Kmeans_model$centers


all_cons <- dbListConnections(MySQL())
for (mydb in all_cons){
  dbDisconnect(mydb)
#disconnect from database
}

