var dificultad = 4;
var nonceMaximo = 500000;
var cantidadDeBloques = 3;
const calcular = new Event('calcular');

var ceros = '';
for (var x=0; x<dificultad; x++) {
  ceros += '0';
}

$(function() {
  //00000000000000000000000000000000
      for(var x=1;x<=cantidadDeBloques;x++){
        if(x==1){
          crearBloque(x,1,true);
          $('#hashAnterior'+x).val("00000000000000000000000000000000");
        }else{
          crearBloque(x,1,true);
          $('#hashAnterior'+x).val(sha256(x-1));
        }
      }

});

function getDatosBloque(bloque) {
      return $('#block'+bloque).val() +
             $('#nonce'+bloque).val() +
             $('#data'+bloque).val() +
             $('#hashAnterior'+bloque).val();
}

function sha256(bloque) {
  return CryptoJS.SHA256(getDatosBloque(bloque));
}

function actualizarEstadoHash(bloque) {
  if ($('#hash'+bloque).val().substr(0, dificultad) === ceros) {
    //$('#resultadoDeMinado').append("<h3>Hash encontrado!</h3>");
    $('#hash'+bloque).css("background","#2ab73d");

  }
  else {
    $('#hash'+bloque).css("background","#ea6767");
    $('#minar'+bloque).show();
  }
}

function minarBloque(bloque,cadena,esCadena) {

  for (var x = 0; x <= nonceMaximo; x++) {
    $('#nonce'+bloque).val(x);
    $('#hash'+bloque).val(sha256(bloque));
    if ($('#hash'+bloque).val().substr(0, dificultad) === ceros) {
      if(esCadena){
        actualizarBlockchain(bloque,cadena);
      }else {
        actualizarEstadoHash(bloque);
      }
      break;
    }
  }
}

function actualizarHash(bloque, cadena) {
  $('#hash'+bloque).val(sha256(bloque));
  actualizarEstadoHash(bloque);
}

function actualizarBlockchain(bloque, cadena) {
  for (var x = bloque; x <= cantidadDeBloques; x++) {
    if (x > 1) {
      $('#hashAnterior'+x).val($('#hash'+(x-1)).val());
    }
    actualizarHash(x, cadena);
  }
}

function crearBloque(t,cadena,esCadena){
  var numeroBloque,minar,data,nonce,hash;
  numeroBloque = document.getElementById("bloque"+t);
  minar = document.getElementById("minar"+t);
  data = document.getElementById("data"+t);
  nonce = document.getElementById("nonce"+t);
  hash = document.getElementById("hash"+t);

  minar.addEventListener("click", function() {
    $('#minar'+t).hide();
    minarBloque(t,cadena,esCadena);
  });

  data.addEventListener("input", function() {
    hash.dispatchEvent(calcular);
    actualizarEstadoHash(t);
  });

  nonce.addEventListener("input", function() {
    hash.dispatchEvent(calcular);
    actualizarEstadoHash(t);
  });

  hash.addEventListener("calcular", function() {
    this.value = sha256(numeroBloque.value);
  });



}
