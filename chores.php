<?php
include 'lib/top.php';
include 'lib/nav.php';
$currentChores = array(
  array('Chore' => 'Bathroom','Person' => 'Connor'),
  array('Chore' => 'Kitchen', 'Person' => 'Sam'),
  array('Chore' => 'Trash','Person' => 'Aaron'));
?>
<article id="choreList">
  <h3>Chore List</h3>
  <div class="chores">
    <form action="chores.php">
      <table>
        <thead>
          <tr>
            <th> Completed</th>
            <th>Chore</th>
            <th>Done By</th>
          </tr>
        </thead>
        <tbody>
          <?php
          for($i = 0; $i <= 2; $i++){
            print '<tr><td><input type="checkbox" name="'. $i .'" value="yes"> </td><td>' . $currentChores[$i]['Chore'] .'</td><td>'. $currentChores[$i]['Person'] . '</td></tr>';
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
include 'lib/footer.php';
?>
