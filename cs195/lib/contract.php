<?php

class Contract {

    private $PersonId; // Person who is the owner of the contract
    private $ProposalId; // Purposal Id number
    private $Title; // Title of the Contract
    private $Description; // Description of work to be completed
    private $DollarAmount; // Estimated cost of completing the contract
    private $FinalAmount; // Actual Cost of completing the contract
    private $DateSubmitted; // Date Submitted, auto generated
    private $Type; // Type of work to be completed in contract
    private $VotingClosing; // Closing date of voting indefinately, auto generated
    private $Approval; // Approval of work, determined by secretary or admin
    private $LastUpdated; // Date of edits being made, auto generated
    private $CommentId; // Comment Id number
    private $db; // Connection to the database
    private $results; // Shows array results from the database for debuging
    private $sql; // SQL statements used to get info from the database

    public function __construct($db, $ProposalId) {
        $this->db = $db;
        if (false) {
            $this->ProposalId = 1;
            $this->Title = "";
            $this->Description = "";
            $this->DollarAmount = 0;
            $this->FinalAmount = "";
            $this->DateSubmitted = "";
            $this->Type = "";
            $this->mapAlt = "";
        } else {
            $sql = "SELECT fldTitle, fldDescription, fldDollarAmount, fldFinalAmount, fldDateSubmitted, pmkCommentId, ";
            $sql .= "fldDateUpdated, fldType, fldVotingClosed, fldApproved, pmkProposalId, pmkPersonId ";
            $sql .= "FROM `tblProposal` ";
            $sql .= "JOIN tblPersonProposal on pmkProposalId = fnkProposalId ";
            $sql .= "JOIN tblPerson ON pmkPersonId = fnkPersonId ";
            $sql .= "JOIN tblProposalComment ON pmkProposalId = tblProposalComment.fnkProposalId ";
            $sql .= "WHERE pmkProposalId = ?";
            $data = array($ProposalId);
            $results = $this->db->select($sql, $data, 1, 0, 0);

            /*      Debugging Purposes Only     */
            $this->sql = $sql;
            $this->results = $results;

            $this->CommentId = $results[0]["pmkCommentId"];
            $this->PersonId = $results[0]["pmkPersonId"];
            $this->ProposalId = $results[0]["pmkProposalId"];
            $this->Title = $results[0]["fldTitle"];
            $this->Description = $results[0]["fldDescription"];
            $this->DollarAmount = $results[0]["fldDollarAmount"];
            $this->FinalAmount = $results[0]["fldFinalAmount"];
            $this->DateSubmitted = $results[0]["fldDateSubmitted"];
            $this->LastUpdated = $results[0]["fldDateUpdated"];
            $this->Type = $results[0]["fldType"];
            $this->VotingClosing = $results[0]["fldVotingClosed"];
            $this->Approval = $results[0]["fldApproved"];
        }
    }

    /* \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

    // Getter Functions
    public function getPersonId() {
        return $this->PersonId;
    }

    public function getPurposalId() {
        return $this->ProposalId;
    }

    public function getCommentId() {
        return $this->CommentId;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getDollarAmount() {
        return $this->DollarAmount;
    }

    public function getFinalAmount() {
        return $this->FinalAmount;
    }

    public function getDateSubmitted() {
        return $this->DateSubmitted;
    }

    public function getType() {
        return $this->Type;
    }

    public function getVotingClosing() {
        return $this->VotingClosing;
    }

    public function getApproval() {
        return $this->Approval;
    }

    public function getLastUpdated() {
        return $this->LastUpdated;
    }

    public function getSQL() {
        return $this->sql;
    }

    public function getResults() {
        return $this->results;
    }

    /* \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

    // Setter Functions

    public function setPersonId($PersonId) {
        $this->PersonId = $PersonId;
    }

    public function setPurposalId($PurposalId) {
        $this->PurposalId = $PurposalId;
    }

    public function setTitle($Title) {
        $this->Title = $Title;
    }

    public function setDescription($Description) {
        $this->Description = $Description;
    }

    public function setDollarAmount($DollarAmount) {
        $this->DollarAmount = $DollarAmount;
    }

    public function setFinalAmount($FinalAmount) {
        $this->FinalAmount = $FinalAmount;
    }

    public function setDateSubmitted($DateSubmitted) {
        $this->DateSubmitted = $DateSubmitted;
    }

    public function setType($Type) {
        $this->Type = $Type;
    }

    public function setVotingClosing($VotingClosing) {
        $this->VotingClosing = $VotingClosing;
    }

    public function setApproval($Approval) {
        $this->Approval = $Approval;
    }

    public function setLastUpdated($LastUpdated) {
        $this->LastUpdated = $LastUpdated;
    }

    /* \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

    // Validation for Setter Methods

    public static function validatePersonId($PersonId) {
        $error = "";
        if (!((int) $PersonId > 0)) {
            $error = "Person Id is not a valid number.";
        }

        return $error;
    }

    public static function validatePurposalId($PurposalId) {
        $error = "";
        if (!((int) $PurposalId > 0)) {
            $error = "Purposal Id in not a valid number.";
        }

        return $error;
    }

    public static function validateTitle($Title) {
        $error = "";
        if (!(empty($Title))) {
            $error = "Title cannot be empty.";
        }

        return $error;
    }

    public static function validateDescription($Description) {
        $error = "";
        if (!empty($Description)) {
            $error = "You must enter a description of the contract work to be carried out.";
        }

        return $error;
    }

    public static function validateDollarAmount($DollarAmount) {
        $error = "";
        if (!((int) $DollarAmount < 0)) {
            $error = "You must enter a estimated dollar amount.";
        }

        return $error;
    }

    public static function validateFinalAmount($FinalAmount) {
        $error = "";
        if (!((int) $FinalAmount)) {
            $error = "You must enter the exact amount of the contract.";
        }

        return $error;
    }

    public static function validateDateSubmitted($DateSubmitted) {
        $error = "";
        if (!empty($DateSubmitted)) {
            $error = "You must enter the current day.";
        }

        return $error;
    }

    public static function validateType($Type) {
        $error = "";
        if (!(empty($Type))) {
            $error = "Please enter the type of work being done.";
        }

        return $error;
    }

    public static function validateVotingClosing($VotingClosing) {
        $error = "";
        if (!(empty($VotingClosing))) {
            $error = "Voting time period could not be set.";
        }

        return $error;
    }

    public static function validateApproval($Approval) {
        $error = "";
        if ($Approval != 1 or $Appoval != 0) {
            $error = "No action carried out, not approved";
        }

        return $error;
    }

    public static function validateLastUpdated($LastUpdated) {
        $error = "";
        if (!(empty($LastUpdated))) {
            $error = "Could not update the time log.";
        }

        return $error;
    }

    /* \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

    // Save to the database
    public function savePurposal() {
        $data = array($this->Title, $this->Description, $this->DollarAmount, $this->FinalAmount, $this->DateSubmitted, $this->LastUpdated, $this->Type, $this->VotingClosing);

        if ($PurposalId == NEW_PURPOSAL) {
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
