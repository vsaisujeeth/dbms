$(document).ready(function(){

    p_load_data();
    j_load_data();
    c_load_data();

    function p_load_data(query)
    {
        console.log(query);
        $.ajax({
            url:"php/profile_project_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#profile_project_result').html(data);
            }
           });
    }
    function j_load_data(query)
    {
        $.ajax({
            url:"php/profile_journal_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
             $('#profile_journal_result').html(data);
            }
           });
    }
    function c_load_data(query)
    {
        $.ajax({
            url:"php/profile_conf_fetch.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                console.log(data);
             $('#profile_conf_result').html(data);
            }
           });
    }
});