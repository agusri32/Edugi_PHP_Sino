<?php
if($domain!=='admin' && $domain!=='superadmin'){
	?><script language="javascript">document.location.href="logout.php"</script><?php
}
?>

<?php
if($_GET['mode']=='delete'){

	$id_materi=$_GET['id_materi'];
	$nama_file="./files_materi/".$_GET['nama_file'];
	
	unlink($nama_file);
	$query=mysqli_query($link,"delete from tbl_upload_materi where id_materi='$id_materi'");
	if($query){
		?><script language="javascript">document.location.href="?page=download_materi_admin&status=2";</script><?php
	}
}
?>

<!--  start page-heading -->
<div id="page-heading">
    <h1>Materi Pelajaran </h1>
</div>
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
    <th class="topleft"></th>
    <td id="tbl-border-top">&nbsp;</td>
    <th class="topright"></th>
    <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
    <td id="tbl-border-left"></td>
    <td>
    <!--  start content-table-inner ...................................................................... START -->
    <div id="content-table-inner">
    <?php
	include "warning.php";
	?>
		
	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Nomor</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Mata_Pelajaran</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Nama_Guru</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Nama_File</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Tanggal_Upload</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Keterangan</a></th>
		<th class="table-header-repeat line-left minwidth-1"><a href="">Download</a></th>
		<th class="table-header-options line-left"><a href="">Aksi</a></th>
	</tr>
	
	
	<?php
	$view=mysqli_query($link,"select * from tbl_upload_materi upload, data_guru guru, setup_matapelajaran matkul where upload.id_guru=guru.id_guru and upload.id_matapelajaran=matkul.id_matapelajaran order by tgl_upload asc");
	
	$no=0;
	while($row=mysqli_fetch_array($view)){
	?>	
	<tr>
		<td><?php echo $no=$no+1;?></td>
		<td><?php echo $row['nama_matapelajaran'];?></td>
		<td><?php echo $row['nama_guru'];?></td>
		<td><?php echo $row['nama_file'];?></td>
		<td><?php echo $row['tgl_upload'];?></td>
		<td><?php echo $row['keterangan'];?></td>
		<td><a href="<?php echo $row['url'];?>" target="_blank" title="Ukuran File : <?php echo formatBytes($row['ukuran'],0);?>"><img src="images/logo-download.png" width="80" height="23"></a></td>
		<td class="options-width">
		<a href="?page=download_materi_admin&mode=delete&id_materi=<?php echo $row['id_materi'];?>&nama_file=<?php echo $row['nama_file']; ?>" onclick="return confirm('Apakah Anda yakin?')" title="Delete" class="icon-2 info-tooltip"></a>            
		</td>
	</tr>
	<?php
	}
	?>
	</table>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	<p>&nbsp;</p>
					
	<div class="clear"></div>
     
    </div>
    <!--  end content-table-inner ............................................END  -->
    </td>
    <td id="tbl-border-right"></td>
</tr>
<tr>
    <th class="sized bottomleft"></th>
    <td id="tbl-border-bottom"><p>&nbsp;</p></td>
    <th class="sized bottomright"></th>
</tr>
</table>