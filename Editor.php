<?php
/**
 * Adds signature in php files.
 *
 * This class has two nonstatic methods doEditingInPhp and printDetails.
 * The basic purpose of this class is to add siganature at the top of 
 * every .php file available in provided directory.
 *
 * @package    var.www
 * @subpackage Assigment
 * @author     Tayyab Hussain tayyab.hussain@coeus-solutions.de
 * @version    Version 1.3
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
     * Adds signature in php files
     *
     * This is main function of Editor class, It prompts user to input
     * the path to the directory and also prompt to enter the signature
     * that we want to add at the top of every .php file present in
     * provided directory. It picks all the text present in file and 
     * appends signature and puts all the contents back into file.
     * This function also provide information regarding files present
     * in provided directory i.e name and size of each file before and
     * after updation by calling another method printDetails.
     */
    public function doEditingInPhp()
    {

        if (!defined("STDIN")) {
            define("STDIN", fopen('php://stdin', 'r'));
        }
        // getting path from user
        echo 'Hello! What is your complete path to the' .
        ' directory (enter below):' . PHP_EOL;
        $this->pathToDir = fread(STDIN, 80);
        $this->pathToDir = trim($this->pathToDir);
        //checking if last character is /
        if (substr($this->pathToDir, -1)!='/') {
        // checking if last character is /
        if (substr($this->pathToDir, -1)!='/') {
            //appending / at the end of path if there is not
            $this->pathToDir=$this->pathToDir.'/';
        }
        // get all text files with a .php extension into an array.
        $this->filesArray = glob($this->pathToDir . "*.php");
        // checking if files exits in folder or not
        if (count($this->filesArray) > 0) {
            //getting text from user
            echo 'Hello! Enter the Text that you want to merge'.
            ' in php file (enter below):' . PHP_EOL;
            $this->textInput = fread(STDIN, 80);
            $this->textInput = trim($this->textInput);
            // foreach loop to iterate each .php file
            // in given directory
            foreach ($this->filesArray as $file) {
                // list down all the .php files in that folder 
                echo $file . ' ' . filesize($file) . 'kb '.PHP_EOL;
                $contents = file_get_contents($file);
                // concatenating user input with the previously present text
                $contents = $this->textInput .PHP_EOL. $contents;
                // writing the new text in file
                file_put_contents($file, $contents);
            }

            $this->printDetails($this->filesArray);
        } else {
            echo 'ERROR: provied directory has not any .php file' .
            'or provided path is valid'.PHP_EOL;
        }
    }
    /**
     * Shows details of upated files
     *
     * This function displays how many files have been updated and
     * also shows the names and size of each file updated,  if there
     * is no file updated.
     */
    public function printDetails()
    {

        echo count($this->filesArray) . ' files has been updated'.PHP_EOL
        .' New details are given below '.PHP_EOL;
        // list down files after updation
        foreach ($this->filesArray as $file) {
            echo $file . ' ' . filesize($file) . 'kb'.PHP_EOL;
        }
    }

}
