<?php

// This class is for an individual person, they may or may not be a 
// property owner but are interested party in some fashion
// standard setters and getters
// valdiates informmation for correctness
// saves data (new or updates)
// 

class Person {

    private $personId; // Persons identification number (auto)
    private $firstName;
    private $lastName;
    private $email; // username, system requires an email address other places allow for additional contact information
    private $passWord; // password for loggin in may replace with a prebuilt setup
    private $permissionLevel; // 0 guest, 3 general user, 5 admin, 7 super user
    private $lastUpdated; // time stamp record last updated
    private $db; // connection to database
    private $address = array();
    private $contact = array();

    const NEW_PERSON = -1;

    public function __construct($db, $personId = self::NEW_PERSON) {
        $this->db = $db;
        if ($personId == self::NEW_PERSON) {
            $this->personId = self::NEW_PERSON;
            $this->firstName = "";
            $this->lastName = "";
            $this->email = "";
            $this->passWord = "";
            $this->permissionLevel = 0;
            $this->lastUpdated = "";
        } else {
            $sql = "SELECT pmkPersonId, fldFirstName, fldLastName, ";
            $sql .= "fldEmail, fldPassWord, fldPermissionLevel, ";
            $sql .= "fldLastUpdated ";
            $sql .= "FROM tblPerson ";
            $sql .= "WHERE pmkPersonId = ?";
            $data = array($personId);
            $results = $this->db->select($sql, $data, 1, 0);

            $i = -1;
            if ($results) {
                $this->personId = $results[0]["pmkPersonId"];
                $this->firstName = $results[0]["fldFirstName"];
                $this->lastName = $results[0]["fldLastName"];
                $this->email = $results[0]["fldEmail"];
                $this->passWord = $results[0]["fldPassWord"];
                $this->permissionLevel = $results[0]["fldPermissionLevel"];
                $this->lastUpdated = $results[0]["fldLastUpdated"];

                // get address
                $sql = "SELECT pmkAddressId, fldStreetAddress1, fldStreetAddress2, fldCity, fldState, fldZipCode, tblAddress.fldLastUpdated as addressLastUpdated, ";
                $sql .= "fldType, tblPersonAddress.fldLastUpdated as  personAddressLastUpdated ";
                $sql .= "FROM tblAddress ";
                $sql .= "LEFT JOIN tblPersonAddress ";
                $sql .= "ON pmkAddressId = fnkAddressId ";
                $sql .= "WHERE fnkPersonId = ?";

                $addressResults = $this->db->select($sql, $data, 1, 0);
                if ($addressResults) {
                    foreach ($addressResults as $row) {
                        $i++;
                        $this->address[$i]['addressId'] = $row["pmkAddressId"];
                        $this->address[$i]['streetAddress1'] = $row["fldStreetAddress1"];
                        $this->address[$i]['streetAddress2'] = $row["fldStreetAddress2"];
                        $this->address[$i]['city'] = $row["fldCity"];
                        $this->address[$i]['state'] = $row["fldState"];
                        $this->address[$i]['zipCode'] = $row["fldZipCode"];
                        $this->address[$i]['addressLastUpdated'] = $row["addressLastUpdated"];

                        $this->address[$i]['addressType'] = $row["fldType"];
                        $this->address[$i]['personAddressLastUpdated'] = $row["personAddressLastUpdated"];
                    } // end for each for address
                } // ends $addressResults
                // get contacts
                $sql = "SELECT pmkContactId, fldContact, fldType, tblContact.fldLastUpdated as contactLastUpdated, ";
                $sql .= "tblPersonContact.fldLastUpdated as personContactLastUpdated ";
                $sql .= "FROM tblContact ";
                $sql .= "LEFT JOIN tblPersonContact ";
                $sql .= "ON pmkContactId = fnkContactId ";
                $sql .= "WHERE fnkPersonId = ? ";
                $sql .= "ORDER BY fldOrder";

                $contactResults = $this->db->select($sql, $data, 1, 1);
                if ($contactResults) {
                    foreach ($contactResults as $row) {
                        $i++;
                        $this->contact[$i]['contactId'] = $row["pmkContactId"];
                        $this->contact[$i]['contact'] = $row["fldContact"];
                        $this->contact[$i]['type'] = $row["fldType"];
                        $this->contact[$i]['contactLastUpdated'] = $row["contactLastUpdated"];
                        $this->contact[$i]['personContactLastUpdated'] = $row["personContactLastUpdated"];
                    } // end for each for contact
                } // ends $contactResults
            } // ends if $results
        } // ends if new or exisiting record
    }

// ends constructor
//    public function __toString() {
//        return $s . "\n";
//    }
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
//
    //        Getters
//

    public function getPersonId() {
        return $this->personId;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassWord() {
        return $this->passWord;
    }

    public function getPermissionLevel() {
        return $this->permissionLevel;
    }

    public function getLastUpdated() {
        return $this->lastUpdated;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getContact() {
        return $this->contact;
    }

//#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#$#
//
//        Setters (Sanitize Data)
//

    public function setPersonId($personId) {
        $this->personId = $personId;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassWord($passWord) {
        $this->passWord = $passWord;
    }

    public function setPermissionLevel($permissionLevel) {
        $this->permissionLevel = $permissionLevel;
    }

    public function setLastUpdated($lastUpdated) {
        $this->taxYear = $lastUpdated;
    }

//!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!
//
    //       Validate Data
//

    public static function validatePersonId($personId) {
        $error = "";
        if (!((int) $personId > 0)) {
            $error = "Person Id is not a valid number.";
        }

        return $error;
    }

    public static function validateFirstName($firstName) {
        $error = "";
        if (!empty($firstName)) {
            $error = "Please enter your first name.";
        } elseif (!preg_match("/^([[:alnum:]]|-|\.| |')+$/", $firstName)) {
// Check for letters, numbers and dash, period, space and single quotes only.
            $error = "Your first name appears to have invalid character.";
        }
        return $error;
    }

    public static function validateLastName($lastName) {
        $error = "";
        if (!empty($lastName)) {
            $error = "Please enter your last name.";
        } elseif (!preg_match("/^([[:alnum:]]|-|\.| |')+$/", $lastName)) {
// Check for letters, numbers and dash, period, space and single quotes only.
            $error = "Your last name appears to have invalid character.";
        }

        return $error;
    }

    public static function validateEmail($email) {
        $error = "";
        if (!empty($email)) {
            $error = "Please enter your email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Your email address appears to be incorrect.";
        }

        return $error;
    }

    public static function validatePassWord($passWord) {
        $error = "";
        if (!empty($passWord)) {
            $error = "You must enter a password.";
        } elseif (strlen($passWord) <= '8') {
            $passwordErr = "Your password must contain at least 8 characters.";
        } elseif (!preg_match("#[0-9]+#", $passWord)) {
            $passwordErr = "Your password must contain at least 1 number.";
        } elseif (!preg_match("#[A-Z]+#", $passWord)) {
            $passwordErr = "Your password must contain at least 1 capital letter.";
        } elseif (!preg_match("#[a-z]+#", $passWord)) {
            $passwordErr = "Your password must contain at least 1 lowercase letter.";
        }

        return $error;
    }

    public static function validatePermissionLevel($permissionLevel) {
        $error = "";

        if (!empty($permissionLevel)) {
            $error = "You must have a permission level for this person.";
        } elseif (($permissionLevel % 2) == 0) {
            $error = "Permission levels must be 0, 3, 5 or 7.";
        } elseif ($permissionLevel < 0 OR $permissionLevel > 7) {
            $error = "Permission levels must be 0, 3, 5 or 7.";
        }
        return $error;
    }

//!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!@!
//
    //       Save Data
//

    public function savePerson() {
        $data = array($this->firstName, $this->lastName, $this->email, $this->passWord, $this->permissionLevel);

        if ($parcelId == NEW_PARCEL) {
            $sql = "INSERT INTO tblPerson SET ";
            $sql .= "fldFirstName = ?, ";
            $sql .= "fldLastName = ?, ";
            $sql .= "fldEmail = ?, ";
            $sql .= "fldPassWord = ?, ";
            $sql .= "fldPermissionLevel = ?";
            $results = $this->db->insert($sql, $data);
            $this->setPersonId($this->db->lastInsert());
        } else {
            $sql = "UPDATE tblPerson SET ";
            $sql .= "fldFirstName = ?, ";
            $sql .= "fldLastName = ?, ";
            $sql .= "fldEmail = ?, ";
            $sql .= "fldPassWord = ?, ";
            $sql .= "fldPermissionLevel = ? ";
            $sql .= "WHERE pmkPersonId = ?";
            $data[] = $this->personId;

            $results = $this->db->update($sql, $data);
        }
    }

}
?>

