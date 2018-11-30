<?php
$date = time();
$_POST['date'] = date("Y-m-d", $data);
?>
<form action="proposal.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="radProceed" value="Load">
    <fieldset>
        <label>Title:</label>
        <input type="text" name="fldTitle" value="" placeholder="Title"><br>
        <label>Description:</label>
        <textarea name="fldDescription" rows="10" cols="30">Please write a description here</textarea><br>
        <label>Dollar Amount:</label>
        <input type="text" name="fldDollarAmount" value="" placeholder="Dollar Amount"><br>
        <label>Type:</label>
        <input type="radio" name="radType" value="Road Maintence" checked> Road Maintence<br>
        <input type="radio" name="radType" value="Snow Plowing"> Snow Plowing<br>
        <input type="radio" name="radType" value="Road Repair"> Road Repair<br>
        <input type="radio" name="radType" value="Planned Maintence" > Planned Maintence<br>
        <input type="radio" name="radType" value="Emergency Repair" > Emergency Repair<br>
        <input type="submit" name="btnSave" value="Submit">
        <br><br>
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload" name="btnUpload">
    </fieldset>
</form>
