<?php

require_once 'start.php';

if($_SESSION['user']) {
    session_destroy();
}