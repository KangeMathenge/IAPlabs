//validate the form 
function validateForm() {
	var fname= document.forms["user_details"]["first_name"].value;
	var lname= document.forms["user_details"]["last_name"].value;
	var city= document.forms["user_details"]["city_name"].value;
	//user detals is the name of the form
	if(fname=="" || lname==""|| city==""){
		alert("all details are required were not supplied");
		return false;
	}
	return true;
}