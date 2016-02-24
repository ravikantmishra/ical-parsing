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
			<th align="left" height="30">Time</th>
			<th align="left">Event</th>
			<th align="left">Room</th>
		</thead>

<?php 
require 'IcalReader.php';
$ical   = new ICal();
$files	= $ical->findAllFiles('ics-files');
$i=0;
foreach($files as $key=>$file){
	$caldata	= array();
	$ical->cal	= '';
	$caldata 	= $ical->getEventsByFileName($file);
	
	foreach($caldata['VEVENT'] as $data){
		$e[$i]['UID']		= $data['UID'];
		$e[$i]['SUMMARY']	= $data['SUMMARY'];
		$e[$i]['LOCATION']	= isset($data['LOCATION']) ? $data['LOCATION'] : '';
		$e[$i]['DTSTART']	= $data['DTSTART'];
		$e[$i]['DTEND']		= $data['DTEND'];
		 
		$i++;
	}
}

$startDate		= date('Y-m-d H:i');
$endDate		= date('Y-m-d').' 23:59';
$todayEvents    = $ical->eventsFromRange($startDate, $endDate, $e);

if(count($todayEvents)){
	foreach ($todayEvents as $event) {
	    $unixTime  = date('h:i a', $ical->iCalDateToUnixTimestamp($event['DTSTART']));
	    echo '<tr>';
	    echo '<td align="left" height="30">' . $unixTime . '</td>';
	    echo '<td align="left">' . @$event['SUMMARY'] . '</td>';
	    echo '<td align="left">' . @$event['LOCATION'] . '</td>';
	    echo '</tr>';
	}
}else{
	echo '<tr>';
	echo '<td align="center" colspan="3" height="30">No events found.</td>';
	echo '</tr>';
}	
?>
		</table>
	</body>
</html>
