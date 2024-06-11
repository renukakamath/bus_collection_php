<?php include 'employeeheader.php' ;

$eid=$_SESSION['employee_id'];
extract($_GET);
if (isset($_POST['staf'])) {
   extract($_POST);


$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	
   $q="insert into staff values(null,'$eid','$bus','$staff','$place','$phone','$email','$target','$sta')";
   insert($q);

   alert('successfully');
   return redirect('employee_addstaff.php');
	
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
	<h1>Add Staff </h1>
	<form method="post"  enctype="multipart/form-data">
		<table class="table" style="width: 500px">
			<tr>
				<th>Bus Number</th>
				<td style="color: black"><select name="bus"  class="form-control"  required="">
					<option>select</option>
					<?php 

                 $q="SELECT * FROM bus INNER JOIN `owner` INNER JOIN employee ON `employee`.`owner_id`=`bus`.`owner_id` WHERE employee_id='$eid'GROUP BY bus_id";
                 $res=select($q);
                 foreach ($res as $row) {
                 	?>
                <option value="<?php echo $row['bus_id'] ?>"><?php echo $row['bus_number'] ?></option>
             <?php 
              }
					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Staff name</th>
				<td style="color: black"><input type="text"   class="form-control" required="" name="staff"></td>

			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text"  class="form-control"  required="" name="place"></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td style="color: black"><input type="text"  class="form-control"  required="" name="phone"></td>
			</tr>
			<tr>
				<th>email</th>
				<td style="color: black"><input type="email"   class="form-control" required="" name="email"></td>
			</tr>
			<tr>
				<th>Id Proof</th>
				<td style="color: black"><input type="file"   class="form-control" required="" name="imgg"></td>
			</tr>
			<tr>
				<th>Staff type</th>
				<td style="color: black"><input type="radio"  class="btn btn-success" required="" name="sta" value="Driver">Driver
					<input type="radio"  class="btn btn-success" required="" name="sta" value="conductors"> Conductors</td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit" class="btn btn-success" name="staf" value="submit"></th>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Staff</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Bus Number</th>
			<th>Staff Name</th>
			<th>Place</th>
			<th>Staff Type</th>
		</tr>
		<?php 
          $q="SELECT * FROM staff INNER JOIN bus USING(bus_id)WHERE employee_id='$eid'";
          $res=select($q);
          $slno=1;
           foreach ($res as $row) {
           	?>
         <tr>
         	<td><?php echo $slno++; ?></td>
         	<td><?php echo $row['bus_number'] ?></td>
         	<td><?php echo $row['staff_name'] ?></td>
         	<td><?php echo $row['place'] ?></td>
         	<td><?php echo $row['staff_type'] ?></td>
         </tr>
     <?php 
           }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>