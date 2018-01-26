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
  // change view
  $('.view-option span').click(function () {
    $(this).addClass('active').siblings('span').removeClass('active');
    if($(this).data('view') === 'grid'){
      $('.view-table').fadeOut('slow', function (){
        $('.view-grid').fadeIn('slow');
      });
    }
    
    if($(this).data('view') === 'table'){
      $('.view-grid').fadeOut('slow', function (){
        $('.view-table').fadeIn('slow');
      });
    }
  });
});