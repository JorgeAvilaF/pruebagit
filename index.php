<?php 

//	echo "Hola";
$r = "https://trends.google.com/trends/trendingsearches/daily/rss?geo=MX";
	simplexml_load_file($r);
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
?>
<html>
	<head>
		<title>Primer prueba</title>
	</head>
	<body>
	<p> <?php  print_r($trends) ?>  </p>
	</body>
</html>
