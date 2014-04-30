//Email Obfuscator
function obfuscate_email_addresses()
{
	var mailtos = document.getElementsByTagName('a');
	for (var i = 0; i < mailtos.length; i++)
	{
		if (mailtos[i].className.indexOf("mailto") >= 0)
		{
			var email = mailtos[i].getAttribute("email") + "@" + mailtos[i].getAttribute("at");
			mailtos[i].href = "mailto:" + email;
			//mailtos[i].removeChild(mailtos[i].firstChild);
			//mailtos[i].appendText(email);
		}
	}
}

function checkForm()
{
  console.log ("checking form");

	LastName = document.getElementById('LastName');
	FirstName = document.getElementById('FirstName');
	Title = document.getElementById('Title');
	Links = document.getElementById('Links');
	Length = document.getElementById('Length');
	Email = document.getElementById('Email');
	//Names = document.getElementById('Names');

	Address = document.getElementById('Address');
	City = document.getElementById('City');
	State = document.getElementById('State');
	Zip = document.getElementById('Zip');
	Country = document.getElementById('Country');
	Phone = document.getElementById('Phone');
	//Website = document.getElementById('Website');
	//Bios = document.getElementById('Bios');

	PaypalTransactionID = document.getElementById('PaypalTransactionID');
	Synopsis = document.getElementById('Synopsis');
	Process = document.getElementById('Process');
	agree = $("#agree").attr('checked');

	//required fields

	if ((LastName.value == '') || (FirstName.value == '') || (Address.value == '') || (City.value == '') || (State.value == '') || (Zip.value == '') || (Country.value == '') || (Phone.value == '') || (Email.value == '') || (PaypalTransactionID.value == '') || (Title.value == '') || (Length.value == '') || (Synopsis.value == '') || (Process.value == '') || (Links.value == ''))
	{
		window.alert('All fields marked with a * are required. Please check that these fields are completed and submit again. Thanks!');
		return false;
	}

	if (agree.value == '')
	{
		window.alert('Before submiting your film, you must read and understand the guidelines, terms, and submission process.');
		return false;
	}
	else
	{
		return true;
	}
}