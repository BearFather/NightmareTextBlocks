<html>
<head>
<style>
body{
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
<body  style="background-color:black">
<?php
$commands=array("ability","addexp","addevil","adddelay","cast","check","checkability","checkitem","checkskill","checkspell","class","clear","clearitem","evilaligned","failitem","failroomitem","flag","giveability","givecoins","giveitem","goodaligned","learnspell","maxlevel","message","minlevel","needmonster","nomonsters","price","race","random","remoteaction","removeability","roomitem","roomtext","summon","takeitem","teleport","testability","testskill","test_tournament","text");
?>
<form name=build method=post action=''>
<table>
<tr><td>Command Type</td><td>Comand Value</td><td>Times</font></td></tr>
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

function opt($cmds){
	foreach ($cmds as $value) {
	        $value=stripcslashes($value);
	        echo "<option value='$value'>".$value."</option>";
	}

}
function buildln($num,$commands){
	$cnum="num".$num;
	$ccommand="command".$num;
	$ctimes="times".$num;
	echo "<tr><td><select name='".$ccommand."'  id='ip' >";
		opt($commands);
 	echo "</select></td>";
	echo "<td><center><input id='ip' type=text name='".$cnum."' value='' size=3><input  id='ip' type=text name='2".$cnum."' value='' size=3></center></td>";
	echo "<td><input  id='ip' type=text name='".$ctimes."' value='1' size=3></td></tr>";
}
function builder($cnum){
	$t="times".$cnum;
	$cc="command".$cnum;
	$n="num".$cnum;
	$n2="2num".$cnum;
	$c=0;
	while ($_POST[$t]>$c){
		$line=$_POST[$cc]." ".$_POST[$n];
		if (strlen($_POST[$n2])>0){$line=$line." ".$_POST[$n2];}
		echo $line.":";
		$c++;
	}
}
?>
</body>
</html>
