var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);

var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('CarYearCRUDCtrl', ['$scope', 'CarYearCRUDService', function ($scope, CarYearCRUDService) {

        $scope.updateCarYear = function () {
            CarYearCRUDService.updateCarYear($scope.carYear.id, $scope.carYear.annee)
                    .then(function success(response) {
                        $scope.message = 'CarYear data updated!';
                        $scope.errorMessage = '';
                        $scope.getAllCarsYear();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating carYear!';
                                $scope.message = '';
                            });
        }

        $scope.getCarYear = function () {
            var id = $scope.carYear.id;
            CarYearCRUDService.getCarYear($scope.carYear.id)
                    .then(function success(response) {
                        $scope.carYear = response.data.carYear;
//                        $scope.carYear.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'CarYear not found!';
                                } else {
                                    $scope.errorMessage = "Error getting carYear!";
                                }
                            });
        }

        $scope.addCarYear = function () {
            if ($scope.carYear != null && $scope.carYear.annee) {
                CarYearCRUDService.addCarYear($scope.carYear.annee)
                        .then(function success(response) {
                            $scope.message = 'CarYear added!';
                            $scope.errorMessage = '';
                            $scope.getAllCarsYear();
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding CarYear!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteCarYear = function (id) {
            CarYearCRUDService.deleteCarYear(id)
                    .then(function success(response) {
                        $scope.message = 'CarYear deleted!';
                        $scope.carYear = null;
                        $scope.errorMessage = '';
                        $scope.getAllCarsYear();
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting carYear!';
                                $scope.message = '';
                            })
        }

        $scope.getAllCarsYear = function () {
            CarYearCRUDService.getAllCarsYear()
                    .then(function success(response) {
                        $scope.carsYear = response.data.carsYear;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting carsYear!';
                            });
        }

        $scope.login = function () {
            if (grecaptcha.getResponse(widgetId1) == '') {
                $scope.captcha_status = 'Please verify captha.';
                return;
            }
            if ($scope.user != null && $scope.user.email) {
                 CarYearCRUDService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.email + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token.jwt);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }
        $scope.changePassword = function () {
             CarYearCRUDService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
                            });
        }

    }]);

app.service('CarYearCRUDService', ['$http', function ($http) {

        this.getCarYear = function getCarYear(carYearId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + carYearId,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': localStorage.getItem("token")
                }

            });
        }

        this.addCarYear = function addCarYear(annee) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {annee: annee},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            });
        }

        this.deleteCarYear = function deleteCarYear(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            })
        }

        this.updateCarYear = function updateCarYear(id, annee) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {annee: annee},
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json',
                    'Authorization': localStorage.getItem("token")
                }
            })
        }

        this.getAllCarsYear = function getAllCarsYear() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: { 'X-Requested-With' : 'XMLHttpRequest',
                    'Accept' : 'application/json'}
            });
        }

            this.login = function login(user) {
                return $http({
                    method: 'POST',
                    url: urlToRestApiUsers + '/token',
                    data: {email: user.email, password: user.password},
                    headers: {'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'}
                });
            }
            this.changePassword = function changePassword(password) {
                return $http({
                    method: 'PATCH',
                    url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                    data: {password: password},
                    headers: {'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'Authorization': localStorage.getItem("token")
                    }
                })
            }

    }]);


