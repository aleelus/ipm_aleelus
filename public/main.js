jQuery(document).on('submit','#formlg',function(event){

  event.preventDefault();
  jQuery.ajax({
    url:        'validarLogin.php',
    type:       'POST',
    dataType:   'json',
    data:       $(this).serialize(),
  })
  .done(function(resp){
    console.log(resp.responseText);
    if(!resp.error){
        location.href='todavianosoymillonario.php';
    }
  })
  .fail(function(resp){
    console.log(resp.responseText);
  });

});
