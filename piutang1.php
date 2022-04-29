<?php


$server = "localhost";
$user = "root";
$pass = "";
$database = "mecanote";    

$connection = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($connection));
if(isset($_POST['bsimpan']))
{
  if($_GET['hal']  == "edit")
  {
    $edit = mysqli_query($connection, " UPDATE piutang set
                                          tanggal_piutang = '$_POST[pitanggal_piutang]',
                                          jenis_piutang = '$_POST[pijenis_piutang]',
                                          jumlah = '$_POST[pijumlah]',
                                          harga_satuan = '$_POST[piharga_satuan]',
                                          keterangan = '$_POST[piketerangan]',
                                          subtotal = '$_POST[pisubtotal]'
                                        WHERE id_piutang = '$_GET[id]'

                                                  ");
    if($edit)
    {
      echo "<script>
          alert('Edit Data Berhasil');
          document.location = 'piutang1.php';


          </script>";
    }
    else
    {
      echo "<script>
          alert('Edit Data Gagal');
          document.location = 'piutang1.php';


          </script>";
    }

  }
  else{
    $simpan = mysqli_query($connection, "INSERT INTO piutang (tanggal_piutang, jenis_piutang, jumlah, harga_satuan, keterangan, subtotal)
                                      VALUES ('$_POST[pitanggal_piutang]','$_POST[pijenis_piutang]', '$_POST[pijumlah]', '$_POST[piharga_satuan]','$_POST[piketerangan]', '$_POST[pisubtotal]')
                                                  ");
    if($simpan)
    {
      echo "<script>
          alert('Simpan Data Berhasil');
          document.location = 'piutang1.php';


          </script>";
    }
    else
    {
      echo "<script>
          alert('Simpan Data Gagal');
          document.location = 'piutang1.php';


          </script>";
    }
  }


  
  if(isset($_GET['hal']))
  {
    if($_GET['hal'] == "edit")
    {
      $tampil = mysqli_query($connection, "SELECT * FROM piutang WHERE id_piutang = '$_GET[id]'") ;
      $data = mysqli_fetch_array($tampil) ;
      if($data)
      {
        $vtanggal_piutang = $data['tanggal_piutang'];
        $vjenis_piutang = $data['jenis_piutang'];
        $vjumlah = $data['jumlah'];
        $vharga_satuan = $data['harga_satuan'];
        $vketerangan = $data['keterangan'];
        $vsubtotal = $data['subtotal'];
      }
    }
    else if ($_GET['hal'] == "hapus")
    {
      $hapus = mysqli_query($connection, "DELETE FROM piutang WHERE id_piutang = '$_GET[id]'");
      if($hapus){
        echo "<script>
        alert('Hapus Data Berhasil');
        document.location = 'piutang1.php';


        </script>";
  
      }


    }
  }

}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css" />
    <link rel="stylesheet" type="text/css" href="css/boostrap.min.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

    <title>Meca Note</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
      <a class="navbar-brand" href="#">MecaNote</a>
      
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="icon ml-2">
            <h5>
                <i class="fas fa-sign-out"></i>
            </h5>
        </div>
      </div>
    </nav>

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4"> 
          <ul class="nav flex-column ml-3 mb-2">
            <li class="nav-item">
              <a class="nav-link active text-white" href="#">Dashboard</a><hr class="bg-secondary">
            </li>
          </ul>
          <div class="dropdown ml-2 mb-2">
            <a class="btn btn-secondary dropdown-toggle" type="a" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="false">
              Pecatatan
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <a class="dropdown-item " href="pemasukan.php">Pemasukan</a>
              <a class="dropdown-item " href="pengeluaran.php">Pengeluaran</a>
              <a class="dropdown-item " href="hutang.php">Hutang</a>
              <a class="dropdown-item " href="piutang.php">Piutang</a>
            </div>  
          </div> 
          <div class="dropdown ml-2 mt-2">
            <a class="btn btn-secondary dropdown-toggle" type="a" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="false">
              Keuangan
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
              <a class="dropdown-item " href="pemasukan1.php">Pemasukan</a>
              <a class="dropdown-item " href="pengeluaran1.php">Pengeluaran</a>
              <a class="dropdown-item " href="hutang1.php">Hutang</a>
              <a class="dropdown-item " href="piutang1.php">Piutang</a>
            </div>  
          </div>    
        </div>
        <div class="col-md-10 p-5 pt-2">
        <h3>Piutang</h3><hr>
          <div class="card">
            <div class="card-header bg-warning text-white">
              Form Input Data Piutang
            </div>
            <div class="card-body">
              <form method="post" action="">
              <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="pitanggal_piutang" value="<?=@$tanggal_piutang?>" class="form-control" placeholder="Input Tanggal piutang" required>
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" name="pijenis_piutang" value="<?=@$vjenis_piutang?>" class="form-control" placeholder="Input Jenis piutang" required>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" name="pijumlah" value="<?=@$vjumlah?>" class="form-control" placeholder="Input Jumlah" required>
                </div>
                <div class="form-group">
                  <label>Harga Satuan</label>
                  <input type="text" name="piharga_satuan" value="<?=@$vharga_satuan?>" class="form-control" placeholder="Input Harga Satuan" required>
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea class="form-control" name="piketerangan"  placeholder="Input Keterangan"><?=@$vketerangan?></textarea>
                </div>
                <div class="form-group">
                  <label>Sub Total</label>
                  <input type="text" name="pisubtotal" value="<?=@$vketerangan?>" class="form-control" placeholder="Input Sub Total" required>
                </div>
                <button type="submit" class="btn btn-success" name="bsimpan">SIMPAN</button>
                <button type="reset" class="btn btn-success" name="breset">KOSONGKAN</button>
              </form>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-warning text-white">
              Data Piutang
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Sub Total</th>
                    <td colspan="3" scope="col">AKSI</td>
                  </tr>
                </thead>
                <?php
                  $no = 1;
                  $tampil = mysqli_query($connection, "SELECT * FROM piutang ORDER BY id_piutang DESC") ;
                  while($data = mysqli_fetch_array($tampil)) :
                ?>
                 <tbody>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$data['tanggal_piutang']?></td>
                        <td><?=$data['jenis_piutang']?></td>
                        <td><?=$data['jumlah']?></td>
                        <td><?=$data['harga_satuan']?></td>
                        <td><?=$data['keterangan']?></td>
                        <td><?=$data['subtotal']?></td>
                        <td>
                          <a href="piutang1.php?hal=edit&id=<?=$data['id_piutang']?>"><i class="fas fa-edit" data-toogle="tooltip" title="Edit"></i></a>
                        </td>

                    
                    <tr>
                </tbody>
                <?php endwhile; ?>
               
              </table>
     
            </div>
          </div>

            

            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
    <script src="admin.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
  </body>
</html>
