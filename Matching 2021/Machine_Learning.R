mydb <- dbConnect(MySQL(), user = ‘g1117490’, password = ‘xxxxxx’, dbname = ‘g1117490’, host = ‘mydb.itap.purdue.edu’)
on.exit(dbDisconnect(mydb))
Query <- SELECT S.GPA, S.Year, S.Major, F.Feedback_morehours, F.Feedback_lesshours, A.Suggested_Study_Time
FROM Student S, Feedback F, Assignment A
WHERE A.Assignment_Name = F.Assignment_Name AND S.email = F.email
#Total_time <- Suggested_Study_Time + Feedback_morehours – Feedback_lesshours
df <- dbGetQuery(mydb, Query)

Kmeans_model <- kmeans(df, cluster = 6, nstart = 10)
aggregate(df, by = list(cluster=Kmeans_model$cluster), mean)




