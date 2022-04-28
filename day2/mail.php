<?php
$emailRegex = '/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/m'

$isFromEmailValid = preg_match($emailRegex, $_POST["from"]);
$isToEmailValid = preg_match($emailRegex, $_POST["to"]);

if(!$isFromEmailValid || !$isToEmailValid){
    echo "Controlla gli indirizzi email!";
    return;
}

if(strlen($_POST["message"])< 3){
    echo "Messaggio troppo breve";
    return;
}
$headers=[];

$isSent = mail($_POST["to"], "Oggetto del messaggio", $_POST["message"]);

if(!$isSent) {
    echo "Email <strong> NON </strong> inviata";
    return;
}

echo "Email inviata con successo";
