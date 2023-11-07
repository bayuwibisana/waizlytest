

<form method="post" action="basic2.php">
    Array Number : <input type="text" name="arraynumber"><br/><br/>
    Space separated array : <input type="text" name="intarray"><br/><br/>
    <input type="submit" name="submit"> 
</form>

<?php

if(isset($_POST['submit']))
{
  
   $expl = explode(' ',$_POST['intarray']);
   plusMinus($expl,$_POST['arraynumber']);
} 

function plusMinus($arr,$nmbr) {

    $pos = 0;
    $neg = 0;
    $zero = 0;
    foreach ($arr as $i) {
        if($i > 0) {
            $pos++;
        }

        if($i < 0) {
            $neg++;
        }

        if($i == 0) {
            $zero++;
        }
    }
    
    echo number_format((float)$pos/$nmbr, 6, '.', '').'<br/>';
    echo number_format((float)$neg/$nmbr, 6, '.', '').'<br/>';
    echo number_format((float)$zero/$nmbr, 6, '.', '').'<br/>';
}
