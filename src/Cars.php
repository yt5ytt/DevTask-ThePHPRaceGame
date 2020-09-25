<?php

/**
 * @package DevTask
 */

 namespace Src;

 /**
  * Cars class generates speed of a cars. Each car has curveSpeed and straightSpeed
  * @param array         An array of cars characteristics
  */

 class Cars
 {

   private static $curveSpeed;
   private static $straightSpeed;

   public static function carSpeed()
   {
     for ($i=1; $i<6; $i++) {
       self::$curveSpeed = rand(4,18);
       self::$straightSpeed = 22 - self::$curveSpeed;

       $car['car' . $i] = array(self::$curveSpeed, self::$straightSpeed);
     }

     return $car;

   }

 }
