<?php 

//	echo "Hola";
$r = "https://trends.google.com/trends/trendingsearches/daily/rss?geo=MX";

$feeds = simplexml_load_file($r);
$trends = array();
$cuantos = 0;
$max = 3;
$i = 0;
foreach ($feeds->channel->item as $item){
if($i == $max) continue;
	
$title = addslashes($item->title);
$titlex = explode(' ', $title);
$search = '';
//print_r($titlex);
foreach ($titlex as $word){
	//echo $word;
	//echo "<br>". strlen($word)."<br>";

	if(strlen($word) > 1){
	$search .= $word. ' ';
	//echo $search. "<br>";
//	echo $search;
	}
}
$search = str_replace('contra','',$search);
//	echo $search;

	
$traffic =  (string)$item->children('ht', true)->approx_traffic;
//echo $traffic;
//busco en siglo90 si existe alguna nota con ese título
 $string = str_replace("%"," ",str_replace("*"," ",$search));
$string = preg_replace("/\s\s+/"," ",$string);
//echo $string;
$string = str_replace(" ", " +",$string);


 $trends[$i]['title'] = $title;
 $trends[$i]['search'] = $search;
 $trends[$i]['traffic'] = $traffic;
// $trends[$i]['ok'] = ($hay->num_rows > 0) ? '1':'0';
//         if($trends[$i]['ok'] === '1') $cuantos++;i}
$i++;
}

$siteURL = "http://www.programacion.net/";

function curl_load($url){
	    curl_setopt($ch=curl_init(), CURLOPT_URL, $url);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	        $response = curl_exec($ch);
		    curl_close($ch);
		    return $response;
}

$url = "http://www.google.com";
//echo curl_load($url);

//call Google PageSpeed Insights API
$googlePagespeedData = curl_load("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$siteURL&screenshot=true");



//print_r($googlePagespeedData);
//decode json data
$googlePagespeedData = json_decode($googlePagespeedData, true);
//
//
print_r($googlePagespeedData);
////screenshot data
$screenshot = $googlePagespeedData['screenshot']['data'];
$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot); 
//
//display screenshot image
echo '<img src="data:image/jpeg;base64,".$screenshot."" />';
echo "hola";             
if (isset($_POST["enviar"])){
		$pagina=$_POST["url"];
		//Declaramos la Url enviada desde un formulario
		$URLpagina = "".$pagina."";
		echo $URLpagina;
		//
		////Llamamos a Google PageSpeed Insights API
		$PagespeedDataGoogle = file_get_contents("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=$URLpagina&screenshot=true");
			//Decodificar datos con JSON
		$PagespeedDataGoogle = json_decode($PagespeedDataGoogle, true);
		
	 	print_r($PagespeedDataGoogle);

		//
		////La imagen de la captura de pantalla
		//$captura = $PagespeedDataGoogle['screenshot']['data'];
		//$captura = str_replace(array('_','-'),array('/','+'),$captura); 
		//
		////Mostramos en el navegador la captura de pantalla
		//echo "<center><img src=\"data:image/jpeg;base64,".$captura."\" /></center>";
		}
		//

	include("config.php");
	$q = "SELECT 0 no ,  c.Code, c.Name, c.Continent, c.Region FROM country as c ";
	
	$c = $query->Query($q);

	$paises = array();
	$i = 0;
	if($c->num_rows > 0){
		while($pais = $c->fetch_object() ){
		 $pais->no = $i;
		array_push($paises,$pais);
		$i++;		 
 		}
	}

	$r =  __FILE__;
	$r2 = substr($r, 0, 26);  // abcd
	
	$r3 = "pru.json";
	$rarchi = $r2.$r3;
	//echo $rarchi;
	$jsson = json_encode($paises);
	file_put_contents($rarchi , $jsson);
	
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
		<div class="container">
			<p class="text-center">
			boot
			</p>
		</div>

			<?php 
       
				$version = curl_version();
				print_r($version);
			?>

	</body>
</html>

