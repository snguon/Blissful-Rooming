<!-- ######################     Main Navigation   ########################## -->
    <table id="nav">
        <tr id="nav_tr">
            <?php
            if ($PATH_PARTS['filename'] == "index") {
                print '<td class="activePage">Dashboard</td>';
            } else {
                print '<td><a href="index.php">Dashboard</a></td>';
            }
            if ($PATH_PARTS['filename'] == "bills") {
                print '<td class="activePage">Bills</td>';
            } else {
                print '<td><a href="bills.php">Bills</a></td>';
            }
            if ($PATH_PARTS['filename'] == "calendar") {
                print '<td class="activePage">Calendar</td>';
            } else {
                print '<td><a href="calendar.php">Calendar</a></td>';
            }
            if ($PATH_PARTS['filename'] == "messages") {
                print '<td class="activePage">Messages</td>';
            } else {
                print '<td><a href="messages.php">Messages</a></td>';
            }
            if ($PATH_PARTS['filename'] == "groceryList") {
                print '<td class="activePage">Grocery List</td>';
            } else {
                print '<td><a href="groceryList.php">Grocery List</a></td>';
            }
            if ($PATH_PARTS['filename'] == "chores") {
                print '<td class="activePage">Chores</td>';
            } else {
                print '<td><a href="chores.php">Chores</a></td>';
            }
            if ($PATH_PARTS['filename'] == "ious") {
                print '<td class="activePage">IOUs</td>';
            } else {
                print '<td><a href="ious.php">IOUs</a></td>';
            }
            ?>
          </tr>
        </table>
<!-- #################### Ends Main Navigation    ########################## -->
