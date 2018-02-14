<?php
/**
 * Created by PhpStorm.
 * User: tonypiton
 * Date: 04/02/2018
 * Time: 16:52
 */

 abstract class ViewPattern
{
    /** Attributes **/
    protected $htmlTemplate;
    protected $head;
    protected $title;
    protected $nav;
    protected $content;
    protected $footer;

    /** Methods **/
    public function __construct()
    {

    }

    protected abstract function setHead();
    protected abstract function setTitle();
    protected abstract function setNav();
    protected abstract function setContent();
    protected abstract function setFooter();

    public function displayView()
    {
        $this->htmlTemplate = new HtmlTemplate($this->setHead(), $this->setTitle(), $this->setNav(), $this->setContent(), $this->setFooter());
        echo $this->htmlTemplate->getFile();
    }

}