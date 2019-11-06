<?php
namespace App\Controller;
class Select
{
    private $db;
    private $HttpUri;

    private $Html;
    // 생성자
    public function __construct($db)
    {
        //echo __CLASS__;
        $this->db = $db;
        $this->HttpUri = new \Module\Http\Uri();
    }

    public function main()
    {
        $this->html = new \Module\Html\HtmlTable;

        $this->list();
    }

    public function list()
    {
        // $uri = $_SERVER['REQUEST_URI'];
        // $uris = explode("/",$uri);  // 파란책
        // []/[select]/[members]
        $tableName = $this->HttpUri->second();
        if($this->HttpUri->second() ){
            $query = "SELECT * from ".$this->HttpUri->second(); // SQL 쿼리문
            $result = $this->db->queryExecute($query);
    
            $content = ""; //초기화
            $rows = []; //배열 초기화
    
            $count = mysqli_num_rows($result);
            if($count){
                // 0보다 큰값 = true
                for($i=0;$i<$count;$i++){
                    $row = mysqli_fetch_object($result);
                    //print_r($row);
                    $rows []= $row; //배열 추가 (2차원 배열)
                }
    
                $content = $this->html->table($rows);
            } else {
                // 데이터가 없음.
                $content = "데이터 없음";
            }
        } else {
            $content = "선택된 테이블이 없습니다.";
        }

        $body = file_get_contents("../Resource/select.html");
        $body = str_replace("{{content}}",$content, $body); // 데이터 치환
        echo $body;
    }
}