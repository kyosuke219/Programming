<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
 </head>
 <body>
   <h1>練習</h1>
   <p>・文字表示</p>
<?php

/*変数：　データにつけるラベル

データ型：
- 文字列 string
- 数値 integer float
- 論理値 boolean / true false
- 配列
- オブジェクト
- null
*/
 $msg = 'Hello from the TOP!';
 echo $msg;
 var_dump($msg);
/*　定数：変更されない値につけるラベル
*/
?>
<br>
<p>・Var_dump</p>
<?php
define("MY_EMAIL", "planchecouncil@gmail.com");

echo MY_EMAIL;

var_dump(__LINE__); #現在の行数を出力
var_dump(__FILE__); #ファイル名を出力
var_dump(__DIR__);  #ディレクトリ名を出力
var_dump(isset($x)); #isset()で中身が過去に使われたか確かめる
?>
<br>
<p>・数値演算</p>
<?php
// 数値型の演算 + - * / % **

$x = 10 % 3;
$y = 30.2 / 4;
var_dump($x);
var_dump($y);

//単項演算子 ++ --
$z = 5;
$z++; //6
var_dump($z);
$z--;
$z--; //4
var_dump($z);

//代入を伴う演算子 += *= -=

$x = 5;
// $t = $t + 2;
$x *= 2; //10
var_dump($x);

?>
<br>
<p>・文字列</p>
<?php
#文字列
# "" 特殊文字(\n, \t) 変数
#''

$name = "kyosuke";
$s1 = "hello {$name}!\nhello again!";
$s2 = 'hello $name!\nhello again!';
var_dump($s1);
var_dump($s2);

//連結

$s = "hello " . "world";
var_dump($s);
?>
<br>
<p>・if構文</p>
<?php

//if条件分岐
//比較演算子　> < >= <= ==値比較   ===値・データ型比較　!=等しくない !==等しくない・型比較
//論理演算子　and &&, or || , !(not)

$score = 80;

if ($score >= 80){
  echo "great!";
}elseif ($score > 60){
  echo "good!";
}else{
  echo "so so ....";
}

?>
<br>
<p>・真偽値</p>
<?php
//真偽値
/*
Falseになる場合
　文字列：空、”0”
　数値：0、0.0
　論理値：false
　配列：要素の数が0
　null
*/

$x = 5;
if ($x == true) {
  echo "great";
}

#三項演算子

$max = ($a > $b) ? $a : $b;

if ($a > $b) {
  $max = $a;
} else {
  $max = $b;
}
?>
<br>
<p>・switch構文</p>
<?php
//switch条件分岐

$signal = "green";

switch ($signal){
  case "red":
   echo "stop!";
   break;
  case "blue":
  case "green":
   echo "go!";
   break;
  case "yellow":
   echo "caution!";
   break;
  default:
   echo "wrong signal";
}
?>
<br>
<p>・while構文</p>
<?php
//ループ処理
// while　前処理
// do ... while　後処理

$i = 100;
// while ($i < 10){
//   echo $i;
//   $i++;
// }

do{
  echo $i;
  $i++;
}while ($i <10);
?>
<br>
<p>・for構文</p>
<?php
//ループ処理
//for (初期化処理　ループが終わる条件　ループ処理が終わる毎に行う条件)
//break: ループを抜ける
//continue: それ以降の処理を実行せずに次のループに移る

// $i = 0;
// while ($i <10){
//   echo $i;
//   $i++;
// }

for ($i = 0; $i <10; $i++){
  if ($i ===5){
    // break;
    continue;
  }
  echo $i;
}
?>
<br>
<p>・配列、foreach</p>
<?php
//配列
// key value

// $sales = array(
//   "kyosuke"=> 200,
//   "nanami"=>100,
// );
$sales = [
  "kyosuke"=> 200,
  "nanami"=>100,
];

foreach ($sales as $key => $value){
  echo "($key) $value " ;
}

var_dump($sales["kyosuke"]); //200
$sales["kyosuke"] = 1000;
var_dump($sales["kyosuke"]); //1000

$colors =["red","blue","pink"];
var_dump($colors[1]); //blue
echo $colors[2];

foreach ($colors as $value){
  echo " $value";
}

//foreach if while for コロン構文

foreach ($colors as $value):
  echo " $value";
endforeach;
?>
<ul>
  <?php foreach ($colors as $value) : ?>
  <li><?php echo "$value"; ?></li>
<?php endforeach; ?>
</ul>
<p>・関数</p>
<?php
//関数

function sayHi($name = "Kyosuke"){
  // echo "hi!" . $name ;
  return "hi!" . $name;
}

// sayHi("TOM");
// sayHi("BOB");
// sayHi();

$s = sayHi();
var_dump($s);

$h = sayHi("MICHAEL");

echo $h;
?>
<br>
<?php
//関数内で定義した変数はその関数内でのみ有効である。

$lang = "ruby";

function say($name){
  $lang = "php";
  echo "hi! $name from $lang";
}

 say("TOM");
 var_dump($lang); //ruby

 ?>
<br>
<p>・埋め込み関数</p>
<?php
//埋め込み関数について

//少数点以下を切り上げるceil()
//小数点以下を切り捨てるfloor()
//四捨五入するround()
//乱数を生成するrand()
$x = 5.6;
echo ceil($x); //6
echo floor($x); //5
echo round($x); //6
$x = 5.4;
echo round($x); //5
echo rand(1,10);

//文字数を数えるstrlen() 日本語の場合はマルチバイトなのでmb_strlen()

$s1 = "hello";
$s2 = "ねこ";
echo strlen($s1); //5
echo mb_strlen($s2); //2

//書式を指定して値を表示するprintf()
printf("%s - %s - %.3f", $s1, $s2, $x);

//配列の要素の数を数えるcount()
//配列の要素をある区切り文字で連結して文字列にして返すimplode()
$colors = ["red","blue","yellow"];
echo count($colors);
echo implode("-", $colors);
 ?>
<br>
<p>・クラス</p>
<?php

//call_user_func

class User{
  //property
 public $name;

  //constructor
 public function __construct($name){
   $this->name = $name;
 }

  //method
 public function sayHi(){
    echo "hi, i am $this->name!";
  }
}
//final　をつけるとOverrideを禁止できる。

$tom = new User("Tom");
$bob = new User("Bob");

echo $tom->name; //Tom
$bob->sayHi(); //hi, i am Bob!

//継承

class AdminUser extends User{
  public function sayHello(){
    echo "hello from admin!";
  }
  //override
  public function sayHi(){
    echo "[admin] hi , i am $this->name!";
  }
}

$steve = new AdminUser("Steve");

// echo $steve->name;
$tom->sayHi();
$steve->sayHi();
// $steve->sayHello();








 ?>
