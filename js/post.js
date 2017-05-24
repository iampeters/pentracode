$(function() {

  // script for user post
  $('#user-form').submit(function(){
    // saving the form data
    var title = $('#post_title').val();
    var description = $('#post-content').val();
    var image = $('#post_img').val();

    // form validation
    validate();
    // submiting form to server
    ajaxform();
    //inserting post into news-feed
    post_insert();

    return false;
  });

  // script for post comments
  $('#comments-form').submit(function(){
    // saving the form data
    var comment = $('#comment').val();

    // post comments form validation
    commentValidation();

    // post comment ajaxifying
    commentAjax();

    return false;
  });


});

// user post validation
function validate() {
  var title = $('#post_title').val();
  var description = $('#post-content').val();
  var image = $('#post_img').val();

  if ((title.length <= 0) && (description.length <= 0))
  {
    $('.user-post-field').css("border", "1px solid #d9534f");
    $('.error').html('<span class="error-msg">Post fields cannnot be empty</span>');
    return false;
  }
  else
  {
    if ((title.length <= 0))
    {
      $('#post_title').css("border", "1px solid #d9534f");
      $('.error').html('<span class="error-msg">Please enter post title</span>');
      return false;
    }
    else
    {
      $('#post_title').css({"border":"1px solid transparent"});
    }
    if ((description.length <= 0))
    {
      $('#post-content').css({"border":"1px solid #d9534f"});
      $('.error').html('<span class="error-msg">Please describe your post</span>');
      return false;
    }
    else
    {
      $('#post-content').css({"border":"1px solid transparent"});
    }

    // $('.error').html('<span class="success">Post updated successfully</span>');
    // $('#post-content').val("");
    // $('#post_title').val("");
    $('.user-post-field').css("border", "1px solid transparent");
  }
}

// ajax for user post
function ajaxform() {
  // saving the form data
  var title = $('#post_title').val();
  var description = $('#post-content').val();
  var image = $('#post-img').val();
  // var userform = $('#user-form')[0];
  // var fd = new FormData(userform);

  // ajaxifying it
  $.ajax({
    url: "scripts/post_parse.php",
    method: "post",
    data:
    {
      task: "user_post",
      title: title,
      description: description
      // file: image
    }
  })
  .done (function(data) {
    $('.error').html(data);
    $('#post-content').val("");
    $('#post_title').val("");
    // $('#post-img-label').val("")
  });
}

// post comment validation
function commentValidation() {
  var comment = $('#comment').val();

  if (comment.length <= 0) {
    $('#comment').css("border", "1px solid #d9534f");
    return false;
  }
  else {
    $('#comment').css("border", "1px solid transparent");
  }
}

// post comments ajax
function commentAjax() {
  // variables
  var comment = $('#comment').val();

  // sending ajax request to server
  $.ajax({
    url: "../scripts/comment_parse.php",
    method: "post",
    data: {
      task: "post_comments",
      comment: comment
    }
  })
  .done (function(data) {

  });
}

function post_insert() {
  $.ajax({
    url: "../post.php",
    method: 'post',
    data: {
      task: "user-post-insert"
    }
  })
  .done (function(data) {
      $('.post-field-holder').prepend(data);
    });
}
