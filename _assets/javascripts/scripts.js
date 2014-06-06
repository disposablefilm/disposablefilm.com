function getURLParameter(name)
{
  return decodeURI((RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]);
}

$(function(){
  $('.youtube').css({ width: $(".post-body").innerWidth() + 'px', height: ($(".post-body").innerWidth() * 9 / 16) + 'px' });

  // If you want to keep full screen on window resize
  $(window).resize(function(){
    $('.youtube').css({ width: $('.post-body').innerWidth() + 'px', height: ($('.post-body').innerWidth() * 9 / 16) + 'px' });
  });
});

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