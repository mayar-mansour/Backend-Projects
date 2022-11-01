<?php

echo "test php";
echo "<br>";
echo "hello ";
echo "<br>";
echo "state of command ";
?>


<!-- //html part // -->


<!DOCTYPE html>
<html>

<body>

  <h1> PHP page</h1>
  <h1>Variables</h1>
  <?php
  // print string or int 
  $txt = "Hello World!";

  $x = 5;  //global variable
  $y = 10.5;

  echo $txt;
  echo "<br>";
  echo $x;
  echo "<br>";
  echo $y;
  echo "<br>";

  echo "<br>";
  $text = "php";
  echo "view" . $text . "code";
  echo "<br>";
  echo "view $text code";
  echo "<br>";
  // concatinate string with int result 
  echo " x+y=" . ($x + $y);
  echo "<br>";
  $var = 3;


  echo "Result: " . ($var + 3);
  echo "<br>";
  echo 1 . 2;                //prints the string "12"
  echo "<br>";
  echo 1.2;                  //prints the number 1.2
  echo "<br>";
  echo 1 + 2;                  //prints the number 3
  ?>
  <h1>Functions</h1>

  <?php
  // php variable scope
  // imp note : the variable here in php must be scoping in the function not onlu global
  // or defined as global $x;
  function myTest()
  {
    // using x inside this function will generate an error
    //   $x = 7;
    global $x;
    echo "<p>Variable x inside function is: $x</p>";
    global $x, $y;
    $y = $x + $y;
    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
  }
  myTest();

  echo "<p>Variable x outside function is: $x</p>";
  echo $y;
  echo "<br>";
  // static
  // can be used many time without being deleted
  function static1()
  {
    static $x = 0;
    echo $x;
    $x++;
  }

  static1();
  echo "<br>";
  static1();
  echo "<br>";
  static1();
  echo "<br>";
  //  The PHP var_dump() function returns the data type and value
  $x = 10.365;
  var_dump($x);
  // A Boolean represents two possible states: TRUE or FALSE.
  ?>
  <h1>array</h1>
  <?php
  $t = true;
  $f = false;
  // array
  $cars = array("Volvo", "BMW", "Toyota");
  var_dump($cars);
  ?>
  <!-- //object -->
  <h1>object </h1>
  <?php
  //class and object
  class Car
  {
    public $color = "red"; //access modified (public, private) 
    public $model = "volvo";
    // function -> class( method)
    // public function __construct($color, $model) {
    //   $this->color = $color;
    //   $this->model = $model;
    // }
    // public function message() {
    //   return "My car is a " . $this->color . " " . $this->model . "!";
    // }
  }
  //new object from your class
  $myCar = new Car();
  echo $myCar->color; //access for properties
  // echo "<br>";
  // $myCar = new Car("red", "Toyota");
  // echo $myCar -> message();
  // NULL
  // Tip: If a variable is created without a value, it is automatically assigned a value of NULL.
  ?>
  <h1>type conversion</h1>
  <?php
  echo gettype(true);
  echo '<br>';
  echo true; //1
  echo '<br>';
  // echo 5 +'5 lessons'
  echo 10 + 5.5;
  echo '<br>';
  echo nl2br(' multiple
 lines');
  echo '<br>';
  echo gettype(10 + 15.5); //float -> double
  //date form
  echo " <p> 2day is ";
  echo date('H:i ,JS fY');
  echo "</p>"
  ?>
  <h1>redirect to another page</h1>
  <h1>include and required</h1>
  <p style="color:blue">header('location:index.html');</p>
  <p style="color:blue">include("var_include.php")</p>
  <p style="color:blue">$f = file("call.txt");</p>
  <p style="color:blue"> header("location: ar.php");</p>
  <p style="color:blue"> required("test.php")</p>
 <br>
  <p style="color: blue;">required("test.php")</p>
  <p style="color: blue;"> include_once("test.php")</p>
  <span style="color: green;">//include_once only include one time after that die</span>


  <?php
  //  header('location:index.html');
  // header('location:http://'.$_server['HTTP_HOST'].'/index.html');
  //  exit;
  ?>
  <h1>array</h1>
  <?php
  echo "<pre>";
  print_r([
    "a" => "ahmed",  //key(index) and value
    "b" => "mayar",
    "index0",
    false => "bolean", //the bolean index overwirte the 0 indexing
    //nested array
    "names" => [
      "1st",
      "2nd",
      "3rd" =>
      ["a", "b", "c"]
    ]
  ]);
  echo "</pre>"
  ?>

  <?php
  // assigned variables
  $a = "mayar";
  $b = "ahmed";
  $a = &$b;
  $b = "khaled";
  echo $a;
  ?>
  <h1>pre defined variable</h1>
  <?php
  echo '<pre>';
  print_r($_SERVER);
  print_r($_GET);
  print_r($_POST);
  echo '</pre>';
  ?>
  <h1>constant</h1>
  <?php
  define("DATABASE", "name");
  echo DATABASE;
  ?>
  <h1>assignment operation</h1>
  <?php
  $a = 10;
  $a += 20;
  echo $a;
  echo '<br>';
  $b = 10;
  $b -= 20;
  echo $b;
  var_dump(100 <=> 200); // -1
  echo '<br>';
  var_dump(100 <=> 100); // 0
  echo '<br>';
  var_dump(100 <=> 50); // 1
  ?>
  <h1>increment & decrement</h1>
  <?php
  $likes = 0;
  echo $likes++;
  echo '<br>';
  echo $likes;
  echo '<br>';
  echo ++$likes;
  echo '<br>';
  // decrement
  $likes = 0;
  echo $likes--;
  echo '<br>';
  echo $likes;
  echo '<br>';
  echo --$likes;
  ?>
  <h1>logical operator</h1>
  <?php
  var_dump(100 > 5 and 100 > 0 && 50 > 2); //true
  echo '<br>';
  var_dump(100 > 5 and 100 > 0 || 50 > 0); //true
  echo '<br>';
  var_dump(100 > 5 || 100 > 0); //true
  echo '<br>';
  var_dump(100 > 5 xor 100 > 0); //false
  echo '<br>';
  echo '<br>';
  ?>
  <h1>String operators</h1>
  <?php
  $x = "mayar";
  $y = "ahmed";
  echo "{$x} {$y}" . " " . testing();
  function testing()
  {
    return 1;
  }
  ?>
  <h1>array operator</h1>
  <?php
  $arr1 = [1 => "karim", 2 => "ahmed"];
  $arr2 = [3 => "iknm", 4 => "nkmled"];
  echo "<pre>";
  print_r($arr1 + $arr2);
  echo "</pre>";
  echo "<br>";
  $arr5 = [1 => "10", 2 => "20"];
  $arr6 = [1 => 10, 2 => 20];
  var_dump($arr5 == $arr6); //true
  echo "<br>";
  var_dump($arr5 != $arr6); //false
  echo "<br>";
  var_dump($arr5 <> $arr6); //false
  echo "<br>";
  var_dump($arr5 === $arr6); // identical same key same value same order false
  echo "<br>";
  ?>
  <h1>error control operator</h1>
  <h1>call files</h1>
  <?php
  $z = 10;
  echo "<br>";
  $f = file("call.txt");
  echo "<pre>";
  print_r($f);
  echo "</pre>";
  /// change in error sequence
  // $f = @file("cajjll.txt") or die ("file not found");
  // neogate the error
  $f = @file("cajjll.txt");
  ?>

  <h1>if elsif else</h1>
  <?php
  $page = "Home";
  if ($page == "about") {
    echo "this is the about page";
  }
  echo "<br>";

  $title = "hello";
  if ($title == "") {
    echo "empty page";
  } else {
    echo $title;
  }
  echo "<br>";
  //nested if 
  $num_one = 23;
  $num_two = 5;
  $op = "*";
  if ($op == "+") {
    echo $num_one + $num_two;
    echo "<br>";
  } elseif ($op == "*") {
    echo $num_one * $num_two;
    echo "<br>";
  } elseif ($op == "/") {
    echo $num_one / $num_two;
    echo "<br>";
  } else {
    echo "Unknown Operation";
    echo "<br>";
  }
  ?>
  <?php if (10 > 5) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>

    <body>
      Hello Page
    </body>

    </html>

  <?php endif; ?>

  <?php

  if (10 > 10) :

    echo "First";

  elseif (10 > 10) :

    echo "Second";

  else :

    echo "Last";

  endif;

  ?>
  <h1 style="color:green">note</h1>
  <h3>condition ?tue : false</h3>
  <p style="color:brown"> echo $a > 8 ? "Good" : "Bad";</p>
  <br>
  <br>
  <h1>switch</h1>
  <?php
  $day = "thurday";

  switch ($day) {
    case "saturday":
      echo "today is saturday";
      break;
    case "sunday":
      echo "today is sunday";
      break;
    case "monday":
      echo "today is monday";
      break;
    default:
      echo "unknown day";
  }
  ?>

  <h1>swicth task</h1>
  <?php
  $day = "Fri";
 //if ($day == ("Sat" || "Sun" or "Mon")) {
  if($day == "Sat" or $day == "Sun"){
    echo "We Are Open All The Day";
  } elseif ($day == "Tue" or $day=="Wed") {
    echo "We Are Open From 08:12";
  } elseif ($day == "Thu" or $day == "Fri") {
    echo "We Are Closed";
  } 
  else {
    echo "Unknown Day";
  }

echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";
?>
<h1>loop</h1>
<h3>while</h3>
<?php
$index = 10; 
while ($index >=0 ){

 echo "$index<br>";
 --$index;
 
}
echo"<br>";
$i = 0;
while($i <= 20 ){
  echo "$i<br>";
  $i+=2;
}
?>
<h2>do while</h2>
<?php
$index = 0;
do{
  echo "$index<br>";
  $index+=2;
}while($index <= 20)
?>
  
<h2> For</h2>
<?php

for ($index = 0 ;$index <= 20 ;$index+=2 ){
  echo "$index<br>";
}
echo" ############# <br>";
// $start = 10;
// $end = 0;
// $stop = 3;
// $array = ["start"=> 10 , "end"=> 0, "stop"=> 3 ];
// foreach($array as $value){
//   echo $value ."<br>";
// }
// foreach($array as $key =>$value ){
//   echo"value is  $value and key is $key <br>";
//   // echo $array;
// if($value <= 10){
//  echo"0 <br> $value";
// }
// }
$numbers = ["start"=> 10 , "end"=> 0, "stop"=> 3 ];
foreach($numbers as $number){
  if($number == "start" ){
    echo $number;
  }
 
}
?>

 
</body>

</html>