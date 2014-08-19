
<?php
/**
 * This file instantiate Editor and Helper class
 *
 * This file receives command line arguments and on the basis of
 * these arguments functions are being called of Editor and Helper class
 *
 * @package var.www
 */

// Adding referencing to Helper.php and Editor.php
require_once 'Helper.php';
require_once 'Editor.php';
// creating object of Editor and Helper
$helper = new Helper();
$editor = new Editor();
// checking if command line arguments are two
if ($argc == 2) {
    $argument = $argv[1];
    if ($argument == '--help') {
        $helper->showHelp();
    } elseif ($argument == '--path') {
        $helper->showPathHelp();
    } elseif ($argument == '--sign') {
        $helper->showSignHelp();
    } else {
        $editor->signInput($argument);
    }
    // checking if command line arguments are three
} elseif ($argc == 3) {
    $editor->signAndPathInput($argument, $argv[2]);
} else {
    // if user does not give any command line argument
    $editor->userInput();
}