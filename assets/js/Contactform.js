$(document).ready(function () {
  $("form").submit(function (event) {
    var formData = {
      Name: $("#Name").val(),
      Subject: $("#Subject").val(),
      Email: $("#Email").val(),
      Body:  $("#Body").val(),
    };

    $.ajax({
      type: "POST",
      url: "/assets/js/Contactform.php",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
        
      console.log(data);
A(data)
    });
function A(data)
{
        if (!data.success) {
        if (data.errors.Name) {
            
        }

        if (data.errors.Email) {
          $("#EmailC").addClass("has-error");
          $("#EmailC").append(
            '<div class="help-block">' + data.errors.Email + "</div>"
          );
        }

        if (data.errors.Subject) {
          $("#EmailC").addClass("has-error");
          $("#EmailC").append(
            '<div class="help-block">' + data.errors.Subject + "</div>"
          );
        }
        if (data.errors.Body) {
          $("#MessageC").addClass("has-error");
          $("#MessageC").append(
            '<div class="help-block">' + data.errors.Body + "</div>"
          );
        }
      } else {
        $("form").html(
          '<div class="alert alert-success">' + data.message + "</div>"
                     
        );
      }
}
    event.preventDefault();
  });
});