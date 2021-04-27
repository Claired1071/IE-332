mydb <- dbConnect(MySQL(), user = ‘g1117490’, password = ‘xxxxxx’, dbname = ‘g1117490’, host = ‘mydb.itap.purdue.edu’)
on.exit(dbDisconnect(mydb))
#Query <- SELECT (SELECT A.Suggested_Study_Time) + (SELECT F.Feedback_morehours) - (SELECT F.Feedback_lesshours) AS total_time, S.GPA, S.Year, S.Major 

sql <- sprintf("SELECT Suggested_Study_Time FROM Assignment WHERE Assignment_Name='%s'", Assignment_Name)
Suggested_Time <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT Feedback_morehours FROM Feedback WHERE Assignment_Name='%s'", Assignment_Name)
More_hours <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT Feeback_lesshours FROM Feedback WHERE Assignment_Name='%s'", Assignment_Name)
Less_hours <- fetch(dbSendQuery(mydb,sql),n=-1)

sql <- sprintf("SELECT GPA FROM Student WHERE email='%s'", )
GPA <- fetch(dbSendQuery(mydb,sql),n=-1)



FROM Student S, Feedback F, Assignment A
WHERE A.Assignment_Name = F.Assignment_Name AND S.email = F.email
#Total_time <- Suggested_Study_Time + Feedback_morehours – Feedback_lesshours
df <- dbGetQuery(mydb, Query)

Kmeans_model <- kmeans(df, cluster = 6, nstart = 10)
aggregate(df, by = list(cluster=Kmeans_model$cluster), mean)
Cluster_means <- Kmeans_model$centers



