<?php include 'ownerheader.php' ;
extract($_GET);
if (isset($_POST['permit'])) {
	extract($_POST);


$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	
	$q="insert into permit_details values(null,'$bid','$pd','$target')";
	insert($q);
	alert('Successfully');
	return redirect("owner_vehiclepermit.php?bid=$bid");

	
	}
		else
		{
			echo "file uploading error occured";
		}



}





?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Vehicle Permit</h1>
	<form method="post" enctype="multipart/form-data">
		<table class="table" style="width: 500px">
			<tr>
				<th>Permint details</th>
				<td style="color: black"><input type="text"  class="form-control" required="" name="pd"></td>
			</tr>
			<tr>
				<th>Permit Proof</th>
				<td style="color: black"><input type="file"  class="form-control" required="" name="imgg"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="permit" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white"> View Vehicle Permits</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Bus</th>
			<th>Permit details</th>
			<th>Permit Proof</th>
		</tr>
		<?php 
      $q="select * from permit_details inner join bus using (bus_id) where bus_id='$bid'";
      $res=select($q);
      $slno=1;
      foreach ($res as $row) {
      	?>
      <tr>
      	<td><?php echo $slno++; ?></td>
      	<td><?php echo $row['bus_number'] ?></td>
      	<td><?php echo $row['permint_details'] ?></td>
      	<td><a href="<?php echo $row['permit_proof'] ?>"><img src="<?php echo $row['permit_proof'] ?>"></a></td>
      </tr>
    <?php 
     }




		 ?>
	</table>
</center>
<?php include 'footer.php' ?>