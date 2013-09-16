<?php if ( is_plugin_active('event-organiser/event-organiser.php') ) :
  $events = eo_get_events();

  if($events):
    echo '<label for="eosw-eventid">Associate sponsors to event</label>';
    echo '<select id="eosw-eventid">';
    echo '<option value="-1">All</option>';
    foreach ($events as $event):

      //Check if all day, set format accordingly
      $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );

      printf(
        '<option value="%s">%s</option>',
        $event->ID,
        get_the_title($event->ID)
      );
    endforeach;
    echo '</select>';
  endif;
else:
  // Close the widget if the EO plugin is not active
  echo 'This widget requires that you activate the <a href="http://wp-event-organiser.com/" target="_blank">Event Organiser plugin</a>.';
endif; ?>
