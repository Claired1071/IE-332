require("RMySQL")
library(RMySQL)
mydb <- dbConnect(MySQL(), user = 'g1117490', password = 'iegroup9', dbname = 'g1117490', host = 'mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

#database connection

Year1 <- 'Freshman'
Year2 <- 'Sophomore'
Year3 <- 'Junior'
Year4 <- 'Senior'

sql <- sprintf("SELECT GPA FROM Student WHERE Year = '%s'", Year1)
Freshmen <- fetch(dbSendQuery(mydb,sql),n=-1)


sql <- sprintf("SELECT GPA FROM Student WHERE Year = '%s'", Year2)
sophomore <- fetch(dbSendQuery(mydb,sql),n=-1)


sql <- sprintf("SELECT GPA FROM Student WHERE Year = '%s'", Year3)
junior <- fetch(dbSendQuery(mydb,sql),n=-1)


sql <- sprintf("SELECT GPA FROM Student WHERE Year = '%s'", Year4)
senior <- fetch(dbSendQuery(mydb,sql),n=-1)

boxplot(c(Freshmen, sophomore, junior, senior),names = c("Freshmen", "Sophomore", "Junior", "Senior" ),  main = "GPA Distribution by Grade Year")


