<?php 
require 'php/configDB.php';
session_start();
if(empty($_SESSION["userName"])){
    header('Location:php/login.php');
}

?>


<!DOCTYPE html>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <style>
        #app {
            padding-left: 1%;
        }
        
        img {
            width: 5%;
        }
        
        #main {
            width: 300%;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="app" ng-app="millioneer" ng-controller="myCtrl">

        <div ng-show="level == 0" class="btn pull-right" class="container">
            <h2>בחר את הרמה שלך</h2>
            <button type="button" ng-click="setLevel(1)" class="btn btn-info">רמה 1</button><br>
            <button type="button" ng-click="setLevel(2)" class="btn btn-info">רמה 2</button><br>
            <button type="button" ng-click="setLevel(3)" class="btn btn-info">רמה 3</button><br>
            <button type="button" ng-click="setLevel(4)" class="btn btn-info">רמה 4</button><br>
            <button type="button" ng-click="setLevel(5)" class="btn btn-info">רמה 5</button><br>
        </div>




        <div ng-show="level !== 0" class="container">
            <h2>your points : {{points}}</h2>
            <h1 class="active"> {{targil}}</h1>
            <p ng-click="checkAns('ans1')"  ng-style="{'background-color':getColor('ans1')}">{{ansArr[0]}}</p>
            <p ng-click="checkAns('ans2')"  ng-style="{'background-color':getColor('ans2')}">{{ansArr[1]}}</p>
            <p ng-click="checkAns('ans3')"  ng-style="{'background-color':getColor('ans3')}">{{ansArr[2]}}</p>
            <p ng-click="checkAns('ans4')"  ng-style="{'background-color':getColor('ans4')}">{{ansArr[3]}}</p>
            <!--<p ng-style="{'background-color':getColor()}">{{feedBack}}</p>-->

            <button ng-show="level !== 0" ng-click="clearLevel()" class="btn btn-info pull-right">change level</button>
        </div>


        <a href="index.html" ng-show="level == 0"><h1>back</h1></a>

    </div>


    </div>

    <script>
        var app = angular.module('millioneer', []);
        app.controller('myCtrl', function ($scope, $timeout,$http) {


            $scope.numCorrect = 0;
            $scope.numWrong = 0;
            $scope.points = 0;

            $scope.saveToDB = function(){
      
            

            }

            $scope.setLevel = function (level) {
                $scope.level = level;
                $scope.limitNumA_B = level * 5;
            }

            $scope.clearLevel = function () {
                $scope.saveToDB();
                 $scope.level = 0;
            }

            $scope.level = 0;
            $scope.limitNumA_B = 0;




            $scope.correct = "";
            $scope.feedBack = "";
            $scope.a = Math.floor((Math.random() * $scope.limitNumA_B) + 1);
            $scope.b = Math.floor((Math.random() * $scope.limitNumA_B) + 1);
            var actionRand = Math.floor((Math.random() * 2) + 1);
            if (actionRand == 1) {
                $scope.correctAns = $scope.a + $scope.b;
                $scope.targil = $scope.a + " + " + $scope.b + " =";

            } else {
                $scope.correctAns = $scope.a - $scope.b;
                $scope.targil = $scope.a + " - " + $scope.b + " =";
            }


            $scope.ansArr = [];

            $scope.ansArr.push($scope.correctAns);
            var ansRand;
            for (var i = 0; i < 3; i++) {
                var lim = Math.floor((Math.random() * 5) + 1);
                actionRand = Math.floor((Math.random() * 2) + 1);
                if (actionRand == 1) {
                    ansRand = $scope.correctAns + lim;

                } else {
                    ansRand = $scope.correctAns - lim;
                }
                if ($scope.ansArr.indexOf(ansRand) !== -1) {
                    i--;
                } else {
                    $scope.ansArr.push(ansRand);
                }


            }
            $scope.ansArr.sort();
            if ($scope.ansArr[0] == $scope.correctAns) {
                $scope.correct = "ans1";
            }
            if ($scope.ansArr[1] == $scope.correctAns) {
                $scope.correct = "ans2";
            }
            if ($scope.ansArr[2] == $scope.correctAns) {
                $scope.correct = "ans3";
            }
            if ($scope.ansArr[3] == $scope.correctAns) {
                $scope.correct = "ans4";
            }


            $scope.checkAns = function (selectedAns) {
                $scope.markAns = selectedAns;
                if (selectedAns == $scope.correct) {
                    $scope.feedBack = "CORRECT";
                     $scope.points++;
                    $scope.numCorrect++;
                    $timeout(function () {
                        $scope.resetTargil();
                        $scope.createQuestion();
                    }, 2000);

                } else {
                    $scope.feedBack = "WRONG";
                    if( $scope.points > 0){
                         $scope.points--;
                    }
                    $scope.numWrong++;
                }

            }


            $scope.getColor = function (ans) {
                if ($scope.feedBack == "CORRECT") {
                    if($scope.markAns == ans)
                        {
                            return "green";
                        }
                }
                if ($scope.feedBack == "WRONG" || $scope.feedBack == "TIME OUT") { 
                    
                       if($scope.markAns == ans)
                        {
                            return "red";
                        }
                        
                 }

            }
 

            $scope.resetTargil = function () {
                $scope.a = "";
                $scope.b = "";
                $scope.correctAns = "";
                $scope.targil = "";
                $scope.ansArr = [];
            }


            $scope.createQuestion = function () {
                $scope.correct = "";
                $scope.feedBack = "";
                $scope.a = Math.floor((Math.random() * $scope.limitNumA_B) + 1);
                $scope.b = Math.floor((Math.random() * $scope.limitNumA_B) + 1);
                var actionRand = Math.floor((Math.random() * 2) + 1);
                if (actionRand == 1) {
                    $scope.correctAns = $scope.a + $scope.b;
                    $scope.targil = $scope.a + " + " + $scope.b + " =";

                } else {
                    $scope.correctAns = $scope.a - $scope.b;
                    $scope.targil = $scope.a + " - " + $scope.b + " =";
                }
                $scope.ansArr = [];

                $scope.ansArr.push($scope.correctAns);
                var ansRand;
                for (var i = 0; i < 3; i++) {
                    var lim = Math.floor((Math.random() * 5) + 1);
                    var actionRand = Math.floor((Math.random() * 2) + 1);
                    if (actionRand == 1) {
                        ansRand = $scope.correctAns + lim;

                    } else {
                        ansRand = $scope.correctAns - lim;
                    }
                    if ($scope.ansArr.indexOf(ansRand) !== -1) {
                        i--;
                    } else {
                        $scope.ansArr.push(ansRand);
                    }
                }
                $scope.ansArr.sort();
                if ($scope.ansArr[0] == $scope.correctAns) {
                    $scope.correct = "ans1";
                }
                if ($scope.ansArr[1] == $scope.correctAns) {
                    $scope.correct = "ans2";
                }
                if ($scope.ansArr[2] == $scope.correctAns) {
                    $scope.correct = "ans3";
                }
                if ($scope.ansArr[3] == $scope.correctAns) {
                    $scope.correct = "ans4";
                }

            }


        });

    </script>


</body>

</html>