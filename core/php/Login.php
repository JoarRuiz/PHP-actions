<?php

/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 07/02/2016
 * Time: 06:29 PM
 */
include "DataBaseManager.php";
require_once("Session.php");
require_once("LoginHelper.php");

$username = $_POST["username"];
$password = $_POST["password"];

$lh = new LoginHelper();
$database = DataBaseManager::getInstance();
$lh->setDb($database);
$lh->setSesion(new session());
$lh->verifyLogin($username, $password);


//$query = "Select * FROM  usuario WHERE nombre = '$username' AND clave = '$password'";
//$result = $database->realizeQuery($query);
//verifyLogin($result, $username);

function verifyLogin($result, $username) {
    $message = null;
    $session = new session();

    if (count($result) > 0) {

        $user = array();

        $user['type'] = $result[0]['tipo'];

        //$session->set("user", $username);
        $session->set("user", $result[0]['id']);
        $usersList[] = $user;

        echo json_encode($usersList);
    } else {
        echo json_encode($message);
    }
}