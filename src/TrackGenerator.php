<?php

/**
 * @package DevTask
 */

 namespace Src;

 /**
  * TrackGenerator class generates elements of track. Each trackSection has 40 elements
  * @return array         An array of sections of the track
  */

 class TrackGenerator
 {

   private static $trackSection;

   public static function trackGenerator()
   {

     for($i=0; $i<=50; $i++){

       $trackSectionId = mt_rand(0,1);

       if($trackSectionId == 0):
         self::$trackSection = 'Curve';
       else:
         self::$trackSection = 'Straight';
       endif;

       $track[$i] = self::$trackSection;

     }

     return $track;

   }

 }
