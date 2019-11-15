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
    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
	
    <style type="text/css">
        body{margin-top:20px;}                     
        form.form{
            display: none;
        }      
        hr
        {
            display: none;
        }    
        h1{
            color:#2e86c1;
            font-style: normal;  
        }
        
    
    </style>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1 style="display: inline-block;">
                <?php
                     echo($_SESSION['user_id']);
                ?>
                <h5 style="margin:0.5rem; color: rgb(255,0,0);display: inline-block;"><a style="color: rgb(255,0,0);" href="php/logout.php">Logout</a><h5>
            </h1>
            <p style="margin: 1rem;"> 
                <?php
                    echo($_SESSION['dept']);
                ?>
            </p>
        </div>
        <div class="col-sm-2">
            <a class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/345px-Indian_Institute_of_Technology%2C_Patna.svg.png"></a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> <?php echo($_SESSION['joined_on']) ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span> <?php echo($_SESSION['name']) ?></li>
                

            </ul>

            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="https://www.iitp.ac.in">Link</a></div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Projects</strong></span> <?php echo($_SESSION['proj_count']) ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Conference</strong></span><?php echo($_SESSION['conf_count']) ?> </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Journals</strong></span> <?php echo($_SESSION['jour_count']) ?></li>
            </ul>

            <a href="search.php">
                <ul class="list-group">
                    <li class="list-group-item text-muted">Explore <i style="margin:0.5rem;" class='fas fa-external-link-alt'></i> <i class="fa fa-dashboard fa-1x"></i></li>
                    
                </ul>
                
            </a>
            


        </div>
        <!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#project" data-toggle="tab">Projects</a></li>
                <li><a href="#conferences" data-toggle="tab">Conferences</a></li>
                <li><a href="#journals" data-toggle="tab" on>Journals</a></li>
                <li><a href="#add" data-toggle="tab" on>Add New</a></li>
                <li><a href="#delete" data-toggle="tab" on>Delete</a></li>                

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="project">
                    <div id="profile_project_result"></div>
                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="conferences">
                    <div class="container">
                        <div id="profile_conf_result"></div>
                    </div>

                    
                </div>
                <div class="tab-pane" id="journals">
                    <div class="container">
                        <div id="profile_journal_result"></div>
                        
                    </div>
                    
                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="add">
                        <div class="container">
                                <div class="row">
                                   <div class="col-xs-9">
                                       <br/>
                                       <button class="btn btn-info" type="submit" onclick="addprojects()">Project</button>
                                       <button class="btn btn-info" type="submit" onclick="addconferences() ">Conference</button>
                                       <button class="btn btn-info" type="submit" onclick="addjournal()">Journal</button><br/>
                                       <div >
                                           <br/>
                                        
                                            <form class="form" action="php/profile_project_add.php" method="post" id="projectform" >
                                            

                                                <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label for="prname">
                                                            <h4>Name</h4></label>
                                                        <input type="text" class="form-control" name="prname" id="prnameid" placeholder="name" title="enter your project name" required>
                                                    </div>
                                                </div>
                                            
                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="start_date">
                                                                <h4>StartDate</h4></label>
                                                            <input type="date" class="form-control" name="start_date" id="start_dateid" placeholder="startdate" title="enter your project's start date" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="end_date">
                                                                <h4>EndDate</h4></label>
                                                            <input type="date" class="form-control" name="end_date" id="end_dateid" placeholder="enddate" title="enter your project's enddate" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="budget">
                                                                <h4>Budget</h4></label>
                                                            <input type="text" class="form-control" name="budget" id="budgetid" placeholder="budget" title="enter your project's budget" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="topic">
                                                                <h4>Topic</h4></label>
                                                            <input type="text" class="form-control" name="topic" id="topicid" placeholder="topic" title="enter your project's topic" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-6">
                                                            <label for="sponsor">
                                                                <h4>Sponsoring Organisation</h4></label>
                                                            <input type="text" class="form-control" name="sponsor"id="sponsorid" placeholder="Organisation" title="enter sponsoring organisation" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group "> 
                                                        <div class="col-xs-9"> 
                                                            <label for="state">
                                                            <h4 style="display:inline-block;">Select Additional Faculty:</h4> <h6 style="display:inline-block;">(you are selected by default)</h6>
                                                            </label>
                                                            <br>
                                                            <select style ="width:100%; " class="js-example-basic-multiple form-control" name="faculty[]" multiple = "multiple" >
                                                                <?php
                                                                    $sql = "select * from faculty ";
                                                                    $result1 = $connect->query($sql);
                                                                    if($result1)
                                                                    {
                                                                        while($row = $result1->fetch_assoc())
                                                                        {
                                                                            echo("<option value='".$row['faculty_id']."'> ".$row['name']."</option>");
                                                                        }
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-xs-12">
                                                            <br>
                                                            <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                                        </div>
                                                    </div>
                                                

                                                
                                                    <div id="similar_projects" > 
                                                            <!-- THis is to add table -->
                                                    </div>
                                            
                                            </form>
                                           
                                            <br>
                                            
                                        </div>
                                       
                                       
                                       <div>
                                            
                                        <form class="form" action="php/profile_conf_add.php" method="post" id="conferenceform">
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="conname">
                                                        <h4>Name</h4></label>
                                                    <input type="text" class="form-control" name="conname" id="connameid" placeholder="conference publication name" title="enter your conference Entry" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="conf_name">
                                                        <h4>Coference Name</h4></label>
                                                    <input type="text" class="form-control" name="conf_name"  placeholder="conference publication name" title="enter your conference name"required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="conf_month">
                                                        <h4>Month</h4></label>
                                                    <input type="number" class="form-control" name="conf_month"  placeholder="conference publication name" title="enter month of conference "required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="confyear">
                                                        <h4>Conference Publication Year</h4></label>
                                                    <input type="number" class="form-control" name="confyear" id="confyearid" placeholder="coference year" title="enter the year of conference"required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="startpage">
                                                        <h4>StartPage</h4></label>
                                                    <input type="number" class="form-control" name="startpage" id="startpageid" placeholder="startpage" title="enter the starting page of your conference publication"required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="endpage">
                                                        <h4>EndPage</h4></label>
                                                    <input type="number" class="form-control" name="endpage" id="endpageid" placeholder="ending page" title="enter the ending page of your conference publication"required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="topic">
                                                        <h4>Topic</h4></label>
                                                    <input type="text" class="form-control" name= "topic"id="topicid" placeholder="conference topic" title="enter the conference publication topic"required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                    
                                                <div class="col-xs-6">
                                                    <label for="conferencelink">
                                                        <h4>Conference Publication Link</h4></label>
                                                    <input type="text" class="form-control" name="conferencelink" id="conferencelinkid" placeholder="conference publication link" title="enter the link to your conference publication">
                                                </div>
                                            </div>
                                            <div class="form-group "> 
                                                <div class="col-xs-9"> 
                                                    <label for="state">
                                                        <h4 style="display:inline-block;">Select Additional Faculty:</h4> <h6 style="display:inline-block;">(you are selected by default)</h6>
                                                    </label>
                                                    <br>
                                                    <select style ="width:100%; " class="js-example-basic-multiple form-control" name="faculty[]" multiple = "multiple" >
                                                        <?php
                                                                $sql = "select * from faculty ";
                                                                $result1 = $connect->query($sql);
                                                                if($result1)
                                                                {
                                                                    while($row = $result1->fetch_assoc())
                                                                    {
                                                                        echo("<option value='".$row['faculty_id']."'> ".$row['name']."</option>");
                                                                    }
                                                                }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="similar_conference" > 
                                                            <!-- THis is to add table -->
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <br>
                                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                                </div>
                                            </div>

                                            
                                            
                                        </form>
                                        </div>
                                      
                                       
                                       <div>
                                            
                                            <form class="form" action="php/profile_joun_add.php" method="post" id="journalform">
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="jname">
                                                            <h4>Name</h4></label>
                                                        <input type="text" class="form-control" name="jname" id="jnameid" placeholder="journal publication name" title="enter the name of your journal Entry"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="jyear">
                                                            <h4>Journal Year</h4></label>
                                                        <input type="text" class="form-control" name="jyear" id="jyearid" placeholder="journal publication year" title="enter the year of your journal publication year"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="startpage">
                                                            <h4>StartPage</h4></label>
                                                        <input type="text" class="form-control" name="startpage" id="startpageid" placeholder="starting page" title="enter the starting page of your conference publication"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="endpage">
                                                            <h4>EndPage</h4></label>
                                                        <input type="text" class="form-control" name="endpage" id="endpageid" placeholder="ending page" title="enter the ending page of your conference publication"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="topic">
                                                            <h4>Topic</h4></label>
                                                        <input type="text" class="form-control" name= "topic"id="topicid" placeholder="conference topic" title="enter the conference publication topic"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="jlink">
                                                            <h4>Journal Publication Link</h4></label>
                                                        <input type="text" class="form-control" name="jlink" id="jlinkid" placeholder="journal publication link" title="enter the link to your journal publication">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="jour_name">
                                                            <h4>Journal Name</h4></label>
                                                        <input type="text" class="form-control" name="jour_name"  placeholder=" Name of the journal" title="enter the name of the journal publication"required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-xs-6">
                                                        <label for="volume">
                                                            <h4>Volume</h4></label>
                                                        <input type="text" class="form-control" name="volume" id="volumeid" placeholder="Volume no" title="enter the volume no of your journal publication"required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                        
                                                    <div class="col-xs-6">
                                                        <label for="issueno">
                                                            <h4>IssueNo</h4></label>
                                                        <input type="text" class="form-control" name="issueno" id="issuenoid" placeholder="Issue no" title="enter the issue no of the journal publication"required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group " > 
                                                    <div class="col-xs-9"> 
                                                        <label for="state">
                                                        <h4 style="display:inline-block;">Select Additional Faculty:</h4> <h6 style="display:inline-block;">(you are selected by default)</h6>
                                                        </label>
                                                        <br>
                                                        <select style ="width:100%; " class="js-example-basic-multiple form-control" name="faculty[]" multiple = "multiple" >
                                                            <?php
                                                                 $sql = "select * from faculty ";
                                                                 $result1 = $connect->query($sql);
                                                                 if($result1)
                                                                 {
                                                                     while($row = $result1->fetch_assoc())
                                                                     {
                                                                         echo("<option value='".$row['faculty_id']."'> ".$row['name']."</option>");
                                                                     }
                                                                 }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div id="similar_journal" > 
                                                            <!-- THis is to add table -->
                                                    </div>
                                                <div class="form-group">
                                                
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button><br><br>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->
    </div>
    <!--/col-9-->
</div>
<!--/row-->
</div><!--bootsnippet-->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

function addprojects()
{
    var x= document.getElementById("projectform");
    if(x.style.display=="block"){
        x.style.display="none";
    }else {
        x.style.display ="block";
        document.getElementById("conferenceform").style.display="none";
        document.getElementById("journalform").style.display="none";
    }

}
function addconferences()
{
    var x= document.getElementById("conferenceform");
    if(x.style.display=="block"){
        x.style.display="none";
    }else {
        x.style.display ="block";
        document.getElementById("projectform").style.display="none";
        document.getElementById("journalform").style.display="none";
    }
} 
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});                                                

function addjournal()
{
    var x= document.getElementById("journalform");
    if(x.style.display=="block"){
        x.style.display="none";
    }else {
        x.style.display ="block";
        document.getElementById("conferenceform").style.display="none";
        document.getElementById("projectform").style.display="none";

    }
}    
                  
</script>
<script src="scripts/profile.js"></script>
<script src="scripts/profile_similar.js"></script>

</body>
</html>