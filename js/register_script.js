  $(function(){

    $('#submit').click(function() {
      // form validation
      validation();
      // ajax server request
      ajaxform()
      return false;
    });

  });
  function validation()
  {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    var file = $('#file').val();

    // form validation
    if ((fname.length <= 0) && (lname.length <= 0) && (username.length <= 0) && (password.length <= 0) && (email.length <= 0) && (confirm.length <= 0))
    {
      $('#fname, #lname, #email, #username, #password, #confirm').css({"background-color":"rgba(3,3,3,.5)", "border":"1px solid #fa3e3e"});
      $('.error').html('<span class="error-msg">Please fill in all fields</span>');
      return false;
    }
    else
    {
      $('#fname, #lname, #email, #username, #password, #confirm').css({"background-color":"rgba(3,3,3,.5)", "border":"1px solid transparent"});

      if ((fname.length <= 0))
      {
        $('#fname').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
        $('.error').html('<span class="error-msg">Please enter your firstname</span>');
        return false;
      }
      else
      {
        $('#fname').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid transparent"});
      }
      if ((lname.length <= 0))
      {
        $('#lname').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
        $('.error').html('<span class="error-msg">Please enter your lastname</span>');
        return false;
      }
      else
      {
        $('#lname').css({"background-color":"rgba(26,26,26,.7)", "border":"1px solid transparent"});
      }
      if ((email.length <= 0))
      {
        $('#email').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
        $('.error').html('<span class="error-msg">Please enter your email</span>');
        return false;
      }
      else
      {
        $('#email').css({"background-color":"rgba(26,26,26,.7)", "border":"1px solid transparent"});
      }
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
      if ((confirm.length <= 0))
      {
        $('#confirm').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
        $('.error').html('<span class="error-msg">Please confirm your password</span>');
        return false;
      }
      else
      {
        $('#username').css({"background-color":"rgba(26,26,26,.7)", "border":"1px solid transparent"});
      }
      //if confirmed passworrd doesnot match password
      if ((confirm !== password))
      {
        $('#password, #confirm').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid #fa3e3e"});
        $('.error').html('<span class="error-msg">Password does not match</span>');
        return false;
      }
      // else
      // {
      //   $('#password, #confirm').css({"background-color":"rgba(3,3,3,.5)","border":"1px solid transparent"});
      // }
    }



  }
  function ajaxform()
  {
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var confirm = $("#confirm").val();
    var file = $('#file').val();

    //passing information to the server
    // xhttp = new XMLHttpRequest();
    $.ajax({
      method: "post",
      url: 'scripts/register_parse.php',
      data:
      {
        task: "user_registration",
        firstname: fname,
        lastname: lname,
        email: email,
        username: username,
        password: password,
        confirm: confirm,
        image: file
      }
    })
    .done (function(data)
    {
      $(".error").html(data);
      $("#fname").val('') ;
      $("#lname").val('');
      $("#email").val('');
      $("#username").val('');
      $("#password").val('');
      $("#confirm").val('');
    });

  }
