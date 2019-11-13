<?php
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $con = new mysqli("localhost", "root", "", "dbms");
        $stmt = $con->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
    	// Verify user password and set $_SESSION
    	if ( password_verify( $_POST['password'], $user->password ) ) {
            $_SESSION['user_id'] = $user->ID;
            if()
            {
                GOTO();
            }
    	}else{
            echo("<h1>wrong password or username<h1>");
        }
    }
}
?>