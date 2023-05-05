import './bootstrap';

$('#btn-show').click(function() {
    var inputpass = $('#pass');
    if(inputpass.attr('type') === 'password') {
      inputpass.attr('type', 'text');
      $(this).removeClass('fa-eye').addClass('fa-eye-slash');
    } else {
      inputpass.attr('type', 'password');
      $(this).removeClass('fa-eye-slash').addClass('fa-eye');
    }
  });
