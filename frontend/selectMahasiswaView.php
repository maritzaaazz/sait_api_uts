<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        .delete-icon {
        color: red;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
    <!-- <style>
        div.scroll {

        width: 600px;
        height: 400px;
        overflow: scroll;
        }
    </style> -->
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Tabel Nilai Mahasiswa</h2>
                        <a href="insertNilaiView.php" class="btn btn-success float-right "><i class="fa fa-plus"></i> Tambah Nilai</a>
                    </div>
                    <!-- <div class="scroll"> -->
                    <?php
                    $curl= curl_init();
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    //Pastikan sesuai dengan alamat endpoint dari REST API di UBUNTU, 
                    curl_setopt($curl, CURLOPT_URL, 'http://localhost/sait_api_uts/mahasiswa_api.php');
                    $res = curl_exec($curl);
                    $json = json_decode($res, true);

                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th style='text-align:center;'>NIM</th>";
                                        echo "<th style='text-align:center;'>Nama</th>";
                                        echo "<th style='text-align:center;'>Alamat</th>";
                                        echo "<th style='text-align:center;'>Tanggal Lahir</th>";
                                        echo "<th style='text-align:center;'>Kode MK</th>";
                                        echo "<th style='text-align:center;'>Nama MK</th>";
                                        echo "<th style='text-align:center;'>SKS</th>";
                                        echo "<th style='text-align:center;'>Nilai</th>";
                                        echo "<th style='text-align:center;'>Aksi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                for ($i = 0; $i < count($json["data"]); $i++){
                                    echo "<tr>";
                                        echo "<td> {$json["data"][$i]["nim"]} </td>";
                                        echo "<td> {$json["data"][$i]["nama"]} </td>";
                                        echo "<td> {$json["data"][$i]["alamat"]} </td>";
                                        echo "<td> {$json["data"][$i]["tanggal_lahir"]} </td>";
                                        echo "<td> {$json["data"][$i]["kode_mk"]} </td>";
                                        echo "<td> {$json["data"][$i]["nama_mk"]} </td>";
                                        echo "<td> {$json["data"][$i]["sks"]} </td>";
                                        echo "<td> {$json["data"][$i]["nilai"]} </td>";
                                        echo "<td style='text-align:center;'>";
                                            echo '<a href="updateNilaiView.php?nim='. $json["data"][$i]["nim"].'&kode_mk='. $json["data"][$i]["kode_mk"].'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="deleteNilaiDo.php?nim='. $json["data"][$i]["nim"].'&kode_mk='. $json["data"][$i]["kode_mk"] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash delete-icon"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";

                    curl_close($curl);
                    ?>
                </div>
                </div>
            </div>        
        </div>
    </div>

    <p><p><p>
   
</body>
</html>