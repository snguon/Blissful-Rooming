<?php
include 'lib/constants.php';
include 'lib/Connect-With-Database.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//$includePath = "../../bin/";
//require_once($includePath . 'security.php');

require_once("lib/Parcel.php");
$thisParcel = new Parcel($thisDatabaseWriter, -1);

require_once("lib/custom-functions.php");

require_once("lib/Person.php");
// %^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// sanatize GET global variables 
if (!empty($_GET)) {
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    foreach ($_GET as $key => $value) {
        $_GET[$key] = sanitize($value, false, false);
    }
}

$id = $_GET["pid"];

$thisParcel = new Parcel($thisDatabaseWriter, $id);



print '<aside class="parcel">';
print '<h2>Parcel Information</h2>';

print '<p>Town Parcel Id: ' . $thisParcel->getTownParcelId() . '</p>' . LINE_BREAK;
print '<p>Year Assessed: ' . $thisParcel->getTaxYear() . '</p>' . LINE_BREAK;


print '<p>Association Dues (flat tax rate): $' . number_format($thisParcel->getFlat()) . ' per year</p>' . LINE_BREAK;
print '<p>Association Dues (% of assessed value): $' . number_format($thisParcel->getShare()) . ' per year</p>' . LINE_BREAK;

print '<p class="webmaster">Assessed Value: $' . number_format($thisParcel->getAssessedValue()) . '</p>' . LINE_BREAK;



$people = $thisParcel->getOwners();

print "<h2>Owner";
if (count($people) > 1)
    print "s";
print "</h2>" . LINE_BREAK;

$i = 0;

// need to use index $1 for this
foreach ($people as $person) {

    $thisPerson = new Person($thisDatabaseWriter, $person["personId"]);

    print '<p>' . $thisPerson->getFirstName() . " " . $thisPerson->getLastName() . '</p>' . LINE_BREAK;
    if ($thisPerson->getAddress()) {
        foreach ($thisPerson->getAddress() as $address) {
            if ($address["streetAddress1"] <> "")
                print '<p>' . $address["streetAddress1"] . LINE_BREAK;
            if ($address["streetAddress2"] <> "")
                print '<br>' . $address["streetAddress2"] . LINE_BREAK;
            if ($address["city"] <> "")
                print '<br>' . $address["city"];
            if ($address["state"] <> "")
                print ', ' . $address["state"];
            if ($address["zipCode"] <> "")
                ' ' . $address["zipCode"];
            if ($address["addressLastUpdated"] <> "")
                print '<span class="webmaster"> (updated: ' . $address["addressLastUpdated"] . ")</span>" . LINE_BREAK;
            print '</p>' . LINE_BREAK;
        }
    } // ends address

    if ($thisPerson->getContact()) {
        foreach ($thisPerson->getContact() as $contact) {
            print '<p>' . LINE_BREAK;
            if ($contact["type"] <> "")
                print $contact["type"] . ': ' . LINE_BREAK;
            if ($contact["contact"] <> "")
                if (strtolower($contact["type"]) == 'email') {
                    print '<a href="mailto:' . $contact["contact"] . '">';
                }

            print $contact["contact"] . LINE_BREAK;

            if (strtolower($contact["type"]) == 'email') {
                print '</a>';
            }

            if ($contact["contactLastUpdated"] <> "")
                print '<span class="webmaster"> (updated: ' . $contact["contactLastUpdated"] . ")</span>" . LINE_BREAK;
            print '</p>' . LINE_BREAK;
        }
    } // ends address
}

print "</aside> <!-- parcel -->";

print '<aside class="association">';
print '<h2>Association</h2>';
print '<p>Yearly Association goal: $' . number_format($thisParcel->getYearCost());
print '<p>Number or properties: ' . number_format($thisParcel->getTotalProperites());
print '<p>Percent rate needed to reach goal: ' . number_format($thisParcel->getTaxPercent(), 3) . "%";
print '<p>Total Assessed Value of all properties: $' . number_format($thisParcel->getTotalAssesedValue()) . '</p>' . LINE_BREAK;
print "</aside> <!-- association -->";

print '<div class="webmaster">' . LINE_BREAK;
print '<p>Information for web master</p>' . LINE_BREAK;
print '<p>Information Last Updated: ' . $thisParcel->getLastUpdated() . '</p>' . LINE_BREAK;
print '<p>Map Alternate Text: ' . $thisParcel->getMapAlt() . '</p>' . LINE_BREAK;
print '<p>Parcel Id: ' . $thisParcel->getParcelId() . '</p>' . LINE_BREAK;
print '<p>CSS Color Code: ' . $thisParcel->getMapColor() . '</p>' . LINE_BREAK;
print '<p>Map Shape: ' . $thisParcel->getMapShape() . '</p>' . LINE_BREAK;
print '<p>Map Coordinates: ' . $thisParcel->getMapCoordinates() . '</p>' . LINE_BREAK;

print "</div> <!-- web master -->" . LINE_BREAK;

