<?php $titre = "Gestionnaires des actions - " . $registeredAction['Asset_Name']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreAction"><?= $registeredAction['Asset_Name'] ?></h1>
        Type de trasaction : <?= $registeredAction['Type'] ?> <br/>
        Présence physique : <?= $registeredAction['physicalPresence'] ?> <br/>
    </header>
</article>
<hr /><br />
<header>
    <h1 id="titreReponses">Évènements de l'action <?= $registeredAction['Asset_Name'] ?> :</h1>
</header>

<?php foreach ($events as $event): ?>
<p><a href="index.php?action=confirmer&id=<?= $event['PK_Event_ID'] ?>" >
        [Supprimer]
    </a>
    <?= $event['Event_Date'] ?>, <?= $event['auteur'] ?> <br/>
        <strong><?= $event['Event_Type'] ?></strong><br/>
        <?= $event['Event_Description'] ?>
        Montant due : <?= $event['Event_Amount'] ?> $
        Monbtant payé : <?= $event['Invoice_Paid'] ?> $
    </p>
<?php endforeach; ?>

 <form action="index.php?action=event" method="post">
    <h2>Ajouter un évenement sur l'action</h2>
    <p>
        <table>
            <tr>
                <td>
                    <label for="auteur">Courriel du client (xxx@yyy.zz)</label> :
                </td>
                <td>
                    <input type="text" name="auteur" id="auteur" /> 
                    <?= ($erreur == 'courriel') ? '<span style="color : red;">Entrez un courriel valide s.v.p.</span>' : '' ?> 
                </td>
            </tr>
            <tr>
                <td>
                    <label for="texte">Type d'évènement</label> :
                </td>
                <td>
                    <input type="text" name="Event_Type" id="Event_Type" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="texte">Montant de la transaction</label> :
                </td>
                <td>
                    <input type="text" name="Event_Amount" id="Event_Amount" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="texte">Description de la transation</label> :
                </td>
                <td>
                    <textarea type="text" name="Event_Description" id="Event_Texte" ></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="texte">Montant payé sur la transaction</label> :
                </td>
                <td>
                    <input type="text" name="Invoice_Paid" id="Invoice_Paid" />
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <input type="hidden" name="action_id" value="<?= $registeredAction['PK_Asset_Register_ID'] ?>" />
                    <input type="submit" value="Envoyer" />
                </td>
            </tr>
        </table>       
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

