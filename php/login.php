<?php
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $con = new mysqli("localhost", "root", "", "dbms");
        $stmt = $con->prepare("SELECT * FROM admin WHERE faculty_id = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    		
        // Verify user password and set $_SESSION
        // echo($_POST['password']);
        // echo($user->password);
    	if ($_POST['password'] === $user->password ) {
            $_SESSION['user_id'] = $user->faculty_id;
            // echo("shit");
            if($user->faculty_id == "admin")
            {
                header("Location: ../admin.html");
            }
            else{
                header("Location: ../profile.html");
            }
           
    	}else{
            echo("<h5>wrong password or username<h5>");
        }
    }
}
?>