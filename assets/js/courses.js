$(document).ready(function(){
    $('#Searchingforfood').keyup(function(){
        var input = $(this).val();
     if(input != ""){
         $a.jax({
             url : "courseget.php",
             method:"POST",
             data:{input:input},
             cache : false,
             success:function(data){
             $("#results").html(data);
             }
         });
         }else{
             //$("#results").css("display", "none");
         }
    });
});