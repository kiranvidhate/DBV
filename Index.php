<?php

// DBV: https://www.sitepoint.com/database-versioning-dbv/
error_reporting(0);
// Get Variables
$dbname = "dbv";
$dbusername = "root";
$dbpass = "";
$dbhost = "localhost";


$connection = mysql_connect("$dbhost", "$dbusername", "$dbpass");
if (!$connection) {
    die('Could not connect: ' . mysql_error());
} else {
    echo "Connected";

    $dbcheck = mysql_select_db("$dbname");
    if (!$dbcheck) {
        echo mysql_error();
    } else {
        echo "<p>Successfully connected to the database '" . $database . "'</p>\n";
// Check tables
        $sql = "SELECT * FROM `customers`";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo "<p>Available customers:</p>\n";
            echo "<pre>\n";
            while ($row = mysql_fetch_row($result)) {
                echo "{$row[1]}\n";
            }
            echo "</pre>\n";
        } else {
            echo "<p>The database '" . $database . "' contains no customers.</p>\n";
            echo mysql_error();
        }
    }
}