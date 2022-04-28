<?php

// 1. Il pattern con cui eseguire il test (l'espressione regolare)
// 2. La stringa da testare
// Risultato: 1 (true) se il test passa, altrimenti 0
$isEmailValid = preg_match('/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/m', $_POST["email"]);
// var_dump($isEmailValid);
$hasNotEmailMinLength = strlen($_POST["password"]) < 8;
if (!$isEmailValid || $hasNotEmailMinLength) {
    echo "Accesso negato!! <a href=\"login.html\">Torna al Login</a>";
    return;
}
unset($isEmailValid, $hasNotEmailMinLength);
echo "Accesso effettuato con successo!!";

