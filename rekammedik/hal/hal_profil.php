<?php
  $sql  = mysql_query("SELECT * FROM profil WHERE id_profil='1'");
  $r    = mysql_fetch_array($sql);

  echo "<h2>Profil</h2><hr>
        <form method=POST enctype='multipart/form-data' action='./aksi.php?hal=profil&act=update' >
        <input type=hidden name=id value=$r[id_artikel]>
        <table>
        <tr><td >Judul </td><td>: <input type=text size=50 name=judul value='$r[judul_profil]'></td></tr>
        <tr><td >Isi </td><td>: <textarea name=isi_profil cols=80 rows=10>$r[isi_profil]</textarea></td></tr>
		 <tr><td>Gambar</td><td> : <img src='images/$r[gambar]' width=150 ></td></tr>
         <tr><td>Ganti Gbr</td><td> : <input type=file name='fupload' size=30> *)</td></tr>
        <tr><td >Kepala PKM </td><td>: <input type=text size=50 name=kepala_pkm value='$r[kepala_pkm]'></td></tr>
        <tr><td colspan=2>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' onclick=self.history.back()>Batal</a>
    </span></td></tr>
        </form></table>";
?>