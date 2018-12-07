<?php
include 'lib/top.php';
include 'lib/nav.php';
$currentBills = array(
  array('Type' => 'Electricity','Cost' => 50,'Payer' => 'Connor'),
  array('Type' => 'Comcast','Cost' => 43,'Payer' => 'Sam'),
  array('Type' => 'Food','Cost' => 150,'Payer' => 'Aaron'));
$pendingBills = array(
  array('Type' => 'Pizza','Cost' => 50,'Payer' => 'Connor'),
  array('Type' => 'Rent','Cost' => 650,'Payer' => 'Sam'),
  array('Type' => 'alcohol','Cost' => 150,'Payer' => 'Sam'));
$previousBills = array(
  array('Type' => 'Electricity','Cost' => 50,'Payer' => 'Connor'),
  array('Type' => 'Comcast','Cost' => 43,'Payer' => 'Sam'),
  array('Type' => 'Food','Cost' => 150,'Payer' => 'Aaron'));

?>
<article id="bills">
<div class="currentBills">
<?php
print "<h3>Current Bills</h3><table>";
print "<tr><th>Description</th><th>Cost</th><th>Payer</th></tr>";
for($i = 0; $i <= 2; $i++){
  print "<tr><td>".$currentBills[$i]['Type'].'</td><td>$ '.$currentBills[$i]['Cost'].'</td><td>'.$currentBills[$i]['Payer']."</td></tr>";
}
print "</table>";
?>
</div>
<div class="pendingBills">
<?php
print "<h3>Pending Bills</h3><table>";
print "<tr><th>Description</th><th>Cost</th><th>Payer</th></tr>";
for($i = 0; $i <= 2; $i++){
  print "<tr><td>".$pendingBills[$i]['Type'].'</td><td>$ '.$pendingBills[$i]['Cost'].'</td><td>'.$pendingBills[$i]['Payer']."</td></tr>";
}
print "</table>";
?>
</div>
<div class="currentBills">
<?php
print "<h3>Previous Bills</h3><table>";
print "<tr><th>Description</th><th>Cost</th><th>Payer</th></tr>";
for($i = 0; $i <= 2; $i++){
  print "<tr><td>".$previousBills[$i]['Type'].'</td><td>$ '.$previousBills[$i]['Cost'].'</td><td>'.$previousBills[$i]['Payer']."</td></tr>";
}
print "</table>";
?>
</div>
<h3>Add Bills</h3>
<form action="bills.php">
  <table>
    <thead>
      <tr>
        <th> Description</th>
        <th>Cost</th>
        <th>Payer</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for($i = 0; $i <= 2; $i++){
        print '<tr><td><input>'. [$i]['Description'] . '</td><td><input>' . [$i]['Cost'] . '</input></td><td><input>' . [$i]['Payer'] . '</input></td></tr>';
      }
      ?>
      <tr>
        <td>
          <input type="submit" value="Submit">
        </td>
      </tr>
    </tbody>
  </table>
</form>
</article>
<?php
include 'lib/footer.php'
?>
