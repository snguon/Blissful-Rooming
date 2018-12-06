<?php
include 'lib/top.php';
include 'lib/nav.php';
$users = array(array('Name' => 'Connor', 'Photo'=> 'media/Connor.jpg'),array('Name' => 'Sam', 'Photo'=> 'media/Sam.jpg'),array('Name' => 'Aaron', 'Photo'=> 'media/Aaron.jpg'))
$messages = array(array('ID' => 1 'Name' => 'Connor', 'message'=> "Hey I was thinking, the messages pages needs to be built."), array('ID' => 2 'Name' => 'Sam', 'message'=> 'Hey do you have the money for the food I got yesterday?'),array('ID' => 3 'Name' => 'Connor', 'message'=> "Yeah, I'll send it your way if we get this pay system working"));
// array('ID' => 4 'Name' => 'Sam', 'message'=> "Yeah, I'm working on that... slowly, but it might be working soon"),
// array('ID' => 5 'Name' => 'Sam', 'message'=> 'and... I have to work on 275 right now, sorry'),
// array('ID' => 6 'Name' => 'Aaron', 'message'=> 'You guys want a drink?'),
// array('ID' => 7 'Name' => 'Sam', 'message'=> 'I could go for several right now. XD'));


?>
<article id="message_wrapper">
  <div id="people_container">
    <?php
    for($i = 0; $i <= 2; $i++){
      print '<div id="personCard"><img src="' . $users[$i]['Photo']. '" alt = "' . $user[$i]['Name'].' portait"> '. $users[$i]['Name'] .'</div>';
    }
     ?>
  </div>
  <div id="messages_container">
    <?php
    for($i = 0; $i <= 1; $i++){
      //print '<p><img src="media/' . $message[$i]['Name']. '" alt = "' . $messages[$i]['Name'].'"> ' . $messages[$i]['message'] . '</p>'
    }
    ?>
  </div>
</article>

<?php
include 'lib/footer.php';
