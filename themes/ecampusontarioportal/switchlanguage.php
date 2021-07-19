<?php 

session_name('ecampusontarioportal');
session_start();
$_SESSION['user']['language']=$_POST['language'];
echo $_SESSION['user']['language'];?>
