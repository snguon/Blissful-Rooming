<?php

// This class is for a parcel address.
// standard setters and getters
// valdiates informmation for correctness
// saves data (new or updates)
// 
class Address {

    private $addressId;
    private $streetAddress1;
    private $streetAddress2;
    private $city;
    private $state;
    private $zipCode;

    const NEW_ADDRESS = -1;

    //???? how to identify new address
    public function __construct($db, $addressId) {
        if ($addressId == self::NEW_ADDRESS) {
            $this->addressId = self::NEW_ADDRESS;
            $this->streetAddress1 = "";
            $this->streetAddress2 = "";
            $this->city = "";
            $this->state = "";
            $this->zipCode = "";
            $this->lastUpdated = "";
        } else {
            $sql = "SELECT pmkAddressId, fldStreetAddress1, fldStreetAddress2, ";
            $sql .= "fldCity, fldState, fldZipCode, fldLastUpdated ";
            $sql .= "FROM tblAddress ";
            $sql .= "WHERE pmkAddressId = ?";
            $data = array($addressId);
            $results = $this->db->select($sql, $data, 1, 0);
            $this->addressId = $results[0]["pmkAddressId"];
            $this->streetAddress1 = $results[0]["fldStreetAddress1"];
            $this->streetAddress2 = $results[0]["fldStreetAddress2"];
            $this->city = $results[0]["fldCity"];
            $this->state = $results[0]["fldState"];
            $this->zipCode = $results[0]["fldZipCode"];
            $this->lastUpdated = $results[0]["fldLastUpdated"];
        }
    }

    //Getters
    public function getAddressId() {
        return $this->addressId;
    }

    public function getStreetAddress1() {
        return $this->streetAddress1;
    }

    public function getStreetAddress2() {
        return $this->streetAddress2;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    //#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#
    //
    //        Setters (Sanitize Data)
    //        
    //
    //****************** needs to be sanitized  *************************
    
    public function setAddressId($addressId) {
        $this->addressId = (int) $addressId;
    }

    public function setStreeAddress1($streetAddress1) {
        $this->streetAddress1 =  $streetAddress1;
    }

    public function setStreeAddress2($streetAddress2) {
        $this->streetAddress2 =  $streetAddress2;
    }

    public function setCity($city) {
        $this->city =  $addressId;
    }

    public function setState($state) {
        $this->state =  $state;
    }

    public function setZipCode($zipCode) {
        $this->zipCode =  $zipCode;
    }
    //!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!
    //
    //       Validate Data
    //
    //*  JACKIE IS MAKNG CHANGES *****
    
    public static function validateAddressId($addressId) {
        $error = "";
        if (!((int) $addresslId > 0)) {
            $error = "Address Id is not a valid number.";
        }
        return $error;
    }
    public static function validateCity($city) {
        $error = "";
        if (!empty($city)) {
            $error = "City can not be empty";
        }
        return $error;
    }
    public static function validateState($state) {
        $error = "";
        if (!empty($state)) {
            $error = "State can not be empty";
        }
        return $error;
    }
    public static function validateZip($zipCode) {
        $error = "";
        if (!empty($zipCode)) {
            $error = "Zipcode can not be empty";
        }
        return $error;
    }
    // *** need to validate city, state, zip?


}
