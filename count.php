<?php

require_once "config.php";
$selector=0;

$sql=$link->prepare("SELECT * FROM botellon WHERE selector=:selector");
$sql->execute(array(':selector'=>$selector));
$count=$sql->rowCount();
$arr = array('count' => $count);
echo json_encode($arr);
?>