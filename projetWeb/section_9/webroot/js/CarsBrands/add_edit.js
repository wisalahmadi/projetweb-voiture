var app = angular.module('linkedlists', []);

app.controller('CarsYearController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.carsYear = response.data.carsYear;
    });
});

