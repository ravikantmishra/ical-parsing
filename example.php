<?php
/* 
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
//echo '<b>The number of todos:</b> ';
//echo $ical->todo_count;
echo "<br />\n";
echo '<hr/><hr/>';


echo '<table cellspacing="1" cellpadding="1" border="0" width="900">';
echo '<thead>';
echo '<th>Time</th>';
echo '<th>Event/Summary</th>';
echo '<th>Room/Location</th>';
echo '</thead>';
$sortedEvents   = $ical->sortEventsWithOrder($events);
foreach ($sortedEvents as $event) {
    $unixTime  = date('Y-M-d h:i a', $ical->iCalDateToUnixTimestamp($event['DTSTART']));
    echo '<tr>';
    echo '<td>' . $unixTime . '</td>';
    echo '<td>' . @$event['SUMMARY'] . '</td>';
    echo '<td>' . @$event['LOCATION'] . '</td>';
    echo '</tr>';
}

echo '<tr><td colspan="3"><hr/><hr/></td></tr>';
echo '</table>';


echo '<table cellspacing="1" cellpadding="1" border="0" width="900">';
    echo '<tr>';
    echo '<td colspan="3"><b>Next Event</b></td>';
    echo '</tr>';
echo '<tr><td colspan="3"><hr/><hr/></td></tr>';

$upcomingEvents   = $ical->eventsFromRange(date('Y-m-d h:i:s'));
foreach ($upcomingEvents as $event) {
    $unixTime  = date('Y-M-d h:i a', $ical->iCalDateToUnixTimestamp($event['DTSTART']));
    echo '<tr>';
    echo '<td>' . $unixTime . '</td>';
    echo '<td>' . @$event['SUMMARY'] . '</td>';
    echo '<td>' . @$event['LOCATION'] . '</td>';
    echo '</tr>';
}

    echo '<tr><td colspan="3"></td></tr>';
    echo '<tr><td colspan="3"></td></tr>';
    echo '<tr><td colspan="3"></td></tr>';

    echo '<tr>';
    echo '<td><b>Commences</b></td>';
    echo '<td>'.date('Y-M-d h:i a', $ical->iCalDateToUnixTimestamp($upcomingEvents[0]['DTSTART'])).'</td>';
    echo '<td></td>';
    echo '</tr>';
echo '<tr><td colspan="3"><hr/><hr/></td></tr>';
echo '</table>';
<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en">
		<meta name="viewport" content="width=device-width"/>
		<!-- refresh page in every 60 seconds -->
		<meta http-equiv="refresh" content="60" />
		<title>Upcoming Event</title>
	</head>
	<body>

*/
?>

<html> 
    <head> 
         
    </head> 
    <body> 
       <table width="100%" align="center">
       	<tr>
       		<td>
       		<iframe id="theFrame" src="http://www.streamvision.com.au/strangerrichie/screen-two.php" style="width:100%;" frameborder="0">
</iframe>
</td>
       	</tr>
       </table> 
    </body> 
</html>




