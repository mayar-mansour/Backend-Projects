<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Functions</h1>
    <?php
function hello($name ,$gender = ""){ // default paramter $gender = ""
if($gender == "Female"){
return "hello miss $name";
echo"<br>";
}
elseif($gender == "Male"){
    
    return "hello mr $name";
}
else{
    return "HELLO $name";
}
}
echo hello("Osama", "Male"); // Hello Mr Osama
echo"<br>";
echo hello("Eman", "Female"); // Hello Miss Eman
echo"<br>";
echo hello("Sameh");

    ?>

    <style>
        h3{
            color: green;
        }
        p{
            color: blue;
        }
        span{
            color: red;
        }
    </style>
    <h3>Notes:</h3>
    <p> "Number Of Arguments: " <span> func_num_args() </span> </p>
 <p>   "Argument Index Number " <span> func_get_arg(3) </span></p>
 <p>print array of argumnets  <span>print_r(func_get_args())</span></p>
 <p>spread functions(splate operator) like print array of argumnets  <span> function calculate(...$nums)</span></p>
 <?php
$group_of_skills = ["HTML", "CSS", "JS", "PHP"];

function get_data($name, $country = "Private", ...$skills) {
  echo "Hello $name Your Country Is $country <br>";
  foreach ($skills as $skill) :
    echo "-- $skill <br>";
  endforeach;
}
// get_data("Osama", "Egypt", "HTML", "CSS", "JS", "PHP");
  // get_data("Osama", "Egypt", ...$group_of_skills);
get_data("Osama", "Egypt", ...["HTML", "CSS", "JS", "PHP"]);

 ?>
 <h1>variable functions</h1>
 <span>PHP Allow To Use Variable Like Function
    --- When You Append Parentheses () To Variable PHP Will Look For Function With That Name
    - Function Exists</span>
 <h1>function exist</h1>
 <p>(function_exists("testing")</p>
 <h1>string functions</h1>
 <p>
 /*
    String Functions
    - lcfirst(String[Required])
    - ucfirst(String[Required])
    - strtolower(String[Required])
    - strtoupper(String[Required])
    - ucwords(String[Required], Delimiters[Optional])
    - str_repeat(String[Required], Count[Required])
  */
 </p>

 <p>number of letter <span>strlen()</span></p>
 <br>
 <br>
 /*
    String Functions
    - implode(Separator[Optional], Array[Required]) => join() Is Alias
    - explode(Separator[Required], String[Required], Limit[Optional])
    - str_shuffle(String[Required])
    - strrev(String[Required])
    - trim(String[Required], CharsList[Optional])
    - ltrim(String[Required], CharsList[Optional])
    - rtrim(String[Required], CharsList[Optional])
    --- Space ""
    --- Tab \t
    --- New Line \n
    --- Carriage Return \r
    --- Vertical Tab "\x0B"
    --- NULL "\0"
  */
 <?php

 ?>

</body>
</html>