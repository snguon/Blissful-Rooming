<?php
include 'lib/top.php';
include 'lib/nav.php';
$groceries = array(array('Food' => 'Coffee','Payer' => 'Connor'),array('Food' => 'Pizza', 'Payer' => 'Sam'),array('Food' => 'Beer','Payer' => 'Aaron'));
$currentBills = array(array('Type' => 'Electricity','Cost' => 50,'Payer' => 'Connor'),array('Type' => 'Comcast','Cost' => 43,'Payer' => 'Sam'),array('Type' => 'Food','Cost' => 150,'Payer' => 'Aaron'));
$pendingBills = array(array('Type' => 'Pizza','Cost' => 50,'Payer' => 'Connor'));
?>

<article id="dashboard">
<div class="groceriesDash">
<table>
<h3>Grocery List</h3><table>
<tr><th>Requested Groceries</th><th>Requested By</th></tr>

<?php
for($i = 0; $i <= 2; $i++){
  print '<tr><td>' . $groceries[$i]['Food'] .'</td><td>'. $groceries[$i]['Payer'] . '</td></tr>';
}
?>

</table>
</div>
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
print "<tr><td>".$pendingBills[0]['Type'].'</td><td>$ '.$pendingBills[0]['Cost'].'</td><td>'.$pendingBills[0]['Payer']."</td></tr>";
print "</table>";
?>

</div>
</article>
<?php
include 'lib/footer.php';
?>
