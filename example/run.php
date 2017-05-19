#!/bin/php
<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2015-05-24 
 */

require_once __DIR__ . '/../vendor/autoload.php';

$numberOfItems = [
    3,6,9,12,150
];

echo '+-----------------------------+' . PHP_EOL;
echo '| Example of the progress bar |' . PHP_EOL;
echo '+-----------------------------+' . PHP_EOL;
echo 'This demo will demonstrate ' . count($numberOfItems) . ' progress bars.' . PHP_EOL;
echo 'The number of items will be ' . implode(', ', $numberOfItems) . '.' . PHP_EOL;
echo 'The current update interval is 1 second.' . PHP_EOL;
echo PHP_EOL;
echo 'Press CTRL-C to stop this demonstration.' . PHP_EOL;
echo PHP_EOL;

$progressBar = new \Net\Bazzline\Component\Cli\ProgressBar\ProgressBar();

foreach ($numberOfItems as $totalNumberOfItems) {
    $items      = [];
    $startTime  = microtime(true);

    for ($iterator = 0; $iterator < $totalNumberOfItems; ++$iterator) {
        $items[] = $iterator;
    }
    $totalNumberOfItems = count($items);

    $progressBar->setTotalSteps($totalNumberOfItems);

    foreach ($items as $key => $item) {
        //$progressBar->update($key);
        $progressBar->forward();
        sleep(1);
    }

    $totalTime = microtime(true) - $startTime;

    echo PHP_EOL;
    echo 'total number of items: ' . $totalNumberOfItems . PHP_EOL;
    echo 'total time: ' . (int) $totalTime . ' seconds' . PHP_EOL;
}
