# Progress Bar for PHP CLI Scripts / Shell Environment

This project aims to deliver a easy to use php component for displaying a progress bar in the shell environment.

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

+-----------------------------+
| Example of the progress bar |
+-----------------------------+
This demo will demonstrate 5 progress bars.
The number of items will be 3, 6, 9, 12, 150.
The current update interval is 1 second.

Press CTRL-C to stop this demonstration

[========================================================================>] (3/3)
```

# Links (other good projects)

* https://github.com/levi-putna/phpcli
* https://github.com/guiguiboy/PHP-CLI-Progress-Bar
* https://nixshell.wordpress.com/2009/09/08/get-the-width-of-the-terminal/

## History

* upcomming
    * moved to psr-4 autoloading
* [1.0.0](https://github.com/bazzline/php_component_cli_progress_bar/tree/1.0.0) - released at 24.05.2015
    * initial release

## Future Improvements

* add link to openhub
* add link to scrutinizer.yml
* add link to packagist (and install howto)
* add api documentation
* write [tests](https://github.com/guiguiboy/PHP-CLI-Progress-Bar/blob/master/test/ProgressBar/Test/ManagerTest.php)
* add formatter
* add percentage at the beginning that gets calculated and updated on each update call (like wget is doing it)
* add support to calculate maximum width (based on terminal size) dynamically (`tput cols`?)
* add [eta calculation](https://github.com/guiguiboy/PHP-CLI-Progress-Bar/issues/4)

# Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it :-D.
