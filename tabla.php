<?php 

	//

	include("config.php");
	$r =  __FILE__;
	$r2 = substr($r, 0, 26);  // abcd
	
	$r3 = "pru.json";
	$ruta = $r2.$r3;
	 $data = file_get_contents($ruta);
	 $paises = json_decode($data);
	function m(){
		   echo "hola";
	}
		
?>
<DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Capturar pantalla del sitio web desde URL PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>	
</head>

	<body> 

		<?php
					foreach($paises as $p=>$pa){
						
					}
				?>
					 
		<div class="container">
		    <table class= "table table-striped">
			<thead>
				<tr>
					<td>num</td>
					<td>Codigo</td>
					<td>Nombre</td>
					<td>Continente</td>

					<td>Región</td>

				</tr>
			</thead>
			<tbody>
				
			<?php
					foreach($paises as $p=>$pa){
						
					
				?><tr>

					<th><?php echo $pa->no ?> </th>	
					<th><?php echo $pa->Code ?> </th>	
					<th><?php echo $pa->Name ?> </th>	
                                        <th><?php echo $pa->Continent ?> </th>	
	                               <th><?php echo $pa->Region ?> </th>	
					</tr>
                                      <?php }?> 
						
				
			</tbody>
		    </table>	 
			
		</div>

			<?php 
       
			?>

	</body>
</html>

