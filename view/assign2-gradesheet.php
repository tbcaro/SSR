<?php

	$title = "Gradesheet";
	require 'headerInclude.php';
?>

<style type="text/css">
    table{
        text-align: left;
    }

    tr{
    	line-height: 30px;
    }

    th{
        text-align: center;
    }

	.indent1 {
        padding-left: 50px;
        text-align: left;
    }
	.indent2 {
        padding-left: 100px;
        text-align: left;
    }
</style>


<table border="1" width="100%">
    <tbody>
        <tr>
        <th>Specific Requirement</th><th>How to Test<br/>(if not obvious)</th>
        <th>Works Completely<br>(Yes/No)</th>
        </tr>

        <tr>
        <td>1.  Header, Footer, and Nav included via PHP.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">a.  Footer includes date/time main content portion of page last modified.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">b.  Footer includes mini-nav with contact and About links.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>2.  All source files organized into proper folders.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>3.  Automatic redirection from top of your web space to proper location for this assignment.</td>
        <td>follow cisprod.clarion.edu/~s_tbcaro</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>4.  Email sign-up link in main navigation.</td>
        <td>Newsletter > Subscribe (Also unsubscribe link at bottom of page)</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">a.  Validate e-mail before saving on client and server.</td>
        <td>Enter Invalid Email</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">b.  New addresses successfully added.</td>
        <td>Enter Valid Email</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">c.  Success or error page responds when appropriate.</td>
        <td>Enter Invalid form data</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>5.  File Management link in Admin menu.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">a.  Upload page provides a list of all current files in the directory.</td>
        <td>Admin > File Management > Upload (any)</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">b.  Proper permissions are set on server folders to allow uploads.</td>
        <td>Attempt Uploads</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">c.  Newsletter-Type File Upload Mechanism</td>
        <td>Admin > File Management > Upload Newsletter</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">i.  HTML self-contained file with fonts and colors.</td>
        <td>Upload html module to fit framework</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">ii. File can be seen via link on home page showing most recently uploaded version.</td>
        <td>Newsletter Link on main nav</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">iii.  Upload gives error if not an HTML file.</td>
        <td>Upload .txt file or other</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">d.  Quote File Upload Mechanism</td>
        <td>Admin > File Management > Upload Quote List</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">i.  Text file with one line per quote.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">ii. Upload gives error if not a text file.</td>
        <td>Upload html file or other</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">iii. Link on File Management page to see the current Quote File.</td>
        <td>Link at bottom of quote file upload page</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">e.  Image File Uploads</td>
        <td>Admin > File Management > Image Upload</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">i.  Allow additional image files to upload.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">ii. Only allow jpeg, gif, and png formats.</td>
        <td>Attempt true bitmap upload</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">iii. On successful upload list all files.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">iv. New images may appear in header.</td>
        <td>After upload refresh page</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent2">v.  Validate and notify if image size matters.</td>
        <td>Attempt to upload file that is not 1300 x 100</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>6.  Sending of Bulk E-Mails</td>
        <td>Admin > Send Emails </td>
        <td>Yes</td>
        </tr>
        <tr>

        <td class="indent1">a.  Newsletter-Type file is body of the message.</td>
        <td>Send email to receive most recently uploaded self contained newsletter file</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">b.  E-Mail is sent to all recipients that have signed up.</td>
        <td>Admin > Send Emails</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">c.  No recipient should be able to see the email address of others.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">d.  Confirmation page shows all addresses who received a message.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">e.  E-Mail is properly addressed to help avoid going to SPAM folders.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>7.  This sheet linked in to your site under the Help menu.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>8.  All pages pass the validation/conformance checks for the specified version of HTML and CSS</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">a.  CSS image in footer that calls validator.</td>
        <td>Just link to validator, not a call</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">b.  XHTML image in footer unless HTML5 was used.</td>
        <td> '' </td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>9.  Complete site published to cisprod public_html folder (including redirection).</td>
        <td>follow cisprod.clarion.edu/~s_tbcaro</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td class="indent1">a.  Create a .zip file of your whole site and turn it in to the appropriate folder on D2L.</td>
        <td>&nbsp;</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>

        <tr>
        <th colspan="2">Extra Credit</th></tr>
        <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>

        <tr>
        <td>10. Provide a mechanism to delete unwanted image files.</td>
        <td>&nbsp;</td>
        <td>No</td>
        </tr>

        <tr>
        <td>11. Show a random quote in your footer.  The quote should 
        come from the Quote file (above) that may be replaced via upload at any 
        time by the user.</td>
        <td>Refresh Page to see random change</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>12. Include a "Remember Me" checkbox on e-mail signup page.</td>
        <td>&nbsp;</td>
        <td>No</td>
        </tr>

        <tr>
        <td class="indent1">a.  Include a "Welcome First Name" in header if they wanted to be remembered on that machine.</td>
        <td>&nbsp;</td>
        <td>No</td>
        </tr>

        <tr>
        <td>13. When adding an e-mail address to receive messages, also 
        validate that any new e-mail added does not already exist on the file 
        before adding it.  If the address was already in the list, give them an 
        appropriate message indicating this.</td>
        <td>Try to add duplicate emails</td>
        <td>Yes</td>
        </tr>

        <tr>
        <td>14. Allow multi-file selection of images in the upload.</td>
        <td>&nbsp;</td>
        <td>No</td>
        </tr>
    </tbody>
</table>


<?php
    date_default_timezone_set("America/New_York");
    $modDate = getlastmod();

	require 'footerInclude.php';
?>