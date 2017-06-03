       
       


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
    <div id="app" ng-app="sc" ng-controller="myCtrl">

 <h1>practice</h1>


    </div>

    <script>
        var app = angular.module('sc', []);
        app.controller('myCtrl', ['$cookieStore', function ($scope, $timeout,$cookieStore) {

       $cookieStore["save"]  = "cookieStore";
        }]);

    </script>


</body>

</html>