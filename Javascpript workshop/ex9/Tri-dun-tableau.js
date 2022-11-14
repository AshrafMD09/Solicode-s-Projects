function valider() {
    var entrer = parseInt(document.getElementById('tableau').value)
    for(x=1 ; x<= entrer ;x++) {
        var inp = document.createElement('input')
        inp.setAttribute('id', 'input'+x)
        inp.setAttribute('type', 'Number')
        document.getElementById('resultat').appendChild(inp)
    }
}
function trier() {
    var entrer = parseInt(document.getElementById('tableau').value)
    for(x=0 ; x< entrer ;x++) {
        var inpt = document.createElement('input')
        inpt.setAttribute('id', 'inpt'+x)
        document.getElementById('existe').appendChild(inpt)
    }
    const array = []
    const arrayy = []
    for (let i = 1; i <= entrer; i++) {
        array.push(parseInt(document.getElementById('input'+i).value))
    }
    for (let i = 0; i < entrer; i++) {
        let min = Math.min(...array)
        const index = array.indexOf(min);
        arrayy.push(min)
        document.getElementById('inpt'+i).value = min
        array.splice(index,1)
    }
}