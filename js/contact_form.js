$(document).ready(function() {

$("#submit").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var message = $("#message").val();
var contact = $("#number").val();
var foretag = $("#foretag").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || contact == '') {
//alert(name+" "+email+" "+contact+" ");
alert("Var vänlig och fyll i alla obligatoriska fält.");
}

else {
	// Returns successful data submission message when the entered information is stored in database.
$.post("../EllyHBeta/js/contact_form.php", {
name1: name,
email1: email,
message1: message,
foretag1: foretag,
contact1: contact
},
function(data) {
$("#returnmessage").append(data); // Append returned message to message paragraph.
if (data == "Ditt meddelande har mottagits, Vi kommer kontakta dig snarast.")
{
$("#form")[0].reset(); // To reset form fields on success.
}
});
}
});
});
