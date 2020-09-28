<?php

$mysqli = new mysqli("localhost", "root", "", "crud_menu");

if ($mysqli->connect_error) {
    die("Could not connect to database, try again" . $mysqli->connect_error);
}
