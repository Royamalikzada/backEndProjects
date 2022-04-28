<?php

if ( !isset($_SESSION['user']) ) {
    header('Location: /day1/src/blog_ex/login.php');
}