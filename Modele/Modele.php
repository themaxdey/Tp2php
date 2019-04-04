<?php

function getBdd() {
    $bdd = new PDO('mysql:host=localhost;dbname=Asset Management;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getRegisteredActions() {
    $bdd = getBdd();
    $registeredAction = $bdd->query('select * from ASSET_REGISTER'
            . ' order by PK_Asset_Register_ID desc');
    return $registeredAction;
}

function setAction($registeredAction) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO ASSET_REGISTER (PK_Asset_Register_ID, Asset_Name, Type, physicalPresence) VALUES(?, ?, ?, ?)');
    $result->execute(array($registeredAction['asset_id'], $registeredAction['assetName'], $registeredAction['type'], $registeredAction['choix']));
    return $result;
}

function getRegisteredAction($id) {
    $bdd = getBdd();
    $registeredAction = $bdd->prepare('select * from ASSET_REGISTER'
            . ' where PK_Asset_Register_ID= ?');
    $registeredAction->execute(array($id));
    if ($registeredAction->rowCount() == 1)
        return $registeredAction->fetch();
    else
        throw new Exception("Aucun article ne correspond à l'identifiant '$id'");
}

function getEvents($id) {
    $bdd = getBdd();
    $events = $bdd->prepare('select * from ASSETS_EVENTS'
            . ' where FK_Register_ID = ?');
    $events->execute(array($id));
    return $events;
}

function modifier($id) {
    $bdd = getBdd();
    $event = $bdd->prepare("UPDATE ASSET_EVENTS SET Event_Type = ?, Event_Amount = ?, Event_Description	 = ? 	Invoice_Paid = ? courielClient = ? WHERE PK_Event_ID = ?");
    $event->execute(array($event['Event_Type'], $event['Event_Amount'], $event['Event_Description'], $event['Invoice_Paid'], $event['courielClient'], $event['PK_Event_ID']));
    return $event;
}

function getEvent($id) {
    $bdd = getBdd();
    $event = $bdd->prepare('select * from ASSETS_EVENTS'
            . ' where PK_Event_ID = ?');
    $event->execute(array($id));
    if ($event->rowCount() == 1)
        return $event->fetch();
    else
        throw new Exception("Aucun Evenement ne correspond à l'identifiant '$id'");
    return $event;
}

function deleteEvent($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM ASSETS_EVENTS'
            . ' WHERE PK_Event_ID = ?');
    $result->execute(array($id));
    return $result;
}

function setEvent($event) {
    $bdd = getBdd();
    $result = $bdd->prepare('INSERT INTO ASSETS_EVENTS (FK_Customer_ID,	FK_Register_ID, courielClient,  Event_Type, Event_Date, Event_Amount, Event_Description, Invoice_Paid) VALUES( 3, ?, ?, ?, NOW(), ?, ?, ?)');
    $result->execute(array($event['action_id'], $event['courielClient'], $event['Event_Type'], $event['Event_Amount'], $event['Event_Description'], $event['Invoice_Paid']));
    return $result;
}

function searchType($term) {
    $conn = getBdd();
    $stmt = $conn->prepare('SELECT type FROM types WHERE type LIKE :term');
    $stmt->execute(array('term' => '%' . $term . '%'));

    while ($row = $stmt->fetch()) {
        $return_arr[] = $row['type'];
    }

    /* Toss back results as json encoded array. */
    return json_encode($return_arr);
}
