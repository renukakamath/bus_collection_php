<?php include 'ownerheader.php';
 $oid=$_SESSION['owner_id'];
 extract($_GET);
if (isset($_POST['employee'])) {
	extract($_POST);
 $q="select * from employee where username='$uname' and password='$pwd'";
    $r=select($q);
    if (sizeof($r)>0) {
    	alert('already exist');
    }else{

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	$q="insert into login values(null,'$uname','$pwd','employee')";
	$id=insert($q);
     $q1="insert into employee values(null,'$oid','$id','$ename','$place','$email','$phone','$target')";
	insert($q1);
	alert(' successfully');
	return redirect('owner_manageemployees.php');

	
	}
		else
		{
			echo "file uploading error occured";
		}

}
}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from employee where employee_id='$did'";
	delete($q);
	alert(' successfully');
	return redirect('owner_manageemployees.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from employee where employee_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);

	$q="update employee set employee_name='$ename',place='$place',email='$email',phone='$phone' where employee_id='$uid'";
	update($q);
	alert(' successfully');
	return redirect('owner_manageemployees.php');


}




 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Manage Employees</h1>
	<form method="post"  enctype="multipart/form-data">
		<?php if (isset($_GET['uid'])) {  ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Employee Name</th>
				<td style="color: black"><input type="text" class="form-control" name="ename"  required="" value="<?php echo $res[0]['employee_name'] ?>"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text" class="form-control" name="place"  required="" value="<?php echo $res[0]['place'] ?>"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td style="color: black"><input type="email" class="form-control" name="email"  required="" value="<?php echo $res[0]['email'] ?>"></td>
			</tr>
			<tr>
				<th>Phone No:</th>
				<td style="color: black"><input type="text" class="form-control" name="phone" pattern="[0-9]{10}" required="" value="<?php echo $res[0]['phone'] ?>"></td>
			</tr>
			
			
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="update" value="submit"></td>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Employee Name</th>
				<td style="color: black"><input type="text"  class="form-control" required="" name="ename"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="place"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td style="color: black"><input type="email"  class="form-control" required="" name="email"></td>
			</tr>
			<tr>
				<th>Phone No:</th>
				<td style="color: black"><input type="text"  class="form-control" required="" pattern="[0-9]{10}" name="phone"></td>
			</tr>
			<tr>
				<th>Id Proof</th>
				<td style="color: black"><input type="file" class="form-control"  required="" name="imgg"></td>
			</tr>
			<tr>
			<th>User Name</th>
			<td style="color: black"><input type="text" class="form-control"  required="" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td style="color: black"><input type="password"  class="form-control" required="" name="pwd"></td>
		</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="employee" value="submit"></td>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Employees Details</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
		
			<th>employee Name</th>
      <th>Place</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Id Proof</th>
		</tr>
		<?php 

       $q="SELECT * ,CONCAT (employee.email) AS eemail ,CONCAT(employee.phone)  AS ephone ,CONCAT (employee.place) AS eplace ,CONCAT (employee.id_proof) AS eid_proof FROM employee INNER JOIN `owner` USING(owner_id) where owner_id='$oid'";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    	<td><?php echo $row['employee_name'] ?></td>
      <td><?php echo $row['eplace'] ?></td>
      <td><?php echo $row['eemail'] ?></td>
      <td><?php echo $row['ephone'] ?></td>
     	<td><a href="<?php echo $row['eid_proof'] ?>"><img src="<?php echo $row['eid_proof'] ?>"></a></td>
      <td><a class="btn btn-success" href="?uid=<?php echo $row['employee_id'] ?>">update</a></td>
      <td><a class="btn btn-success" href="?did=<?php echo $row['employee_id'] ?>">delete</a></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>