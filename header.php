<?php
/*
 * header.php
 */

include 'config.php';

echo<<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta charset="utf-8">
  <title>UltraScan Analysis Software</title>
  <meta name="description" content="Website for the UltraScan data analysis software">
  <link rel="icon" href="images/favicon.ico">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/index.css">
</head>

<body >
<!-- begin header -->
<div id="header" style='text-align:left;'> 

   <table class='noborder'>
   <tr><td><img src='images/USLIMS3-banner.png' alt='USLims 3 banner' /></td>
   </tr>
   </table>

HTML;

   include 'topmenu.php';
echo<<<HTML
</div>
<!-- Begin page content -->
<div id='page'>
   <div id='sidebar' style='padding-bottom:30em;'>
     <a href="index.php">Welcome!</a>
     <a href='http://$org_site/uslims3_newlims/request_new_instance.php'>
        Request New LIMS</a>
     <a href="contacts.php">Contacts</a>
   </div>
HTML;
?>

