<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Logical Operators</title>
</head>
<body>
<?php
	$load = array(3,4,"Sherwin",6,56);
	echo $load[2]."</br>";

	$mixed = array(5,"what","oh,no!",array(34,"arvin",6,56));
	echo $mixed[3][1];
?>
<pre>
<?php
	print_r($load);
	print_r($mixed);
?>
</pre>
</body>
</html>