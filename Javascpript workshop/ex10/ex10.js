function valider() {
    let x = "";
    let out = document.getElementById('enter').value ;
        if(out <= 10){
            for (let i = 0; i <out; i++) {
            x = x +"<input id=en" + i +">"
            document.getElementById('outp').innerHTML = x
            }
        }
        else{
            document.getElementById('outp').innerHTML = "Entrer un valeur entre 1 et 10"
        }
    }
    function chercher() {
    let valeur = document.getElementById('valeur').value;
    let x = "";
        for(let j = 0 ; j <= 10 ; j++){
            x = x+" "+document.getElementById("en"+j).value
            if(x.includes(valeur)){
            document.getElementById('existe').innerHTML = "La valeur que vous recherchez existe."
            document.getElementById('existe').style.color="green";
            }
            else {
            document.getElementById('existe').innerHTML = "La valeur que vous recherchez n'existe pas."
            document.getElementById('existe').style.color="red";
            }
        }
    }