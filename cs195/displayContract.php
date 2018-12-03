<?php

/* $includePath = "../../bin/";
  require_once($includePath . 'pass.php');

  require_once($includePath . 'Database.php');

  $dbUserName = get_current_user() . '_reader';
  $whichPass = "r"; //flag for which one to use.
  $dbName = "CRALLAN_test";

  $thisDatabase = new Database($dbUserName, $whichPass, $dbName); */

require_once("lib/contract.php");

require_once("lib/custom-functions.php");

require_once("lib/Person.php");

// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// sanatize GET global variables 
/* if (!empty($_GET)) {
  $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  foreach ($_GET as $key => $value) {
  $_GET[$key] = sanitize($value, false, false);
  }
  }
 */
//Gets all the proposals attached to the user for viewing
$sql = 'SELECT pmkProposalId, fldTitle '
        . 'FROM tblProposal '
        . 'JOIN tblPersonProposal ON fnkProposalId = fnkPersonId '
        . 'JOIN tblPerson ON fnkPersonId = pmkPersonId '
        . 'WHERE pmkPersonId = ?';
$data = 1;
$results = $thisDatabaseReader->select($sql, array($data), 1, 0, 0);

for ($i = 0; $i < count($results); $i++) {
    $proposalId = $results[$i]['pmkProposalId'];

    $thisContract = new Contract($thisDatabaseWriter, $proposalId);

// Debugging Purposes Only!!!
    if (DEBUG) {
        print '<pre>';
        print_r($thisContract->getResults());
        print '</pre>';
        print '<p>' . $thisContract->getSQL() . "</p>";
    }

    $propId = "'details" . $thisContract->getPurposalId() . "'";

    print '<div class="contractWrapper">' . LINE_BREAK;
    print '<h2 onclick="myFunction(' . $propId . ')">' . $thisContract->getTitle() . '</h2>' . LINE_BREAK;
    print'<p>Date Submitted: ' . $thisContract->getDateSubmitted() . '</p>' . LINE_BREAK;
    print'<p>Dollar Amount: ' . $thisContract->getDollarAmount() . '<p>' . LINE_BREAK;
    print '<div id = "details' . $thisContract->getPurposalId() . '" class = "contractHidden">' . LINE_BREAK;
    print'<p>Description: ' . $thisContract->getDescription() . '</p>' . LINE_BREAK;
    // print'<p>Final Amount: ' . $thisContract->getFinalAmount() . '</p>' . LINE_BREAK;
    print'<p>Type: ' . $thisContract->getType() . '</p>' . LINE_BREAK;
    //print'<p>Voting Closing: ' . $thisContract->getVotingClosing() . '</p>' . LINE_BREAK;
    //print'<p>Approval: ' . $thisContract->getApproval() . '</p>' . LINE_BREAK;
    print'<p>Last Updated: ' . $thisContract->getLastUpdated() . '</p>' . LINE_BREAK;
    print '</div>' . LINE_BREAK;
    print'</div>' . LINE_BREAK . LINE_BREAK;
}

print'
    <script>
    function myFunction(a) {
    var id = String(a);
    document.getElementById(id).classList.toggle("contractHidden");

}
</script>';
