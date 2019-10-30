<?php
$config = include "../Dbconf.php";
require "../Loding.php";

$uri = $_SERVER['REQUEST_URI'];
$uris = explode("/", $uri);
// print_r($uris);

$db = new \Module\Database\Database($config);
// 배열이 있나 확인후 배열에 값이 있나 확인
if($uris[1] && $uris[1]){
    //컨트롤러 실행
    //echo $uris[1]."컨트롤러 실행";
    $controllerName = "\App\Controller\\".ucfirst($uris[1]);
    $tables = new $controllerName($db);
    $tables->main();
}else{
    // 처음 페이지 에요
    //echo "처음 페이지 에요";
    $body = file_get_contents("../Resource/index.html");
    echo $body;
}

// $desc = new \App\Controller\Tableinfo;
// $desc->main();