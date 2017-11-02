<!DOCTYPE html>
<html>
<head>
	<title>Prueba</title>
	<style>
		tr td{
			border:1px solid ;
		}
	</style>
</head>
<body>
	<?php
		for($i = 1 ; $i <= 2; $i++){
			echo "<p>La tabla del $i<p>";
		
			for ($n=1; $n <= 10 ; $n++) { 
				$mult = $i * $n;
				echo "<p>$i x $n = $mult<p>";
			}
		}
	?>

	<table>
		<?php
			for($i = 1 ; $i <= 6; $i++){
				
				echo "<tr>";
				for ($n=1; $n <= 5 ; $n++) { 

					$mult = $i * $n;
					echo "<td>$i * $n = $mult</td>";
				}
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>