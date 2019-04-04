<?php $titre = "Supprimer - " . $event['Asset_Name']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p><h1>
            Supprimer?
        </h1>      
        <strong class="eventTitle"><?= $event['Event_Type'] ?></strong> <br />
        Par: <i><?= $event['courielClient'] ?></i>, le <?= $event['Event_Date'] ?> <br/>
        Montant payé : <?= $event['Invoice_Paid'] ?> $ <br/>
        Montant due : <?= $event['Event_Amount'] ?> $ <br/>
        Description : <?= $event['Event_Description'] ?> <br/>  
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $event['PK_Event_ID'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="confirmer" />
    <input type="hidden" name="id" value="<?= $event['action_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

