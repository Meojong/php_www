<?php
namespace App\Controller;
class Tableinfo
{
    public function __construct($db)
    {
        echo __CLASS__;
        $this->db = $db;
    }

    
    public function main()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uris = explode("/", $uri);
        $html = new \Module\Html\HtmlTable;
        //echo "메인 호출이에요";
        $query = "DESC ".$uris[2];
        $result  = $this->db->queryExecute($query);
        $count = mysqli_num_rows($result);
        $content = "";
        $rows = [];
        
        for($i = 0; $i < $count; $i++){
            $row = mysqli_fetch_object($result);
            $rows [] = $row;
        }
        $content = $html->table($rows);
    //sdawqsdewadesawqsa

        $body = file_get_contents("../Resource/desc.html");
        $body = str_replace("{{content}}", $content, $body);// 데이터 치환
        echo $body;
    }
}
