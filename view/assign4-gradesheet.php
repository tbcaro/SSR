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


 <table width="100%" border="1">
    <tbody>
      <tr> 
        <th>CIS 370 Assignment 4 Specific Requirements
        </th><th>How to test this feature.</th>
        <th>Works Completely<br>
          (Yes/No)</th>
      </tr>
      <tr> 
        <td>1.  Create an interface to add new data to your database. </td>
        <td>Yes</td>
        <td>Admin > Add Member</td>
      </tr>
      <tr>
        <td class="indent1">b. Provide appropriate HTML controls to input data
          including textboxes, selection boxes, radio buttons, checkboxes, calendar
        controls, etc.</td>
        <td>Yes</td>
        <td>Admin > Add Member</td>
      </tr>
      <tr> 
        <td class="indent2">i. Include at least one selection box, checkbox (or
        radio button), and date input (via text or date) on your input form.</td>
        <td>Yes</td>
        <td>Admin > Add Member - package(Select), current(Check), memberSince(Date)</td>
      </tr>
      <tr>
        <td class="indent2">ii. Require at least one field as a minimum to make
        data valid.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent2">iii.  Show a red * on form for required fields.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="indent1">c. Validate all data on the client-side and server
        side where appropriate.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="indent1">d. Make sure you can enter special characters such
          as single and double quotes, commas, ampersands, brackets, braces, and
        angle-brackets into text fields without causing errors.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="indent1">e. Dates should show and be entered in MM/DD/YYYY format
        but be stored in the database as date fields.</td>
        <td>Yes</td>
        <td>This is possible, but note that the default date to satisfy chrome's type=date will show as YYYY-MM-DD, input as MM/DD/YYYY will still work fine though</td>
      </tr>
      <tr>
        <td class="indent1">f. After successful addition of a new entry, take them
        to the details-view form.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="indent1">g. If errors are found server-side, return them to
          the add screen with any entered data visible and a message to indicate
        all errors.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td>2.  Create an interface to edit data in your database.</td>
        <td>Yes</td>
        <td>Admin > Members > (click on member name to view details) > Edit</td>
      </tr>
      <tr>
        <td class="indent1">b. Try to share as much code as possible with your
        Add form.</td>
        <td>Yes</td>
        <td>View code for editForm.php</td>
      </tr>
      <tr> 
        <td>3.  Provide an interface to delete data in your database.</td>
        <td>Yes</td>
        <td>Admin > Members > (click on member name to view details) > Delete </td>
      </tr>
      <tr> 
        <td class="indent1">b. Require the user to confirm the deletion and only
        delete if they say so.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent2">
          i. If they cancel the deletion, leave them on the display
            form.
        </td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td>4.  Make your code portable.</td>
        <td>Yes</td>
        <td>Code reuse is used in editForm.php</td>
      </tr>
      <tr> 
        <td class="indent1">a. Protect against Cross Site Scripting attacks (HTML
        injection).</td>
        <td>Yes</td>
        <td>Try to place html into any input in the forms</td>
      </tr>
      <tr> 
        <td class="indent1">b. Your code should work with or without gpc_magic_quotes
        turned on.</td>
        <td>Yes</td>
        <td>Attempt to add quoted info into input on cisprod</td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#CCCCCC">
          <div align="center"><strong><font size="+1">Security Features</font></strong></div>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td>6. Integrate a security mechanism into your application that supports
        adding, changing, and deleting users, functions, and roles.</td>
        <td>Yes</td>
        <td>Security Tab</td>
      </tr>
      <tr> 
        <td class="indent1">a. Adapt the format of the code provided to fit into
          your theme with your headers, footers, color schemes, and navigation
        system.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent1">b. Include a mechanism in your navigation system to
        support your security features.</td>
        <td>Yes</td>
        <td>Security tab</td>
      </tr>
      <tr>
        <td class="indent2">i. Log In or Log Out should appear at the main menu
        level.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
     <tr>
        <td class="indent2">ii. Redirect to use a secure connectin for the login screen.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent1">c. Set up users, functions, and roles appropriate for
        your application.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent2">i.  Include an admin account with username “admin” and
        password “admin” with full access.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent2">ii. Include a read-only account with username of “reader” and
        password of “reader”.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent1">d. Links for features that the current user does not
        have access to should either not show or be disabled (if it is a button). </td>
        <td>Yes</td>
        <td>Check navigation and Admin for button limitations based on account</td>
      </tr>
      <tr>
        <td class="indent2">i.  This includes items in your navigation system.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
      <tr> 
        <td class="indent2">ii. If a user attempts to go directly to a page (perhaps
          via a bookmark) and they are not currently logged in, and the page is
          not available to guests, bring up the login page in-line and then forward
        them on to their originally desired page.</td>
        <td>Yes</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>


<?php
    date_default_timezone_set("America/New_York");
    $modDate = getlastmod();

	require 'footerInclude.php';
?>