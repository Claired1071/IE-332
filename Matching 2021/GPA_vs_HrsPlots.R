require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

#database connection
sql <- sprintf("SELECT GPA, YEAR FROM Student")
Student_info <- fetch(dbSendQuery(mydb,sql),n=-1) 

hist(Student_info)
