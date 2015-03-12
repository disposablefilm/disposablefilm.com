---
layout: static
title: Entry Form
image: posts/Screen-Shot-2014-05-30-submit.png
thumb: posts/thumb-submit.png
---

<script src="/submit/go/functions.js" type="text/javascript"></script>

<?php
// $Id: header.php,v 1.5 2006/01/12 11:11:03 jamie Exp $

error_reporting(0);

$submissionFormFolder = 'go';

error_log(var_export($_REQUEST, true));
date_default_timezone_set('America/Los_Angeles');

function openDatabase()
{
	mysql_connect("localhost","dff","dff2007");
	if (mysql_select_db("DFF")) return TRUE; else return FALSE;
}

function closeDatabase()
{
	if (mysql_close()) return TRUE; else return FALSE;
}


function getRequest($index = NULL)
{
	if (isset($_SERVER['REQUEST_URI']))
	{
		global $relative_path;

		$request = $_SERVER['REQUEST_URI'];
		$q = strpos($request, '?');
		$offset = strlen($relative_path);
		$clean = substr($request, $offset, ($q ? $q : strlen($request)) - $offset);

		$path = explode('/', $clean);

		if (!is_null($index))
		{
			if ($index > sizeof($path))
			{
				return false;
			}
			else
			{
				return $path[$index];
			}
		}
		else
		{
			return $path;
		}
	}
	else
	{
		if (!is_null($index))
		{
			return;
		}
		else
		{
			return array();
		}
	}
}

//require_once('../recaptchalib.php');

$submitMessage = '';

if (array_key_exists('download', $_REQUEST))
{
    if (openDatabase())
    {
      $query = "select LAST_NAME, FIRST_NAME, FILM_TITLE, FILM_LINKS, FILM_LENGTH, EMAIL, SUBSCRIBE_TO_EMAIL_LIST, NAMES, ADDRESS, CITY, STATE, ZIP, COUNTRY, PHONE, WEBSITE, TWITTER, BIOS, HOW_DID_YOU_HEAR, FILM_SYNOPSIS, FILM_PROCESS, TRANSACTION_ID, AGREED_TO_TERMS, DATE_ADDED from SUBMISSIONS where ID >= 314";

    $result = mysql_query($query);
    if (!$result)
    {
      $message  = 'Invalid query: ' . mysql_error() . "\n";
      $message .= 'Whole query: ' . $query;
      die($message);
    }

    $date = date("Y:m:d hiA");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"DFF2011-Submissions-$date.tsv\"");

    echo "Last Name\tFirst Name\tFilm Title\tFilm Links\tFilm Length\tEmail\tSubscribe to Email List\tAdditional Filmmakers\tAddress\tCity\tState\tZip\tCountry\tPhone\tWebsite URL\tBios\tHow did you hear?\tFilm Synopsis\tFilm Process\tPaypal Transaction ID\tAgreed to Terms\tDate Submitted\n";

    while ($row = mysql_fetch_row($result))
    {
      $numFields = sizeof($row);
      for ($i = 0; $i < $numFields; $i++)
      {
        echo '"' . mysql_escape_string(str_replace('"', "''", $row[$i])) . '"' . "\t";
        //echo mysql_escape_string($row[$i]) . "\n";
      }

      echo "\n";
    }

    closeDatabase();
    exit;
  }
}

if (array_key_exists('Submission', $_REQUEST))
{
	$EMAIL = $_REQUEST['Email'];

  //$privatekey = "6LfkgwoAAAAAAMhviPRSiGSKuXTcJCIAxt7fhC4k";
  //$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

  if (false) //(!$resp->is_valid)
  {
    $submitMessage = "Your security verification words weren't entered correctly below. Please try again.";
  }
  else if (($EMAIL == '') || !ereg(".+\@.+\..+", $EMAIL) || !ereg("^[a-zA-Z0-9_@.+-]+$", $EMAIL))
  {
		$submitMessage = 'Please enter a valid email address.';
	}
	else
	{
	  $subscribe = array_key_exists('Subscribe', $_REQUEST) ? 'yes' : 'no';
	  $agree = array_key_exists('Subscribe', $_REQUEST) ? 'yes' : 'no';

		$query = "insert into SUBMISSIONS (LAST_NAME, FIRST_NAME, HOW_DID_YOU_HEAR, NAMES, ADDRESS, CITY, STATE, ZIP, COUNTRY, PHONE, WEBSITE, TWITTER, EMAIL, SUBSCRIBE_TO_EMAIL_LIST, BIOS, TRANSACTION_ID, FILM_TITLE, FILM_LENGTH, FILM_SYNOPSIS, FILM_PROCESS, FILM_LINKS, FILM_PASSWORD, AGREED_TO_TERMS, DATE_ADDED) values('" . mysql_escape_string($_REQUEST['LastName']) . "','" . mysql_escape_string($_REQUEST['FirstName']) . "','" . mysql_escape_string($_REQUEST['ReferredBy']) . "','" . mysql_escape_string($_REQUEST['Names']) . "','" . mysql_escape_string($_REQUEST['Address']) . "','" . mysql_escape_string($_REQUEST['City']) . "','" . mysql_escape_string($_REQUEST['State']) . "','" . mysql_escape_string($_REQUEST['Zip']) . "','" . mysql_escape_string($_REQUEST['Country']) . "','" . mysql_escape_string($_REQUEST['Phone']) . "','" . mysql_escape_string($_REQUEST['Website']) . "','" . mysql_escape_string($_REQUEST['Twitter']) . "','" . mysql_escape_string($_REQUEST['Email']) . "','" . $subscribe . "','" . mysql_escape_string($_REQUEST['Bios']) . "','" . mysql_escape_string($_REQUEST['PaypalTransactionID']) . "','" . mysql_escape_string($_REQUEST['Title']) . "','" . mysql_escape_string($_REQUEST['Length']) . "','" . mysql_escape_string($_REQUEST['Synopsis']) . "','" . mysql_escape_string($_REQUEST['Process']) . "','" . mysql_escape_string($_REQUEST['Links']) . "','" . mysql_escape_string($_REQUEST['FilmPassword']) . "','" . $agree . "', now())";

		error_log($query);

		if (openDatabase())
		{
			$result = mysql_query($query);

			if (mysql_affected_rows() == 1)
			{
				closeDatabase();

				sendConfirmationEmail($_REQUEST);
				sendSubmissionEmail($_REQUEST);
				header('Location: /submit/' . $submissionFormFolder . '/thanks.php');
			}
			else
			{
				closeDatabase();
				$submitMessage = "There was a problem adding your submission to the database. Please try again or contact info@disposablefilm.com for assistance.";
				error_log('Error inserting DFF submission');
			}
		}
	}
}
else if (array_key_exists('Health', $_REQUEST))
{
	$EMAIL = $_REQUEST['Email'];

  $privatekey = "6LfkgwoAAAAAAMhviPRSiGSKuXTcJCIAxt7fhC4k";
  $resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid)
  {
    $submitMessage = "Your security verification words weren't entered correctly below. Please try again.";
  }
  else if (($EMAIL == '') || !ereg(".+\@.+\..+", $EMAIL) || !ereg("^[a-zA-Z0-9_@.+-]+$", $EMAIL))
  {
		$submitMessage = 'Please enter a valid email address.';
	}
	else
	{
	  $subscribe = array_key_exists('Subscribe', $_REQUEST) ? 'yes' : 'no';
	  $agree = array_key_exists('Subscribe', $_REQUEST) ? 'yes' : 'no';

		$query = "insert into HEALTH_SUBMISSIONS (LAST_NAME, FIRST_NAME, HOW_DID_YOU_HEAR, NAMES, ADDRESS, CITY, STATE, ZIP, COUNTRY, PHONE, WEBSITE, TWITTER, EMAIL, SUBSCRIBE_TO_EMAIL_LIST, BIOS, FILM_TITLE, FILM_LENGTH, FILM_SYNOPSIS, FILM_PROCESS, FILM_LINKS, AGREED_TO_TERMS, DATE_ADDED) values('" . mysql_escape_string($_REQUEST['LastName']) . "','" . mysql_escape_string($_REQUEST['FirstName']) . "','" . mysql_escape_string($_REQUEST['ReferredBy']) . "','" . mysql_escape_string($_REQUEST['Names']) . "','" . mysql_escape_string($_REQUEST['Address']) . "','" . mysql_escape_string($_REQUEST['City']) . "','" . mysql_escape_string($_REQUEST['State']) . "','" . mysql_escape_string($_REQUEST['Zip']) . "','" . mysql_escape_string($_REQUEST['Country']) . "','" . mysql_escape_string($_REQUEST['Phone']) . "','" . mysql_escape_string($_REQUEST['Website']) . "','" . mysql_escape_string($_REQUEST['Twitter']) . "','" . mysql_escape_string($_REQUEST['Email']) . "','" . $subscribe . "','" . mysql_escape_string($_REQUEST['Bios']) . "','" . mysql_escape_string($_REQUEST['Title']) . "','" . mysql_escape_string($_REQUEST['Length']) . "','" . mysql_escape_string($_REQUEST['Synopsis']) . "','" . mysql_escape_string($_REQUEST['Process']) . "','" . mysql_escape_string($_REQUEST['Links']) . "','" . $agree . "', now())";

		error_log($query);

		if (openDatabase())
		{
      error_log("zero");

			$result = mysql_query($query);

      error_log("hero");

			if (mysql_affected_rows() == 1)
			{
				closeDatabase();

		    error_log("uno");

		    if (false) //disable VR for now until we get SOAP installed
        {
          //Vertical Respons Integration - NEED API KEY - Sent email to VR on April 18, 2010
          $wsdl = "https://api.verticalresponse.com/wsdl/1.0/VRAPI.wsdl"; //location of the wsdl
          $user = "rebecca@disposablefilmfest.com"; // VR usernaname
          $pass = "puredig";                        //VR passowrd
          $cert = "*.pem";                          //location of the .pem certificate
          $cert_pass = "";                          // password for .pem certificate
          $ses_time = 3;                            // duration of session in minutes

  		    error_log("dos");

          $vr = new SoapClient($wsdl,
            array (
                  'local_cert' => $cert,
                  'passphrase' => $cert_pass
                  )
           );

  		    error_log("tres");

          //somebody wants to subscribe to the Vertical Response list!
          if (array_key_exists('Subscribe', $_REQUEST))
          {
            try
            {
              $sid = $vr->login(
              array(
                    'username' => $user,
                    'password' => $pass,
                    'session_duration_minutes' => $ses_time
                    )
              );

              echo("session id: $sid\n");

              //Add submitter to Vertical Response right away

              echo("adding list member...\n");

              $one = $vr->addListMember( array(
                    'session_id'  => $sid,
                    'list_member' => array(
                        'list_id'     => '1289000804',
                        'member_data' => array(
                            array(
                                'name'  =>'email_address',
                                'value' => $_REQUEST['Email'],
                            ),
                            array(
                                'name'  => 'first_name',
                                'value' => $_REQUEST['FirstName'],
                            ),
                            array(
                                'name'  => 'last_name',
                                'value' => $_REQUEST['LastName'],
                            ),
                        ),
                    ),
                    )
              );
            }
            catch(SoapFault $exception)
            {
              echo 'fault: "' . $exception->faultcode . '" - ' . $exception->faultstring . "\n";
            }
          }
        }

				sendHealthConfirmationEmail($_REQUEST);
				sendHealthSubmissionEmail($_REQUEST);
				header('Location: /health/submit_hidden/thanks.php');
			}
			else
			{
				closeDatabase();
				$submitMessage = "There was a problem adding your submission to the database. Please try again or contact health@disposablefilmfest.com for assistance.";
				error_log('Error inserting DFF Health submission');
			}
		}
	}
}

function sendSubmissionEmail($parameters)
{
	require_once('Mail.php');

	$recipients = array();

	$recipients[] = 'submit@disposablefilmfest.com';

	$headers['To'] = '"DFF Admins" <submit@disposablefilmfest.com>';
	$headers['From'] = '"DFF Database" <submit@disposablefilmfest.com>';
	$headers['Subject'] = 'DFF Film Submission!';

	$Names = $parameters['Names'];
	$Address = $parameters['Address'];
	$City = $parameters['City'];
	$State = $parameters['State'];
	$Zip = $parameters['Zip'];
	$Country = $parameters['Country'];
	$Phone = $parameters['Phone'];
	$Website = $parameters['Website'];
	$Twitter = $parameters['Twitter'];
	$Email = $parameters['Email'];
	$Bios = $parameters['Bios'];
	$PaypalTransactionID = $parameters['PaypalTransactionID'];
	$Title = $parameters['Title'];
	$Length = $parameters['Length'];
	$Synopsis = $parameters['Synopsis'];
	$Process = $parameters['Process'];
	$Links = $parameters['Links'];
	$FilmPassword = $parameters['FilmPassword'];

	$content = <<<EOF
Yay! A film has been submitted to DFF! Here are the details:

Names : $Names
Address : $Address
City : $City
State : $State
Zip : $Zip
Country : $Country
Phone : $Phone
Website : $Website
Twitter : $Twitter
Email : $Email
Bios : $Bios
Paypal Transaction Id : $PaypalTransactionID
Title : $Title
Length : $Length
Synopsis : $Synopsis
Process : $Process
Links : $Links
Password : $FilmPassword
agree : $agree

Download the latest list here: http://disposablefilmfest.com/?download

EOF;

	$mail = &Mail::factory('smtp', array('host' => 'strongmad.internal.retrix.com'));

	$result = $mail->send($recipients, $headers, $content);

	if (PEAR::isError($result))
	{
		error_log($result->getMessage());
	}
	else
	{
		error_log("DFF mail sent!");
	}
}


function sendHealthSubmissionEmail($parameters)
{
	require_once('Mail.php');

	$recipients = array();

	$recipients[] = 'submit@disposablefilmfest.com';

	$headers['To'] = '"DFF Admins" <submit@disposablefilmfest.com>';
	$headers['From'] = '"DFF Database" <submit@disposablefilmfest.com>';
	$headers['Subject'] = 'DFF *Health* Film Submission!';

	$Names = $parameters['Names'];
	$Address = $parameters['Address'];
	$City = $parameters['City'];
	$State = $parameters['State'];
	$Zip = $parameters['Zip'];
	$Country = $parameters['Country'];
	$Phone = $parameters['Phone'];
	$Website = $parameters['Website'];
	$Twitter = $parameters['Twitter'];
	$Email = $parameters['Email'];
	$Bios = $parameters['Bios'];
	$Title = $parameters['Title'];
	$Length = $parameters['Length'];
	$Synopsis = $parameters['Synopsis'];
	$Process = $parameters['Process'];
	$Links = $parameters['Links'];

	$content = <<<EOF
Yay! A film has been submitted to DFF! Here are the details:

Names : $Names
Address : $Address
City : $City
State : $State
Zip : $Zip
Country : $Country
Phone : $Phone
Website : $Website
Twitter : $Twitter
Email : $Email
Bios : $Bios
Title : $Title
Length : $Length
Synopsis : $Synopsis
Process : $Process
Links : $Links
agree : $agree

Download the latest *health* list here: http://disposablefilmfest.com/?healthdownload

EOF;

	$mail = &Mail::factory('smtp', array('host' => 'strongmad.internal.retrix.com'));

	$result = $mail->send($recipients, $headers, $content);

	if (PEAR::isError($result))
	{
		error_log($result->getMessage());
	}
	else
	{
		error_log("DFF mail sent!");
	}
}

function sendConfirmationEmail($parameters)
{
	require_once('Mail.php');

	$recipients = array();

	$recipients[] = $parameters['Email'];

	$headers['To'] = '"You" <' . $parameters['Email'] . '>';
	$headers['From'] = '"Disposable Film Fest" <submit@disposablefilmfest.com>';
	$headers['Subject'] = 'Thanks for your Submission!';


	$content = <<<EOF
Thanks for submitting your film to the 2016 Disposable Film Festival!

Your film is currently under review and if selected, you will be notified no later than February 15th, 2016 with an email explaining how to get us the uncompressed file we need.

In the meantime, check out all our films at <http://disposablefilm.com> and be sure to like us on Facebook at <https://www.facebook.com/DISPOSABLEFILMFESTIVAL>.

If you have any questions, you can contact us at info@disposablefilmfest.com

Thanks again for being a Disposable Filmmaker!
EOF;

	$mail = &Mail::factory('smtp', array('host' => 'strongmad.internal.retrix.com'));

	$result = $mail->send($recipients, $headers, $content);

	if (PEAR::isError($result))
	{
		error_log($result->getMessage());
	}
	else
	{
		error_log("DFF mail sent!");
	}
}


function sendHealthConfirmationEmail($parameters)
{
	require_once('Mail.php');

	$recipients = array();

	$recipients[] = $parameters['Email'];

	$headers['To'] = '"You" <' . $parameters['Email'] . '>';
	$headers['From'] = '"Disposable Film Fest" <health@disposablefilmfest.com>';
	$headers['Subject'] = 'Thanks for your Submission!';


	$content = <<<EOF
Thanks for submitting your film to the Disposable Film Festival Health!

Your film is currently under review for our special DFF Health competition. If selected, you will be notified in the first week of October.

If you have any questions, you can contact us at health@disposablefilmfest.com

Thanks again for being a Disposable Filmmaker!
EOF;

	$mail = &Mail::factory('smtp', array('host' => 'strongmad.internal.retrix.com'));

	$result = $mail->send($recipients, $headers, $content);

	if (PEAR::isError($result))
	{
		error_log($result->getMessage());
	}
	else
	{
		error_log("DFF mail sent!");
	}
}


function sendMailingListEmail($email)
{
	require_once('Mail.php');

	$recipients = array();

	$recipients[] = 'submit@disposablefilmfest.com';

	$headers['To'] = '"DFF Admins" <submit@disposablefilmfest.com>';
	$headers['From'] = '"DFF Database" <submit@disposablefilmfest.com>';
	$headers['Subject'] = 'DFF Mailing List Signup!';

	$content = <<<EOF
Yipppeee! $email signed up to the DFF Mailing List!

Download the latest list heree: http://disposablefilmfest.com/?download

EOF;

	$mail = &Mail::factory('smtp', array('host' => 'strongmad.internal.retrix.com'));

	$result = $mail->send($recipients, $headers, $content);

	if (PEAR::isError($result))
	{
		error_log($result->getMessage());
	}
	else
	{
		error_log("DFF mail sent!");
	}
}

?>

<?php if ((time() < strtotime('11:59pm December 1, 2015')) || ((array_key_exists('backdoor', $_REQUEST) && ($_REQUEST['backdoor'] == 'yo')))) { ?>

<!--
<script>
var RecaptchaOptions = {
   theme : 'white'
};
</script>
-->

<?php
  // $Id: donate.php,v 1.40 2010/01/14 20:52:38 jamie Exp $
  //$application->unregisterCurrentWindow();
  $publickey = "6LfkgwoAAAAAAOsEbDqgLLBq9nr192zzcDHKuFHD"; // you got this from the signup page
?>


      <h1>Entry Form</h1>

     <h3>DFF 2016 Deadlines</h3>
     <p>Early Submission Deadline: <b>October 1, 2015 at 11:59pm PST</b> - $5.00 fee per submission</p>
     <p>Final Submission Deadline: <b>December 1, 2015 at 11:59pm PST</b> - $15.00 fee per submission</p>

      <h3>Guidelines</h3>
      <p>
      <ul>
       <li>Disposable media must be central and integral to the film</li>
       <li>Use of multiple devices is encouraged but by no means necessary</li>
       <li>Submissions must be under 10 minutes</li>
       <li>Submissions must be accompanied by a <nobr>non-refundable</nobr> submission fee of <B>$5.00</B> or late submission fee of <B>$15.00</B></li>
       <li>If selected, the filmmaker must provide an uncompressed version of the film either by mail or via ftp.
       <li>Filmmakers are responsible for their usage of restricted or copyrighted material.
       (DFF is not liable for any copyright material unlawfully used)</li>
      </ul>
      </p>

      <h3>Selection Criteria</h3>

      <p>Selections will be equally judged on the inventive and experimental use of the media as well as the content of the film.</p>

      <?php echo ($submitMessage != '') ? '<div style="padding: 3px; font-size: 12px; color: #ff0000;">' . $submitMessage . '</div>' : ''; ?>

      <h3>Submission Form</h3>

      <p>All fields marked with a * are required.</p>

      <form onSubmit="return checkForm()" id="submissionForm" action="<?php echo ((time() > strtotime('11:59pm December 1, 2015')) && array_key_exists('backdoor', $_REQUEST)) ? '?backdoor=' . $_REQUEST['backdoor'] : ''  ?>" method="POST">
      <input type="hidden" name="Submission" value="yes">

       <table cellpadding="5" cellspacing="5" border="0">
       <tr>
        <th colspan="2"><h4>Vital Stats</h4></th>
       </tr>

       <tr>
        <td class="form-label">Filmmaker's Last Name*</td>
        <td><input type="text" size="42" name="LastName" id="LastName" value="<?php echo $_REQUEST['LastName'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">First Name*</td>
        <td><input type="text" size="42" name="FirstName" id="FirstName" value="<?php echo $_REQUEST['FirstName'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Name of Film*</td>
        <td><input type="text" size="42" name="Title" id="Title" value="<?php echo $_REQUEST['Title'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Link to Film*<br><span class="notes"><i><a rel="lyteframe[vimeo]" rev="width: 300px; height: 150px; scrolling: no;" href="/submit/<?php echo $submissionFormFolder ?>/vimeo.php">Upload to Vimeo</a></i></span></td>
        <td><input type="text" size="42" name="Links" id="Links" value="<?php echo $_REQUEST['Links'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Password to Film<br>(if applicable)</i></td>
        <td><input type="text" size="42" name="FilmPassword" id="FilmPassword" value="<?php echo $_REQUEST['FilmPassword'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Length*<br><i>max 10 mins</i></td>
        <td><input type="text" size="42" name="Length" id="Length" value="<?php echo $_REQUEST['Length'] ?>"></td>
       </tr>

       <!-- Make sure Email subscribe is pre-checked -->
       <tr>
        <td class="form-label">Email*</td>
        <td><input type="text" size="42" name="Email" id="Email" value="<?php echo $_REQUEST['Email'] ?>"><br>
          <input type="checkbox" name="Subscribe" id="Subscribe"<?php if (!array_key_exists('Email', $_REQUEST) || array_key_exists('Subscribe', $_REQUEST)) echo ' checked'; ?>> <i>Add me to the DFF mailing list for quarterly event updates</i></td>
       </tr>

       <tr>
        <td class="form-label">Additional Filmmakers</td>
        <td><textarea name="Names" id="Names" rows="9" cols="40"><?php echo $_REQUEST['Names'] ?></textarea></td>
       </tr>
      </table>

      <br>

     <table cellpadding="5" cellspacing="5" border="0" class="submission">
       <tr>
        <th colspan="2"><h4>About You</h4></th>
       </tr>

       <tr>
        <td class="form-label">Address*</td>
        <td><input type="text" size="42" name="Address" id="Address" value="<?php echo $_REQUEST['Address'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">City*</td>
        <td><input type="text" size="42" name="City" id="City" value="<?php echo $_REQUEST['City'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">State/Province*</td>
        <td><input type="text" size="42" name="State" id="State" value="<?php echo $_REQUEST['State'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Zip/Postal Code*</td>
        <td><input type="text" size="42" name="Zip" id="Zip" value="<?php echo $_REQUEST['Zip'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Country*</td>
        <td><input type="text" size="42" name="Country" id="Country" value="<?php echo $_REQUEST['Country'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Phone*</td>
        <td><input type="text" size="42" name="Phone" id="Phone" value="<?php echo $_REQUEST['Phone'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Website</td>
        <td><input type="text" size="42" name="Website" id="Website" value="<?php echo $_REQUEST['Website'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Twitter</td>
        <td><input type="text" size="42" name="Twitter" id="Twitter" value="<?php echo $_REQUEST['Twitter'] ?>"></td>
       </tr>

       <tr>
        <td class="form-label">Bios</td>
        <td><textarea name="Bios" id="Bios" rows="9" cols="40"><?php echo $_REQUEST['Bios'] ?></textarea></td>
       </tr>

       <tr>
        <td class="form-label">How did you hear about the festival?</td>
        <td><input type="text" size="42" name="ReferredBy" id="ReferredBy" value="<?php echo $_REQUEST['ReferredBy'] ?>"></td>
       </tr>
      </table>

      <br>

      <table cellpadding="5" cellspacing="5" border="0">
       <tr>
        <th colspan="2"><h4>About the Film</h4></th>
       </tr>

       <tr>
        <td class="form-label">Synopsis*</td>
        <td><textarea name="Synopsis" id="Synopsis" rows="9" cols="40"><?php echo $_REQUEST['Synopsis'] ?></textarea></td>
       </tr>

       <tr>
        <td class="form-label">Process*<br><span class="notes"><i>Please specify devices used to make the film</i></span></td>
        <td><textarea name="Process" id="Process" rows="9" cols="40"><?php echo $_REQUEST['Process'] ?></textarea></td>
       </tr>
      </table>

      <table cellpadding="5" cellspacing="5" border="0" class="submission" style="width: 90%;">
       <tr>
        <th colspan="3">Payment</th>
       </tr>
       <tr>
        <td class="paypal_text">

          1. Pay the <?php echo time() < strtotime('11:59pm October 1, 2015') ? '$5.00' : '$15.00' ?> fee*
        </td>

        <td class="paypal">

          <?php if (time() < strtotime('11:59pm October 1, 2015')) { ?>

          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2YF9QKBJKUG64" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" border="0"></a>

          <?php } else { ?>

          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TJT39ZZNQZWE8" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" border="0"></a>

          <?php } ?>
        </td>

        <td class="paypal_text">
          &nbsp;&nbsp;&nbsp;
          2. Enter Transaction ID*
          <input type="text" size="32" name="PaypalTransactionID" id="PaypalTransactionID" value="<?php echo $_REQUEST['PaypalTransactionID'] ?>">
        </td>
       </tr>
      </table>

      <br>

      <div id="license">

        <h3>Licensing Agreement</h3>

        <p>The Disposable Film Festival is conceived as a way of assisting filmmakers distribute their work and further promote their activities.</p>

        <p>We see the festival as an alternative means of promoting independent filmmakers outside of traditional cinema and film festival models.</p>

        <p>When you submit your film and video to the Disposable Film Festival, you grant us a non-exclusive license in perpetuity to distribute your work through the Disposable Film Festival website, through other online partner portals such as Vimeo and YouTube.</p>

        <p>This also includes presenting your work for promotional activities that may include editing elements of your content into promotional footage or screening it at workshops, launches or seminars, or other public screen events or presentations. We don't own your film, you just grant us a non-exclusive license to use it.</p>

        <a href="/submit/license.html" target="license"> Click here </a> to view the complete license agreement.

        <p><input type="checkbox" name="agree" id="agree"<?php if (array_key_exists('agree', $_REQUEST)) echo ' checked'; ?>> By clicking this checkbox, I hereby state that I have read and understand the guidelines, terms, and submission process.*</p>

      </div>

      <br>

      <input class="rounded" type="submit" value="Send Your Submission">

<!-- <h3>Security Verification*</h3> -->
<!-- <div align="left"> -->
        <?php //echo recaptcha_get_html($publickey); ?>
<!-- </div> -->

  </form>

<?php } else { ?>

<h5>Submissions for 2016 are now closed!</h5>

<?php } ?>
