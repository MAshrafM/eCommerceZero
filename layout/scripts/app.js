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
  // live preview
  $('.live-pre').keyup(function (){
    $($(this).data('class')).text($(this).val());
  });
  
  // trigger selectBoxIt plugins
  $('select').selectBoxIt({
    autoWidth: false,
    // Uses the jQuery 'fadeIn' effect when opening the drop down
    showEffect: "fadeIn",
    // Sets the jQuery 'fadeIn' effect speed to 400 milleseconds
    showEffectSpeed: 400,
    // Uses the jQuery 'fadeOut' effect when closing the drop down
    hideEffect: "fadeOut",
    // Sets the jQuery 'fadeOut' effect speed to 400 milleseconds
    hideEffectSpeed: 400
  });
  
  // toggle login and signup
  $('.login-page h1 span').click(function (){
    $(this).addClass('active').siblings().removeClass('active');
    $('.login-page form').hide();
    $('.' + $(this).data('class')).fadeIn();
  });
});