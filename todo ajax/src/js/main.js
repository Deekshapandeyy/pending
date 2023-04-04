let flag=0;
$(document).ready(function(){
    console.log(flag);
  
    $("#addTask").click(function () {
        let input = $("#new-task").val();
        $("#addTask").html("Add");
        if (input == "") {
          $("#message").html("Please enter something!!!");
        } else {
          $("#message").html("");
          if (flag == 1) {
            $.ajax({
              url: "updatename.php",
              type: "POST",
              data: "d=" + input,
              datatype: "text",
            }).done(function (result) {
              $("#incomplete-tasks").html(result);
              flag = 0;
            });
          } else {
            $.ajax({
              url: "addtask.php",
              type: "POST",
              data: "d=" + input,
              datatype: "text",
            }).done(function (result) {
             // $("#incomplete-tasks").html(result);
              displaytodo();
              console.log(result);
            });
          }
        }
      });

});

function  incomplete_to_complete(id) {
            //alert("Checkbox is clicked");
        $newid=id;
      
        $.ajax({
            method:"POST",
            url:"complete.php",
            data:"d="+$newid,

        }).done(function(result){
            $("#completed-tasks").html(result);
            displaycompleted(result);
           // console.log(result);
           deletetask(id);
        })
}
displaytodo();


function deletetask(id)
{
  
    console.log(id);
    $.ajax({
    method:"POST",
    url:"delete.php",
    datatype:"text",
    data:"d="+id,
    success:function(data)
{
   //console.log(data);
displaytodo(data);
}
});
console.log(flag);
}  
function deleteTaskCompleted(id) {
    $.ajax({
      url: "deleteCompleted.php",
      type: "POST",
      data: "d=" + id,
    }).done(function (result) {
      $("#completed-tasks").html(result);
    });
  }
let global=0;
function edittask(id)
{ flag = 1;
    global = id; 
    $.ajax({
        method:"POST",
        url:"update.php",
        datatype:"text",
        data:"d="+id,
        success:function(data)
        {
            
           $("#new-task").val(data);
           $("#addTask").html("Update");
           //console.log(data);
        }
    });
    console.log(flag);
}

function displaytodo()
{ $('#message').html('');
    $.ajax({
        method:"POST",
        url:"display.php",
        datatype:"text",
        
        success:function(data)
        { 
          
            $("#incomplete-tasks").html(data);
            
        }
    });
}


function completedRevert(id) {
    $.ajax({
      url: "completetoincomplete.php",
      type: "POST",
      data: "d=" + id,
    }).done(function (result) {
      $("#incomplete-tasks").html(result);
      deleteTaskCompleted(id);
    });
  }