<?php
session_start();
  $_SESSION["loggedin"] = false;
  $_SESSION["user_id"]=null;
  header('Location: ../HTML Dateien/index.php');
?>