$(document).ready(function(){

    
    function p1_load_data(query)
    {
        console.log(query);
        $.ajax({
            url:"php/project_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#similar_projects').html(data);
            }
           });
    }
    function j1_load_data(query)
    {
        $.ajax({
            url:"php/journal_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
             $('#similar_journal').html(data);
            }
           });
    }
    function c1_load_data(query)
    {
        $.ajax({
            url:"php/conf_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#similar_conference').html(data);
            }
           });
    }
    $('#prnameid').keyup(function(e){ 
        var search = $(this).val();
          
              p1_load_data(search);
           
        
       });
       $('#connameid').keyup(function(){
           var search = $(this).val();
           
              c1_load_data(search);
           
           
          });
          $('#jnameid').keyup(function(){
           var search = $(this).val();
           
             j1_load_data(search);
           
           
          });
});