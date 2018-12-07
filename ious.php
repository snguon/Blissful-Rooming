<?php
include 'lib/top.php';
include 'lib/nav.php';
$ious = array(
  array('Requested' => 'Connor','Payer' => 'Sam','Reason' => 'Coffee', 'Amount' => 20),
  array('Requested' => 'Sam','Payer' => 'Aaron','Reason' => 'Food', 'Amount' => 30),
  array('Requested' => 'Aaron','Payer' => 'Connor','Reason' => 'Booze', 'Amount' => 40));
?>
<article id="iousList">
  <div class="ious">
    <?php
    print '<h3>IOUs List</h3><table>';
    print '<tr><thead><th>Requested By</th><th>Payer</th><th>Reason</th><th>Amount</th></thead></tr><tbody>';
    for ($i = 0; $i <= 2; $i++) {
      print '<tr><td>'.$ious[$i]['Requested'].'</td><td>$ '.$ious[$i]['Payer'].'</td><td>'.$ious[$i]['Reason'].'</td><td>$ '.$ious[$i]['Amount'].'</td></tr>';
    }
    print '<tbody></table>';
    ?>
  </div>
</article>
<?php
include 'lib/footer.php';
?>
