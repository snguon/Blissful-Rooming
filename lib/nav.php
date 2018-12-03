<!-- ######################     Main Navigation   ########################## -->
    <nav>
        <ul>
            <?php
            if ($PATH_PARTS['filename'] == "index") {
                print '<li class="activePage">Dashboard</li>';
            } else {
                print '<li><a href="index.php">Dashboard</a></li>';
            }
            if ($PATH_PARTS['filename'] == "bills") {
                print '<li class="activePage">Bills</li>';
            } else {
                print '<li><a href="bills.php">Bills</a></li>';
            }
            if ($PATH_PARTS['filename'] == "calendar") {
                print '<li class="activePage">Calendar</li>';
            } else {
                print '<li><a href="calendar.php">Calendar</a></li>';
            }
            if ($PATH_PARTS['filename'] == "messages") {
                print '<li class="activePage">Messages</li>';
            } else {
                print '<li><a href="messages.php">Messages</a></li>';
            }
            if ($PATH_PARTS['filename'] == "groceryList") {
                print '<li class="activePage">Grocery List</li>';
            } else {
                print '<li><a href="groceryList.php">Grocery List</a></li>';
            }
            if ($PATH_PARTS['filename'] == "chores") {
                print '<li class="activePage">Chores</li>';
            } else {
                print '<li><a href="chores.php">Chores</a></li>';
            }
            if ($PATH_PARTS['filename'] == "ious") {
                print '<li class="activePage">IOUs</li>';
            } else {
                print '<li><a href="ious.php">IOUs</a></li>';
            }
            ?>
          </ul>
        </nav>
<!-- #################### Ends Main Navigation    ########################## -->
