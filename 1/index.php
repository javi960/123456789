<?php

$hoy = getdate();
$fecha=$hoy["year"]."-".($hoy["mon"]-1)."-01T00:00:00";
$headers = array(
    "Content-Type: application/json",
    "X-CoinAPI-Key: 255AEDF5-A559-4623-9F4C-971E4B506D89"
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://rest.coinapi.io/v1/exchangerate/BTC/EUR/history?period_id=1DAY&time_start=".$fecha);
curl_setopt($ch, CURLOPT_RESUME_FROM,"GET");
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
$res1 = json_decode($res, true);
//print_r($res1);
foreach ($res1 as $key => $value) {
    $porciones = explode("T",$value['time_open']);
    echo date('d/M',strtotime($porciones[0])).' '.$value["rate_open"].'<br><br>';
}
//echo json_encode(curl_exec($ch), JSON_PRETTY_PRINT);
/*$json = json_encode(file_get_contents("https://rest.coinapi.io/v1/assets?apikey=255AEDF5-A559-4623-9F4C-971E4B506D89&invert=true&output_format=json"),true);
$bytes = file_put_contents("myfile.json", $json); 
$data = file_get_contents("myfile.json");
$respuesta = json_decode($data, true);
print_r($respuesta);*/
//$res1 = json_decode($res, true);
//var_dump($res);
//print_r($res);

/*foreach ($res as $key => $value) {
    var_dump($value);
    echo $value["price_open"];
    echo '<br><br>';
    
}*/
curl_close($ch);
