<?php


class fs {
    public $text = '';
    public $path = '';
    public function __construct(){
        $this->text = $_GET['text']?$_GET['text']:'';
        $this->path = $_GET['path']?$_GET['path']:'';
    }
    public function sf(){
//        $text = $_GET['text']?$_GET['text']:'';
//        $path = $_GET['path']?$_GET['path']:'';
        if ($this->text !='' && $this->path !='') {
            $fp = fopen('../botjs/'.$this->path, 'w');
            fwrite($fp, $this->text);
            fclose($fp);
            return '{"status":"success"}';
        }else{
            return '{"status":"something going wrong"}';
        }
    }
}

$licence = new fs();
echo $licence->sf();