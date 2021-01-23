<?php
/*
 * header.php
 */

include 'config.php';

echo<<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
Description   : Website designed and implemented by Dan Zollars 
                and Borries Demeler, 2010

Copyright     : Copyright (c), 2010
                Bioinformatics Core Facility
                Department of Biochemistry
                UTHSCSA
                All Rights Reserved

Website       : http://bioinformatics.uthscsa.edu

Version       : beta

Released      : 8/1/2010

-->

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>UltraScan Analysis Software</title>
  <meta name="Author" content="Dan Zollars, University of Texas Health Science Center" />
  <meta name="keywords" content="ultrascan analytical ultracentrifugation lims AUC bead modelling SAXS SANS Borries Demeler ultrascan3 van Holde Weischet 2DSA Genetic Algorithm 2-dimensional spectrum analysis" />
  <meta name="description" content="Website for the UltraScan data analysis software" />
  <meta name="robots" content="index, follow" />
  <meta name="verify-v1" content="+TIfXSnY08mlIGLtDJVkQxTV4kDYMoWu2GLfWLI7VBE=" />
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link href="css/common.css" rel="stylesheet" type="text/css" />
  <script src="js/main.js" type="text/javascript"></script>
  <link rel='stylesheet' type='text/css' href='css/index.css' />

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
     <a href="partners.php">Partners</a>
     <a href="contacts.php">Contacts</a>
     <a href="mailto:demeler@gmail.com">Webmaster</a>
   </div>
HTML;
?>

