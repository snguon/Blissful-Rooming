<?php
// Code written by Aaron Longchamp
// Billing Class

// Functions to write
//

class Billing_Class {
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  // initialize variables

  private $parcel_id;
  private $bill_id;
  private $contract_id;
  private $person_id;
  private $date_paid;
  private $date_recieved;
  private $check_number;
  private $notes;
  private $last_updated;
  private $db;

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  // Main function

  public function __construct($db,$person_id) {
    $this->db = $db;
    if (false) {
      $this->parcel_id = 1;
      $this->bill_id = 1;
      $this->contract_id = 1;
      $this->person_id = 1;
      $this->date_paid = "";
      $this->date_recieved = "";
      $this->check_number = 0;
      $this->notes = "";
      $this->last_updated = "";
    } else {
      $sql = "SELECT `fnkParcelId`, `fnkBillId`, `fnkContractId`, `fnkPersonId`, `pmkDatePaid`, `fldDateRecieved`, `fldAmountPaid`, `fldCheckNumber`, `fldNotes`, `fldLastUpdated` ";
      $sql .= "FROM tblParcelBill ";
      $sql .= "WHERE fnkPersonId = ? ";
      $results = $this->db->select($sql, array($person_id), 1, 0, 0);

      /*
      print'<pre>';
      print_r($results);
      */

      $this->parcel_id = $results[0]["fnkParcelId"];
      $this->bill_id = $results[0]["fnkBillId"];
      $this->contract_id = $results[0]["fnkContractId"];
      $this->person_id = $results[0]["fnkPersonId"];
      $this->date_paid = $results[0]["fldDatePaid"];
      $this->date_recieved = $results[0]["fldDateRecieved"];
      $this->check_number = $results[0]["fldCheckNumber"];
      $this->notes = $results[0]["fldNotes"];
      $this->last_updated = $results[0]["fldLastUpdated"];
  }
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  // Getters

  public function getParcelId() {
    return $this->parcel_id;
  }

  public function getBillId() {
    return $this->bill_id;
  }

  public function getContractId() {
    return $this->contract_id;
  }

  public function getPersonId() {
    return $this->person_id;
  }

  public function getDatePaid() {
    return $this->date_paid;
  }

  public function getDateRecieved() {
    return $this->date_recieved;
  }

  public function getCheckNumber() {
    return $this->check_number;
  }

  public function getNotes() {
    return $this->notes;
  }

  public function getLastUpdated() {
    return $this->last_updated;
  }

  public function getSQL() {
    return $this->sql;
  }

  public function getResults() {
    return $this->results;
  }

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  // Setters

  public function setParcelId() {
    $this->parcel_id = $parcel_id;
  }

  public function setBillId() {
    $this->bill_id = $bill_id;
  }

  public function setContractId() {
    $this->contract_id = $contract_id;
  }

  public function setPersonId() {
    $this->person_id = $person_id;
  }

  public function setDatePaid() {
    $this->date_paid = $date_paid;
  }

  public function setDateRecieved() {
    $this->date_recieved = $date_recieved;
  }

  public function setCheckNumber() {
    $this->check_number = $check_number;
  }

  public function setNotes() {
    $this->notes = $notes;
  }

  public function setLastUpdated() {
    $this->last_updated = $last_updated;
  }

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
  // Validation


  public static function validateParcelId($parcel_id) {
    $error = "";
    if (!((int) $parcel_id > 0)) {
        $error = "Parcel Id is not a valid number.";
    }
    return $error;
  }

  public static function validateBillId($bill_id) {
    $error = "";
    if (!((int) $bill_id > 0)) {
        $error = "Bill Id is not a valid number.";
    }
    return $error;
  }

  public static function validateContractId($contract_id) {
    $error = "";
    if (!((int) $contract_id > 0)) {
        $error = "Contract Id is not a valid number.";
    }
    return $error;
  }

  public static function validatePersonId($person_id) {
    $error = "";
    if (!((int) $person_id > 0)) {
        $error = "Person Id is not a valid number.";
    }
    return $error;
  }

  public static function validateDatePaid($date_paid) {
    $error = "";
    if (!empty($date_paid)) {
        $error = "You must enter the date paid.";
    }
    return $error;
  }

  public static function validateDateRecieved($date_recieved) {
    $error = "";
    if (!empty($date_paid)) {
        $error = "You must enter the date recieved.";
    }
    return $error;
  }

  public static function validateCheckNumber($check_number) {
    $error = "";
    if (!((int) $check_number > 0)) {
        $error = "Check Number is not a valid number.";
    }
    return $error;
  }

  public static function validateNotes($notes) {
    $error = "";
    if (!empty($Description)) {
        $error = "Notes cannot be left empty.";
    }
    return $error;
  }

  public static function validateLastUpdated($last_updated) {
    $error = "";
    if (!empty($last_updated)) {
        $error = "You must enter the date last updated.";
    }
    return $error;
  }

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
}
