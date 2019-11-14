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
                header("Location: ../admin.php");
            }
            else{

                $sql = "select * from faculty where faculty_id = '$user->faculty_id'";
                $result1 = $con->query($sql);
                if($result1)
                {
                    $row = $result1->fetch_assoc();
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['dept'] = $row['department'];
                    $_SESSION['joined_on'] = $row['joinedon'];
                }

                $sql = "select count(*) as total from worked_on where faculty_id = '$user->faculty_id'";
                $result1 = $con->query($sql);
                if($result1)
                {
                    $row = $result1->fetch_assoc();
                    $_SESSION['proj_count'] = $row['total'];
                    
                }
                $sql = "select count(*) as total from published_conf_by where faculty_id = '$user->faculty_id'";
                $result1 = $con->query($sql);
                if($result1)
                {
                    $row = $result1->fetch_assoc();
                    $_SESSION['conf_count'] = $row['total'];
                    
                }
                $sql = "select count(*) as total from published_jour_by where faculty_id = '$user->faculty_id'";
                $result1 = $con->query($sql);
                if($result1)
                {
                    $row = $result1->fetch_assoc();
                    $_SESSION['jour_count'] = $row['total'];
                    
                }

                header("Location: ../profile.php");
            }
           
    	}else{
            echo("<h5>wrong password or username<h5>");
        }
    }
}
?>