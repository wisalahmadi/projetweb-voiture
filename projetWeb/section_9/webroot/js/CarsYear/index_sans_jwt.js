var app = angular.module('app', []);

app.controller('KrajRegionCRUDCtrl', ['$scope', 'KrajRegionCRUDService', function ($scope, KrajRegionCRUDService) {

    $scope.updateKrajRegion = function () {
        KrajRegionCRUDService.updateKrajRegion($scope.krajRegion.id, $scope.krajRegion.nazev, $scope.krajRegion.kod)
            .then(function success(response) {
                    $scope.message = 'KrajRegion data updated!';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error updating krajRegion!';
                    $scope.message = '';
                });
    }

    $scope.getKrajRegion = function () {
        var id = $scope.krajRegion.id;
        KrajRegionCRUDService.getKrajRegion($scope.krajRegion.id)
            .then(function success(response) {
                    $scope.krajRegion = response.data.krajRegion;
//                        $scope.krajRegion.id = id;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    if (response.status === 404) {
                        $scope.errorMessage = 'KrajRegion not found!';
                    } else {
                        $scope.errorMessage = "Error getting krajRegion!";
                    }
                });
    }

    $scope.addKrajRegion = function () {
        if ($scope.krajRegion != null && $scope.krajRegion.nazev) {
            KrajRegionCRUDService.addKrajRegion($scope.krajRegion.nazev, $scope.krajRegion.kod)
                .then(function success(response) {
                        $scope.message = 'KrajRegion added!';
                        $scope.errorMessage = '';
                    },
                    function error(response) {
                        $scope.errorMessage = 'Error adding krajRegion!';
                        $scope.message = '';
                    });
        } else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }

    $scope.deleteKrajRegion = function () {
        KrajRegionCRUDService.deleteKrajRegion($scope.krajRegion.id)
            .then(function success(response) {
                    $scope.message = 'KrajRegion deleted!';
                    $scope.krajRegion = null;
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.errorMessage = 'Error deleting krajRegion!';
                    $scope.message = '';
                })
    }

    $scope.getAllKrajRegions = function () {
        KrajRegionCRUDService.getAllKrajRegions()
            .then(function success(response) {
                    $scope.krajRegions = response.data.krajRegions;
                    $scope.message = '';
                    $scope.errorMessage = '';
                },
                function error(response) {
                    $scope.message = '';
                    $scope.errorMessage = 'Error getting krajRegions!';
                });
    }

}]);

app.service('KrajRegionCRUDService', ['$http', function ($http) {

    this.getKrajRegion = function getKrajRegion(krajRegionId) {
        return $http({
            method: 'GET',
            url: urlToRestApi + '/' + krajRegionId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.addKrajRegion = function addKrajRegion(nazev, kod) {
        return $http({
            method: 'POST',
            url: urlToRestApi,
            data: {nazev: nazev, kod: kod},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

    this.deleteKrajRegion = function deleteKrajRegion(id) {
        return $http({
            method: 'DELETE',
            url: urlToRestApi + '/' + id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.updateKrajRegion = function updateKrajRegion(id, nazev, kod) {
        return $http({
            method: 'PATCH',
            url: urlToRestApi + '/' + id,
            data: {nazev: nazev, kod: kod},
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        })
    }

    this.getAllKrajRegions = function getAllKrajRegions() {
        return $http({
            method: 'GET',
            url: urlToRestApi,
            headers: { 'X-Requested-With' : 'XMLHttpRequest',
                'Accept' : 'application/json'}
        });
    }

}]);


