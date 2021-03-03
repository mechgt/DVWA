<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Timing Attack' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'timing';
$page[ 'help_button' ]   = 'timing';
$page[ 'source_button' ] = 'timing';
dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		$method = 'POST';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/timing/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Vulnerability: Timing Attack</h1>

	<div class=\"vulnerable_code_area\">
		<h2>Login</h2>

		<form action=\"#\" method=\"{$method}\">
			Username:<br />
			<input type=\"text\" name=\"username\"><br />
			Password:<br />
			<input type=\"password\" AUTOCOMPLETE=\"off\" name=\"password\"><br />
			<br />
			<input type=\"submit\" value=\"Login\" name=\"Login\">\n";

if( $vulnerabilityFile == 'high.php' || $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>

	<h2>More Information</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://blog.sqreen.com/developer-security-best-practices-protecting-against-timing-attacks/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://ropesec.com/articles/timing-attacks/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://blog.ircmaxell.com/2014/11/its-all-about-time.html' ) . "</li>
	</ul>
</div>\n";

dvwaHtmlEcho( $page );

?>
