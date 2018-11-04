<h1>This page only contains outputs from experimental functions </h1>
<?php
	//echo "Hello World!";
	/*
	echo "Hello World!";
	*/
	#echo "Hello World!";
	echo "Hello World!";//comments
?>

<?
$variable = "Hello World!";
echo $variable;

//both lines produce same output
echo "A sentance".$variable."here";
echo "A sentance $variable here";

//this line will not evaluate the variable
echo 'A sentance $variable here';

echo "<pre>";
$arr = array(1,2,3);
$arr2 = array("first" => 1, "second" => "2");
echo $arr2['first'];//outputs 1 from second array
echo $arr[0];//outputs 1 from first array
$arr[] = 4;//added 4th element to my first array
$arr['mykey'] = 5;
$arr[] = "after my key";
$arr[100] = 6;
$arr[] = "a word";
echo "<br>Array 1<br>";
print_r($arr);
echo "Array 2<br>";
print_r($arr2);

$arr["arr2"] = $arr2;
print_r($arr);





echo "</pre>";
echo "For Loop<br>";
for($i = 0; $i < 200; $i++)
{
	if(isset($arr[$i]))
	{
		echo $arr[$i]."<br>";
	}
}

echo "Foreach Loop<br>";
$sum = 0;
foreach($arr as $k => $v)
{
	echo "Key:".$k." | ";
	if(is_array($v))
	{
		echo "Value:";
		print_r($v);
		echo "<br>";
	}
	else
	{
		echo "Value:".$v."<br>";
	}
	if(is_numeric($v))
	{
		$sum += $v;
	}
}
foreach($arr2 as $v)
{
	echo "Value:".$v."<br>";
}

/*
if($var1)
{
	
}
elseif($var2)
{

}
*/


$var1 = 10;
function myFunc()
{
	//echo $var1."<br>";
	$var1 = 1;
	echo $var1."<br>";
}
echo $var1."<br>";
myFunc();
echo $var1."<br>";
function myFunc2()
{
	global $var1;
	echo $var1."<br>";
	$var1 = 2;
	echo $var1."<br>";
}
myFunc2();
echo $var1."<br>";

function myFunc3($param1, $param2 = false)
{
	
}

$var = "This is a wordy sentence";
$varArr = explode(" ", $var);
$varGlued = implode(":", $varArr);
echo "<pre>";

echo $var."<br>";

print_r($varArr);

echo $varGlued."<br>";

echo "</pre>";

if(in_array(1, $arr))
{
	echo "Found<br>";
}
?>