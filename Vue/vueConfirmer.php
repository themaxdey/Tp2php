<?php $titre = "Supprimer - " . $event['Asset_Name']; ?>
<?php ob_start(); ?>
<article>
    <header>
        <p><h1>
            Supprimer?
        </h1>
        <?= $event['date'] ?>, <?= $event['Asset_Description'] ?> dit : (privé? <?= $event['prive'] ?>)<br/>
        <strong><?= $event['titre'] ?></strong><br/>
        <?= $event['texte'] ?>
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="action_id" value="<?= $event['id'] ?>" /><br />
    <input type="submit" value="Oui" />
</form>
<form action="index.php" method="get" >
    <input type="hidden" name="action" value="action" />
    <input type="hidden" name="id" value="<?= $event['action_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>

