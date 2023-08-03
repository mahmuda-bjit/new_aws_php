<?php
session_start();

// Use the below $con command if you are deploying the website using AWS RDS
$con = mysqli_connect("employeems.cmukpokoj0mz.us-west-2.rds.amazonaws.com", "admin", "password", "employeeMS", 3306);

// Use the below command if you want to run the website on Localhost i.e., XAMPP
// $con = mysqli_connect("localhost", "root", "", "ecom");

define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/');

// Edit the IP address (127.0.0.1) with the Public IP address of your EC2 instance
define('SITE_PATH', 'http://employee-lb-13914812.ap-south-1.elb.amazonaws.com/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'media/product/');
?>
