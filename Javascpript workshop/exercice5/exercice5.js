var enterButton = document.getElementById('enterButton');
var againButton = document.getElementById('againButton');
var output = document.getElementById('outputText');
var tentative = 10 ;
var randomNumber = Math.ceil(Math.random()*50);
var i = 1 ;


function checkNumber(){
var input = document.getElementById('userInput').value;

if((tentative - i) == 0 ) {
    enterButton.setAttribute('disabled','')
    output.style.color="red";
    enterButton.style.background="red";
}

if(input == randomNumber){
    output.innerHTML="You guessed right "+ ", "+ " it was "+ randomNumber;
    output.style.color="green";
}
else if(input>randomNumber && input<50){
    output.innerHTML="You guessed too high";
    output.style.color="red";
}
else if(input<randomNumber && input>1){
    output.innerHTML="You guessed too low";
    output.style.color="red";
}
else if(input<1){
    output.innerHTML="Higher, it has to be between 1 and 50";
    output.style.color="red";
}
else if(isNaN(input)){
    output.innerHTML="That's not a number!";
    output.style.color="red";
}
else{
    output.innerHTML="Lower, it has to be between 1 and 50";
    output.style.color="red";
}

    document.getElementById("show").innerHTML = `${tentative - i}`;
    i++;

}

enterButton.addEventListener('click', checkNumber);
againButton.addEventListener('click', function(){
location.reload();
})
