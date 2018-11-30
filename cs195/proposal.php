<?php
include 'top.php';
$user = 1;

if (TRUE) {
    echo '<p>POST Array<pre>';
    print_r($_POST);
    echo '</pre></p>';
}
?>

<form action="proposal.php" method="POST">
    <button type="submit" name="button"value="new" formmethod="POST" formaction="proposal.php">New!</button>
    <button type="submit" name="button"value="new" formmethod="POST" formaction="proposal.php">New!</button>
<!--    <fieldset>
        <input type='radio' name='radProceed' value='New' <?php
//        if ($_POST['radProceed'] == 'New') {
//            print "checked";
//        };
//        ?> >New<br>
        <input type='radio' name='radProceed' value='Load'<?php
//        if ($_POST['radProceed'] == 'Load') {
//            print "checked";
//        };
//        ?> >Load<br>
        <input type="submit" value="Next">
    </fieldset>-->
</form>

<?php
if ($_POST['radProceed'] != "") {
    if ($_POST['radProceed'] == 'Load' || $_POST['radProceed'] == 'true') {
        if ($_POST['btnSave'] == "Submit" || $_POST['btnUpload'] == "Upload") {
            //SQL statements for updating the database with the new proposal
            $sql = "INSERT INTO tblProposal "
                    . "SET fldApproved = ? , fldDescription = ? , fldDollarAmount = ? , fldTitle = ? ";
            $data = array(0, $_POST['fldDescription'], $_POST['fldDollarAmount'], $_POST['fldTitle']);
            if ($thisDatabaseWriter->querySecurityOk($sql, 0)) {
                $records = $thisDatabaseWriter->insert($sql, $data);
            }

            //SQL statements that create the link between the user and the proposal
            $sql = "SELECT pmkProposalId FROM tblProposal";
            $results = $thisDatabaseReader->select($sql, array(), 0, 0, 0);
            $pmkProposalId = $results[(count($results) - 1)]['pmkProposalId'];
            $sql = "INSERT INTO tblPersonProposal "
                    . "SET fnkPersonId = ? , fnkProposalId = ? ";
            $data = array($user, $pmkProposalId);
            if ($thisDatabaseWriter->querySecurityOk($sql, 0)) {
                $records = $thisDatabaseWriter->insert($sql, $data);
            }

            //SQL statement that connects the proposal, user, and comments all together
            $sql = "INSERT INTO tblProposalComment  "
                    . "SET fnkPersonId = ? , fnkProposalId = ? ";
            $data = array($user, $pmkProposalId);
            if ($thisDatabaseWriter->querySecurityOk($sql, 0)) {
                $records = $thisDatabaseWriter->insert($sql, $data);
            }
        }
        if ($_POST['btnUpload'] == "Upload") {
            include 'lib/Upload.php';
        }
        print LINE_BREAK . "<!-- Start contract display -->" . LINE_BREAK;
        include 'displayContract.php';
        print LINE_BREAK . "<!-- End contract display -->" . LINE_BREAK;
    }
    if ($_POST['radProceed'] == 'New') {
        print LINE_BREAK . "<!-- Start Form -->" . LINE_BREAK;
        include 'proposalForm.php';
        print LINE_BREAK . "<!-- End Form -->" . LINE_BREAK;
    }
}
include 'footer.php';
