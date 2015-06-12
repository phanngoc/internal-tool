<?php


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