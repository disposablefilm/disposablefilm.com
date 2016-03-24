---
layout: static-php
title: Entry Form
image: posts/Screen-Shot-2014-05-30-submit.png
thumb: posts/thumb-submit.png
---

<script src="/submit/go/functions.js" type="text/javascript"></script>

      <h1>Entry Form</h1>

     <h3>DFF 2016 Deadlines</h3>
     <p>Early Submission Deadline: <b>October 1, 2016 at 11:59pm PST</b> - $5.00 fee per submission</p>
     <p>Final Submission Deadline: <b>December 1, 2016 at 11:59pm PST</b> - $15.00 fee per submission</p>

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

      <form onSubmit="return checkForm()" id="submissionForm" action="<?php echo ((time() > strtotime('11:59pm December 1, 2016')) && array_key_exists('backdoor', $_REQUEST)) ? '?backdoor=' . $_REQUEST['backdoor'] : ''  ?>" method="POST">
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
        <td class="form-label">Link to Film*</td>
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

          1. Pay the <?php echo time() < strtotime('11:59pm October 1, 2016') ? '$5.00' : '$15.00' ?> fee*
        </td>

        <td class="paypal">

          <?php if (time() < strtotime('11:59pm October 1, 2016')) { ?>

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
