<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "dbms");
    if ($_SESSION['user_id'] ==null) {
    header('Location: login.html');
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body{margin-top:20px;}                     
        hr{
            display: none;
        }
        h1{
            color:#2e86c1;
            font-style: normal;  
        }
    
    </style>
</head>
<body>
<hr>
<div class="container bootstrap snippet">
        <div class="row">
                <div class="col-sm-10">
                    <h1>Admin
                    <h5 style="margin:0.5rem; color: rgb(255,0,0);display: inline-block;"><a style="color: rgb(255,0,0);" href="php/logout.php">Logout</a><h5>
                    </h1>
                </div>
                <div class="col-sm-2">
                    <a class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/345px-Indian_Institute_of_Technology%2C_Patna.svg.png"></a>
                </div>
        </div>
    <div class="col-sm-9">
            <ul class="nav nav-tabs" id="adTab">
                <li ><a href="#adduser" data-toggle="tab">AddUser</a></li>
                <li ><a href="#adddept" data-toggle="tab">AddDepartment</a></li>
                <li ><a href="#remuser" data-toggle="tab">RemoveUser</a></li>
        
            </ul>
            <div class="tab-content">
                <div class="tab-pane " id="adddept">
                        <div class="container">
                                <div class="row">
                                   <div class="col-xs-12">
                                       <div>
                                            <hr>
                                            <form class="form" action="php/admin_add_dept.php" method="post" id="adddeptform">
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="dept">
                                                            <h4>Department</h4></label>
                                                        <input type="text" class="form-control" name="dept" id="deptid" placeholder="departmet" title="enter the new department name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <br/>
                                   </div>
                                </div>
                        </div>
                </div>
            <div class="tab-pane " id="remuser">
                <div class="container">
                        <div class="row">
                           <div class="col-xs-12">
                               <div>
                                    <hr>
                                    <form class="form" action="php/admin_rem_user.php" method="post" id="remuserform">
                                        <div class="form-group">
                
                                            <div class="col-xs-6">
                                                <label for="faci">
                                                    <h4>FacultyID</h4></label>
                                                <input type="text" class="form-control" name="faci" id="facid" placeholder="facultyID" title="enter the facultyID to remove">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br/>
                           </div>
                        </div>
                </div>
        </div>
                <div class="tab-pane active" id="adduser">
                    <div class="container">
                            <div class="row">
                               <div class="col-xs-12">
                                   <div>
                                        <hr>
                                        <form class="form" action="php/admin_add_user.php" method="post" id="adduserform">
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="username">
                                                        <h4>Username</h4></label>
                                                    <input type="text" class="form-control" name="username" id="usernameid" placeholder="username"title="enter the name of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="password">
                                                        <h4>AddPassword</h4></label>
                                                    <input type="password" class="form-control" name="password" id="passwordid" placeholder="*******"title="enter the password of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="joinedon">
                                                        <h4>Joined On</h4></label>
                                                    <input type="date" class="form-control" name="joinedon" id="joinedonid" placeholder="joinedon"title="enter the date of join">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="department">
                                                        <h4>Department</h4></label>
                                                    <input type="text" class="form-control" name="department" id="departmentid" placeholder="department"title="enter the department of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="phone">
                                                        <h4>Phone</h4></label>
                                                    <input type="int" class="form-control" name="phone" id="phoneneid" placeholder="phonenumber"title="enter the phone number of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="mail">
                                                        <h4>E-mail</h4></label>
                                                    <input type="email" class="form-control" name="mail" id="mailid" placeholder="abc@xyz.com"title="enter the mail of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="faci">
                                                        <h4>AddFacultyID</h4></label>
                                                    <input type="text" class="form-control" name="faci" id="faciid" placeholder="facultyid"title="enter the facultyid of the user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <br>
                                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
                                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <br/>
                               </div>
                            </div>
                    </div>
            </div>
            </div>
    </div>
</div>
 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

                         
</script>
</body>
</html>