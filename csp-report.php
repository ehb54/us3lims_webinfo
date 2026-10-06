<?php
// Receives Content-Security-Policy violation reports (report-uri) and writes them to the PHP error log.
if ( $_SERVER['REQUEST_METHOD'] !== 'POST' )
{
  http_response_code( 405 );
  exit();
}

// The fields worth having, and their length budget. 'original-policy' is left
// out deliberately: it is the whole policy on every report, which is most of the
// bulk, and it is the same for every violation from a given deployment.
$csp_fields = array(
  'document-uri'        => 256,
  'referrer'            => 256,
  'violated-directive'  => 128,
  'effective-directive' => 128,
  'blocked-uri'         => 256,
  'source-file'         => 256,
  'line-number'         => 16,
  'column-number'       => 16,
  'status-code'         => 16,
  'disposition'         => 32,
  'script-sample'       => 120,
);

$report = json_decode( (string) file_get_contents( 'php://input', false, null, 0, 16384 ), true );

if ( is_array( $report ) )
{
  $body = isset( $report['csp-report'] ) && is_array( $report['csp-report'] )
          ? $report['csp-report'] : $report;

  // Named fields, each truncated, rather than the posted structure: a 16 KB body
  // used to reach the log as a single line of about 48 KB, and a report is
  // attacker-influenced input, so its size is not ours to trust.
  $kept = array();
  foreach ( $csp_fields as $field => $limit )
  {
    if ( ! isset( $body[ $field ] ) || ! is_scalar( $body[ $field ] ) )
    {
      continue;
    }

    $value = (string) $body[ $field ];
    if ( strlen( $value ) > $limit )
    {
      $value = substr( $value, 0, $limit ) . '...';
    }

    // Newlines would split one report across several log lines.
    $kept[ $field ] = str_replace( array( "\r", "\n" ), ' ', $value );
  }

  // The client address, so a flood can be traced to a source. Reports arrive
  // from browsers, so there is no proxy header worth trusting here.
  $client = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : 'unknown';

  // JSON_INVALID_UTF8_SUBSTITUTE: the byte-limit substr() above can cut a
  // multi-byte character in half, and without this json_encode() returns
  // false for the whole array over one bad field, logging the line with no
  // payload at all rather than the other, valid fields.
  error_log( 'CSP violation from ' . $client . ': '
             . json_encode( $kept, JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE ) );
}

http_response_code( 204 );
