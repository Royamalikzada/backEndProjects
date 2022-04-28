<?php
    require_once '../../start.php';
    require_once '../../connect.php';

    $connection = connect();
    $languagesQueryRes = $connection->query('SELECT * FROM languages;', PDO::FETCH_ASSOC);

    $languages = [];

    // Ricreiamo l'array delle lingue affinchè si possa iterare sul risultato della query più volte
    //   -> Ricorda: il risultato della query è erogato all'interno di un oggetto che implementa un iteratore,
    //      il quale dopo la prima iterazione non resetta i suoi indici autonomamente, impedendo di iterarci più volte
    foreach($languagesQueryRes as $language) {
        $languages[] = $language;
    }

    // Esco dallo script se non sono state erogate informazioni nella rchiesta
    // È un controlo un po' scemo, si dovrebbero valutare le regole di validazione caso per caso
    if (!count($_POST)) {
        return;
    }

    $connection = connect();
    $query = $connection->prepare('INSERT INTO posts (user_id) VALUES (:user_id)');
    // Associo il post da creare all'utente attualmente loggato
    $query->bindParam('user_id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $query->execute();

    // Recuperiamo l'id dell'ultimo post inserito (quello appena creato con la query a riga 23)
    // affinchè possa essere usato per valorizzare la foreign key del contenuto dei post (post_contents.post_id)
    $postId = $connection->lastInsertId();

    // Per ogni parametro passato attraverso la richiesta in POST, cerco tutti i campi title / content
    //
    // Considerando che sono nomenclati con title-LNG e content-LNG (dove LNG è la lingua nel suo formato contratto,
    // che nella tabella languages abbiamo chiamato "short") prendo le ultime 3 lettere del nome del campo
    // al fine di capire a quale lingua questo si riferisce
    //
    // Nelle espressioni regolari possiamo individuare delle porzioni di "match" utilizzando le parentesi tonde
    // Le parti dell'espressione regolare che sono racchiuse tra () verranno erogate distintamente nell'array
    // dei match $matches. Ricorda che:
    //  -> in caso di match, l'array conterra in prima posizione (0) tutta la stringa che ha dato un riscontro rispetto
    //     l'espressione regolare
    //  -> dalla seconda posizione in poi (1 e successive) troverai i singoli gruppi
    //
    foreach($_POST as $k => $v) {
        $matches = [];

        if (preg_match('/^title-([A-Z]{3})$/', $k, $matches) !== 1) {
            continue;
        }

        $lang = $matches[1];

        if ( !isset($_POST["content-$lang"]) ) {
            continue;
        }   

        $query = $connection->prepare('
            INSERT INTO
                post_contents (title, content, post_id, language_id)
            VALUES
                (:title, :content, :post_id, :language_id)
            ;
        ');

        // Mi assicuro che la lingua indicata nel nome del campo in input esista

        // In informatica, una funzione che è in grado di accedere agli identificatori dichiarati
        // al suo esterno prende il nome di "closure"
        //
        // Una funzione PHP, di norma, non può accedere agli elementi dichiarati al suo esterno
        // Le funzioni PHP sono closure solo rispetto alle variabili che si declinano con "use"
        //
        // $filterRes = array_filter($languages, function ($language) use ($lang) {
        //     return $language['short'] === $lang;
        // });

        // Esempio di array_filter con arrow function
        // La arrow function è una closure per default ed accede a tutti gli elementi dichiarati
        // al suo esterno (non ha bisogno di "use", che rende la funzione una closure solo rispetto
        // ai parametri indicati)
        $filterRes = array_filter($languages, fn($language) => $language['short'] === $lang);

        if (!count($filterRes)) {
            throw new Exception("Error! Specified language doesn't exist");
        }

        $query->bindParam('title', $_POST["title-$lang"]);
        $query->bindParam('content', $_POST["content-$lang"]);
        $query->bindParam('language_id', current($filterRes)['id']);
        $query->bindParam('post_id', $postId);

        try {
            $query->execute();
        } catch(Exception $e) {
            echo "Query error, ignoring $lang language";
        }
    }

