<?php
/**
 * This file contains a Helper class
 * 
 * This file contains the implementation of Helper class.
 *
 * @category Training/Learning PHP
 * @version v 1.4
 */

/**
 * Helps the user with commands.
 *
 * This class has three nonstatic methods showHelp, showPathHelp and
 * showSignHelp. The basic purpose of this class is to provide help
 * related command line arguments
 *
 * @package    var.www
 * @subpackage Assigment
 * @author     Tayyab Hussain
 * @version    Version 1.4
 */
class Helper {

    /**
     * shows all contents related commands
     *
     * This functions is to show all commands and their details
     * It will display all commands and and their details in a tabular form
     */
    public function showHelp() 
    {
        
        echo 'Options:' . PHP_EOL;
        $mask = '|%5.5s |%-20.30s |%-30.30s |' . PHP_EOL;
        printf($mask, 'Sr#', 'commands', 'Details');
        printf($mask, '1', '--help', 'to show complete help');
        printf($mask, '2', '--path', 'to get details about path');
        printf($mask, '3', '--sign', 'to get details about signature');
    }

    /**
     * shows help related path command.
     *
     * This function will display user how to give path to the directory as
     * as a command line argument or without command line argument with passing
     * any argument.
     */
    public function showPathHelp()
    {
        
        echo '**Path Help**' . PHP_EOL;
        $mask = '|%5.5s |%-20.30s |%-30.30s |' . PHP_EOL;
        printf($mask, 'Sr#', 'commands', 'Details');
        printf($mask, '1', '--path', 'to get details about path');
        echo PHP_EOL . '*Description*' . PHP_EOL .
        'when you run this tool with command php EditorDriver.pho' .
        'without giving any command line arguments'.
        'It will prompt you to enter path of the directory which ' .
        'contains php files in which you want to append signature' . PHP_EOL;
    }

    /**
     * shows help related signature command.
     *
     * This function will display user how to give signature that is to be 
     * appended in php files as a command line argument or with any passing
     * argument.
     */
    public function showSignHelp()
    {
        
        echo '**Signature Help**' . PHP_EOL;
        $mask = '|%5.5s |%-20.30s |%-30.30s |' . PHP_EOL;
        printf($mask, 'Sr#', 'commands', 'Details');
        printf($mask, '2', '--sign', 'to get details about signature');
        echo PHP_EOL . '*Description*' . PHP_EOL .
        'You can append signature in php files present in working directory' .
        ' by giving command line argument as a signature' .
        'There is another way to add signature by using interactive method by' .
        'not providing any command line arguments' .
        'when you successfuly provide the path to directory containing' .
        'php files then program will prompt you to provide a signature' .
        'to append at the start of every php files' . PHP_EOL;
    }

}
