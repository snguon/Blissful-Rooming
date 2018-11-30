<?php

// This class is for an individual parcel property.
// standard setters and getters
// valdiates informmation for correctness
// saves data (new or updates)

class Parcel {

    private $parcelId; // Parcel identification number (auto)
    private $townParcelId; //Parcel identification number (town)
    private $taxYear; // last year assessed by town
    private $assessedValue; // last town assessed value
    private $mapColor; // CSS color id for this parcel
    private $mapShape; // map shape for image map, generally poly
    private $mapCoordinates; // coordinates for the map shape
    private $mapAlt; // alternate text to be display
    private $lastUpdated; // time stamp record last updated
    private $db; // connection to database
    private $owners = array();
    private $flat; // amount due each year based on a flat tax rate
    private $share;  // amount due each year based on value of home
    /*     private $address = array(); */
    private $totalParcels;
    private $totalAssesedValue;
    private $taxPercent;

    const NEW_PARCEL = -1;
    const YEAR_COST = 3000;

    public function __construct($db, $parcelId = self::NEW_PARCEL) {
        $this->db = $db;

        $sql = "SELECT count(pmkParcelId) as totalParcels FROM tblParcel";
        $results = $this->db->select($sql, "", 0, 0, 0);
        if ($results) {
            $this->totalParcels = $results[0]["totalParcels"] - 1; // State of vermont is listed but does not really belong
        } else {
            $this->totalParcels = 0;
        }

        $sql = "SELECT sum(fldAssessedValue) as totalAssesment FROM tblParcel";
        $results = $this->db->select($sql, "", 0, 0, 0);
        if ($results) {
            $this->totalAssesedValue = $results[0]["totalAssesment"];
        } else {
            $this->totalAssesedValue = 0;
        }


        if ($parcelId == self::NEW_PARCEL) {
            $this->parcelId = self::NEW_PARCEL;
            $this->townParcelId = "";
            $this->taxYear = 0;
            $this->assessedValue = 0;
            $this->mapColor = "";
            $this->mapShape = "poly";
            $this->mapCoordinates = "";
            $this->mapAlt = "";
            $this->lastUpdated = "";
// do i need to unset owners?
        } else {

            $sql = "SELECT pmkParcelId, fldTownParcelId, fldTaxYear, ";
            $sql .= "fldAssessedValue, fnkParcelAddressId, fldMapColor, ";
            $sql .= "fldMapShape, fldMapCoordinates, fldMapAlt, tblParcel.fldLastUpdated, ";

//parcel owner table
            $sql .= "fnkParcelId, fnkOwnerId, fldOrder, fldOwner ";

            /*   , ";

              //person table
              $sql .= "pmkPersonId ";

              , fldFirstName, ";
              $sql .= "fldLastName, fldEmail, fldPassWord, fldPermissionLevel, ";

              //person address
              $sql .= "fldType, ";

              //address table
              $sql .= "fldStreetAddress1, fldStreetAddress2, fldCity, fldState, fldZipCode ";
             */
            $sql .= "FROM tblParcel ";
            $sql .= "JOIN tblParcelOwner ON pmkParcelId = fnkParcelId ";
            /*  $sql .= "JOIN tblPerson ON pmkPersonId = fnkOwnerId ";
              $sql .= "LEFT JOIN tblPersonAddress ON fnkPersonId = fnkOwnerId ";
              $sql .= "LEFT JOIN tblAddress ON pmkAddressId = fnkAddressId ";
             */
            $sql .= "WHERE pmkParcelId =?";

            $data = array($parcelId);

            $results = $this->db->select($sql, $data, 1, 0, 0);
            $i = -1;
            if ($results) {
                $this->parcelId = $results[0]["pmkParcelId"];
                $this->townParcelId = $results[0]["fldTownParcelId"];
                $this->taxYear = $results[0]["fldTaxYear"];
                $this->assessedValue = $results[0]["fldAssessedValue"];

                if ($this->assessedValue > 0) {
                    $this->taxPercent = self::YEAR_COST / $this->totalAssesedValue;
                } else {
                    $this->taxPercent = "NA";
                }
                                
                $this->share = $this->assessedValue * $this->taxPercent;

                if ($this->totalParcels) {
                    $this->flat = (self::YEAR_COST / $this->totalParcels);
                } else {
                    $this->flat = "NA";
                }

                $this->mapColor = $results[0]["fldMapColor"];
                $this->mapShape = $results[0]["fldMapShape"];
                $this->mapCoordinates = $results[0]["fldMapCoordinates"];
                $this->mapAlt = $results[0]["fldMapAlt"];
                $this->lastUpdated = $results[0]["fldLastUpdated"];

                foreach ($results as $row) {
                    $i++;

                    $this->owners[$i]['personId'] = $row["fnkOwnerId"];
                    $this->owners[$i]['owner'] = $row["fldOwner"];
                    /*
                      $this->owners[$i]['firstName'] = $row["fldFirstName"];
                      $this->owners[$i]['lastName'] = $row["fldLastName"];
                      $this->owners[$i]['addressType'] = $row["fldType"];
                      $this->owners[$i]['streetAddress1'] = $row["fldStreetAddress1"];
                      $this->owners[$i]['streetAddress2'] = $row["fldStreetAddress2"];
                      $this->owners[$i]['city'] = $row["fldCity"];
                      $this->owners[$i]['state'] = $row["fldState"];
                      $this->owners[$i]['zipCode'] = $row["fldZipCode"];

                     */
                }
            } else {
                $this->parcelId = $parcelId;
                $this->townParcelId = "Error In Data";
                $this->taxYear = 0;
                $this->assessedValue = 0;
                $this->mapColor = "";
                $this->mapShape = "poly";
                $this->mapCoordinates = "";
                $this->mapAlt = "";
                $this->lastUpdated = "";
            }
        }
    }

//    public function __toString() {
//        return $s . "\n";
//    }
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
//        Getters
//

    public function getParcelId() {

        return $this->parcelId;
    }

    public function getTownParcelId() {
        return $this->townParcelId;
    }

    public function getTaxYear() {
        return $this->taxYear;
    }

    public function getAssessedValue() {
        return $this->assessedValue;
    }

    public function getMapColor() {
        return $this->mapColor;
    }

    public function getMapShape() {
        return $this->mapShape;
    }

    public function getMapCoordinates() {
        return $this->mapCoordinates;
    }

    public function getMapAlt() {
        return $this->mapAlt;
    }

    public function getShare() {
        return $this->share;
    }

    public function getFlat() {
        return $this->flat;
    }

    public function getLastUpdated() {
        return $this->lastUpdated;
    }

    public function getOwners() {
        return $this->owners;
    }

    public function getYearCost() {
        return self::YEAR_COST;
    }

    public function getTotalProperites() {
        return $this->totalParcels;
    }

    public function getTaxPercent() {
        return $this->taxPercent;
    }

    public function getTotalAssesedValue() {
        return $this->totalAssesedValue;
    }

//#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#
//
//        Setters (Sanitize Data)
//

    public function setParcelId($parcelId) {
        $this->parcelId = (int) $parcelId;
    }

    public function setTownParcelId($townParcelId) {
        $this->townParcelId = filter_var($townParcelId, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH);
    }

    public function setTaxYear($taxYear) {
        $taxYear = (int) $taxYear;
        $this->taxYear = $taxYear;
    }

    public function setAssessedValue($assessedValue) {
        $this->assessedValue = (float) $assessedValue;
    }

    public function setMapColor($mapColor) {
        $this->mapColor = filter_var($mapColor, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH);
    }

    public function setMapShape($mapShape) {
        $this->mapShape = filter_var($mapShape, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH);
    }

    public function setMapCoordinates($mapCoordinates) {
        $this->mapCoordinates = filter_var($mapCoordinates, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH);
    }

    public function setMapAlt($mapAlt) {
        $this->mapAlt = filter_var($mapAlt, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW, FILTER_FLAG_STRIP_HIGH);
    }

    public function setLastUpdated($lastUpdated) {
        $this->lastUpdated = $lastUpdated;
    }

//!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!
//
//       Validate Data
//

    public static function validateParcelId($parcelId) {
        $error = "";
        if (!((int) $parcelId > 0)) {
            $error = "Parcel Id is not a valid number.";
        }

        return $error;
    }

    public static function validateTownParcelId($townParcelId) {
        $error = "";
        if (!empty($townParcelId)) {
            $error = "You must enter a Parcel Id from the town records.";
        }

        return $error;
    }

    public static function validateTaxYear($taxYear) {
        $error = "";
        if (!((int) $taxYear > 0)) {
            $error = "Tax year is not a valid number.";
        } elseif ((int) $taxYear < 1900 or (int) $taxYear > date("Y")) {
            $error = "Tax year is not a valid year.";
        }

        return $error;
    }

    public static function validateAssessedValue($assessedValue) {
        $error = "";
        if (!((int) $assessedValue > 0)) {
            $error = "Assessed value is not a valid number.";
        }

        return $error;
    }

    public static function validateMapColor($mapColor) {
        $error = "";
        if (!empty($mapColor)) {
            $error = "You must enter a code for this parcel.";
        }

        return $error;
    }

    public static function validateMapShape($mapShape) {
        $error = "";

// can be rect circle poly
        if (!empty($mapShape)) {
            $error = "You must enter a shape for this parcel.";
        }
        if ($mapShape != 'circle'
                OR $mapShape != 'poly'
                OR $mapShape != 'rect') {
            $error = "You must enter a valid shape for this parcel (circle, poly, rect).";
        }

        return $error;
    }

    public static function validateMapCoordinates($mapCoordinates) {
        $error = "";
        if (!empty($mapCoordinates)) {
            $error = "You must enter the coordinates for this parcel.";
        }

        return $error;
    }

    public static function validateMapAlt($mapAlt) {
        $error = "";
        if (!empty($mapAlt)) {
            $error = "You must enter an alternate text for this parcel.";
        }

        return $error;
    }

// LastUpdated is auto set on save

    public function saveParcel() {
        $data = array($this->townParcelId, $this->taxYear, $this->assessedValue);

        if ($parcelId == NEW_PARCEL) {
            $sql = "INSERT INTO tblParcel SET ";
            $sql .= "fldTownParcelId = ?, ";
            $sql .= "fldTaxYear = ?, ";
            $sql .= "fldAssessedValue = ?";
            $results = $this->db->insert($sql, $data, 0, 0);
            $this->parcelId($this->db->lastInsert());
        } else {
            $sql = "UPDATE tblParcel SET ";
            $sql .= "fldTownParcelId = ?, ";
            $sql .= "fldTaxYear = ?, ";
            $sql .= "fldAssessedValue = ? ";
            $sql .= "WHERE pmkParcelId = ?";
            $data[] = $this->parcelId;

            $results = $this->db->update($sql, $data, 1, 0);
        }
    }

}
?>