<?php
error_reporting(-1);
ini_set("display_errors", "on");
function initializeDB()
{
    $config = require("Config.php");

    $con = mysqli_connect($config['host'], $config['username'], $config['password']);


    $stmt = mysqli_prepare($con, 'DROP DATABASE IF EXISTS cs174hw4');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,'CREATE DATABASE cs174hw4;' );
    mysqli_stmt_execute($stmt);

    mysqli_select_db($con,"cs174hw4");

    $stmt = mysqli_prepare($con,'DROP TABLE IF EXISTS Chart;');
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($con,"CREATE TABLE Chart
(md5data VARCHAR({$config['MAX_MD5']}) NOT NULL,
title VARCHAR({$config['MAX_TITLE']}) NOT NULL,
data VARCHAR({$config['MAX_DATA']}) NOT NULL
);");
    mysqli_stmt_execute($stmt);

    $stmt->close();
    $con->close();

    echo ("Database Successfully Initialized.\n");
}

initializeDB();
