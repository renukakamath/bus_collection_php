
<?php include 'ownerheader.php';
 $oid=$_SESSION['owner_id'];
 extract($_GET);
if (isset($_POST['bus'])) {
	extract($_POST);
     $q="select * from bus where bus_number='$bnumber'";
    $r=select($q);
    if (sizeof($r)>0) {
    	alert('already exist');
    }else{
     $q1="insert into bus values(null,'$oid','$bnumber')";
	insert($q1);
	alert(' successfully');
	return redirect('owner_managebus.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from bus where bus_id='$did'";
	delete($q);
	alert(' successfully');
	return redirect('owner_managebus.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from bus where bus_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);

	$q="update bus set bus_number='$bnumber' where bus_id='$uid'";
	update($q);
	alert(' successfully');
	return redirect('owner_managebus.php');


}




 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Manage Bus</h1>
	<form method="post">
		<?php if (isset($_GET['uid'])) {  ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Bus Number</th>
				<td style="color: black"><input type="text" class="form-control" name="bnumber"  required="" value="<?php echo $res[0]['bus_number'] ?>"></td>
			</tr>
			
			
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="update" value="submit"></td>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Bus Number</th>
				<td style="color: black"><input type="text"  class="form-control" required="" name="bnumber"></td>
			</tr>
			
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="bus" value="submit"></td>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Bus Details</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
		
			<th>Owner</th>
      <th>Bus Number</th>
     
		</tr>
		<?php 

       $q="select * from bus inner join owner using (owner_id) where owner_id='$oid'";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    	<td><?php echo $row['owner_name'] ?></td>
      <td><?php echo $row['bus_number'] ?></td>
     
      <td><a class="btn btn-success" href="?uid=<?php echo $row['bus_id'] ?>">update</a></td>
      <td><a class="btn btn-info" href="?did=<?php echo $row['bus_id'] ?>">delete</a></td>
      <td><a class="btn btn-primary" href="owner_vehiclepermit.php?bid=<?php echo $row['bus_id'] ?>">Vehicle Permit</a></td>
      <td><a class="btn btn-danger" href="owner_viewcollection.php?bid=<?php echo $row['bus_id'] ?>">View Collection</a></td>
      <td><a class="btn btn-success" href="owner_viewexpenses.php?bid=<?php echo $row['bus_id'] ?>">View expenses</a></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>
