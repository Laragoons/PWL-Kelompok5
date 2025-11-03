<?php
include '../db-connection.php'; 

$court_id = 1;

$default_date_str = "1 September 2025"; 

$tanggal_booking = date('Y-m-d', strtotime($default_date_str)); 

$available_hours = [];
for ($i = 7; $i <= 23; $i++) {
    $available_hours[] = sprintf('%02d:00', $i);
}
$available_hours[] = '00:00'; 

$booked_hours = [];

$query = "SELECT start_time, end_time FROM bookings 
          WHERE court_id = $court_id AND booking_date = '$tanggal_booking'";

$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $start_time = strtotime($row['start_time']);
        $end_time = strtotime($row['end_time']);
        
        $current_time = $start_time;
        
        while ($current_time <= $end_time) {
            $hour_str = date('H:i', $current_time);
            
            if (in_array($hour_str, $available_hours)) {
                 $booked_hours[$hour_str] = true;
            }
            
            $current_time = strtotime('+1 hour', $current_time);
            
            if ($current_time > strtotime('+24 hour', $start_time)) break;
        }
    }
}

mysqli_close($connection);
?>