<?php

/**
 * [check description]
 * @param  array  $routeneeds [description]
 * @return [type]             [description]
 */
 function check($routeneeds = array(),$allowed_routes)
 {
   foreach ($routeneeds as $key => $value) {

     if(in_array($value, $allowed_routes))
     {
       return true;
     }
    }
   return false;
 }

 /**
  *
  * @param  [type] $date '2011-01-03 17:13:00'
  * @return [type]       [description]
  */
 function ago_time($timeupdate) {
   $now = Carbon\Carbon::now();
   return $now->diffForHumans($timeupdate);
 }

 /**
 * Display age in format:
 * '%y years, %m months and %d days old'
 * '%y years and %m months old'
 * '%m years and %d days old'
 *
 * @param  \DateTime $born
 * @param  \DateTime $reference
 * @return string
 *
 * @throws \InvalidArgumentException
 */
function age(DateTime $born, DateTime $reference = null)
{
    $reference = $reference ?: new DateTime;

    if ($born > $reference)
        throw new \InvalidArgumentException('Provided birthday cannot be in future compared to the reference date.');

    $diff = $reference->diff($born);

    // Not very readable, but all it does is joining age
    // parts using either ',' or 'and' appropriately
    $age = ($d = $diff->d) ? ' and '.$d.' '.str_plural('day', $d) : '';
    $age = ($m = $diff->m) ? ($age ? ', ' : ' and ').$m.' '.str_plural('month', $m).$age : $age;
    $age = ($y = $diff->y) ? $y.' '.str_plural('year', $y).$age  : $age;

    // trim redundant ',' or 'and' parts
    return ($s = trim(trim($age, ', '), ' and ')) ? $s.' old' : 'newborn';
}

/**
 * [toEnglishDate description]
 * @param  [type] $time [description]
 * @return [type]       [description]
 */
function toEnglishDate($time) {
  switch ($time) {
    case '0':
      return 'Sun';
      break;
    case '1':
      return 'Mon';
      break;
    case '2':
      return 'Tue';
      break;
    case '3':
      return 'Wed';
      break;
    case '4':
      return 'Thu';
      break;
    case '5':
      return 'Fri';
      break;
    case '6':
      return 'Sat';
      break;
    default:
      # code...
      break;
  }
}

/**
 * [checkDateValid description]
 * @param  [type] $day   [description]
 * @param  [type] $month [description]
 * @param  [type] $year  [description]
 * @return [type]        [description]
 */
function checkDateValid($day, $month, $year) {
  if (strlen($day) == 1) $day = '0'.$day;
  if (strlen($month) == 1) $month = '0'.$month;
  $datetime = DateTime::createFromFormat('d/m/Y', $day.'/'.$month.'/'.$year);
  return ($datetime->format('d/m/Y') == $day.'/'.$month.'/'.$year);
}


function convertNumberToText($num) {
  switch ($num) {
      case 1:
        return 'Borrow';
        break;
      case 2:
        return 'Grant';
        break;
      case 3:
        return 'Free';
        break;
      case 4:
        return 'Pending';
        break;
  }
}