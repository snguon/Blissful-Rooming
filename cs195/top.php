<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'lib/constants.php';
        include "lib/custom-functions.php";
        ?>
        <!--<title><?php //echo ASSOCIATION_NAME_SHORT; ?></title>-->
        <meta charset="utf-8">
        <meta name="author" content="Erickson Consulting">
        <meta name="description" content="Association management. We make the paper work easy for you. Manage all your associtaion needs from billing to voting.">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
        <script src="//html5shim.googlecode.com/sin/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

        <?php
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
        // PATH SETUP

        $yourURL = DOMAIN . PHP_SELF;

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
        // inlcude all libraries. 
// 
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
        print '<!-- begin including libraries -->';

        include LIB_PATH . '/Connect-With-Database.php';

        print '<!-- libraries complete-->';
        ?>	

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.imagemapster.js"></script>
        <script type="text/javascript" src="js/map-hover.js"></script>
        <script type="text/javascript" src="js/ajax.js"></script>
    </head>
    <!-- ################ body section ######################### -->

<?php
print '<body id="' . $PATH_PARTS['filename'] . '">';
include "header.php";
include "nav.php";
?>