<?php include 'ownerheader.php' ;

 $oid=$_SESSION['login_id'];
 extract($_GET);
if (isset($_POST['complaints'])) {
	extract($_POST);

	$q="insert into complaints values(null,'$oid','$comp','pending',curdate())";
	insert($q);
	alert('Successfully');
	return redirect('owner_sendcomplaint.php');
}







?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Send Complaints</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>Complaints</th>
				<td style="color: black"><input type="text"  class="form-control" required="" name="comp"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="complaints" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1>View Complaints</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
		
			<th>Complaints</th>
       <th>Date</th>
      <th>Reply</th>
     
		</tr>
		<?php 

       $q="SELECT * FROM complaints INNER JOIN `owner` ON `complaints`.sender_id=`owner`.owner_id WHERE owner_id='$oid' ";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    
    	<td><?php echo $row['complaint_des'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <td><?php echo $row['reply'] ?></td>
  </tr>
<?php }?>
<?php include 'footer.php' ?>