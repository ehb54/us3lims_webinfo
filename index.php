<?php
/*
 * index.php
 *
 * An index for LIMS III Instances
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

$instance_text = "<ol>\n";
while ( list( $instance, $db, $location ) = mysqli_fetch_array( $result ) )
{ // Build instance-link lines for this LIMS server
  if ( $instance == "CAUMA3" || $instance == "cauma3d" )  continue;
  $instance_text .= "  <li><a href='http://$org_site/$db'>$instance</a>" .
                    " ($location)</li>\n";
}
$instance_text .= "</ol>\n";

// Now write out index

include 'header.php';

echo <<<HTML
<div id='content'>
  <h1 class="title">Welcome to the UltraScan III LIMS Portal...</h1>

  <h4>Below please find the link to your institution&rsquo;s <b><i>UltraScan III LIMS Portal:</i></b></h4>

  $instance_text

  <h4><a href='http://uslims3.aucsolutions.com/lims_servers.php'>
        Show Links to All LIMS Servers</a></h4>
  
  <h4><a href='http://$org_site/uslims3_newlims/request_new_instance.php'>
        Request a new UltraScan III LIMS Instance</a></h4>
  
</div>

HTML;

include 'footer.php';
exit();
