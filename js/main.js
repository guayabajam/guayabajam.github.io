"use strict";

function loadJSON() { 
    var request = new XMLHttpRequest();
    request.open('GET', 'php/tables.php', true);
    request.onload = function() {
      if (request.status >= 200 && request.status < 400) {
        var json = JSON.parse(request.responseText);
        console.log(json)
        //app.init(json);
      } else{
        console.log("We reached our target server, but it returned an error")
      };
    };
    request.onerror = function() {
       console.log("There was a connection error of some sort")
    };
    request.send();
}
loadJSON();

var app = ( function( window, undefined ) {
  
  var data;

  function init(json) {
    data = json;
  }


  function indexInfo() {
    setTimeout(function () {
      previewIndex();
    }, 1500);
  }

  function previewIndex(){
    var primary = document.getElementById("primary-preview");
    var secundary = document.getElementById("secundary-preview");
    var cont_primary = "";
    var cont_secundary = "";
    for(var i = 0; i <= 6; i++){
      if (i <= 3) {
        cont_primary += '<div class="preview"><div class="preview-details"><h3>'+ data.bandas[i].nombre +'</h3><img src="'+ data.bandas[i].img +'" class="foto-album"></div></div>'
        primary.innerHTML = cont_primary;
      }else{
        cont_secundary += '<div class="preview"><div class="preview-details"><h3>'+ data.bandas[i].nombre +'</h3><img src="'+ data.bandas[i].img +'" class="foto-album"></div></div>'
        secundary.innerHTML = cont_secundary;
      }
    };
  }

  function compraInfo() {
    setTimeout(function () {
      previewBuy();
    }, 1500);
  }

  function previewBuy(){
    var primary = document.getElementById("merch-details");
    var secundary = document.getElementById("overviewMerch");
    var cont_primary = '<img src="../'+data.cantVendidos[0].img+'" class="item"><div class="details"><p>'+ data.cantVendidos[0].nombre +'</p><p>'+data.cantVendidos[0].costo+'</p></p><p>'+data.cantVendidos[0].descripcion+'</p>'+
    '<button class="buy-btn">Comprar</button><button class="social"> <img src="../images/icons/facebook.png">Seguílos en Facebook </button><button class="social"> <img src="../images/icons/twitter.png">Seguílos en Twitter </button></div>'
    primary.innerHTML = cont_primary;
    var cont_secundary = "";
    for(var i = 1; i <= 10; i++){
        cont_secundary += '<div class="preview"><div class="preview-details"><h3>'+ data.cantVendidos[i].nombre +'</h3><img src="../'+ data.cantVendidos[i].img +'" class="foto-album"></div></div>'
        secundary.innerHTML = cont_secundary;
    };
  }

  function userInfo() {
    setTimeout(function () {
      user();
    }, 1500);
  }

  function user(){
    var name = document.getElementById("name");
    var userInfo = document.getElementById("user-info");
    name.innerHTML = data.user[0].usuario;
    userInfo.innerHTML = data.user[0].descripcion;
  };

  // explicitly return public methods when this object is instantiated
  return {
    init : init,
    indexInfo : indexInfo,
    compraInfo : compraInfo,
    userInfo : userInfo
  };
  
} )( window );
