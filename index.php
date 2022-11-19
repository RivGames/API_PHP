<?php
$url = 'http://test.loc/';
$year = file_get_contents('http://test.loc/year.php');
$month = file_get_contents('http://test.loc/month.php');
$day = file_get_contents('http://test.loc/day.php');
$rand_num = file_get_contents('http://test.loc/?num=100');
$diff_2_dates = file_get_contents("http://test.loc/?first_day=2022-11-19&second_day=2022-12-31");
$res = file_get_contents($url);
//echo "<pre>";
//print_r($diff_2_dates);
//echo "</pre>";
$url1 = 'http://test.loc/?num1=1&num2=100';
$res1 = file_get_contents($url1);
$arr = json_decode($res1);
//echo "<pre>";
//print_r($arr);
//echo "</pre>";

$url2 = 'http://test.loc/post_parameters_json.php';
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,$url2);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_POST,1);

//$data = ['num1' => 2, 'num2' => 15];
//curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

$json = json_encode(range(1,1000));
$data = ['json' => $json];
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

$res2 = curl_exec($curl);
var_dump($res2);

$url3 = 'http://test.loc/database.php?id=1';
$res3 = file_get_contents($url3);
$user_1 = json_decode($res3);
echo "<pre>";
print_r($user_1);
echo "</pre>";

$url4 = 'http://test.loc/crud.php?action=all';
$res4 = file_get_contents($url4);
$users = json_decode($res4);
echo "<pre>";
var_dump($users);
echo "</pre>";

$url5 = 'http://test.loc/main.php';
$res5 = file_get_contents($url5);
echo "<pre>";
print_r($res5);
echo "</pre>";

$url6 = 'http://numbersapi.com/2022/year';
$res6 = file_get_contents($url6);
echo "<pre>";
print_r($res6);
echo "</pre>";

$url7 = 'http://www.boredapi.com/api/activity/';
$res7 = file_get_contents($url7);
$idea = json_decode($res7);
echo "<pre>";
print_r($idea);
echo "</pre>";

$url8 = 'http://jservice.io/api/random';
$res8 = file_get_contents($url8);
$trivia = get_object_vars(json_decode($res8)[0]);
echo "<pre>";
print_r($trivia['answer']);
echo "<br>";
print_r($trivia['question']);
echo "</pre>";

$url9 = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
$res9 = file_get_contents($url9);
$exchange_rates = json_decode($res9);
$euro = get_object_vars($exchange_rates[0]);
$dollar = get_object_vars($exchange_rates[1]);
echo "Евро КУПЛЯЮТЬ: " . round($euro['buy'],1) . "<br>" . "Евро ПРОДАЮТЬ: " . round($euro['sale'],3);
echo "<br><hr>";
echo "Доллар КУПЛЯЮТЬ: " . round($dollar['buy'],1) . "<br>" . "Доллар ПРОДАЮТЬ: " . round($dollar['sale'],3);

