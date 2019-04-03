<?php $titre = 'TP2 - Maxime Dery'; ?>

<?php ob_start(); ?>
<a href="index.php?action=nouvelAction">
    <h2 class="titreAction">Ajouter une action</h2>
</a>
<?php foreach ($registeredActions as $registeredAction):
    ?>

    <article>
        <header>
            <a href="<?= "index.php?action=registeredAction&id=" . $registeredAction['PK_Asset_Register_ID'] ?>">
                <h1 class="titreAction"><?= $registeredAction['Asset_Name'] ?></h1>
            </a>
             Type de trasaction : <?= $registeredAction['Type'] ?> <br/>
             Présence physique : <?= $registeredAction['physicalPresence'] ?> <br/>
        </header>
        <p><?= $registeredAction['texte'] ?></p>
        <p><?= $registeredAction['type'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>    
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>