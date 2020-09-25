<?php

/**
 * @package DevTask
 * Description: Fetch properties and calculate round results, returns array to RaceResult class
 */

namespace Src;

class RoundResult
{
    /**
     * @var int
     */
    public $step;

    /**
     * @var array
     */
    public $carsPosition;

    /**
     * Car1 properties
     */
    public $car1Curve;
    public $car1Straight;
    public $car1Position;

    /**
     * Car2 properties
     */
    public $car2Curve;
    public $car2Straight;
    public $car2Position;

    /**
     * Car3 properties
     */
    public $car3Curve;
    public $car3Straight;
    public $car3Position;

    /**
     * Car4 properties
     */
    public $car4Curve;
    public $car4Straight;
    public $car4Position;

    /**
     * Car5 properties
     */
    public $car5Curve;
    public $car5Straight;
    public $car5Position;

    /**
     * @var array
     * Description: This is a Track definition
     */
    public $track;


    public function __construct(int $step, array $carsPosition)
    {
        $this->step = $step;
        $this->carsPosition = $carsPosition;
    }

    /**
     * @var int       Sets of car properties from the array $cars
     * @var array     Array of Track definition
     */
    public function setProperties($track, $cars)
    {
      for($i=1; $i<=5; $i++){
        $carCurve = "car$i" . "Curve";
        $carStraight = "car$i" . "Straight";
        $carPosition = "car$i" . "Position";

        $this->$carCurve = $cars["car$i"][0];
        $this->$carStraight = $cars["car$i"][1];
        $this->$carPosition = $this->carsPosition["car$i"];
      }

      $this->track = $track;

    }

    /**
     * @return array      Array of particular round
     */
    public function roundCalculation()
    {
      for ($i=1; $i <= 5 ; $i++) {
        $carCurve = "car$i" . "Curve";
        $carStraight = "car$i" . "Straight";
        $carPosition = "car$i" . "Position";

        $thisSector = floor($this->$carPosition / 40);
        $nextSector = ceil($this->$carPosition / 40);

        if($this->track[$thisSector] == 'Curve'){

          $position = $this->$carPosition + $this->$carCurve;
          if($position > 2000){
            $position = 2000;
          }
          if($position > $nextSector * 40 AND $this->track[$thisSector] == $this->track[$nextSector]){
            $this->$carPosition = $position;
          }elseif($position > $nextSector * 40 AND $this->track[$thisSector] != $this->track[$nextSector]){
            $position = $nextSector * 40 + 1;
            $this->$carPosition = $position;
          }elseif($position <= $nextSector * 40){
            $this->$carPosition = $position;
          }

        }elseif($this->track[$thisSector] == 'Straight'){

          $position = $this->$carPosition + $this->$carStraight;
          if($position > 2000){
            $position = 2000;
          }
          if($position > $nextSector * 40 AND $this->track[$thisSector] == $this->track[$nextSector]){
            $this->$carPosition = $position;
          }elseif($position > $nextSector * 40 AND $this->track[$thisSector] != $this->track[$nextSector]){
            $position = $nextSector * 40 + 1;
            $this->$carPosition = $position;
          }elseif($position <= $nextSector * 40){
            $this->$carPosition = $position;
          }

        }
      }
        $roundResult[$this->step] = array(
          'car1' => $this->car1Position,
          'car2' => $this->car2Position,
          'car3' => $this->car3Position,
          'car4' => $this->car4Position,
          'car5' => $this->car5Position
        );

        return $roundResult;
    }
}
