function promijeni(stranica){
  var ajax= new XMLHttpRequest();
    ajax.onreadystatechange= function(){
      if(ajax.readystate !=4 && ajax.status==200){
        document.getElementById('glavni').innerHTML=ajax.responseText;
      }
      if(ajax.readystate ==4 && ajax.status==404){
        document.getElementById('glavni').innerHTML="404 stranica nije pronađena..";
      }
    };
    ajax.open("GET",stranica, true);
    ajax.send();
}

function promijeniSifra(stranica){
  var ajax= new XMLHttpRequest();
    ajax.onreadystatechange= function(){
      if(ajax.readystate !=4 && ajax.status==200){
        document.getElementById('containerRL').innerHTML=ajax.responseText;
      }
      if(ajax.readystate ==4 && ajax.status==404){
        document.getElementById('containerRL').innerHTML="404 stranica nije pronađena..";
      }
    };
    ajax.open("GET",stranica, true);
    ajax.send();
}
