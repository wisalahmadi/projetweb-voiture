<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'
        ], ['block' => 'scriptLibraries']
);

$urlToRestApi = $this->Url->build('/api/cars-year');
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('CarsYear/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="CarYearCRUDCtrl">
    <div id="example1"></div>
    <p style="color:red;">{{ captcha_status}}</p>

    <table>
        <tr>
            <td width="200">Utilisateur (Email):</td>
            <td><input type="text" id="email" ng-model="user.email" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
        <a ng-click="login(user)">[Connexion] </a>
        <a ng-click="logout()">[Déconnexion] </a>
        <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>
        </tr>
    </table>
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table>
        <tr>
            <td><input type="hidden" id="id" ng-model="arYear.id" /></td>
        </tr>
        <tr>
            <td width="150">Year: </td>
            <td><input type="text" id="annee" ng-model="carYear.annee" /></td>
        </tr>

    </table>
    <br /> <br />

    <button <a ng-click="updateCarYear(carYear)"> [Update CarYear] </a> </button>
    <button <a ng-click="addCarYear(carYear.annee)">[Add CarYear] </a> </button>

    <br /> <br />
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center"> ID </th>
                <th class="width-30-pct"> Year </th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>

        <tbody ng-init="getAllCarsYear()">

            <tr ng-repeat="carYear in carsYear ">
                <td class="text-align-center">
                    {{carYear.id}}
                </td>
                <td>
                    {{carYear.annee}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getCarYear(carYear.id)">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteCarYear(carYear.id)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
