<?php
// Check if EO plugin is active
if ( is_plugin_active('event-organiser/event-organiser.php') ) :

  // Check if we have events
  $events = eo_get_events();
  if($events):

    // Events
    echo '<p>';
    echo '<label for="' . $this->get_field_id( 'eventid' ) . '">' . __('Associate with event', 'eosw') . '</label>';
    echo '<select class="widefat" id="' . $this->get_field_id( 'eventid' ) . '" name="' . $this->get_field_name( 'eventid' ) . '">';
    echo '<option value="-1">All</option>';
    foreach ($events as $event):

      // Check if all day, set format accordingly
      $format = ( eo_is_all_day($event->ID) ? get_option('date_format') : get_option('date_format').' '.get_option('time_format') );

      // Check if current event is selected
      $selected = ($event->ID == $eventid) ? 'selected' : '';

      printf(
        '<option value="%s" %s>%s</option>',
        $event->ID,
        $selected,
        get_the_title($event->ID)
      );
    endforeach;
    echo '</select>';
    echo '</p>';

    // Sponsors HTML
    // TODO: Real add/remove
    echo '<p>';
    echo '<label for="' . $this->get_field_id( 'html' ) . '">' . __('HTML content', 'eosw') . '</label>';
    echo '<textarea class="widefat" rows="16" cols="20" id="' . $this->get_field_id( 'html' ) . '" name="' . $this->get_field_name( 'html' ) . '">' . $html . '</textarea>';
    echo '</p>';

  endif;

// Close the widget if the EO plugin is not active
else :
  echo 'This widget requires that you activate the <a href="http://wp-event-organiser.com/" target="_blank">Event Organiser plugin</a>.';
endif;
?>
