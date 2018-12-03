<?php
// test to see if git is working
include "top.php";

require_once("lib/custom-functions.php");

require_once("billing_class.php");

$sql = "SELECT `fnkParcelId`, `fnkBillId`, `fnkContractId`, `fnkPersonId`, `pmkDatePaid`, `fldDateRecieved`, `fldAmountPaid`, `fldCheckNumber`, `fldNotes`, `fldLastUpdated` ";
$sql .= "FROM tblParcelBill ";
$sql .= "WHERE fnkPersonId = ? ";

$data = 13;

$results = $thisDatabaseReader->select($sql, array($data), 1, 0, 0);
$thisBill = new Billing_Class($thisDatabaseWriter, $data);

?>

<article id="main">
    <h2><?php echo ASSOCIATION_NAME; ?></h2>

    <p>the idea here would be to display everyone's transaction, paid, owed etc. people would only see their transactions. the secretary would see everyones.</p>

    <?php

    // %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
    /* sanatize GET global variables
    if (!empty($_GET)) {
        $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        foreach ($_GET as $key => $value) {
            $_GET[$key] = sanitize($value, false, false);
        }
    }
    */

    // Debugging Purposes Only!!!
    if (DEBUG) {
        print '<pre>';
        print_r($thisBill->getResults());
        print '</pre>';
        print '<p>' . $thisBill->getSQL() . "</p>";
    }

    print '<aside class="bill">';
    print '<h2>Bill Information</h2>';

    print '<p>Parcel Id: ' . $thisBill->getParcelId() . '</p>' . LINE_BREAK;
    print '<p>Bill Id: ' . $thisBill->getBillId() . '</p>' . LINE_BREAK;
    print '<p>Contract Id: ' . $thisBill->getContractId() . '</p>' . LINE_BREAK;
    print '<p>Person Id: ' . $thisBill->getPersonId() . '</p>' . LINE_BREAK;
    print '<p>Date Paid:  ' . $thisBill->getDatePaid() . '</p>' . LINE_BREAK;
    print '<p>Date Recieved: ' . $thisBill->getDateRecieved() . '</p>' . LINE_BREAK;
    print '<p>Check Number: ' . $thisBill->getCheckNumber() . '</p>' . LINE_BREAK;
    print '<p>Notes: ' . $thisBill->getNotes() . '</p>' . LINE_BREAK;
    print '<p>Last Updated: ' . $thisBill->getLastUpdated() . '</p>' . LINE_BREAK;

    ?>

</article>

</body>
</html>
