<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en">
		<!-- refresh page in every 60 seconds 
		<meta http-equiv="refresh" content="60" /> -->
		<title>Upcoming Event</title>
	</head>
	<body>

		<table cellspacing="1" cellpadding="1" border="0" style="width:720px;height:1280" align="center">
			<thead>
				<th colspan="3" colspan="center" height="80" style="font-size:22px">Next Event</th>
			</thead>
	
	<?php 
	require 'IcalReader.php';
	$ical   	= new ICal();
	$i=0;
	date_default_timezone_set('Australia/ACT');
	
	//Either pass filename from url eg [...... screen-two.php?file=xyz.ics] or directly put here
	$filename	= isset($_GET['file']) ? trim($_GET['file']) : 'Auditorium.ics';  
	$events 	= $ical->getEventsByFileName('ics-files/' . $filename);
	foreach($events['VEVENT'] as $data){
		$e[$i]['UID']		= $data['UID'];
		$e[$i]['SUMMARY']	= $data['SUMMARY'];
		$e[$i]['LOCATION']	= isset($data['LOCATION']) ? $data['LOCATION'] : '';
	
		//
		$ts 			= strtotime($data['DTSTART']);
		$changedDate	= date('YmdHis', $ts);
	
		$e[$i]['DTSTART']	= $changedDate;
		$e[$i]['DTEND']		= $data['DTEND'];
	
		$i++;
	}
	
	$startDate		= date('Y-m-d H:i');
	$endDate		= date('Y-m-d').' 23:59:00';
	$upcomingEvents = $ical->eventsFromRange($startDate, $endDate, $e);

	if(is_array($upcomingEvents) && count($upcomingEvents)){
		$unixTime  = date('Y-m-d H:i:s', $ical->iCalDateToUnixTimestamp($upcomingEvents[0]['DTSTART']));
	
		echo '<tr>';
	    echo '<td height="100">' . date('h:i a', strtotime($unixTime)) . '</td>';
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
	</body>
</html>
