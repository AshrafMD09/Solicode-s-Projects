
function saiserPhrase(){
    document.getElementById('button').onclick=function(){
      var str = document.getElementById('phrase1').value;
      var index = str.indexOf(document.getElementById('mots').value);
      if(index !== -1){
        document.getElementById('resultat').innerHTML="Le mot existe!"
      } else{
        document.getElementById('resultat').innerHTML="Le mot n'existe pas!";
      }
    }
    document.getElementById('reset').onclick=function(){
      location.reload();
    }
  }

  function clearOcurences(){
    document.getElementById('clear').onclick=function(){

    var str = document.getElementById('phrase1').value;

    var index = document.getElementById('mots').value;

    var ret = str.replace ( index , '' );

    document.getElementById('resultat').innerHTML=ret;
    }

    document.getElementById('reset').onclick=function(){
      location.reload();
    }
  }