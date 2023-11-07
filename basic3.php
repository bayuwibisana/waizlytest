

<form method="post" action="basic3.php">
    <!-- Add a label and placeholder for better UX -->
    <label for="time">Enter time (e.g., 10:00:00AM):</label>
    <input type="text" name="time" placeholder="HH:MM:SSAM/PM" id="time">
    <input type="submit" name="submit">
</form>

<?php

if(isset($_POST['submit']))
{
  
$convertedTime = timeConversion($_POST['time']);

if ($convertedTime !== false) {
    echo "Converted time: " . $convertedTime . "\n";
} else {
    echo "Invalid time format.\n";
}

} 

function timeConversion($time) {
    $parts = explode(':', $time);
    
    // check if we have three parts (hour, minute, second with AM/PM)
    if (count($parts) === 3) {
        $secondsPart = substr($parts[2], 0, 2);
        $meridian = strtoupper(substr($parts[2], 2));
        
        // check if we have valid hour, minute, second, and meridian
        if (is_numeric($parts[0]) && is_numeric($parts[1]) && is_numeric($secondsPart) &&
            ($meridian === 'AM' || $meridian === 'PM')) {
            
            $hour = (int) $parts[0];
            $minute = (int) $parts[1];
            $second = (int) $secondsPart;
            
            // check the ranges of hour, minute, and second
            if (($hour >= 1 && $hour <= 12) && ($minute >= 0 && $minute <= 59) && ($second >= 0 && $second <= 59)) {
                // convert hour in case of PM
                if ($meridian === 'PM' && $hour < 12) {
                    $hour += 12;
                }
                // convert to 00 in case of 12AM
                if ($meridian === 'AM' && $hour == 12) {
                    $hour = 0;
                }
                
                return sprintf('%02d:%02d:%02d', $hour, $minute, $second);
            }
        }
    }
    
    return false;
}



?>

