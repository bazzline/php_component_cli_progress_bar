# cli progress bar

Basic class to create a cli progress bar.

## Usage

```php
//assuming $items contains an array of items
$progressBar = new \Net\Bazzline\Component\Cli\ProgressBar\ProgressBar();

$progressBar->setTotalSteps(count($items));

foreach ($items as $item) {
    //do something with the item
    $progressBar->forward();
}
//to be on the save side, tell the progress bar that the show is over ;-)
$progressBar->isFinished();
```

## Example

```
cd <project root>
./example/run.php

Example of the progress bar
================
This demo will demonstrate 5 progress bars.
The number of items will be 3, 6, 9, 12, 150.
The current update interval is 1 second.

Press CTRL-C to stop this demonstration

[========================================================================>] (3/3)
```

## links

* https://github.com/guiguiboy/PHP-CLI-Progress-Bar
* https://nixshell.wordpress.com/2009/09/08/get-the-width-of-the-terminal/

## history

## future improvements

* add formatter
* add percentage at the beginning that gets calculated and updated on each update call (like wget is doing it)
* add support to calculate maximum width (based on terminal size) dynamically (`tput cols`?)
