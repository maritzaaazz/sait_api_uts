<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

<?php
 $nim = $_GET['nim'];
 $kode_mk = $_GET['kode_mk'];
 $curl= curl_init();
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
 curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_api_uts/mahasiswa_api.php?nim='.$nim.'&kode_mk='.$kode_mk.'');
 $res = curl_exec($curl);
 $json = json_decode($res, true);
//var_dump($json);s
?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Nilai Mahasiswa</h2>
                    </div>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="updateNilaiDo.php" method="post">
                        <input type= "hidden" class="form-control" name="nim" value="<?php echo"$nim";?>">
                        <input type= "hidden" class="form-control" name="kode_mk" value="<?php echo"$kode_mk";?>">
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="mobile" name="nilai" class="form-control" value="<?php echo($json["data"][0]["nilai"]); ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>