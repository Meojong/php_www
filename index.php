<?php
$config = include "../Dbconf.php";
echo "대림대학교";
print_r($config);

require "../Loading.php";

$db = new Database($config);
// require "database.php";
// require "Table.php";
$query = "SHOW TABLES";
        $result  = $db->queryExecute($query);

        $count = mysqli_num_rows($result);

        for($i = 0; $i < $count; $i++){
            $row = mysqli_fetch_object($result);
            echo $row->Tables_in_php."<br>";
        }