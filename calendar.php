<?php
include 'lib/top.php';
include 'lib/nav.php';
$events = array(
  array('DateTime' => '12/7/18 1:10 PM', 'Description' => 'CS Fair'),
  array('DateTime' => '12/7/18 7:00 PM', 'Description' => 'Party'),
  array('DateTime' => '12/8/18 12:00 AM', 'Description' => 'Naked Bike Ride'),
  array('DateTime' => '12/9/18 8:00 PM', 'Description' => 'Wings and Football'));
  ?>
  <script type="text/javascript" src="js/calendar.js"></script>
  <body>
    <article id ="calendarPage">
    <div id="calendar-container">
      <div id="calendar-header">
        <span id="calendar-month-year"></span>
      </div>
      <div id="calendar-dates">
      </div>
    </div>
    <div id="calender-events">
      <table><tr><thead><th>Description</th><th>Date</th></thead></tr><tbody>
        <?php
        for($i = 0; $i <= 3; $i++){
          print '<tr><td>' . $events[$i]['Description'] . '</td><td>' . $events[$i]['DateTime'] . '</td></tr>';
        }
        ?>
      </tbody></table>
    </div>
  </article>
  </body>
  <?php
  include 'lib/footer.php';
  ?>
