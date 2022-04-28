<?php
session_start();

//$_SESSION['REMOTE_ADDR'] -> indirizzo IP dell'utente che ha eseguito la richiesta

if($_COOKIE['PHPSESSID'] !== session_id()){
    die ('Ce stai a prova, eh? :)');
}
var_dump($_COOKIE);