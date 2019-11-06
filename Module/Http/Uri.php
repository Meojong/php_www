<?php

namespace Module\Http;

class Uri
{
    public $uri;  // 외부접근 허용
    private $uris; // 내부만


    public function __construct($db)
    {
        //echo __CLASS__;
        $this->db = $db;
        $this->uri = $_SERVER['REQUEST_URI'];

        $this->$uris = explode("/",$this->uri);
        unset($this->uris[0]); //0번 배열 제거
    }

    public function first()
    {
        if(isset($this->uris[1]) && ($this->uris[1])){
            return $this->uris[1];
        }
    }

    public function second()
    {
        if(isset($this->uris[2]) && ($this->uris[2])){
            return $this->uris[2];
        }
    }

    public function third()
    {
        if(isset($this->uris[3]) && ($this->uris[3])){
            return $this->uris[3];
        }
    }




    
}
