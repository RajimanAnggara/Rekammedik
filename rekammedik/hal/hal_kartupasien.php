<?php
switch($_GET[act]){
  // Tampil pasien
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Kartu Pasien</h2><hr>
    </div>";
    $tampil=mysql_query("SELECT * FROM pasien order by no_pasien DESC");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Kode Pasien</th><th>Nama Pasien</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td align=center>$no</td>
            <td>$r[no_pasien]</td>
			<td>$r[nama_pasien]</td>
            <td><a target='_blank' href='./kartu.php?id=$r[no_pasien]'> Cetak Kartu</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
	
  }
?>