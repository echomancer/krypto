<?php

function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}

function convert($hex){
  $ret = "";
  $len = strlen($hex);
  $spans = intval($len/12);
  $extra = $len%12;
  $class = "col-xs-1 col-md-1 ";
  for($i=0;$i<$spans;$i++){
    $ret = '<div class="row">';
    for($j=0;$j<12;$j++){

    }
    $ret = '</div>';
  }
  return $ret;
}

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