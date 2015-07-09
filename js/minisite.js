//js for minisite

//window.onload=getReady;

//function getReady(){
	//Set initial focus
	//document.getElementById("userName").focus();
	
//}


// this function will check login form 


function userNameVal(whatToCheck, errorField, errorMsg){
	//clear any previous error messages
	document.getElementById(errorField).innerHTML = "";

	var checkUserName = /^[a-zA-Z0-9]{3,10}$/; //both upper & lower case & max 10.
	
		if(document.getElementById(whatToCheck).value.length == 0){ //boolean
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		else if(!document.getElementById(whatToCheck).value.match(checkUserName)){
			var errorMsg = "at least three - ten characters that are letters only";

			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		else{
				return true;
		}
} 

function nameVal(whatToCheck, errorField, errorMsg){
	//clear any previous error messages
	document.getElementById(errorField).innerHTML = "";

	var checkName = /^[a-zA-Z\s\']+$/; //both upper & lower case & whiteSpace & '
	
		if(document.getElementById(whatToCheck).value.length == 0){ //boolean
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		else if(!document.getElementById(whatToCheck).value.match(checkName)){
			var errorMsg = "Please, enter letters only"; 

			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		else{
				return true;
		}
} 

function emailVal(whatToCheck, errorField, errorMsg){
     //clear any previous error messages
     document.getElementById(errorField).innerHTML = "";
      
     var chackEmail = /^[a-zA-Z0-9\.]+@([a-zA-Z0-9\.-]){1,}\.[a-z]{2,4}$/;
		/* combination of letters (both upper & lower case) and numbers 
		 * single at symbol @ 
		 * combination of letters (both upper & lower case), numbers and hyphens 
		 * single period
		 * combination of 2 – 4 letters (lower case only)
		 */


		if(document.getElementById(whatToCheck).value.length == 0){ //boolean

			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		else if(!document.getElementById(whatToCheck).value.match(chackEmail)){
			var errorMsg =  "Not a vaild email address";
			document.getElementById(errorField).innerHTML = errorMsg;
	 		return false;	
		}
	 	else{
	 			return true;
		 }
}

function passwordVal(whatToCheck, errorField, errorMsg){
     //clear any previous error messages
     document.getElementById(errorField).innerHTML = "";

	/*var checkPassword = /^(?=.*\d)[a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]{8,15}$/; 
     // both upper & lower case & at least 8 - 15 characters*/



		//boolean
		if(document.getElementById(whatToCheck).value.length == 0){ 
            
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		//check length 8 - 15 
		else if (document.getElementById(whatToCheck).value.length < 8){
			var errorMsg = "at least eight characters";

			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		/*else if (document.getElementById(whatToCheck).value.length > 15){
			var errorMsg ="no more fiftheen characters";
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		} 
		//must contain 1 number
		else if (document.getElementById(whatToCheck).value.search(/\d/) == -1) {
			var errorMsg = "must contain 1 number";
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}
		//must contain 1 special character
		else if (document.getElementById(whatToCheck).value.search(/[\!\@\#\$\%\^\&\*\(\)\_\+]/) == -1){
			var errorMsg = "must contain 1 special character";
			document.getElementById(errorField).innerHTML = errorMsg;
				return false;
		}*/
        
		else{
				return true;
		}
}



// clear error messages when the user clicks the reset button

/*function clearForm(){
	var errorField = ["userName-errortext", "password-errortext"]
	document.getElementById(errorField[]).innerHTML = "";
	
}
*/
function checkForm(){
	
	var test1 = userNameVal("userName", "userName-errortext", "Please enter your Username");
	var test2 = passwordVal("password", "password-errortext", "Please enter your password");
	var test3 = emailVal("email", "email-errortext", " Please enter your email");
    var test4 = nameVal("lastname","lastname-errortext", "Please enter your lastname");
    var test5 = nameVal("firstname","firstname-errortext", "Please enter your firstname");

		return test1 && test2 && test3 && test4 && test5;
}

	 
function checkFormLogin(){
	
	var test1 = userNameVal("userName", "userName-errortext", "Please enter your Username");
	var test2 = passwordVal("password", "password-errortext", "Please enter your password");
	
		return test1 && test2;
}


	 		