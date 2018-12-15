<?php
switch($_GET[act]){
  // Tampil pasien
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> laporan Rekam Medik</h2><hr>
    </div>";
    $tampil=mysql_query("SELECT * FROM pasien");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Kode Dokter</th><th>No resep</th><th>Total Harga</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$p=mysql_fetch_array(mysql_query("SELECT * FROM anamnesis where no_pasien='$r[no_pasien]'"));
      echo "<tr><td align=center>$no</td>
            <td>$r[nama_pasien]</td>
			<td>dr Muhammad</td>
			<td>$r[no_pasien]</td>";
			if ($p[no_pasien]==$r[no_pasien]){
            echo "<td><a target='_blank' href='./rekam.php?id=$r[no_pasien]'> Cetak Kartu Rekam Medik</a></td>";
			} else {
            echo "<td>Cetak Kartu Rekam Medik</td>";
			}
			echo "<tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
	
  }
?>