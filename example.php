<?php 
require 'IcalReader.php';
$ical   = new ICal('Hawks.ics');
$events = $ical->events();
$date = $events[0]['DTSTART'];
echo '<b>The ical date:</b> ';
echo $date;
echo "<br />\n";
echo '<b>The Unix timestamp:</b> ';
echo $ical->iCalDateToUnixTimestamp($date);
echo "<br />\n";
echo '<b>The number of events:</b> ';
echo $ical->event_count;
echo "<br />\n";
echo '<b>The number of todos:</b> ';
echo $ical->todo_count;
echo "<br />\n";
echo '<hr/><hr/>';


echo '<table cellspacing="1" cellpadding="1" border="0" width="900">';
echo '<thead>';
echo '<th>Time</th>';
echo '<th>Event</th>';
echo '<th>Room/Location</th>';
echo '</thead>';
$sortedEvents   = $ical->sortEventsWithOrder($events);
foreach ($sortedEvents as $event) {
    $unixTime  = date('Y-M-d H:i a', $ical->iCalDateToUnixTimestamp($event['DTSTART']));
    echo '<tr>';
    echo '<td>' . $unixTime . '</td>';
    echo '<td>' . @$event['SUMMARY'] . '</td>';
    echo '<td>' . @$event['LOCATION'] . '</td>';
    echo '</tr>';

    /*
    echo '<b>SUMMARY: </b>' . @$event['SUMMARY'] . "<br />\n";
    echo '<b>DTSTART: </b>' . $event['DTSTART'] . ' - UNIX-Time: ' . $ical->iCalDateToUnixTimestamp($event['DTSTART']) . "<br />\n";
    echo '<b>DTEND: </b>' . $event['DTEND'] . "<br />\n";
    echo '<b>DTSTAMP: </b>' . $event['DTSTAMP'] . "<br />\n";
    echo '<b>UID: </b>' . @$event['UID'] . "<br />\n";
    echo '<b>CREATED: </b>' . @$event['CREATED'] . "<br />\n";
    echo '<b>LAST-MODIFIED: </b>' . @$event['LAST-MODIFIED'] . "<br />\n";
    echo '<b>DESCRIPTION: </b>' . @$event['DESCRIPTION'] . "<br />\n";
    echo '<b>LOCATION: </b>' . @$event['LOCATION'] . "<br />\n";
    echo '<b>SEQUENCE: </b>' . @$event['SEQUENCE'] . "<br />\n";
    echo '<b>STATUS: </b>' . @$event['STATUS'] . "<br />\n";
    echo '<b>TRANSP: </b>' . @$event['TRANSP'] . "<br />\n";
    echo '<b>ORGANIZER: </b>' . @$event['ORGANIZER'] . "<br />\n";
    echo '<b>ATTENDEE(S): </b>' . @$event['ATTENDEE'] . "<br />\n";
    echo '<hr/>';
    */
}

?>