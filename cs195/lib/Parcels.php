<?php

// This class is for all the parcel property.
// standard getters
// used for display of data

class Parcels {

    private $parcelId = array(); // Parcel identification number (auto)
    private $townParcelId = array(); //Parcel identification number (town)
    private $taxYear = array(); // last year assessed by town
    private $assessedValue = array(); // last town assessed value
    private $lastUpdated = array(); // time stamp record last updated
    //public $db; // connection to database

    public function __construct($db, $sortOrder) {
        $this->db = $db;
        $sql = "SELECT pmkParcelId, fldTownParcelId, fldTaxYear, ";
        $sql .= "fldAssessedValue, fldLastUpdated FROM tblParcel ";
        $sql .= "ORDER BY " . $sortOrder;

        $data = "";

        $results = $this->db->select($sql, $data, 0, 1, 0, 0);
        
        if ($results) {
            foreach ($results as $row) {
                $this->parcelId[] = $row["pmkParcelId"];
                $this->townParcelId[] = $row["fldTownParcelId"];
                $this->taxYear[] = $row["fldTaxYear"];
                $this->assessedValue[] = $row["fldAssessedValue"];
                $this->lastUpdated[] = $row["fldLastUpdated"];
            }
        } else {
            $this->parcelId[] = -1;
            $this->townParcelId[] = "";
            $this->taxYear[] = date("Y");
            $this->assessedValue[] = 0;
            $this->lastUpdated[] = strtotime(date("Y-m-d"));
        }
    }

//    public function __toString() {
//        return $s . "\n";
//    }

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

    public function getLastUpdated() {
        return $this->lastUpdated;
    }

    /*
      public function setParcelId($parcelId) {
      $this->parcelId = $parcelId;
      }

      public function setTownParcelId($townParcelId) {
      $this->taxYear = $townParcelId;
      }

      public function setTaxYear($taxYear) {
      $this->taxYear = $taxYear;
      }

      public function setAssessedValue($assessedValue) {
      $this->taxYear = $assessedValue;
      }

      public function setLastUpdated($lastUpdated) {
      $this->taxYear = $lastUpdated;
      }

      public static function validateParcelId($parcelId) {
      $error = "";
      if (!((int) $parcelId > 0)) {
      $error = "Parcel Id is not a valid number.";
      }

      return $error;
      }
     */
}
?>

