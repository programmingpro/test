<?php

require_once("garden.php");

$a = new Garden;
$a->AddTrees(10, 'apple');
$a->AddTrees(15, 'pear');
$a->СollectFruits();

