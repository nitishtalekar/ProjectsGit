#DATA
data1 = read.csv("C:\\Users\\NitishTalekar\\Desktop\\Projects\\ProjectsGit\\ML\\DataSets\\Created\\spdist.csv")
data2 = read.csv("C:\\Users\\NitishTalekar\\Desktop\\Projects\\ProjectsGit\\ML\\DataSets\\Created\\htwt.csv")
data3 = read.csv("C:\\Users\\NitishTalekar\\Desktop\\Projects\\ProjectsGit\\ML\\DataSets\\iris.csv")
print(data1)
print(data2)
print(data3)
test1 = data.frame("speed"=c(79,66,85))
test2 = data.frame("H"=c(150,180,166),"W"=c(68,80,45))
test3 = data.frame("SL"=c(5.0,6.3,7.5),"SW"=c(3.5,2.5,2.8),"PL"=c(1.6,4.3,6.0),"PW"=c(0.3,1.2,2.0))
print(test1)
print(test2)
print(test3)

#LIBRARIES
library(rpart)
library(rpart.plot)
library(e1071)
library(randomForest)

#LINEAR REG
lin_model = lm(dist~speed,data=data1)
lin_model
predict(lin_model,test1)

#LOGISTIC REG
log_model = glm(Gen~H*W,data=data2,family=binomial)
log_model
round(predict(log_model,test2,type="response"))

#DECISION TREE
dt_model1 = rpart(Gen~H+W, data=data2)
dt_model1
round(predict(dt_model1,test2))

dt_model2 = rpart(S~SL+SW+PL+PW, data=data3)
dt_model2
round(predict(dt_model2,test3))

#RANDOM FOREST
rf_model1 = randomForest(Gen~., data=data2)
rf_model1
predict(rf_model1,test2)

rf_model2 = randomForest(S~., data=data3)
rf_model2
predict(rf_model2,test3)

#NAIVE BAYES
nb_model = naiveBayes(S~., data = data3)
nb_model
predict(nb_model,test3)








