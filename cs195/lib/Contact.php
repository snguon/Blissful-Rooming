<?php
// This class is for an individual contact
// standard setters and getters
// valdiates informmation for correctness
// saves data (new or updates)
// 

class Contact {
    private $contactId; // Parcel identification number (auto)
    private $contact; //Parcel identification number (town)
    private $type; // last year assessed by town
    private $lastUpdated; // last town assessed value
 
    const NEW_CONTACT = -1;
    public function __construct($db, $parcelId = self::NEW_CONTACT) {
        $this->db = $db;
        if ($parcelId == self::NEW_CONTACT) {
            $this->parcelId = self::NEW_CONTACT;
            $this->townParcelId = "";
            $this->taxYear = 0;
            $this->assessedValue = 0;
            $this->mapColor = "";
            $this->mapShape = "poly";
            $this->mapCoordinates = "";
            $this->mapAlt = "";
            $this->lastUpdated = "";
        } else {
            $sql = "SELECT pmkParcelId, fldTownParcelId, fldTaxYear, ";
            $sql .= "fldAssessedValue, fldMapColor, fldMapShape, ";
            $sql .= "fldMapCoordinates, fldMapAlt, fldLastUpdated ";
            $sql .= "FROM tblParcel ";
            $sql .= "WHERE pmkParcelId = ?";
            $data = array($parcelId);
            $results = $this->db->select($sql, $data, 1, 0);
            $this->parcelId = $results[0]["pmkParcelId"];
            $this->townParcelId = $results[0]["fldTownParcelId"];
            $this->taxYear = $results[0]["fldTaxYear"];
            $this->assessedValue = $results[0]["fldAssessedValue"];
            $this->mapColor = $results[0]["fldMapColor"];
            $this->mapShape = $results[0]["fldMapShape"];
            $this->mapCoordinates = $results[0]["fldMapCoordinates"];
            $this->mapAlt = $results[0]["fldMapAlt"];
            $this->lastUpdated = $results[0]["fldLastUpdated"];
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
    public function getLastUpdated() {
        return $this->lastUpdated;
    }
  
    
    //#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#
    //
    //        Setters (Sanitize Data)
    //
    public function setParcelId($parcelId) {
        $this->parcelId = (int) $parcelId;
    }
    public function setTownParcelId($townParcelId) {
        $this->townParcelId = filter_var($townParcelId,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH);
    }
    public function setTaxYear($taxYear) {
        $taxYear = (int) $taxYear;
        $this->taxYear = $taxYear;
    }
    public function setAssessedValue($assessedValue) {
        $this->assessedValue = (float) $assessedValue;
    }
    public function setMapColor($mapColor) {
        $this->mapColor = filter_var($mapColor,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH);
    }
    public function setMapShape($mapShape) {      
        $this->mapShape = filter_var($mapShape,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH);
    }
    public function setMapCoordinates($mapCoordinates) {
        $this->mapCoordinates = filter_var($mapCoordinates,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH);
    }
    public function setMapAlt($mapAlt) {
        $this->mapAlt = filter_var($mapAlt,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW,FILTER_FLAG_STRIP_HIGH);
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
            $results = $this->db->insert($sql, $data);
            $this->parcelId($this->db->lastInsert());
        } else {
            $sql = "UPDATE tblParcel SET ";
            $sql .= "fldTownParcelId = ?, ";
            $sql .= "fldTaxYear = ?, ";
            $sql .= "fldAssessedValue = ? ";
            $sql .= "WHERE pmkParcelId = ?";
            $data[] = $this->parcelId;
            $results = $this->db->update($sql, $data);
        }
    }
}
?>

