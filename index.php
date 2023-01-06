<?php
	//koneksi database
	$server = "localhost";
	$user = "root";
	$password = "";
	$database = "daftarbarang";

	//nama tabel = databarang

	$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));

	//jika tombol 'Simpan' diklik
	//print_r($_POST);
	if(isset($_POST['submit']))
	{	
		//pengujian apakah data kan diedit atau simpan baru
		if($_GET['hal'] == "edit")
		{
			//Data akan diedit
			$edit = mysqli_query($koneksi," UPDATE databarang SET 
												no_inventaris = '$_POST[nomorbarang]',
												nama_barang = '$_POST[namabarang]',
												lokasi_barang = '$_POST[lokasibarang]',
												jumlah_barang = '$_POST[jumlahbarang]',
												kondisi_barang = '$_POST[kondisibarang]'
											WHERE ID = '$_GET[id]' " );

			if($edit) //Jika edit sukses
			{
				echo	"<script>
						alert ('Edit data sukses!');
						document.location='index.php';
						</script>";
			}
			else
			{
				echo	"<script>
						alert ('Edit data gagal!');
						document.location='index.php';
						</script>";
			}

		} 
		else
		{
			//data akan ditambah baru
			$tambah = mysqli_query($koneksi, "INSERT INTO databarang (no_inventaris, nama_barang, lokasi_barang, jumlah_barang, kondisi_barang)
											VALUES ('$_POST[nomorbarang]',
													'$_POST[namabarang]',
													'$_POST[lokasibarang]',
													'$_POST[jumlahbarang]',
													'$_POST[kondisibarang]')
													" );
		 
			if($tambah) //jika tambah sukses
			{
				echo "<script>
						alert('Tambah Sukses!');
						document.location='index.php';
					</script>";
			}
			else //jika tambah gagal
			{
				echo "<script>
						alert('Tambah GAGAL!!!');
						document.location='index.php';
					</script>";
			}
		}
	
	}

	//Pengujian jika tombol edit atau hapus diklik
	if(isset($_GET['hal']))
	{
		//pengujian jika edit data
		if($_GET['hal'] == "edit")
		{
		//Tampilkan data yang ingin diedit
		$tampil = mysqli_query($koneksi, "SELECT * FROM databarang WHERE ID = '$_GET[id]' ");
		$data = mysqli_fetch_array($tampil);
			if ($data)
				{
					//Jika data ditemukan, maka data ditampung ke dalam variabel
					$vnomorbarang = $data['no_inventaris'];
					$vnamabarang = $data['nama_barang'];
					$vlokasibarang = $data['lokasi_barang'];
					$vjumlahbarang = $data['jumlah_barang'];
					$vkondisibarang = $data['kondisi_barang'];
			
				}
		}
		else if ($_GET['hal'] == "hapus")
		{

			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM databarang WHERE ID = '$_GET[id]' ");
			if($hapus)
			{
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='index.php';
					</script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventory Barang</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<style>
			label {
				font-size: 14px;
			}
		</style>
</head>
<body>
	<div class="container">
    <h1 class="text-center mt-3">DAFTAR BARANG</h1>
		<h2 class="text-center mb-4">PT.GHINAYA SHAHASRA HAUQALA</h2>

		<!-- awalan form -->
		<div class="card">
			<div class="card-header bg-info text-white">
				Form Input Barang Baru
			</div>
			<div class="card-body">
				<form method="post" action="">
					<div class="form-group">
						<label>No Inventaris Barang</label>
						<input class="form-control form-control-sm" type="text" name="nomorbarang" value="<?=@$vnomorbarang?>" placeholder="No.Inventaris Barang" require>
					</div>
					<div class="form-group mt-2">
						<label>Nama Barang</label>
						<input class="form-control form-control-sm" type="text" name="namabarang" value="<?=@$vnamabarang?>" placeholder="Nama Barang" require>
					</div>
					<div class="form-group mt-2">
						<label>Lokasi Barang</label>
						<input class="form-control form-control-sm" type="text" name="lokasibarang" value="<?=@$vlokasibarang?>" placeholder="Lokasi Barang" require>
					</div>
					<div class="form-group mt-2">
						<label>Jumlah Barang</label>
						<input class="form-control form-control-sm" type="text" name="jumlahbarang" value="<?=@$vjumlahbarang?>" placeholder="Jumlah Barang" require>
					</div>
					<div class="form-group mt-2">
						<label>Kondisi Barang</label>
						<input class="form-control form-control-sm" type="text" name="kondisibarang" value="<?=@$vkondisibarang?>" placeholder="Kondisi Barang" require>
					</div>
					<button type="submit" class="btn btn-success mt-3 btn-sm" name="submit">Simpan</button>
					<button type="reset" class="btn btn-danger mt-3 btn-sm" name="reset">Reset</button>
				</form>
			</div>
		</div>
		<!-- akhiran form -->

		<!-- awalan tabel -->
		<div class="card mt-3">
			<div class="card-header bg-info text-white">
				Daftar Barang
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<tr>
						<th>No.</th>
						<th>No Inventaris Barang</th>
						<th>Nama Barang</th>
						<th>Lokasi Barang</th>
						<th>Jumlah Barang</th>
						<th>Kondisi Barang</th>
						<th>Aksi</th>
					</tr>


					<!-- untuk memunculkan tabel database dari phpmyadmin -->
					<?php
						$no = 1;
						$tampil = mysqli_query($koneksi, "SELECT * FROM databarang order by ID desc");
						while($data = mysqli_fetch_array($tampil)) :

					?>
					<tr>
						<td><?php echo $no++;?></td> <!-- php echo bisa diganti dengan <(kurangdari)?= -->
						<td><?=$data['no_inventaris']?></td>
						<td><?=$data['nama_barang']?></td>
						<td><?=$data['lokasi_barang']?></td>
						<td><?=$data['jumlah_barang']?></td>
						<td><?=$data['kondisi_barang']?></td>
						<td>
							<a href="index.php?hal=edit&id=<?=$data['ID']?>" class="btn btn-warning btn-sm"> Edit </a>
							<a href="index.php?hal=hapus&id=<?=$data['ID']?>"
               				onclick= "return confirm ('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" > Hapus </a>
						</td>
					</tr>
					<?php endwhile; //penutup perulangan while ?> 
				</table>
			</div>
		</div>
		<!-- akhiran tabel -->
		<a target=_blank href="export.php" class="btn btn-primary mt-3 mb-3"> Download Excel </a>
	</div>
</body>
</html>
