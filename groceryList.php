<?php
include 'lib/top.php';
include 'lib/nav.php';
$groceries = array(
  array('Food' => 'Coffee','Payer' => 'Connor'),
  array('Food' => 'Pizza', 'Payer' => 'Sam'),
  array('Food' => 'Beer','Payer' => 'Aaron'));
  ?>
  <article id="groceryList">
    <div class="groceries">
      <form action="groceryList.php">
        <table>
          <thead>
            <tr>
              <th> Picked Up</th>
              <th>Requested Groceries</th>
              <th>Requested By</th>
            </tr>
          </thead>
          <tbody>
            <?php
            for($i = 0; $i <= 2; $i++){
              print '<tr><td><input type="checkbox" name="'. $i .'" value="yes"> </td><td>' . $groceries[$i]['Food'] .'</td><td>'. $groceries[$i]['Payer'] . '</td></tr>';
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
    </div>
  </article>
  <?php
  include 'lib/footer.php'
  ?>
