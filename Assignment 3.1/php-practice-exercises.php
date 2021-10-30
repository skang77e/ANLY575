<!DOCTYPE html>
<html lang='en'>
<head>
    <title>PHP Practice Page</title>
</head>
<body>
<?php

$nl = "\r\r";

/*
NOTE: in all cases where the exercise asks you to echo or print the result to the web page,
please precede the value with the exercise number, and put a line break <br> at the end
(or enclose the whole thing in paragraphs, or in a <div>, if appropriate)
to separate the values visually on the web page.

Example:

echo '4.1 ' . $myVariable . '<br>';

or:

echo '<p>4.1 ' . $myVariable . '</p>';

or:

echo '<div>4.1 ' . $myVariable . '</div>';

*/



/*
TOPIC 1: THE BASICS -- VARIABLES, STRINGS, COMMENTS
*/

/*
1.1 Declare a variable without setting a value for that variable.
*/

$var = null;
echo $nl . '<p>Task 1.1</p>';
echo $nl . '<p>The value is : ' . $var .'<p>';

/*
1.2 Set a variable to an empty string.
*/

$empty_string = '';
echo $nl . '<p>Task 1.2</p>';
echo $nl . '<p>The value is : ' . $empty_string .'<p>';

/*
1.3 Set variable to a string of text.
*/

$new_string = 'Hello World';
echo $nl . '<p>Task 1.3</p>';
echo $nl . '<p>The value is : ' . $new_string .'<p>';

/* 
1.4 Set a variable to an integer.
*/

$year = 2021;
echo $nl . '<p>Task 1.4</p>';
echo $nl . '<p>The value is : ' . $year .'<p>';

/*
1.5 Set a variable to a numeric string.
*/

$num_string = "2023";
echo $nl . '<p>Task 1.5</p>';
echo $nl . '<p>The value is : ' . $num_string .'<p>';

/*
1.6 Set one of the variables above to a new value. (Redefine the value of a the variable.)
*/

$year = 2050;
echo $nl . '<p>Task 1.6</p>';
echo $nl . '<p>The value is : ' . $year .'<p>';

/*
1.7 Set a variable to a string that starts with multiple spaces and ends with multiple spaces
*/

$string_with_space = '     New Text      ';
echo $nl . '<p>Task 1.7</p>';
echo $nl . '<p>The value is : ' . $string_with_space .'<p>';

/*
1.8 Use the trim() function to strip the spaces from the above variable.
*/

echo $nl . '<p>Task 1.8</p>';
echo $nl . '<p>The value is : ' . trim($string_with_space) .'<p>';

/*
1.9 Set a new variable as the concatonation (combination) of two of the above string variables.
*/

$concat_string = $new_string.$num_string;

echo $nl . '<p>Task 1.9</p>';
echo $nl . '<p>The value is : ' . $concat_string .'<p>';

/*
1.10 Set a string variable using double quotes, with one of the above variables inside.
*/

$string_w_double_quote = "String variable with $year";
echo $nl . '<p>Task 1.10</p>';
echo $nl . '<p>The value is : ' . $string_w_double_quote .'<p>';

/* 
1.11 Set a variable that concatonates a string in single quotes and a string in double quotes.
*/

$concat_single_double = 'single quotes' . " double quotes";
echo $nl . '<p>Task 1.11</p>';
echo $nl . '<p>The value is : ' . $concat_single_double .'<p>';

/*
1.12 Set a string variable with double quotes and escaped double quotes inside of it.
*/

$double_quote_escape = "here is double quote: \"\"";
echo $nl . '<p>Task 1.12</p>';
echo $nl . '<p>The value is : ' . $double_quote_escape .'<p>';

/*
1.13 Echo one of the above variables to the web page, followed by an HTML break tag.
*/

echo $nl . '<p>Task 1.13</p>';
echo $nl . '<p>The value is : ' . $string_w_double_quote .'<p>';

/*
1.14 Replace characters within the above variable with other characters, and echo the new value to the web page, followed by an HTML break tag.
*/

echo $nl . '<p>Task 1.14</p>';
echo $nl . '<p>The value is : ' . str_replace("String", "Character", $string_w_double_quote) .'<p>';

/*
1.15 Set a string variable with some HTML tags in it, and echo it to the web page, followed by an HTML break tag.
*/

$html_string = "<h3>This is string with HTML tags</h3>";
echo $nl . '<p>Task 1.15</p>';
echo $html_string;

/* 
1.16 Use strip_tags() on the above variable and echo it to the web page again, followed by an HTML break tag.
*/

echo $nl . '<p>Task 1.16</p>';
echo $nl . '<p>The value is : ' . strip_tags($html_string) .'<p>';

/* 
1.17 Set a variable in single quotes that includes the following inside: double quotes, an ampersand, less than, greater than.
*/

$special_chars = '"" & < >';
echo $nl . '<p>Task 1.17</p>';
echo $nl . '<p>The value is : ' . $special_chars .'<p>';

/* 
1.18 Use htmlentities() on the above variable, and echo it to the web page, followed by an HTML break tag,
THEN view the source code of the page in a browser and 
THEN create a multi-line PHP comment in this file
THEN copy and paste the exact text of that variable as it appears in the HTML source code.
*/

echo $nl . '<p>Task 1.18</p>';
echo $nl . '<p>The value is : ' . htmlEntities($special_chars) .'<p>';

/*
    1.18. &quot;&quot; &amp; &lt; &gt;
*/ 

/* 
1.19 Write a single line PHP comment.
*/

// This is single line PHP comment

/* 
1.20 Use PHP to get the current date and time, and echo it to the web page in this format: YYYY-MM-DD HH:MM:SS where HH is 24 hour time (not 12 hours).
*/

echo $nl . '<p>Task 1.20</p>';
echo $nl . '<p>The value is : ' . date("Y-m-d H:i:s") .'<p>';

/*
TOPIC 2: ARRAYS
*/

/*
2.1 Declare variable as an empty array.
*/

$simple_array = array();
echo $nl . '<p>Task 2.1</p>';
echo $nl . '<p>The value is : ' . print_r($simple_array, true) .'<p>';

/* 
2.2 Add five values, one at a time, to the above array (as a simple array)
*/

$simple_array[] = 'Hello';
$simple_array[] = 'World';
$simple_array[] = 'ANLY';
$simple_array[] = '575';
$simple_array[] = 'PHP';

echo $nl . '<p>Task 2.2</p>';
echo $nl . '<p>The value is : ' . print_r($simple_array, true) .'<p>';

/*
2.3 Create a simple array with 5 values already in the array when you declare it.
*/

$new_array = ['assignment', '3', 'practice', 'Web', 'Development'];
echo $nl . '<p>Task 2.3</p>';
echo $nl . '<p>The value is : ' . print_r($new_array, true) .'<p>';

/*
2.4 Use print_r() on one of the arrays above
*/

echo $nl . '<p>Task 2.4</p>';
echo $nl . '<p>The value is : ' . print_r($new_array, true) .'<p>';

/*
2.5 Use print_r() surrounded by <pre> tags on one of the arrays above.
*/

echo $nl . '<p>Task 2.5</p>';
echo '<pre> '. print_r($simple_array, true) .'</pre><br>';

/*
2.6 Combine the two arrays into one array.
*/

$merged_array = array_merge($new_array, $simple_array);
// echo '<pre> ', print_r($merged_array, true) ,'</pre><br>';

/*
2.7 Use print_r() surrounded by <pre> tags on the combined array.
*/

echo $nl . '<p>Task 2.7</p>';
echo '<pre>'. print_r($merged_array, true) .'</pre><br>';

/*
2.8 Sort the combined array alphabetically and use print_r() surrounded by <pre> tags on the array.
*/

sort($merged_array);
echo $nl . '<p>Task 2.8</p>';
echo '<pre>'. print_r($merged_array, true) .'</pre><br>';

/*
2.9 Sort the combined array in reverse alphabetical order and use print_r() surrounded by <pre> tags on the array.
*/

rsort($merged_array);
echo $nl . '<p>Task 2.9</p>';
echo '<pre>2.9. '. print_r($merged_array, true) .'</pre><br>';

/*
2.10 Set a new variable to the resulting value of using implode() on the combined array, and echo the result to the web page,
THEN paste the result into a PHP comment.
*/

$implode = implode(", ", $merged_array);
echo $nl . '<p>Task 2.10</p>';
echo $implode . '<br>';
// 2.10. practice, assignment, World, Web, PHP, Hello, Development, ANLY, 575, 3

/* 
2.11 Use a built-in PHP function to count the total number of items in the array.
*/

echo $nl . '<p>Task 2.11</p>';
echo count($merged_array) . '<br>';

/*
2.12 Echo the second item in the array, using the numeric key of the array.
*/

echo $nl . '<p>Task 2.12</p>';
echo $merged_array[1] . '<br>';

/*
2.13 Create a multi-dimensional array of 5 key/value pairs.
*/

$key_value_array = array(
    "Jon" => "20",
    "Peter" => "32",
    "Elyse" => "2",
    "Jenny" => "28",
    "Nico" => "17"
);

echo $nl . '<p>Task 2.13</p>';
echo '<pre>'. print_r($key_value_array, true) .'</pre><br>';

/*
2.14 Use a built-in PHP function to sort this array by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

ksort($key_value_array);
echo $nl . '<p>Task 2.14</p>';
echo '<pre>' . print_r($key_value_array, true) .'</pre><br>';

/*
2.14 Use a built-in PHP function to sort this array by the values, and use print_r() surrounded by <pre> tags on the array.
*/

asort($key_value_array);
echo $nl . '<p>Task 2.14</p>';
echo '<pre>'. print_r($key_value_array, true) .'</pre><br>';

/*
2.15 Add another key/value pair to this array, then sort it again by the keys, and use print_r() surrounded by <pre> tags on the array.
*/

$key_value_array['Alan'] = "25";
ksort($key_value_array);
echo $nl . '<p>Task 2.15</p>';
echo '<pre>', print_r($key_value_array, true) ,'</pre><br>';

/*
TOPIC 3: CONDITIONAL LOGIC
*/


/*
3.1 Write a simple if/else test to see if a variable contains any value, and echo the result to the web page.
*/
echo $nl . '<p>Task 3.1</p>';
$var3_1 = "hello world";
if($var3_1){
    echo 'True statement<br>';
}else{
    echo 'False statement<br>';
};

/* 
3.2 Write an if/else test with 4 possibilities. For example, if it is equal to x, y, or z (you can choose what values to test for), else default,
and echo the result to the web page.
*/
$condition = 'hello';
echo $nl . '<p>Task 3.2</p>';

if($condition == 'bye'){
    echo 'Bye!<br>';
}elseif($condition =='hello'){
    echo 'Hello!<br>';
}elseif($condition =='hey'){
    echo 'Hey!<br>';
}elseif($condition =='wassup'){
    echo 'Wassup!<br>';
}else{
    echo 'Yo!<br>';
}

/*
3.3 Write a test for the exact same conditions as above, but use switch/case syntax, and echo the result to the web page.
*/

echo $nl . '<p>Task 3.3</p>';
switch ($condition) {
    case 'bye':
        echo 'Bye!<br>';
        break;
    case 'hello':
        echo 'Hello!<br>';
        break;
    case 'hey':
        echo 'Hey!<br>';
        break;
    case 'wassup':
        echo 'Wassup!<br>';
        break;
    default:
        echo 'Yo!<br>';
}

/*
3.4 Write an if/else test in which two conditions must both be true, and echo the result to the web page.
*/
$var_string = "Hello"; 
$var_int = 134;
echo $nl . '<p>Task 3.4</p>';

if(is_int($var_string) && is_int($var_int)){
    echo $nl . '<p>Both condition is true</p>';
}else{
    echo $nl . '<p>At least one of condition is false</p>';
}
/* 
3.5 Write an if/else test in which either one condition or the other must be true, and echo the result to the web page.
*/

echo $nl . '<p>Task 3.5</p>';

if(is_int($var_string) || is_int($var_int)){
    echo $nl . '<p>At least on if the condition is true</p>';
}else{
    echo $nl . '<p>Neither condition are false</p>';
}

/*
3.6 Write an if/else test in which either two conditions must both be true or another condition must be true, and echo the result to the web page.
*/

echo $nl . '<p>Task 3.6</p>';

if((is_int($var_string) && is_int($var_int)) || $var_int == 100){
    echo $nl . '<p>Both condition is true</p>';
}
else{
    echo $nl . '<p>At least one of condition is false</p>';
}

/*
3.7 Write an if/else test using the not operator (the exclamation mark), and echo the result to the web page.
*/

echo $nl . '<p>Task 3.7</p>';

if(!is_int($var_string)){
    echo $nl . '<p>$var_string is not integer</p>';
}
else{
    echo $nl . '<p>$var_string is integer</p>';
}

/*
3.8 Write an if/else test to find out if the first character of a string is the letter "A", and echo the result to the web page.
*/

echo $nl . '<p>Task 3.8</p>';
if(substr($var_string, 0, 1) == "A"){
    echo $nl . '<p>First character of a string ($var_string) is the letter "A"</p>';
}
else{
    echo $nl . '<p>First character of a string ($var_string) is not the letter "A"</p>';
}

/* 
3.9 Write an if/else test to find out if a variable value is an integer, or an array, or if neither, and echo the result to the web page.
*/

echo $nl . '<p>Task 3.9</p>';

if((is_int($var_string)) || (is_array($var_string)) || (!is_int($var_string) && !is_array($var_string))){
    echo $nl . '<p>$var_string is an integer or an array or neither</p>';
}
else{
    echo $nl . '<p>$var_string is not an integer or not an array or both</p>';
}

/*
3.10 Write an if/else test to find out if a simple array contains a particular value 
(you can use one of your simple arrays that you created earlier in this file), and echo the result to the web page.
*/

echo $nl . '<p>Task 3.10</p>';

$programming_languages = array("Java", "JS", "PHP", "Python");

if (in_array("Java", $programming_languages)) {
    echo $nl . '<p>Java in $programming_language array</p>';
}else{
    echo $nl . '<p>Java is not in $programming_language array</p>';
}

/*
3.11 Use the null coalescing operator to set the value of a variable to either:
1. the value of another variable, if it is not empty, or
2. a default value
and echo the resulting value of the variable to the web page.
*/

echo $nl . '<p>Task 3.11</p>';
$color = $color ?? 'blue';
echo $nl . '<p>The value is ' . $color  . '</p>';

/*
TOPIC 4: MATH CALCULATIONS
*/

/*
4.1 Create two variables as integers, then create a third variable as the sum of the first two, and echo the result to the web page.
*/

echo $nl . '<p>Task 4.1</p>';
$first = 20;
$second = 2501;
$sum = $first + $second;
echo $nl . '<p>The value is ' . $sum  . '</p>';

/*
4.2 Create another variable as the product (multiplied value) of the two variables, and echo the result to the web page.
*/

echo $nl . '<p>Task 4.2</p>';
$multiple = $first * $second;
echo $nl . '<p>The value is ' . $multiple  . '</p>';

/*
4.3 Create another variable as the quotient (divided by) of the two variables, and echo the result to the web page.
*/

echo $nl . '<p>Task 4.3</p>';
$division = $second / $first;
echo $nl . '<p>The value is ' . $division  . '</p>';

/*
TOPIC 5: LOOPS
*/

/*
5.1 Write a for() loop to echo each value of a simple array (you can use one of your arrays above), with each item on its own line on the web page.
*/

echo $nl . '<p>Task 5.1</p>';
for ($i=0; $i < count($programming_languages); $i++){
    echo $nl . '<p>' . $programming_languages[$i]  . '</p>';
}

/*
5.2 Write a while() loop to do the same task as above.
*/

echo $nl . '<p>Task 5.2</p>';
$i =0;
while($i < count($programming_languages)) {
    echo $nl . '<p>' . $programming_languages[$i]  . '</p>';
    $i++;
}

/*
5.3 Write a foreach() loop to do the same task as above.
*/

echo $nl . '<p>Task 5.3</p>';
foreach ($programming_languages as $programming_language){
    echo $nl . '<p>' . $programming_language  . '</p>';
}

/*
5.4 Write a foreach() loop to echo the key/value pairs of a multidimensional array (you can use one of your multidimensional arrays above).
*/

echo $nl . '<p>Task 5.4</p>';
foreach($key_value_array as $key => $value){
    echo $nl . '<p>Key: ' . $key  . ', Value: ' . $value  .'</p>';
}

/*
5.5 Write a foreach() loop to find out if a multidimensional array contains a particular KEY, and echo the result to the web page.
*/

echo $nl . '<p>Task 5.5</p>';
foreach($key_value_array as $key => $value){
    if ('Nico' == $key) {
        echo $nl . '<p>Found key: '. $key.'</p>';
    }else{
        echo $nl . '<p>Key not found</p>';
    }
}

/*
5.6 Write a foreach() loop to find out if a multidimensional array contains a particular VALUE, and echo the result to the web page.
*/

echo $nl . '<p>Task 5.6</p>';
foreach($key_value_array as $key => $value){
    if (25 == $value) {
        echo $nl . '<p>Found value: '. $value.'</p>';
    }else{
        echo $nl . '<p>Value not found</p>';
    }
}

/*
TOPIC 6: FUNCTIONS
*/

/*
6.6 Write a function to do the task in exercise 5.5 above, and send an array into that function, 
plus the value to check for (2 parameters in total), and echo the result to the web page.
You don't have to write new logic here. Just take the same logic as in 5.5. and wrap it in a function.
*/

echo $nl . '<p>Task 6.6</p>';
function findKeyInArray($arrayToSearch, $keyword){
    $nl = "\r\r";

    foreach($arrayToSearch as $key => $value){
        if ($keyword == $key) {
            echo $nl . '<p>Found key: '. $key.'</p>';
        }else{
            echo $nl . '<p>Key not found</p>';
        }
    }    
}

echo $nl . '<h4>With Key</h4>';
findKeyInArray($key_value_array, 'Jon');
echo $nl . '<h4>With Key does not exist</h4>';
findKeyInArray($key_value_array, 'Will');

/*
6.7 Create another function that can check either the key or the value (the logic from 5.5. and 5.6 above). To call this function,
you want to send three parameters to it:
1. an array
2. the value you want to find
3. whether to search for it in the key or in the value of the array's key/value pairs.
*/

echo $nl . '<p>Task 6.7</p>';
function findKeyOrValueFromArray($arrayToSearch, $keyword, $keyOrValue){
    $nl = "\r\r";

    if($keyOrValue =="key"){
        foreach($arrayToSearch as $key => $value){
            if ($keyword == $key) {
                echo $nl . '<p>Found key: '. $key.'</p>';
            }else{
                echo $nl . '<p>Value not found</p>';
            }
        }    
    
    }elseif($keyOrValue =="value"){
        foreach($arrayToSearch as $key => $value){
            if ($keyword == $value) {
                echo $nl . '<p>Found value: '. $value.'</p>';
            }else{
                echo $nl . '<p>Value not found</p>';
            }
        }    
    
    }else{
        echo $nl . '<p>Please type "key" or "value" in third parameter to search</p>';
    }
}

echo $nl . '<h4>With Key</h4>';
findKeyOrValueFromArray($key_value_array, 'Jon', 'key');

echo $nl . '<h4>With Key does not exist</h4>';
findKeyOrValueFromArray($key_value_array, 'Linsey', 'key');

echo $nl . '<h4>With value</h4>';
findKeyOrValueFromArray($key_value_array, 20, 'value');

echo $nl . '<h4>With Value does not exist</h4>';
findKeyOrValueFromArray($key_value_array, 2000, 'value');

echo $nl . '<h4>With wrong 3rd parameter</h4>';
findKeyOrValueFromArray($key_value_array, 'Jon', 'both');

?>

</body>
</html>