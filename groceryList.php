<?php
include 'lib/top.php';
include 'lib/nav.php';
$groceries = array(array('Food' => 'Coffee','Payer' => 'Connor'),array('Food' => 'Pizza', 'Payer' => 'Sam'),array('Food' => 'Beer','Payer' => 'Aaron'));
?>
<article id="groceryList">
  <div class="groceries">
    <form action="groceryList.php">
      <h3>Grocery List</h3>
      <h5>Requested Groceries</h5><h5>Requested By</h5>
      <?php
      for($i = 0; $i <= 2; $i++){
        print '<input type="checkbox" name="'. $i .'" value="yes"> ' . $groceries[$i]['Food'] .' '. $groceries[$i]['Payer'] . '<br>';
      }
      ?>
      <input type="submit" value="Submit">
    </form>
  </div>
</article>
<?php
include 'lib/footer.php'
?>
