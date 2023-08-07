<?php 'À propos de ce site'; ?>


    <h2>Wisal Ahmadi</h2>
    <h4>420-5H6 MO Applications Web transactionnelles. <br>
        Automne 2022, Collège Montmorency. </h4>

    <h4>Une description sommaires des étapes d'utilisation: </h4>

    <p>Cette site web permet de publié les voitures à vendre <br>
    La page principal affiche tout les voitures à vendre qui ont été ajouter par des différentes utilisateurs </p>

    <li> On doit d'abord créer une compte. Une lien de confirmation va être envoier au courriel du compte créée</li>

    <li>Une fois qu'on confirme une message en verte apparait: 'Your email has been confirmed'</li>
    <li>La page principal montre tout les voitures à vendre qui ont été ajouter par des utilisateur différent</li>
    <li>Si je suis l'utilisateur en session je peux ajouter,modifier et supprimer une voiture.</li>
    <li>Dans la barre de menu principal les options suivants sont disponible => Admin, Listes Liées, Autocomplete, Monopage</li>

    <table style="width:100%">
        <tr>
          <th>Menu</th>
          <th>Fonctionalités</th>
        </tr>
        <tr>
          <td>Admin</td>
          <td> <li>Ce menu nous amène sur la page des couleurs disponible pour une voiture dependant de l'année de cette voiture</li>
            <ul>
            <li>On n'est pas en mode Admin au départ.</li>
            <li>Donc, on peut seulement Afficher les couleurs.</li>
            <li>Pour être Admin il faut ajouter admin dans l'url=> ..../admin/cars-colors-dispo</li>
            <li>Si on n'est pas en session, on va devoir tout d'abord sign in</li>
            <li>On voit maintenant d'autres options à part Afficher, donc Modifier et Supprimer une couleurs. </li>
            <li>On remarque que grâce à l'interface bootstrap, l'interface est différent pour une Admin et non admin</li>
        </ul></td>
        </tr>
        <tr>
          <td>Listes Liées (UPDATE)</td>
          <td> <li>Ce menu nous amène sur la page pour ajouter des marques de voitures</li>
            <ul>
            <li>Puisque cette une liste lié il y a des conditions pour ajouter une marques</li>
            <li>Il faut d'abord choisir une année</li>
            <li>Choisir une couleur disponible pour cette année</li>
            <li>Malheureusement cette fonction n'est pas réaliser à 100%. Les couleurs n'affichent pas</li>
            <li>On ne peut pas ajouter une marque à cause de cet erreur :(</li>
        </ul></td>
        </tr>
        <tr>
          <td>Autocomplete</td>
          <td> <li>Ce menu nous amène sur la page pour ajouter une voiture</li>
            <ul>
            <li>On remplis tout les champs</li>
            <li>Pour le champ Car Brand, on tape une lettre et grâce à l'Autocomplete <br>la marque est afficher et on peut juste cliquer dessus pour le choisir</li>
        </ul></td>
        </tr>
        <tr>
          <td>Monopage  (UPDATE)</td>
          <td> <li>Ce menu nous amène sur la page pour ajouter les années de voitures</li>
            <ul>
                <li>D'abord, dans Application.php il faut commenter la ligne et 186 et décommenter la ligne 189</li>
            <li>Il est important de changer l'url: http://localhost/section_9/cars-year/index </li>
            <li>Une fois qu'on est sur cette page il faut entrez son courriel et mots de passe valide.</li>
            <li> Il faut coché captcha sinon sa ne fonctionnera pas.</li>
            <li> On peut maintenat faire une connexion</li>
            <li> À cause des erreurs que je n'arriver pas à résoudre les fonctions pour ajouter supprimer editer des années ne marche pas</li>
            <li> Ils fonctionner bien avant que j'intègre jwt dans mon code</li>
            </ul></td>
        </tr>

        <tr>
            <td>http://localhost/section_9/files  (UPDATE)</td>
            <td> <li>Cet page nous permet d'ajouter des images avec drag n drop</li>
                <ul>
                    <li>Il faut glisser une image sur une des données déjè présente. </li>
                    <li>On peut cliquer sur modifier et relier cette image a une des voiture enrigistrer</li>
                    <li>Ensuite on va sur la page principal</li>
                    <li>On peut voir l'image avec la voiture relier</li>
                    <li>Seulement la dernier image ajouter est disponible</li>
                    <li>On peut cliquer sur afficher et voir les  autres images relié avec cette voiture => "Related Files" </li>
                </ul></td>
        </tr>
      </table>
<br>

<table>
    <tr>
        <td>
            <h4> La base de données utilisée par ce site :</h4>
            <img src="webroot/img/cars/maBD.jpg" />
        </td>
    </tr>

    <tr>
        <td>
            <h4>est basée sur cet exemple : Blog Data Model: J'avais utiliser ce lien au session hiver 2022, malheureusement le site est changer et je ne trouve pas d'autre sites</h4>
            <img src="Contenu/images/apropos/exempleBaseDonnee.gif" width="550" height="450" />
            <a href="http://www.databaseanswers.org/data_models/vehicle_rental/index.htm">(source : http://www.databaseanswers.org/data_models/vehicle_rental/index.htm)</a>
        </td>
    </tr>
</table>
