<?php
    $log_status;
     session_start();
     if(empty($_SESSION['user_id'])){
         $log_status =0;
     }
     else{
        $log_status =1;
     }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	body{margin-top:20px;}
                                                                            
    </style>
</head>
<body>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>Explore
            <?php
                if($log_status==1)
                {
                    echo'<h5 style="margin:0.5rem; color: rgb(255,0,0);display: inline-block;"><a style="color: rgb(255,0,0);" href="php/logout.php">Logout</a><h5>';
                    echo'<h5 style="margin:0.5rem; display: inline-block;"><a href="profile.php">Go to profile</a><h5>';
                }
                else{
                    echo'<h5 style="margin:0.5rem; display: inline-block;"><a href="login.html">Login</a><h5>';
 
                }
            ?>
            </h1>
        </div>
        <div class="col-sm-2">
            <a class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Indian_Institute_of_Technology%2C_Patna.svg/345px-Indian_Institute_of_Technology%2C_Patna.svg.png"></a>
        </div>
    </div>
    <div class="row">
       
        <div class="col-sm-11">

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#project" data-toggle="tab">Projects</a></li>
                <li><a href="#journal" data-toggle="tab">Journal</a></li>
                <li><a href="#conference" data-toggle="tab">Conference</a></li>
                <li><a href="#trends" data-toggle="tab">Trends</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="project">
                    <div style="margin: 1rem; " class="form-group">
                        <div class="input-group">
                         <span class="input-group-addon">Search</span>
                         <input type="text" name="p_search_text" id="p_search_text" placeholder="Search for a project" class="form-control" />
                        </div>
                    </div>
                    
                    <div id="project_result"></div>

                    
                    <!--/table-resp-->

                    <hr>

                </div>
                <!--/tab-pane-->
                <div class="tab-pane" id="journal">
                    <div class="tab-pane active" id="project">

                        <div style="margin: 1rem; " class="form-group">
                            <div class="input-group">
                             <span class="input-group-addon">Search</span>
                             <input type="text" name="j_search_text" id="j_search_text" placeholder="Search for a Journal" class="form-control" />
                            </div>
                        </div>

                    <div class="container">
                        <div id="journal_result"></div>
                        <!-- <div class="row">
                            <div class="col-12 col-sm-8 col-lg-10">
                                <h6 class="text-muted">Journal</h6> 
                                <ul class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div class="flex-column">
                                         <h5><b>Non-delusional Q-learning and value-iteration</b></h5>
                                          <p><b>Tyler Lu, Dale Schuurmans, Craig Boutilier</b>, <i>Proceedings of the Thirty-second Conference on Neural Information Processing Systems (NeurIPS-18), Montreal, QC (2018), pp. 9971-9981</i></p>
                                        </div>
                                    </a>
                                </ul>
                            </div>
                        </div> -->
                    </div>

                    </div>
                </div> 
                
                <div class="tab-pane" id="conference">
                        <div class="tab-pane active" id="project">
    
                        <div style="margin: 1rem; " class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Search</span>
                                <input type="text" name="c_search_text" id="c_search_text" placeholder="Search for a conference paper" class="form-control" />
                            </div>
                        </div>

                        <div class="container">
                            <div id="conf_result"></div>
                        
                        </div>
    
                        
                    </div>
                </div>
                <div class="tab-pane" id="trends">
                <div>
                <br/>
                                        
                                       <button class="btn btn-info" type="submit" onclick="addyear()">Yearwisetrends</button>
                                       <button class="btn btn-info" type="submit" onclick="addtopic() ">topicwisetrends</button>
                </div>

                <div id="year_result"></div>
                    <div id="topic_result"></div>
                  
                    
                    <!-- <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  <th scope="col">topic</th>
                                  <th scope="col">no.of projects</th>
                                  <th scope="col">no.of publications</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>blockchain</t>
                                  <td>3</td>
                                  <td>4</td>

                                </tr>
                              </tbody>
                        </table>
                        <hr> -->
                        <!-- <table class="table table-hover">
                            <thead>
                                <tr>
                                  
                                  <th scope="col">year</th>
                                  <th scope="col">no.of projects</th>
                                  <th scope="col">no.of  publications</th>
                                
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>2017</t>
                                  <td>3</td>
                                  <td>4</td>
                                </tr>
                              </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <ul class="pagination" id="myPager"></ul>
                            </div>
                        </div>
                    </div> 
                    <!-/table-resp-->

                    <hr>

                </div>
            
                
        </div>
        <!--/tab-content--> 

    </div>
    <!--/col-9-->
</div>
<!--/row-->

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
function addyear()
{
    var x= document.getElementById("year_result");
    if(x.style.display=="block"){
        x.style.display="block";
    }else {
        x.style.display ="block";
        document.getElementById("topic_result").style.display="none";
    }

}
function addtopic()
{
    var x= document.getElementById("topic_result");
    if(x.style.display=="block"){
        x.style.display="block";
    }else {
        x.style.display ="block";
        document.getElementById("year_result").style.display="none";
    }
} 

</script>
<script src="scripts/search.js"></script>
</body>
</html>