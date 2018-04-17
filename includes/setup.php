<?php

$page_title = 'Home';
$site_name = 'RoomFinder';

$dbc = mysqli_connect('127.0.0.1','root', 'anant', 'roomfinder') or die("Could not connect mysql");

/*
    $mysql_hostname = "127.0.0.1";
    $mysql_user = "root";
    $mysql_password = "anant";
    $mysql_database = "roomfindertest";
    $bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect mysql");
	
   */
error_reporting(E_ALL ^ E_DEPRECATED); 
   ?>
