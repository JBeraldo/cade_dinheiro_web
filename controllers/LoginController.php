<?php
session_start();
if (empty($_SESSION["logado"]) || !$_SESSION["logado"]) {
    header('Location: views/login/login.php');
} elseif (!isset($_POST["target"])) {
    header('Location: views/index/index.php');
}