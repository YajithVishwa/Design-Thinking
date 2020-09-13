<html>
<head>
<title>Output</title>
<link rel="icon" type="image/ico" href="b.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"></link>
<body>
<div id="header" style="text-align:centre"class="w3-container w3-red" >

<img src="b.png" width="200px" style="position:relative;top:7px;" alt="Bugger logo" />
<h1>Intra Net Compiler</h1></div><br>
<h4>Output:</h4><br>
</body>
</html>
<?php
 putenv("PATH=C:\Program Files (x86)\CodeBlocks\MinGW\bin");
	$CC="gcc";
	$out="a.exe";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.c";
	$filename_code1="main.txt";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.exe";
	$command=$CC." -lm ".$filename_code;
	$command_error=$command." 2>".$filename_error;

    exec("sudo -i");

	$file_code=fopen($filename_code,"w+");
	$file_code1=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fwrite($file_code1,$code);
	fclose($file_code1);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	exec("chmod 777 $executable");
	exec("chmod 777 $filename_error");

	shell_exec($command_error);
	$error=file_get_contents($filename_error);
    $test=shell_exec("cat a1.txt");
	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filename_in;
			$output=shell_exec($out);
		}
		echo "<pre>$output</pre>";

	}
	else if(!strpos($error,"error"))
	{
		echo "<pre>$error</pre>";
		if(trim($input)=="")
		{
			$output=shell_exec($out);
		}
		else
		{
			$out=$out." < ".$filname_in;
			$output=shell_exec($out);
		}
		echo "<pre>$output</pre>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *[!0-9].txt");
	exec("rm $executable");
?>
