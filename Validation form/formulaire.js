document.getElementById('form1').onsubmit = function (e) {
    


    // first last name

    let letters = /^[A-Za-z]+$/ ;
    let lastName = document.getElementById('lastName').value;
    let firstName = document.getElementById('firstName').value;
    let nameError = "Name invalid (required between 1 & 30 text characters )" ;
    let lastnameValid = false ;
    let firstnameValid = false ;

        //mobile

    let telNumbers = /^(0)[5-7]\d{8}$/; 
    let telNum = document.getElementById('mobile').value;
    let telError = " Phone number invalid (required 10 digits)" ;
    let telnumValid = false ;

        //email

    let emailFormat = /^[a-zA-Z0-9]+(\.)+[a-zA-Z0-9]+@(ofppt)(\.(ma))$/;
    let emailInp = document.getElementById('email').value;
    let emailError = "Email invalid (xxx.xxx@ofppt.ma)";
    let emailValid = false ;

        //gender

    let genderError = "Please select your gender";
    let genderMale = document.getElementById('male');
    let genderFemale = document.getElementById('female');
    let gendermaleValid = false;
    let genderfemaleValid = false;

        //groups

    let groupeError = "Please select your groupe" ;
    let groupeList = document.getElementsByName('groups') ;
    let i ; 
    let groupesValid = false ;


        //Clubs

    let clubsError = " Please select a club between 1 & 3 " ;
    let clubList = document.getElementById('cluub') ;
    let clubsValid = false ;
    
    

        /////////////////////////////////////////////////////////////////////////////////

                         // Last name

    if (lastName !== "" && lastName.length <=30 && lastName.match(letters)){
        lastnameValid = true ;
        document.getElementById('msg1').innerHTML = "";
    }



    else {
        
        document.getElementById('msg1').innerHTML = nameError;
        
        
    }

                         // Fisrt name

    if (firstName !== "" && firstName.length <=30 &&  firstName.match(letters)){
        firstnameValid = true ;
        document.getElementById('msg2').innerHTML = "";
    }


    else {
        
        document.getElementById('msg2').innerHTML = nameError;
    }


                            //Email

    if(emailInp !== "" && emailInp.match(emailFormat)){
        emailValid = true ;
        document.getElementById('msg3').innerHTML = "";

    }

    else {
        
        document.getElementById('msg3').innerHTML = emailError;
    }



                            // Mobile
                        
    if(telNum !== "" && telNum.match(telNumbers) ){
        telnumValid = true ;
        document.getElementById('msg4').innerHTML = "" ;

    }

    else {
        
        document.getElementById('msg4').innerHTML = telError ; 
    }



                            //Gender

    if ( genderFemale.checked == false && genderMale.checked == false ){

        gendermaleValid = false;
        genderfemaleValid = false;

        document.getElementById('msg5').innerHTML = genderError;
    }

    else if (genderFemale.checked == true && genderMale.checked == false){
        genderfemaleValid = true;
        gendermaleValid = false;
        document.getElementById('msg5').innerHTML = "";
    }

    else {
        genderfemaleValid = false;
        gendermaleValid = true;
        document.getElementById('msg5').innerHTML = "";
    }

                            //Groups

    for ( i=0 ; i < groupeList.length ; i++ ){

    if (groupeList[i].checked){
        groupesValid = true ;
        document.getElementById('msg6').innerHTML = "";
        break ;
    }

    else{

        document.getElementById('msg6').innerHTML = groupeError;
    }
}
                            //Clubs


    var selected = 0;
    for ( let j = 0 ; j < clubList.length ; j++ ) 
        {
            if ( clubList[j].selected ){
                selected++;
            }
        }

        if ( selected < 1  || selected > 3 ){
            clubsValid = false;
            document.getElementById("msg7").innerHTML = clubsError;
        }
        else {
            clubsValid = true;
            document.getElementById("msg7").innerHTML = "";

        }

        
        if (lastnameValid === false || telnumValid === false 
            || firstnameValid === false || emailValid === false
            || (gendermaleValid === false && genderfemaleValid === false)
            || groupesValid === false 
            || clubsValid === false ) {
            e.preventDefault();
        }

        else{
            window.open("welcome/welcome.html");
        }
    

}

