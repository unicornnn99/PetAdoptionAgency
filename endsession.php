<?php
    session_start();
    session_unset();
    session_destroy();
    require_once("index.html");
    die();
?>