
<?php
//Maeda Hanafi
//CSC543
//Assignment #4
print"<html><body>";
//read question file
$questions = file("questions.txt");

//process form 
if($_SERVER["REQUEST_METHOD"]=="POST"){
			
	foreach($_POST as $field => $value){
		//print"$field=$value<br>";
	}
	//decide whether to reset form or to write to results file
	if($_POST['submit1']=='Submit'){
		print"Thank you! Please come back soon.<br>";
		//read result file
		$results = file("results.txt");
		//if file doesn't exits create result
		if(!file_exists("results.txt")){
			//print"dummy the ifle doesnt exist";
			for($i=0; $i<sizeof($questions); $i++){
				$results[$i]="0,0,0,0,0 ";
			}
		}
			//else read result and edit
			//go through each question and edit properly
			for($i=0; $i<sizeof($questions); $i++){
				//clear it from all newllines
				$results[$i] = trim(preg_replace('/\s\s+/', ' ', $results[$i]));
				//explode each result line
				$list = explode(",",$results[$i]);
					
				//here i get the answer for question
				$value = $_POST["ans$i"];
				//print"answer:$value<br>";
				//check if updating correct question
				if($value!=null){
					$list[$value]=$list[$value]+1;
					//print"$list[$value]<br>";
				}
				$results[$i] = implode(",",$list);
				//print"$results[$i]<br>";
			}
			//output into result file
			$fptr = fopen("results.txt","w");
			for($i=0; $i<sizeof($results);$i++){
				$bytes_written = fwrite($fptr, $results[$i]."\n");
			}
			fclose($fptr);
		
	}else{
		//continue to form
		//print"fine";
	}
}

//display form
print"<table border=2>";
//format table
print"<tr><td  colspan=7><center>Survey(csc543)</center></td></tr>";
print"<tr><td rowspan=2>#</td><td rowspan=2>Question</td><td>strongly</td><td>somewhat</td><td></td><td>somewhat</td><td>strongly</td></tr>";
print"<tr><td colspan=2>disagree</td><td>neutral</td><td colspan=2>agree</td></tr>";

//do some form stuff
print"<form action='form.php' method='POST'>";

//print out question
for($i=0; $i<sizeof($questions); $i++){
	$num = $i+1;
	print"<tr><td>$num</td><td>$questions[$i]</td>";
	//display radio buttons
	for($j=0; $j<5; $j++){
		print"<td><input type='radio' name='ans$i' value='$j'></td>";
	}
	print"</tr>";
}

//more table stuff
print"<tr><td colspan=2></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>";
print"<tr><td colspan=7><center><input type='submit' name='submit1' value='Submit'><input type='submit' name='reset1' value='Reset'></center></td></tr>";
//end of form
print"</form>";
print "</table></body></html>";
?>

