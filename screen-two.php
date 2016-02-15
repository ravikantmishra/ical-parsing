		<table cellspacing="1" cellpadding="1" border="0" style="width:720px;height:1280" align="center">
			<thead>
				<th colspan="3" colspan="center" height="80" style="font-size:22px">Next Event</th>
			</thead>
	
	<?php 
	require 'IcalReader.php';
	$ical   	= new ICal();
	
	//Either pass filename from url eg [...... screen-two.php?file=xyz.ics] or directly put here
	$filename	= isset($_GET['file']) ? trim($_GET['file']) : 'Auditorium.ics';  
	$events 	= $ical->getEventsByFileName('ics-files/' . $filename);
	
	$endDate		= date('Y-m-d').' 23:59';
	$upcomingEvents = $ical->eventsFromRange(date('Y-m-d h:i'), $endDate);
	if(count($upcomingEvents)){
		$unixTime  = date('h:i a', $ical->iCalDateToUnixTimestamp($upcomingEvents[0]['DTSTART']));
	
		echo '<tr>';
	    echo '<td height="100">' . $unixTime . '</td>';
	    echo '<td>' . @$upcomingEvents[0]['SUMMARY'] . '</td>';
	    echo '<td>' . @$upcomingEvents[0]['LOCATION'] . '</td>';
	    echo '</tr>';
	
	    echo '<tr>';
	    echo '<td colspan="3"><b>Commences in </b>' .$ical->dateDiff(date('Y-m-d H:i:s'), $unixTime).'</td>';
	    echo '</tr>';
	}else{
		echo '<tr>';
		echo '<td colspan="3" align="center">No events found.</td>';
		echo '</tr>';
	}
	?>
		</table>