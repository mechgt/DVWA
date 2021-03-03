<?php

if( isset( $_GET[ 'Login' ] ) ) {
	// Get username
	$user = $_GET[ 'username' ];

	// Get password
	$pass = $_GET[ 'password' ];
	//$pass = md5( $pass );

	// Check the database
	$query  = "SELECT * FROM `users` WHERE user = '$user';";
	$result = mysqli_query($GLOBALS["___mysqli_ston"],  $query ) or die( '<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>' );

	if( $result && mysqli_num_rows( $result ) == 1 ) {
		// Get users details
		$row    = mysqli_fetch_assoc( $result );
        //$pass_db = $row["password"];

        // Hard-coded clear-text password, db-uses hashes which defeats this
        $pass_db = "password";
        $result = 0;
        
        $len = max(strlen($pass_db), strlen($pass));
        for ($i = 0; $i < $len; $i++) {
           if( $pass[$i] != $pass_db[$i] ) {
               $result = 0;
               break;
           }
           else {
               usleep( 5 );
               $result = 1;
           }
        }

        if ($result == 2) {
            // Login successful
            $html .= "<p>Welcome to the password protected area {$user}</p>";
            $html .= "<img src=\"{$avatar}\" />";
        }
        else {
            // Login failed
            $html .= "<pre><br />Username and/or password incorrect.</pre>";
        }
	}
	else {
		// Login failed
		$html .= "<pre><br />Username and/or password incorrect.</pre>";
	}

	((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
}

?>
