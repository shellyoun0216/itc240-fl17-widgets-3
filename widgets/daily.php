<?php include 'includes/config.php'?>
<?php
if(isset($_GET['day']))
{//from the querystring
    $day = $_GET['day'];
    
}else{//from the system clock
    $day = date('l');
}
    
    
?>
<?php get_header()?>
<h3>Daily</h3>
<p>Current contents of the variable day: <?=$day?></p>
<p><a href="?day=Monday">Monday</a></p>
<p><a href="?day=Tuesday">Tuesday</a></p>
<p><a href="?day=Wednesday">Wednesday</a></p>
<p><a href="?day=Thursday">Thursday</a></p>
<p><a href="?day=Friday">Friday</a></p>
<p><a href="?day=Saturday">Saturday</a></p>
<p><a href="?day=Sunday">Sunday</a></p>


<?php get_footer()?>