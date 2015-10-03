<html>
<head>
<style> //Styling
body{
	background-color:black;
	margin-top:30px;
	margin-left:30px;
}
table, th, td, #ip{
	border: 1px inset #006666;
	background-color: black;
	color:#00cccc;
}
#bt{
	color:#006666;
	margin-left:118px;
}
</style>
</head>
<body>
<?php //All the commands in the drop down
$commands=array("ability","addexp","addevil","adddelay","cast","check","checkability","checkitem","checkskill","checkspell","class","clear","clearitem","evilaligned","failitem","failroomitem","flag","giveability","givecoins","giveitem","goodaligned","learnspell","maxlevel","message","minlevel","needmonster","nomonsters","price","race","random","remoteaction","removeability","roomitem","roomtext","summon","takeitem","teleport","testability","testskill","test_tournament","text");
?>
<form name=build method=post action=''>
<table>
<tr><td>Command Type</td><td>Comand Value</td><td>Times</td></tr>
<? buildln("1",$commands); ?>
<? buildln("2",$commands); ?>
<? buildln("3",$commands); ?>
<? buildln("4",$commands); ?>
<? buildln("5",$commands); ?>
<? buildln("6",$commands); ?>
<? buildln("7",$commands); ?>
<? buildln("8",$commands); ?>
</table>
<p><input id='bt' type=submit name='build' value='build'>
</form>
<?
if (isset($_POST['build'])){
	echo "<textarea id='ip' name='builder' rows='10' cols='80'>";
	builder("1");
	if (strlen($_POST['num2'])>0){builder("2");}
	if (strlen($_POST['num3'])>0){builder("3");}
	if (strlen($_POST['num4'])>0){builder("4");}
	if (strlen($_POST['num5'])>0){builder("5");}
	if (strlen($_POST['num6'])>0){builder("6");}
	if (strlen($_POST['num7'])>0){builder("7");}
	if (strlen($_POST['num8'])>0){builder("8");}
	echo "</textarea>";
}

function opt($cmds,$sel){//adding all the different commands to the dropdown
	foreach ($cmds as $value) {
	        $value=stripcslashes($value);
	        $line="<option value='$value'";
		if ($value == $sel){$line=$line." selected ";}
		$line=$line.">".$value."</option>";
		echo $line;
	}

}
function buildln($num,$commands){// build the text area and dropdown line
	$cnum="num".$num;
	$ccommand="command".$num;
	$ctimes="times".$num;
	$nvalue="";
	$nvalue2="";
	$tvalue=1;
	$ovalue="ability";
	if (isset($_POST['build'])){//loads the string with the previous option
		$nvalue=trim($_POST[$cnum]);
		$nvalue2=trim($_POST["2".$cnum]);
		if (is_numeric(trim($_POST[$ctimes]))){$tvalue=trim($_POST[$ctimes]);}
		$ovalue=$_POST["command".$num];
	}
	echo "<tr><td><select name='".$ccommand."'  id='ip'>"; //dropdown begin
		opt($commands,$ovalue);
 	echo "</select></td>";//drop down ends
	echo "<td><center><input id='ip' type=text name='".$cnum."' value='".$nvalue."' size=3><input  id='ip' type=text name='2".$cnum."' value='".$nvalue2."' size=3></center></td>";//value boxs 1&2
	echo "<td><input  id='ip' type=text name='".$ctimes."' value='".$tvalue."' size=3></td></tr>";//times box
}
function builder($cnum){//fills in textarea with finish txtblk line
	$t="times".$cnum;
	$cc="command".$cnum;
	$n="num".$cnum;
	$n2="2num".$cnum;
	$tc=trim($_POST[$t]);
	if (!is_numeric(trim($_POST[$t]))){$tc=1;}

	$c=0;
	while ($tc>$c){
		$line=$_POST[$cc]." ".trim($_POST[$n]);
		if (strlen($_POST[$n2])>0){$line=$line." ".trim($_POST[$n2]);}
		echo $line.":";
		$c++;
	}
}
?>
</body>
</html>
