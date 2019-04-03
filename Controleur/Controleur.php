<?php

require 'Modele/Modele.php';

function accueil() {
    $registeredActions = getRegisteredActions();
    require 'Vue/vueAccueil.php';
}

function action($id, $erreur) {
    $registeredAction = getRegisteredAction($id);
    $events = getEvents($id);
    require 'Vue/vueAction.php';
}

function event($event) {
    $validation_courriel = filter_var($event['auteur'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        setEvent($event);
        header('Location: index.php?action=registeredAction&id=' . $event['action_id']);
    } else {
        header('Location: index.php?action=registeredAction&id=' . $event['action_id'] . '&erreur=courriel');
    }
}

function confirmer($id) {
    $event = getEvent($id);
    require 'Vue/vueConfirmer.php';
}

function supprimer($id) {
    $event = getEvent($id);
    deleteEvent($id);
    header('Location: index.php?action=registeredEvent&id=' . $event['action_id']);
}

function nouvelAction() {
    require 'Vue/vueAjouter.php';
}

function ajouter($registeredAction) {
    setAction($registeredAction);
    header('Location: index.php');
}

function quelsTypes($term) {
    echo searchType($term);
}
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}
