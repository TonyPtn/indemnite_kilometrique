<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 11:53
 */

class HtmlTemplate
{
    /** Attributes  **/

    //File template
    private $file;
    //Head content
    private $head;
    //Title content
    private $title;
    //Nav content
    private $nav;
    //Page content
    private $content;
    //Footer content
    private $footer;

    /** Methods **/

    public function __construct($head, $title, $nav, $content, $footer)
    {
        /** Set variables  **/
        $this->head = $head;
        $this->title = $title;
        $this->nav = $nav;
        $this->content = $content;
        $this->footer = $footer;

        //Get html file template
        $this->file = file_get_contents(_TOOLS_ . "htmlTemplate/Template/template.html");

        //Create file
        $this->createFile();
    }

    public function createFile()
    {
        //Set head
        $this->file = str_replace("%%HEAD%%", $this->head, $this->file);

        //Set title
        $this->file = str_replace("%%TITLE%%", $this->title, $this->file);

        //Set nav
        $this->file = str_replace("%%NAV%%", $this->nav, $this->file);

        //Set content
        $this->file = str_replace("%%CONTENT%%", $this->content, $this->file);

        //Set footer
        $this->file = str_replace("%%FOOTER%%", $this->footer, $this->file);
    }

    public function getFile()
    {
        return $this->file;
    }
}