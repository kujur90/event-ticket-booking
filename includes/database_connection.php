<?php

$conn = mysqli_connect("localhost", "root", "", "event");

if (!$conn) {
	die("Connection Failed: ".mysqli_connect_error());
}