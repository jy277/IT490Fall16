<?php
	$rows = $_GET["rows"];
	$cols = $_GET["cols"];

	$returnString = "<table>";
	
	for($i=0; $i<$rows; $i++){
		$returnString .= "<tr>";
		
		for($j=1; $j<$cols+1; $j++){
			$returnString .= "<td>$j</td>";
		}
		
		$returnString .= "</tr>";
	}
	
	$returnString .= "</table>";
	
	echo $returnString;
?>
