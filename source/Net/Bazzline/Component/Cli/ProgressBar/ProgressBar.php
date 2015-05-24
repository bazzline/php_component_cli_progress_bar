<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-05-24 
 */

namespace Net\Bazzline\Component\Cli\ProgressBar;

class ProgressBar
{
    /** @var int */
    private $currentStep = 0;

    /** @var bool */
    private $initialStepWasZero = false;

    /** @var bool */
    private $isFinished = true;

    /** @var int */
    private $totalStepSize;

    /** @var int */
    private $totalSteps;

    /**
     * @param int $total
     */
    public function setTotalSteps($total)
    {
        $this->totalSteps = (int) $total;
        $this->calculateNumberOfSteps();
        $this->isFinished = false;
        $this->storeCursorPosition();
    }

    public function isFinished()
    {
        $this->update($this->totalSteps);
    }

    /**
     * @param int $current
     */
    public function update($current)
    {
        if (!$this->isFinished) {
            $this->currentStep = (int) $current;

            if ($this->currentStep === 0) {
                $this->initialStepWasZero = true;
            }
            if ($this->initialStepWasZero) {
                ++$this->currentStep;
            }

            $this->resetCursor();
            $this->draw();
        }
    }

    private function draw()
    {
        $numberOfStepDraws                  = (($this->currentStep * $this->totalStepSize) / $this->totalSteps);
        $numberOfMissingStepDraws           = ($this->totalStepSize - $numberOfStepDraws);
        $numberOfWhiteSpacesForCurrentStep  = (strlen($this->totalSteps) - strlen($this->currentStep));

        $output = '[';
        $output .= str_repeat('=', floor($numberOfStepDraws));
        $output .= '>';
        $output .= str_repeat(' ', ceil($numberOfMissingStepDraws));
        $output .= '] (';

        if ($numberOfWhiteSpacesForCurrentStep > 0) {
            $output .= str_repeat(' ', $numberOfWhiteSpacesForCurrentStep);
        }
        $output .= $this->currentStep . '/' . $this->totalSteps . ')';

        if ($this->currentStep >= $this->totalSteps) {
            $this->isFinished   = true;
            $output            .= PHP_EOL;
        }

        echo $output;
    }

    private function resetCursor()
    {
        echo "\0338";
    }

    private function storeCursorPosition()
    {
        echo "\0337";
    }

    private function calculateNumberOfSteps()
    {
        $lengthOfTotal = strlen($this->totalSteps);
        $lengthOfAdditionalCharacters = 6; //[] (/)

        $this->totalStepSize = 80 - (2 * $lengthOfTotal) - $lengthOfAdditionalCharacters;
    }
}