$(document).ready(function(){

    p_load_data();
    j_load_data();
    c_load_data();

    function p_load_data(query)
    {
        console.log(query);
        $.ajax({
            url:"php/project_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#project_result').html(data);
            }
           });
    }
    function j_load_data(query)
    {
        $.ajax({
            url:"php/journal_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
             $('#journal_result').html(data);
            }
           });
    }
    function c_load_data(query)
    {
        $.ajax({
            url:"php/conf_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#conf_result').html(data);
            }
           });
    }

    $('#p_search_text').keydown(function(){ 
     var search = $(this).val();
     if(search != '')
     {
        p_load_data(search);
     }
     console.log("entered");
     
    });
    $('#j_search_text').keydown(function(){
        var search = $(this).val();
        if(search != '')
        {
           j_load_data(search);
        }
        
       });
       $('#c_search_text').keydown(function(){
        var search = $(this).val();
        if(search != '')
        {
          c_load_data(search);
        }
        
       });
});