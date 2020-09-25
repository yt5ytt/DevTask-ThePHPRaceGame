<?php

/**
 * @package DevTask
 * Description: Dev task for Katipult
 */

 /**
  * Define absolute path to root folder
  */
  define('ABSPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

  /**
   * Include autoload for namespaces Src\\
   */
   include(ABSPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

/**
 * Use Classes from namespaces
 */

 use Src\Race;
 use Src\RaceResult;
 use Src\RoundResult;
 use Src\TrackGenerator;
 use Src\Cars;

 $step = 0;
 $carsPosition = array(
   'car1' => 0,
   'car2' => 0,
   'car3' => 0,
   'car4' => 0,
   'car5' => 0
 );

 $raceResult = new RaceResult($step, $carsPosition);

if(empty($raceResult->getRoundResults())):

   $track = TrackGenerator::trackGenerator();
   $cars = Cars::CarSpeed();

endif;
$raceResult->setProperties($track, $cars);
$raceResult->roundResults();
$result = $raceResult->getRoundResults();

$rowsNo = count($result);

for($i=1; $i<=$rowsNo; $i++){

  echo $i . ' || ' . $result[$i]['car1'] . ' || ' . $result[$i]['car2'] . ' || ' . $result[$i]['car3'] . ' || ' . $result[$i]['car4'] . ' || ' . $result[$i]['car5'] . '<br />';

}

$winner = array_keys($result[$rowsNo], max($result[$rowsNo]));

$noWinners = count($winner);
if($noWinners > 1):
  echo 'It\'s a draw!!!';
else:
  echo "$winner[0] is a winner!!!";
endif;
