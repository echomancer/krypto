<?php
/*
File: functions.php
Programmer: Jason Perkins
Purpose: Contains various functions needed by the index page.
*/


/*
Converts a string into the hexadecimal equivilant string
*/
function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}


/*
Converts the hex string into equivilant set of rows of divs that are boxes with a set of lines for sides
*/
function convert($hex){
  $ret = "";
  $len = strlen($hex);
  $spans = intval($len/12);
  $extra = $len%12;
  //echo "Length: ".$len." Spans: ".$spans." Extras: ".$extra."</br>";
  $class = "col-xs-1 col-md-1 ";
  for($i=0;$i<$spans;$i++){
    $ret .= '<div class="row">';
    for($j=0;$j<12;$j++){
      $k = $i*12+$j;
      $m = $hex[$k];
      $c = getClass($m);
      //echo "Current index: ".$k."</br>";
      //echo "Current Hex Character: ".$char." Converted Class: ".$c."</br>";
      $ret .= '<div class="box '.$c.$class.'">&nbsp;</div>';
    }
    $ret .= '</div></br>';
  }
  if($extra > 0){
    $class = getSize($extra);
    $ret .= '<div class="row">';
    for($i=0;$i<$extra;$i++){
      $k = $spans*12+$i;
      $m = $hex[$k];
      $c = getClass($m);
      //echo "Current index: ".$k."</br>";
      //echo "Current Hex Character: ".$char." Converted Class: ".$c."</br>";
      $ret .= '<div class="box '.$c.$class.'">&nbsp;</div>';
    }
    $ret .= '</div>';
  }
  return $ret;
}

/*
Returns the bootstrap 3 column size for the corresponding number of boxes to display
*/
function getSize($int){
  $ret = "";
  switch($int){
    case 1: $ret = "col-xs-12 col-md-12 ";  break;
    case 2: $ret = "col-xs-6 col-md-6 ";    break;
    case 3: $ret = "col-xs-4 col-md-4 ";    break;
    case 4: $ret = "col-xs-3 col-md-3 ";    break;
    case 5: 
    case 6: $ret = "col-xs-2 col-md-2 ";    break;
    case 7: 
    case 8:
    case 9:
    case 10:
    case 11:
    case 12: $ret = "col-xs-1 col-md-1 ";   break;
  }
  return $ret;
}

/*
Returns the classes needed to display the lines around the box based on the current hex character
*/
function getClass($char){
  $ret = "";
  switch($char){
    case "1": $ret = "zero ";               break;
    case "2": $ret = "one ";                break;
    case "3": $ret = "zero one ";           break;
    case "4": $ret = "two ";                break;
    case "5": $ret = "two zero ";           break;
    case "6": $ret = "two one ";            break;
    case "7": $ret = "zero one two";        break;
    case "8": $ret = "three ";              break;
    case "9": $ret = "three zero ";         break;
    case "A": $ret = "three one ";          break;
    case "B": $ret = "three zero one ";     break;
    case "C": $ret = "three two ";          break;
    case "D": $ret = "three two zero ";     break;
    case "F": $ret = "zero one two three "; break;
  }
  return $ret;
}
?>