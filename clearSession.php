<?php 
	session_start();
	session_unset(); // just like $_SESSION = array(), only affect the local $_SESSION variable instance but not the session data in the session storage.
	session_write_close();  
	// session_destroy(); // In contrast to that, session_destroy destroys the session data that is stored in the session storage (e.g. the session file in the file system).
?>