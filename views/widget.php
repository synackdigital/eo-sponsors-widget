<?php
  // Check if we are on the selected event
  if ( 'event' == get_post_type() && $eventid == get_the_ID() ) :
    echo $html;
  endif;
?>
