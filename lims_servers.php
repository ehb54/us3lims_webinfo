<?php
/*
 * lims_servers.php
 *
 * An index for LIMS III server links
 *
 */

include 'config.php';

// Log into db
$link = mysqli_connect( $dbhost, $dbusername, $dbpasswd, $dbname ) 
        or die("Could not connect to database server.");

// Get instances
$mdbhost = substr( $org_site, 0, 10 ) . "%";

$query  = "SELECT institution, dbname, location " .
          "FROM metadata " .
          "WHERE status = 'completed' " .
          "AND dbhost LIKE '$mdbhost' " .
          "ORDER BY UPPER( institution ) ";
$result = mysqli_query( $link, $query )
          or die( "Query failed : $query<br />\n" . mysqli_error($link));

$instance_text  = "<p><a href='http://uslims3.aucsolutions.com/index.php'>";
$instance_text .= "Links to institutions in or near North America, using the AUCSolutions LIMS/DB server</a></p><p/>";
$instance_text .= "<p><a href='http://uslims3.fz-juelich.de/index.php'>";
$instance_text .= "Links to institutions in or near Europe, using the Juelich LIMS/DB server</a></p><p/>";
$instance_text .= "<p><a href='http://uslims3.mbu.iisc.ernet.in/index.php'>";
$instance_text .= "Links to institutions in or near India, using the IISC LIMS/DB server</a></p><p/>";
$instance_text .= "<p><a href='http://uslims3.latrobe.edu.au/index.php'>";
$instance_text .= "Links to institutions in or near Australia, using the LaTrobe LIMS/DB server</a></p><p/>";
$instance_text .= "<p><a href='http://vm1584.kaj.pouta.csc.fi/index.php'>";
$instance_text .= "Links to institutions in or near Finland, using the CSC LIMS/DB server</a></p><p/>";
$instance_text .= "<p><a href='http://uslims-ca.uleth.ca/index.php'>";
$instance_text .= "Links to institutions in Canada</a></p><p/>";
$instance_text .= "<p><a href='http://uslims.uleth.ca/index.php'>";
$instance_text .= "Links to the Canadian Center for Hydrodynamics</a></p><p/>";

// Now write out index

include 'header.php';

echo <<<HTML
<div id='content'>
  <h2 class="title">Select an UltraScan III LIMS Portal...</h2>

  $instance_text

</div>

HTML;

include 'footer.php';
exit();
