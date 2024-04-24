<?php

if(isset($_POST['submit']))
{    

$nilai = $_POST['nilai'];
$kode_mk = $_POST['kode_mk'];
$nim = $_POST['nim'];


//Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
$url='http://localhost/sait_api_uts/mahasiswa_api.php?nim='.$nim.'&kode_mk='.$kode_mk.'';
$ch = curl_init($url);
//kirimkan data yang akan di update
$jsonData = array(
    'kode_mk' => $kode_mk,
    'nim' => $nim,
    'nilai' =>  $nilai,
);


//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, true);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

$result = curl_exec($ch);

$result = json_decode($result, true);
curl_close($ch);

print("<center><br>status :  {$result["status"]} "); 
print("<br>");
print("message :  {$result["message"]} "); 
 echo "<br>Sukses mengupdate nilai mahasiswa!";
 echo "<br><a href=selectMahasiswaView.php> OK </a>";
}
?>

 