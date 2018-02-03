jQuery(document).on('submit','#formlg',function(event){

  event.preventDefault();
  jQuery.ajax({
    url:        'validarLogin.php',
    type:       'POST',
    dataType:   'json',
    data:       $(this).serialize(),
  })


});
 
