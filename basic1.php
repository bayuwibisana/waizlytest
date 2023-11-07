

<form method="post" action="basic1.php">
    <input type="text" name="intarray">
    <input type="submit" name="submit"> 
</form>

<?php

if(isset($_POST['submit']))
{
  
   $expl = explode(' ',$_POST['intarray']);
   miniMaxSum($expl);
} 

function miniMaxSum($arr) {
    $minSum = PHP_INT_MAX;
    $maxSum = 0;
    
    for ($i = 0; $i < count($arr); $i++) {
        $sum = 0;
        for ($j = 0; $j < count($arr); $j++) {
            if ($i !== $j) {
                $sum += $arr[$j];
            }
        }
        
        if ($sum < $minSum) {
            $minSum = $sum;
        }
        if ($sum > $maxSum) {
            $maxSum = $sum;
        }
    }
    
    echo $minSum . " " . $maxSum;
}
