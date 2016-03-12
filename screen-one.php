<!DOCTYPE html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="en">
		<!-- refresh page in every 60 seconds 
		<meta http-equiv="refresh" content="60" /> -->
		<title>Today's Event</title>
		<style type="text/css">
			@charset "utf-8";
			*:focus {outline: 0;}
			body {font-family:Verdana, Geneva, sans-serif;}
			.container {background: url(images/background_image.jpg) no-repeat; width:720px; height:1280px; margin:0 auto; border: 0px;}
			.table_grid {width:100%; padding:230px 0 0 0;}
			.grey_row {background-color: #d3d3d3; padding:8px 0 8px 5px; text-align: left;width: 200px;}
			.grey_row2 {background-color: #d3d3d3; padding:8px 0 8px 5px; text-align: left;width: 300px;}
			.white_row {padding:5px 0 5px 5px; text-align: left;width: 200px;}
			.white_row2 {padding:5px 0 5px 5px; text-align: left;width: 495px;}
			.room {padding:5px 0 0 0; font-size: 14px;font-weight: bolder;}
		</style>
	</head>
	<body>
	<div class="container">
		<table cellspacing="0" cellpadding="1" border="0" align="center" class="table_grid row">
			<thead>
				<th class="grey_row">TIME</th>
				<th class="grey_row2">EVENT</th>
			</thead>
<?php 
require 'IcalReader.php';
$ical   = new ICal();
$files	= $ical->findAllFiles('ics-files');
$i=0;
date_default_timezone_set('Australia/ACT');

foreach($files as $key=>$file){
	$caldata	= array();
	$ical->cal	= '';
	$caldata 	= $ical->getEventsByFileName($file);
	
	foreach($caldata['VEVENT'] as $data){
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
}

$startDate		= date('Y-m-d');
$endDate		= date('Y-m-d').' 23:59:00';
$todayEvents    = $ical->eventsFromRange($startDate, $endDate, $e);

if(count($todayEvents)){
	$i=1;
	foreach ($todayEvents as $event) {
	    $unixTime  = date('h:i a', $ical->iCalDateToUnixTimestamp($event['DTSTART']));
	    $rowcolor	= $i/2 == 0 ? 'grey_row' : 'white_row';
	    echo '<tr>';
	    echo '<td class="' . $rowcolor . '">' . $unixTime . '</td>';
	    echo '<td class="' . $rowcolor . '2">' . @$event['SUMMARY'] . '<div class="room">' . @$event['LOCATION'] . '</div></td>';
	    echo '</tr>';
		$i++;
	}
}else{
	echo '<tr>';
	echo '<td align="center" colspan="2" height="30">No events found.</td>';
	echo '</tr>';
}	
?>
			</table>
		</div>
	</body>
</html>
