    
    document.getElementById('button').onclick=function(){
    var i,res=" " ;
    var x = document.getElementById('number').value ;
    
    for( i=1;i<=10;i++){
    
    res=res+"<p>"+x+"x"+i+"="+i*x+"</p>";
    
    document.getElementById('resultat').innerHTML=res;
    
    }
    }