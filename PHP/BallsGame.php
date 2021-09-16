<?php

class BallsGame
{
    private $reps = 0;

    function __construct($reps = null)
    {
        if ($reps > 0) {
            $this->setReps($reps);
            $this->run();
        } else {
            $this->askForReps();
        }
        exit;
    }

    function run()
    {
        $iSilver = $iGold = $iNa = 0;
        $gold = 'gold';
        $silver = 'silver';
        $boxes = [
            1 => [$gold, $gold],
            2 => [$gold, $silver],
            3 => [$silver, $silver],
        ];

        for ($i = 0; $i <= $this->getReps(); $i++) {
            $box = $boxes[rand(1, 3)];
            $reach_in = rand(0, 1);

            if ($box[$reach_in] !== $gold) {
                $iNa++;
                continue;
            }

            $reach_in2 = ($reach_in == 1) ? 0 : 1;

            if ($box[$reach_in2] === $gold) {
                $iGold++;
            } else {
                $iSilver++;
            }
        }

        echo "SILVER: $iSilver\n";
        echo "GOLD: $iGold\n";
        echo "n/a: $iNa\n";
    }

    /**
     * @return int|mixed|null
     */
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * @param  int|mixed|null  $reps
     */
    public function setReps($reps)
    {
        $this->reps = $reps;
    }

    private function askForReps()
    {
        echo "Error: how many games should I run?\n";
        echo "Enter a parameter for BallsGame's constructor, ya dingus.\n";
    }
}

// main

new BallsGame(5000);

