# Progress Bar for PHP CLI Scripts / Shell Environment

This project aims to deliver a easy to use php component for displaying a progress bar in the shell environment.

The current change log can be found [here](https://github.com/bazzline/php_component_apache_status_parser/blob/master/CHANGELOG.md).

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

# Final Words

Star it if you like it :-). Add issues if you need it. Pull patches if you enjoy it. Write a blog entry if you use it :-D.
