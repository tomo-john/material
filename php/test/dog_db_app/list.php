<?php
// list.php
require_once 'DogRepository.php';
session_start();

$dogrepo = new DogRepository();
$dogs = $dogrepo->getDog();

var_dump($dogs);
