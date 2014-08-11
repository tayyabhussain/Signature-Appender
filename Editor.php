<?php

/**
 * This is the description for the Editor class.
 * This class has one nonstatic method and on static method.
 *
 * @package    var.www
 * @subpackage Assigment
 * @author     Tayyab Hussain
 * @version    Version 1.0
 * 
 */
class Editor
{

    /**
     * @var string pathToDir for path to the directory
     */
    public $pathToDir;

    /**
     * @var string textInput for signature to be added
     */
    public $textInput;

    /**
     * @var string array textInput for path to each file
     */
    public $filesArray;

    /**
     * Constructor
     * This constructor is to initilize all the class variables
     */
    public function __construct()
    {
        $pathToDir = NULL;

        $textInput = NULL;

        $filesArray = NULL;
    }

    /**
     * doEditingInPhp
     *
     * This is main function of Editor class, It prompts user to input
     * the path to the directory and also prompt to enter the signature
     * that we want to add at the top of every .php file present in
     * provided directory. This function also provide information
     * regarding files present in provided directory i.e name and size
     * of each file before and after updation by calling another method 
     * finalizing($count, $filesArray).
     *
     * @param this function not receiving any parameter
     * @return this function is not returning anything
     */
    public function doEditingInPhp()
    {

        if (!defined("STDIN")) {
            define("STDIN", fopen('php://stdin', 'r'));
        }

        // getting path from user

        echo "Hello! What is your complete path to the".
        " directory (enter below):\n";

        $pathToDir = fread(STDIN, 80);

        $pathToDir = trim($pathToDir);

        //get all text files with a .php extension into an array.

        $filesArray = glob($pathToDir . "*.php");

        //getting text from user

        echo "Hello! Enter the Text that you want to merge".
        " in php file (enter below):\n";

        $textInput = fread(STDIN, 80);

        $textInput = trim($textInput);

        // using a count variable to check number
        // of .php files present in directory

        $count = 0;

        // foreach loop to iterate each .php file
        // in given directory

        foreach ($filesArray as $file) {

            // list down all the .php files in that folder 

            echo $file . " " . filesize($file) . "kb\n ";

            if (!file_exists($file)) {
                die("Die");
            }

            $contents = file_get_contents($file);

            // concatenating user input with the previously present text

            $contents = $textInput . $contents;

            // writing the new text in file

            file_put_contents($file, $contents);

            // increament in count variable

            $count++;
        }

        self::finalizing($count, $filesArray);
    }

    /**
     * finalizing
     *
     * This function takes two parameters and checks how many
     * files have been updated and also shows the names
     * and size of each file updated, if there is no file
     * updated then it will shows an error message
     *
     * @param (Array) ($filesArray) this array holds path to each .php file
     * @param (number) ($count) this variable is to check that how many files
     * has been updated
     * @return this function is not returning anything
     */
    public static function finalizing($count, $filesArray)
    {
        if ($count == 0) {

            echo "Error ! There is no .php file in given".
            " directory (check path) \n";
        } else {

            echo $count . " files has been updated\n".
            " New details are given below \n";

            // list down files after updation

            foreach ($filesArray as $file) {

                echo $file . " " . filesize($file) . "kb\n ";
            }
        }
    }

}



