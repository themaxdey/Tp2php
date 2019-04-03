<?php $titre = "Gestionnaires des actions - Ajouter" . $registeredAction['Asset_Name']; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Ajouter une Action de l'utilisateur 1 :</h1>
</header>
<form action="index.php?action=ajouter" method="post">
            <h2 id="titre">Gestionnnaire d'Action</h2>
            <p>
            <table>
               <tr>
                  <td><label for="texte">Nom de l'actif</label> :</td>
                  <td><input type="text" name="assetName" id="assetName" /></td>
               </tr>
               <tr>
                  <td>Type de trasaction :</td>
                  <td>
                     <select name="type">
                        <option value="Actif financier">Actif financier</option>
                        <option value="Actif fixe">Actif fixe</option>
                        <option value="Actif courant">Actif courant </option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Présence physique :</td>
                  <td>Tangible<Input type = 'radio' Name ='choix' value ="Tangible" checked="checked">
                     Intangible<Input type = 'radio' Name ='choix' value ="Intangible">
                  </td>
               </tr>
            </table>
            </p>
            <input type="submit" value="Ajouter" /> 
         </form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

