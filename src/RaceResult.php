<?php

/**
 * @package DevTask
 * Description: Fetch array from RoundReslut class and merge to 'Main' array
 */

 namespace Src;

class RaceResult extends RoundResult
{
    /**
     * @var array of StepResult
     */
    private $roundResults = [];

    /**
     * Description: Constructor with parent::__constructor in it... Forwards parametars to parent class
     */
    public function __construct($step, $carsPosition)
    {
      parent::__construct($step, $carsPosition);
    }

    /**
     * @return array
     * Description: Function returns final array to index
     */
    public function getRoundResults(): array
    {
        return $this->roundResults;
    }

    /**
     * Description: Fetch round Results from RoundResult::roundCalculation and merge into roundResults array
     */
    public function roundResults()
    {

      while(($this->car1Position < 2000) && ($this->car2Position < 2000) && ($this->car3Position < 2000) && ($this->car4Position < 2000) && ($this->car5Position < 2000))
      {
        $this->step = $this->step + 1;

        $this->roundResults = $this->roundResults + $this->roundCalculation();
      }
    }
}
