let nom , brand , price , date , prtype , yesCheck ,noCheck ;
let addBtn = document.getElementById('btnsave');

let mood = 'Add';
let tmp;

if(localStorage.products != null){
    dataList = JSON.parse(localStorage.products);
}
else{
    dataList = [];
}

dataList.sort((a, b) => a.nom.localeCompare(b.nom));
addToTable();


document.getElementById("btnsave").addEventListener('click', function Add(){

    
    nom = document.getElementById("nom");

    brand = document.getElementById("brand");

    price = document.getElementById("price");

    date = document.getElementById("date");

    prtype = document.getElementById("prtype");

    yesCheck = document.getElementById("yespromo");

    noCheck = document.getElementById("nopromo");



    //////////////////////////////////////////////////

                //name

    let letters = /^[A-Za-z]{1,30}$/ ;
    let nameError = "Name invalid (required between 1 & 30 text characters )";
    let nameVal = false

    if (nom.value !== "" && nom.value.length <=30 && nom.value.match(letters)){
        nameVal = true ;
        document.getElementById('msg1').innerHTML = "";
    }


    else {
        
        nameVal = false;
        document.getElementById('msg1').innerHTML = nameError;

        
    }


             //price

    let digits = /^\d+,\d{1,2}$|^\d+$/ig; 
    let priceError = "Price invalid" ;
    let priceVal = false;



    if(price.value !== "" && price.value.match(digits) ){
        priceVal = true ;
        document.getElementById('msg4').innerHTML = "" ;

    }

    else {
        document.getElementById('msg4').innerHTML = priceError ; 
        priceVal = false ;
    }


                //promotion

    let promotionError = "Please select Yes or No";
    let promotionVal = false ;

    if (yesCheck.checked == true){
        prom = "Yes"
    }
    else if (noCheck.checked == true){
        prom = "No"
    }
    else {
        prom = ""
    }


    if ( yesCheck.checked== false && noCheck.checked== false ){

        promotionVal = false ;

        document.getElementById('msg6').innerHTML = promotionError;
    }

    else if (yesCheck.checked== true && noCheck.checked== false){

        promotionVal = true ;
        document.getElementById('msg6').innerHTML = "";
    }

    else {
        promotionVal = true ;
        document.getElementById('msg6').innerHTML = "";
    }

                //date

    let dateError = "Please select a date";
    let dateVal = false ;

    if (date.value !== "" ){
        dateVal = true ;
        document.getElementById('msg5').innerHTML = "";
    }

    else {
        document.getElementById('msg5').innerHTML = dateError;
    }


                //type

    let typeError = "Please select a type";
    let typeVal = false ;

    if (prtype.value !== "") {
        typeVal = true ;
        document.getElementById('msg2').innerHTML = "";
    }

    else {
        document.getElementById('msg2').innerHTML = typeError;
    }


                //brand
    
        let brandError = "Please select a type";
        let brandVal = false ;

    if (brand.value !== "") {
        brandVal = true ;
        document.getElementById('msg3').innerHTML = "";
    }

    else {
        document.getElementById('msg3').innerHTML = brandError;
    }


    ////////////////////////////////////////////////////////////

    if (nameVal == false || priceVal == false || promotionVal == false || dateVal == false || typeVal == false || brandVal == false ){
        preventDefault();
    }

    else {
        addTolocalStorage();
        dataList.sort((a, b) => a.nom.localeCompare(b.nom));
        addToTable();
        clear();
        tableForm();

    }
})

function addTolocalStorage(){

    let newList = {

        nom : nom.value ,
        brand : brand.value ,
        price : price.value ,
        date : date.value ,
        prtype : prtype.value ,
        prom : prom ,
    }

    if(mood === 'Add'){
        dataList.push(newList);

    }
    else{
        dataList[tmp]  =  newList;
        mood = 'Add';
        btnsave.innerHTML = 'Add';
    }


    localStorage.setItem('products' , JSON.stringify(dataList));

}


function addToTable(){


    let table = '';
    for( let i = 0 ; i < dataList.length ; i++ ){

        table +=   `  
        <tr>
        <td>${dataList[i].nom}</td>
        <td>${dataList[i].brand}</td>
        <td>${dataList[i].price + "$"}</td>
        <td>${dataList[i].date}</td>
        <td>${dataList[i].prtype}</td>
        <td>${dataList[i].prom}</td>
        <td>
        <button class="delBtn" id ="btndel" onclick = "deleteAll(${i})">Delete</button>
        <button class="editBtn" onclick="upDate(${i})">Edit</button>
        </td>
        </tr> `; 
    }

    document.getElementById("tbody").innerHTML = table;


}


    
    function tableForm(){

        let table='';
        for(let i = 0; i < dataList.length ; i++){

            table = `
                        <tr>
                        
                            <td>${ '  ' + ' ' + 'Name : '+ dataList[i].nom +'|'}</td>
                            <td>${ '  ' + ' ' + 'Brand : '+ dataList[i].brand +' ' +'|' }</td>
                            <td>${ '  ' + ' ' + 'Price : '+ dataList[i].price +'|'}</td>
                            <td>${ '  ' + ' ' + 'Type : '+ dataList[i].prtype +'|'}</td>
                            <td>${ '  ' + ' ' + 'Date : '+ dataList[i].date +'  ' +'|' }</td>
                            <td>${ '  ' + ' ' + 'Promotion : '+ dataList[i].prom }</td>
                        </tr>` ;
                        
                            setTimeout(function(){
                                document.getElementById('infooos').innerHTML = ' ';
                            },5000)
                            document.getElementById('infooos').innerHTML = table;
            }
        }

function deleteAll(i){
    dataList.splice(i,1);

    localStorage.products = JSON.stringify(dataList);
    addToTable();
    tableForm();
    
} 


function clear(){
    document.getElementById("nom").value = "";
    document.getElementById("brand").value = "";
    document.getElementById("date").value = "";
    document.getElementById("price").value = "";
    document.getElementById("prtype").value = "";
    document.getElementById("yespromo").checked = false;
    document.getElementById("nopromo").checked = false;
}

function upDate(i) {

    nom.value = dataList[i].nom;
    brand.value = dataList[i].brand;
    price.value = dataList[i].price;
    prtype.value = dataList[i].prtype;
    date.value = dataList[i].date;
    prom = dataList[i].prom;
    btnsave.innerHTML = 'Edit'
    mood = 'Edit'
    tmp = i;

    tableForm();


    // localStorage.products = JSON.stringify(dataList);
    // localStorage.products = JSON.stringify(dataList);
    // localStorage.setItem('products' , JSON.stringify(dataList));

}









