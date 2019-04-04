<?php

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'registeredAction') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    action($id, $erreur);
                } else
                    throw new Exception("Identifiant d'action incorrect");
            } else
                throw new Exception("Aucun identifiant d'action enregistrer");

        } else if ($_GET['action'] == 'event') {
            if (isset($_POST['action_id'])) {
                $id = intval($_POST['action_id']);
                if ($id != 0) {
                    $registeredAction = getRegisteredAction($id);
                    $event = $_POST;
                    event($event);
                } else
                    throw new Exception("Identifiant d'action incorrect");
            } else
                throw new Exception("Aucun identifiant d'action");

        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    modifierEvent($id);
                } else
                    throw new Exception("Identifiant d'event incorrect");
            } else
                throw new Exception("Aucun identifiant d'event");

        } else if ($_GET['action'] == 'annulerModification') {
            var_dump($id);
            var_dump($registerAction);
            var_dump($event);
            if (isset($_POST['action_id'])) {
                $id = intval($_POST['action_id']);
                if ($id != 0) {
                    $erreur = isset($_POST['erreur']) ? $_POST['erreur'] : '';
                    action($id, $erreur);
                } else
                    throw new Exception("Identifiant d'action incorrect");
            } else
                throw new Exception("Aucun identifiant d'action enregistrer");

        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_POST['id'])) {
                $id = intval($_POST['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant d'event incorrect");
            } else
                throw new Exception("Aucun identifiant d'event");

        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("Identifiant d'event incorrect");
            } else
                throw new Exception("Aucun identifiant d'event");

        } else if ($_GET['action'] == 'nouvelAction') {
            nouvelAction();

        } else if ($_GET['action'] == 'ajouter') {
            $registerAction = $_POST;
            ajouter($registerAction);

        } else if ($_GET['action'] == 'quelsTypes') {
            quelsTypes($_GET['term']);
            
        } else {
            throw new Exception("Action(path) non valide");
        }
    } else {
        accueil(); 
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}
