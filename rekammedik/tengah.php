<?php
if ($_GET[hal]=='beranda'){
echo "<h2 class='art-postheader'>Selamat Datang</h2>";
} else if ($_GET[hal]=='pasien') {
	include "hal/hal_pasien.php";
} else if ($_GET[hal]=='rawat_jalan') {
	include "hal/hal_jalan.php";
} else if ($_GET[hal]=='dokter') {
	include "hal/hal_dokter.php";
} else if ($_GET[hal]=='resep') {
	include "hal/hal_resep.php";
} else if ($_GET[hal]=='obat') {
	include "hal/hal_obat.php";
} else if ($_GET[hal]=='tindakan') {
	include "hal/hal_tindakan.php";
} else if ($_GET[hal]=='anamnesis') {
	include "hal/hal_anamnesis.php";
} else if ($_GET[hal]=='diagnosa') {
	include "hal/hal_diagnosa.php";
} else if ($_GET[hal]=='kartu_pasien') {
	include "hal/hal_kartupasien.php";
} else if ($_GET[hal]=='rekam_medik') {
	include "hal/hal_rekam_medik.php";
} else if ($_GET[hal]=='rekam') {
	include "hal/hal_rekam.php";
} else if ($_GET[hal]=='profil') {
	include "hal/hal_profil.php";
}else {
?>
<h2 class="art-postheader">Text, <a href="#">Link</a>, <a class="visited" href="#">Visited</a>, <a class="hovered" href="#">Hovered</a>
                                </h2>
                                                                <div class="art-postheadericons art-metadata-icons">
                    <span class="art-postdateicon">Wednesday, 05 November 2008 12:00</span> | <span class="art-postauthoricon"> Written by Administrator</span> | <span class="art-postpdficon"></span> | <span class="art-postprinticon"></span> | <span class="art-postemailicon"></span> | <span class="art-postediticon"></span>
                </div>
                <div class="art-postcontent">

<img src="images/preview.jpg" alt="an image" id="preview-image" />
    <img src="./images/Joomla.png" alt="an image" class="preview-cms-logo" />
    <p>Lorem <sup>superscript</sup> dolor <sub>subscript</sub> amet, consectetuer adipiscing
        elit, <a href="#" title="link">link</a>, <a class="visited" href="#" title="visited link">visited link</a>,
 <a class="hover" href="#" title="hovered link">hovered link</a>. Nullam dignissim convallis est.
        Quisque aliquam. <cite>cite</cite>. Aliquam libero nisi, imperdiet at, tincidunt nec, gravida vehicula, nisl.
        Donec sed tellus eget sapien fringilla nonummy. <acronym title="National Basketball Association">NBA</acronym> Mauris a
        ante. Suspendisse quam sem, consequat at, commodo vitae, feugiat in, nunc.
        <abbr title="Avenue">
            AVE</abbr></p>
	
	<p>Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam lorem mi, eleifend a,
    fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante dui, aliquet nec, congue non,
    accumsan sit amet, lectus. Mauris et mauris. Duis sed massa id mauris pretium venenatis.
    Suspendisse cursus velit vel ligula. Mauris elit.
	</p>

<p>Aliquam pharetra. Nulla in tellus eget odio sagittis blandit.Maecenas at nisl. Nullam
 lorem mi, eleifend a, fringilla vel, semper at, ligula. Mauris eu wisi. Ut ante
 dui, aliquet nec, congue non, accumsan sit amet, lectus. Mauris et mauris. Duis
 sed massa id mauris pretium venenatis. Suspendisse cursus velit vel ligula. Mauris
 elit.</p>
  <p>
	<span class="art-button-wrapper">
		<span class="art-button-l"> </span>
		<span class="art-button-r"> </span>
		<a class="readon art-button" href="javascript:void(0)">Read more...</a>
	</span>
  </p>

                </div>
                <div class="cleared"></div>
                                <div class="art-postfootericons art-metadata-icons">
                    <span class="art-postcategoryicon">Category: <span class="art-post-metadata-category-name"><a href="#">News</a></span></span>
                </div>
<?php } ?>