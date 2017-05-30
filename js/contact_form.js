$(document).ready(function() {

$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
var contact = $("#number").val();
var foretag = $("#foretag").val();

$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name === '' || email === '' || contact === '') {
//alert(name+" "+email+" "+contact+" ");
alert("Var vänlig och fyll i alla obligatoriska fält.");
}

else {
	// Returns successful data submission message when the entered information is stored in database.
//$.post("../mail.php", {
//name1: name,
//email1: email,
//message1: message,
//foretag1: foretag,
//contact1: contact
//},

let data =
"name=" + name +
"&email=" + email +
"&message=" + message +
"&contact=" + contact +
"&foretag="+ foretag;


$.ajax({
	type:'POST',
	url:'../EllyHBeta/mail.php',
	data: data,


	success: function(response){
		console.log(data);

		console.log(response);
		$("#returnmessage").append("Ditt meddelande har mottagits, Vi kommer kontakta dig snarast."); // Append returned message to message paragraph.
		if (response == 1)		{
		$("#form")[0].reset(); // To reset form fields on success.
		}
	},


	error: function(response){
		console.log(response);
	}
});


}
});
});
