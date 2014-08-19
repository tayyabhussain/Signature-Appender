<?php
/**
 * This file contains a Editor class
 * 
 * This file contains the implementation of Editor class.
 *
 * @category Training/Learning PHP
 * @version v 1.4
 */

/**
 * Adds signature in php files.
 *
 * This class has one zero parameterize constructor, two nonstatic methods
 * doEditingInPhp and printDetails. The basic purpose of this class is to
 * add siganature at the top of every .php file available in provided
 * directory.
 *
 * @subpackage Assigment
 * @package var.www
 * @author     Tayyab Hussain <tayyab.hussain@coeus-solutions.de>
 * @version    Version 1.4
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
     * after updation by calling another method finalizing($filesArray).
     */
    public function doEditingInPhp() 
    {

        // get all text files with a .php extension into an array.
        $this->filesArray = glob($this->pathToDir . "*.php");
        // foreach loop to iterate each .php file
        // in given directory
        foreach ($this->filesArray as $file) {
            // list down all the .php files in that folder 
            echo $file . ' ' . filesize($file) . 'kb ' . PHP_EOL;
            $contents = file_get_contents($file);
            // concatenating user input with the previously present text
            $contents = $this->textInput . PHP_EOL . $contents;
            // writing the new text in file
            file_put_contents($file, $contents);
        }

        $this->printDetails();
    }
    /**
     * Receives signature as input 
     *
     * This functions receives signature as an input and assigns it to
     * class variable textInput which was given as command line argument.
     * It takes path to the working directory and append signature in those
     * php files which are present in that directory
     * 
     * @param String $sign Signature is to be appended in php files
     */
    public function signInput($sign) 
    {
        
        $this->textInput = $sign;
        $this->pathToDir = getcwd() . '/';
        echo $this->pathToDir;
        $this->doEditingInPhp();
    }
    /**
     * Receives signature as input and path
     *
     * This functions receives signature and path as input and assign it to
     * class variables textInput and pathToDir respectively which was given
     * as command line argument.It appends signature in those php files which
     * are present in that directory which was provided by user.
     * 
     * @param String $sign Signature is to be appended in php files.
     * @param String $path path to that directory who's php files is to be
     *                     updated.
     */
    public function signAndPathInput($sign, $path) 
    {
        
        $this->textInput = $sign;
        $this->pathToDir = $path;
        if (substr($this->pathToDir, -1) != '/') {
            $this->pathToDir = $this->pathToDir . '/';
        }
        $this->doEditingInPhp();
    }
    /**
     * Receives inputs from user interactively.
     *
     * This functions receives takes signature and path from user as an input
     * interactivly. This function will be called when user gives not any
     * command line argument.
     */
    public function userInput() 
    {
        
        if (!defined("STDIN")) {
            define("STDIN", fopen('php://stdin', 'r'));
        }
        // getting path from user
        echo 'Hello! What is your complete path to the  directory or if ' .
        'you want to append signature in php files of current directory' .
        'just press "Enter" (enter below):' . PHP_EOL;
        $this->pathToDir = fread(STDIN, 80);
        $this->pathToDir = trim($this->pathToDir);

        if ($this->pathToDir == '') {
            $this->pathToDir = getcwd() . '/';
        }
        echo $this->pathToDir;
        if (substr($this->pathToDir, -1) != '/') {
            $this->pathToDir = $this->pathToDir . '/';
        }
        // get all text files with a .php extension into an array.
        $this->filesArray = glob($this->pathToDir . "*.php");
        //checking if files exits in folder or not
        if (count($this->filesArray) > 0) {
            //getting text from user
            echo 'Hello! Enter the Text that you want to merge' .
            ' in php file (enter below):' . PHP_EOL;
            $this->textInput = fread(STDIN, 80);
            $this->textInput = trim($this->textInput);
            $this->doEditingInPhp();
        } else {
            echo 'provided directory does not contain any php file' . PHP_EOL;
        }
    }
    /**
     * Prints details about files.
     *
     * This functions prints details about files which have been update i.e
     * number files, size of each file and name of each file before and after
     * appending signature.
     */
    public function printDetails() 
    {

        echo count($this->filesArray) . ' files has been updated' . PHP_EOL
        . ' New details are given below ' . PHP_EOL;
        // list down files after updation
        foreach ($this->filesArray as $file) {
            echo $file . ' ' . filesize($file) . 'kb' . PHP_EOL;
        }
    }

}
