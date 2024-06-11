<?php include 'employeeheader.php';
$eid=$_SESSION['employee_id'];
extract($_GET);
if (isset($_POST['sev'])) {
	extract($_POST);

	echo$q="insert into service_details values(null,'$bid','$eid','$st','$samo','$date')";
	insert($q);
	alert('successfully');
	return redirect("employee_addservice.php?bid=$bid");
}



 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Add Services</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>Service type</th>
				<td style="color: black"><input type="text"   class="form-control" required="" name="st"></td>
			</tr>
			<tr>
				<th>Service amount</th>
				<td style="color: black"><input type="text"   class="form-control" required="" name="samo"></td>
			</tr>
			<tr>
				<th>Date</th>
				<td style="color: black"><input type="date"   class="form-control" required="" name="date"></td>
			</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="sev" value="submits"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Services</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Bus</th>
			<th>Employee</th>
			<th>Service Type</th>
      <th>Service amount</th>
   
    
      <th>Date</th>
		</tr>
		<?php 

       $q="SELECT * FROM service_details INNER JOIN employee USING(employee_id) INNER JOIN bus USING (bus_id)  where bus_id='$bid' and employee_id='$eid'";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	<td><?php echo $row['bus_number'] ?></td>
    	<td><?php echo $row['employee_name'] ?></td>
    	<td><?php echo $row['service_type'] ?></td>
      <td><?php echo $row['service_amount'] ?></td>
    
      <td><?php echo $row['date'] ?></td>
  
    </tr>
     <?php
       }


		 ?>
	</table>
<?php include 'footer.php' ?>