<?php $titre = "Gestionnaires des actions - Modifier" . $registeredAction['Asset_Name']; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreReponses">Modifier l'évènement :</h1>
</header>   
            <h2 id="titre">Gestionnnaire d'Action</h2>
            <p>
                <table>
                    <tr>
                        <td><label for="texte">Type de l'évènement :</label></td>
                        <td><input type="text" name="Event_Type" id="Event_Type" value=<?= $event['Event_Type'] ?>></td>
                    </tr>
                    <tr>
                            <td><label for="texte">Par :</label></td>
                            <td><input type="text" name="courielClient" id="courielClient" value=<?= $event['courielClient'] ?>></td>
                            <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?>
                    </tr>
                    <tr>
                        <td>Montant payé :</td>
                        <td><input type="text" name="Invoice_Paid" id="Invoice_Paid" value=<?= $event['Invoice_Paid'] ?>></td>
                    </tr>
                    <tr>
                        <td> Montant due :</td>
                        <td><input type="text" name="Event_Amount" id="Event_Amount" value=<?= $event['Event_Amount'] ?>></td>
                    </tr>
                    <tr>
                        <td> Description :</td>
                        <td><input type="text" name="Event_Description" id="Event_Description" value=<?= $event['Event_Description'] ?>></td>
                    </tr>

                    <tr>
                        <td style="text-align:right;">
                            <form action="index.php?action=annulerModification" method="post">
                                <input type="hidden" name="id" value="<?= $event['FK_Event_ID'] ?>" />
                                <input type="submit" value="Annuler" />
                            </form>
                        </td>
                        <td style="text-align:left;">
                            <form action="index.php?action=" method="post">
                                <input type="hidden" name="id" value="<?= $event['PK_Event_ID'] ?>" />
                                <input type="submit" value="Modifier" />
                            </form>
                        </td>                      
                    </tr>
                </table>
            </p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

