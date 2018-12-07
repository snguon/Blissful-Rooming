<?php
include 'lib/top.php';
include 'lib/nav.php';
$users = array(
  array('Name' => 'Connor', 'Photo'=> 'media/Connor.jpg'),
array('Name' => 'Sam', 'Photo'=> 'media/Sam.jpg'),
array('Name' => 'Aaron', 'Photo'=> 'media/Aaron.jpg'));
$messages = array(
  array('Name' => 'Connor', 'message'=> 'Hey I was thinking, the messages pages needs to be built.'),
  array('Name' => 'Sam', 'message'=> 'Hey do you have the money for the food I got yesterday?'),
  array('Name' => 'Connor', 'message'=> 'Yeah, Ill send it your way if we get this pay system working'),
  array('Name' => 'Sam', 'message'=> 'Yeah, Im working on that... slowly, but it might be working soon'),
  array('Name' => 'Sam', 'message'=> 'and... I have to work on 275 right now, sorry'),
  array('Name' => 'Aaron', 'message'=> 'You guys want a drink?'),
  array('Name' => 'Sam', 'message'=> 'I could go for several right now. XD'));


  ?>
  <article id="message_wrapper">
    <div id="people_container">
      <table>
        <tr id="personCard">
          <?php
          for($i = 0; $i <= 2; $i++){
            print '<td><img src="' . $users[$i]['Photo']. '" alt = "' . $users[$i]['Name'].' portait"></td><td> '. $users[$i]['Name'] .'</td>';
          }
          ?>
        </tr>
      </table>
    </div>
    <div id="messages_container">
      <table>
        <?php
        for($i = 0; $i <= 6; $i++){
          if($userName == $messages[$i]['Name']){
            print '<tr class="currentUser"><td><img src="media/' . $messages[$i]['Name']. '.jpg" alt = "' . $messages[$i]['Name'].'"></td><td>' . $messages[$i]['message'] . '</td></tr>';
          } else {
            print '<tr><td><img src="media/' . $messages[$i]['Name']. '.jpg" alt = "' . $messages[$i]['Name'].'"></td><td>' . $messages[$i]['message'] . '</td></tr>';

          }
        }
          ?>
        </table>
      </div>
    </article>

    <?php
    include 'lib/footer.php';
