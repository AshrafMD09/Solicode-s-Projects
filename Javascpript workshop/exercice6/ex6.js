
function dessinEtoile() {
    // print stars in Diamond-shaped pattern
    var etoile = document.getElementById("stars").value;
    var para = document.getElementById("result");
    var i, k;
    for (i = 1; i <= etoile; i++) {
        for (k = 1; k <= i; k++) {
            para.innerHTML += "*";
        }
        para.innerHTML += "<br>"; 
    }
}
