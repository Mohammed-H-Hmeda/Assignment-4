<?php
session_start();
if (!isset($_SESSION['type'])) {
    echo "Access denied";
}
$type = $_SESSION['type'];
if ($type == 'admin') {
    echo "Welcome Admin here is the secret admin report";
} elseif ($type == 'user') {
    echo "Welcome User here is the reports for all the users";
} else {
    echo "Access denied";
}
