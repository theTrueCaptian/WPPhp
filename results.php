
<?php

//Maeda Hanafi
//CSC543
//Assignment #4

print"<html><body>";

//read question file
$questions = file("questions.txt");
//read results file
$results = file("results.txt");
//display form
print"<center>";
print"<table border=2>";
//format table
print"<tr><td  colspan=5><center>Survey(csc543) Results</center></td></tr>";
print"<tr><td>#</td><td>Question</td><td>Average</td><td>Percentage</td><td>Total</td></tr>";


//print out question and results
for($i=0; $i<sizeof($questions); $i++){
	$num = $i+1;
	//print out question
	print"<tr><td>$num</td><td>$questions[$i]</td>";
	
	//display average
	//explode each result line
	$list = explode(",",$results[$i]);
	$total = $list[0]+$list[1]+$list[2]+$list[3]+$list[4];
	$average = ($list[0]*1+$list[1]*2+$list[2]*3+$list[3]*4+$list[4]*5)/($total);
	$average = round($average, 2);
	print"<td>$average</td>";
	
	//display Percentage
	print"<td>";
	//calculate percentages
	$arcdeg[0]=0;
	
	for($j=0; $j<sizeof($list); $j++){
		//$arcdeg[$j]=(($list[$j]/$total)/100)*360;
		$arcdeg[$j]=round(($list[$j]/$total)*360)+$arcdeg[$j-1];
		//print"  $arcdeg[$j]   ";
	}
	//print http_build_query($arcdeg);
	$string = "piechart.php?".http_build_query($arcdeg);
	print"<img src=$string/>";
	print"</td>";
	
	//display total
	print"<td>$total</td>";
	
	print"</tr>";
}
print"</table>";
print"<center>";
print"<table border=2><tr>";
print"<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>";
print"<tr><td bgcolor=#ff0000>1</td><td bgcolor=#bf4000>2</td><td bgcolor=#808000>3</td><td bgcolor=#40bf00>4</td><td bgcolor=#00ff00>5</td></tr>";

print "</table></body></html>";
?>