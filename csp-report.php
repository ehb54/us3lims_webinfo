<?php
// Receives Content-Security-Policy violation reports (report-uri) and writes them to the PHP error log.
if ( $_SERVER['REQUEST_METHOD'] !== 'POST' )
{
  http_response_code( 405 );
  exit();
}

$report = json_decode( (string) file_get_contents( 'php://input', false, null, 0, 16384 ), true );
if ( is_array( $report ) )
{
  error_log( 'CSP violation: ' . json_encode( $report['csp-report'] ?? $report, JSON_UNESCAPED_SLASHES ) );
}

http_response_code( 204 );
