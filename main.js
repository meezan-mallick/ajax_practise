$(document).ready(function () {
// Getting data for all student and showing in table

    // New xhr Object
    // var xhr = new XMLHttpRequest();
    // xhr.open("GET","get_student_data.php",true);
    // xhr.onload = function(){
    //     $('#mytable').html(xhr.responseText);
    // };
    // xhr.send();

    function show_data()
    {
        $.ajax({
            url : "read.php",
            type : "POST",
            success: function (data)
            {
                $('#mytable').html(data);
            }
        });
    }
  
    show_data()   
   

    // inserting data
    $('#btn').click(function(){
        var name = $('#name').val();
        var subject = $('#subject').val();
      
        $.ajax({
            url : "insert.php",
            type : "POST",
            data : {fname : name, sub : subject},
            success : function(data)
            {
                if(data)
                {
                    show_data()
                }
            }
        });
    });


    //Deleting Data

    $(document).on("click",".btn-delete",function (){
        var id = $(this).data("id");
        var element = $(this);
        $.ajax({
            url : "delete.php",
            type : "POST",
            data : {stu_id : id},
            success : function(data)
            {
                if(data)
                {
                    $(element).closest("tr").fadeOut("fast");
                }
            }
        });
    });

    // opening modal and edit record
    $(document).on("click",".btn-edit",function (){
        $("#modal").show();
        var id = $(this).data("id");
        $.ajax({
            url : "update.php",
            type : "POST",
            data : {stu_id : id},
            success : function(data)
            {
                if(data)
                {
                    $('#update-form').html(data);
                }
            }
        });
    });


    // save btn event
    $(document).on("click","#edit-save",function (){
        
        var id = $("#edit-id").val();
        var name = $("#edit-id").val();
        var subject = $("#edit-id").val();
        alert(id);
        $.ajax({
            url : "update_record.php",
            type : "POST",
            data : {stu_id : id,fname:name,sub:subject},
            success : function(data)
            {
                if(data)
                {
                    $("#modal").hide();
                }
            }
        });
    });


    // closing modal 
    $("#close-btn").on("click",function (){
        $("#modal").hide();
    });
   
});

