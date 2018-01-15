$(function () {
  // Hide Placeholder on form-focus
  $('[placeholder]').focus(function () {
    $(this).attr('data-text', $(this).attr('placeholder'));
    $(this).attr('placeholder', '');
  }).blur(function (){
    $(this).attr('placeholder', $(this).attr('data-text'));
  });
  
  // add Asterisk to required fields
  $('input').each(function () {
    if($(this).attr('required') === 'required'){
      $(this).after('<span class="asterisk">*</span>');
    }
  });
  // convert password field to text on hover
  let passField = $('.password');
  $('.show-pass').hover(function () {
    passField.attr('type', 'text');
  }, function () {
    passField.attr('type', 'password');
  });
  //confirm delete member
  $('.confirm').click(function () {
    return confirm('Are You Sure?');
  });
});