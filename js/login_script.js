$(function() {


  $('#submit').click(function() {
    // validation
    validation();
    // ajaxRequest
    ajaxRequest();
    return false;
  });

});

function validation()
{
  var username = $('#username').val();
  var password = $('#password').val();

  if ((username.length <= 0) && (password.length <= 0))
  {
    $('#username, #password').css({"background-color":"rgba(3,3,3,.5)", "border":"1px solid #fa3e3e"});
    $('.error').html('<span class="error-msg">Please enter your username and password</span>');
    return false;
  }
  else
  {
    // $('#username, #password').css({"background-color":"rgba(3,3,3,.5)", "border":"1px solid transparent"});
    if ((username.length <= 0))
    {
      $('#username').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
      $('.error').html('<span class="error-msg">Please enter your username</span>');
      return false;
    }
    else
    {
      $('#username').css({"background-color":"rgba(26,26,26,.7)", "border":"1px solid transparent"});
    }
    if ((password.length <= 0))
    {
      $('#password').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
      $('.error').html('<span class="error-msg">Please enter your password</span>');
      return false;
    }
    else
    {
      $('#password').css({"background-color":"rgba(26,26,26,.7)", "border":"1px solid transparent"});
    }
  }
}

function ajaxRequest()
{
  var username = $('#username').val();
  var password = $('#password').val();

  //passing information to the server
  // xhttp = new XMLHttpRequest();
  $.ajax({
    method: "post",
    url: 'scripts/login_parse.php',
    data:
    {
      task: "login",
      username: username,
      password: password
    }
  })
  .done (function(data)
  {
    if(data == "success")
    {
      window.location = "home.php";
    }
    else
    {
    $(".error").html(data);
      $('#username, #password').css({"background-color":"rgba(3,3,3,.5)", "border":"1px solid #fa3e3e"});
    }

  });

}
