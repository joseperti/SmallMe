<?php 
	$link = $_POST['link'];
	$db = new mysqli('localhost','u247433961_01','12345678','u247433961_01');
	$consulta = sprintf('SELECT * FROM LINK WHERE TEXTO="%s"',$link);
	$result = $db->query($consulta) or die($db->error);
	if (($result->num_rows) == 0){
		$consulta = sprintf('INSERT INTO LINK(TEXTO,FECHACREACION) values ("%s","%s")',$link,date("Y/m/d H:i:s"));
		$result = $db->query($consulta) or die($db->error);
		$consulta = sprintf('SELECT * FROM LINK WHERE TEXTO="%s"',$link);
		$result = $db->query($consulta) or die($db->error);
		$row = $result->fetch_array();
		echo "<div class='alert alert-info'>";
		echo "<b>Link: http://smallme.hol.es/?i=".base_convert($row['ID'],10,36);
		echo "</b></div>";
	}else{
		$row = $result->fetch_array();
		echo "<div class='alert alert-info'><table>";
		echo "<tr><td>Link:</td><td>http://smallme.hol.es/?i=".base_convert($row['ID'],10,36)."</td></tr>";
		echo "<tr><td>Clicks: </td><td>".$row['CLICKS']."</td></tr>";
		if ($row['ULTVISITA']!=""){
			echo "<tr><td>Last click: </td><td>".$row['ULTVISITA']."</td></tr>";
		}else{
			echo "<tr><td>Last click: &nbsp;&nbsp; </td><td> never </td></tr>";
		}
		echo "</table></div>";
	}
?>