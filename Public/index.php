<?php
$config = include "../Dbconf.php";
//echo "대림대학교";
//print_r($config);

require "../Loding.php";

$db = new \Module\Database\Database($config);
// require "database.php";
// require "Table.php";
$query = "SHOW TABLES";
        $result  = $db->queryExecute($query);

        $count = mysqli_num_rows($result);
        $content = "";
        for($i = 0; $i < $count; $i++){
            $row = mysqli_fetch_object($result);
            $content .= "<tr>";
            $content .= "<td>$i</td>";
            $content .= "<td>".$row->Tables_in_php."<br>"; 
            $content .= "</tr>";
        }

$body = file_get_contents("../Resource/table.html");
$body = str_replace("{{content}}", $content, $body);// 데이터 치환
echo $body;
