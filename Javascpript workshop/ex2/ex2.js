document.getElementById('btnCheck').addEventListener('click', function(){
    var j, m , a;
    var cas1, cas2, cas3, cas4;
    var j = document.querySelector('#day').value;
    var m = document.querySelector('#month').value;
    var a = document.querySelector('#year').value;

    cas1 = a>0 && (m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12) && (j>=1 && j<=31);
    cas2 = a>0 && (m==4 || m==6 || m==9 || m==11) && (j>=1 && j<=30);
    cas3 = a>0 && m==2 && a%4==0 && j>=1 && j<=29;
    cas4 = a>0 && m==2 && a%4!=0 && j>=1 && j<=28;

    if(cas1 || cas2 || cas3 || cas4) {
        document.getElementById("rs").innerHTML = "la date est valide";
    }
    else {
        document.getElementById("rs").innerHTML = "la date non valide"
    }

});


