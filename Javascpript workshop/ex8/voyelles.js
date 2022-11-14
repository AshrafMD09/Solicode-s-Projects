function compter(){
    var str =document.getElementById('text').value;
    var voyelles ="aeiouyAEIOUY";
    var ctr=0;
    for(var x=0;x<str.length;x++){
    for(var i=0;i<voyelles.length;i++){
        if(str[x]==voyelles[i])
        {
            ctr++;
        }
    }
    document.getElementById("resultat").innerHTML="the numbers of vowel is "+ctr;
}
} 