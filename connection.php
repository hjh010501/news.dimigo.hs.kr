<?php

$websitedomain = "http://diminews.dothome.co.kr";
$facebooklink = "https://www.facebook.com/diminewspaper";
$organisation = "한국디지털미디어고등학교 신문부";
$developers = "16기 웹프로그래밍과 함종현"; // 자기가 이 웹사이트 유지보수를 담당하면 추가 바람ㅋ

$host = "****";
$user = "****";
$password = "****";
$dbname = "****";

$link= new mysqli($host, $user, $password, $dbname);

if (mysqli_connect_errno()) {
    die('오류가 나버렸다..: ' . mysqli_connect_error());
}


if (!$link->set_charset("utf8")) {
    printf("utf8 문자 세트를 가져오다가 에러가 났습니다 : %s\n", $link->error);
}
