<?php include 'employeeheader.php';
  $oid=$_SESSION['owner_id'];
  extract($_GET);


 ?>

     <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
 
      
 
</div>  
  
<center>
	<h1 style="color: white">View Bus Details</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Owners</th>
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
      <td><a class="btn btn-success" href="employee_addexpenses.php?bid=<?php echo $row['bus_id'] ?>">Add Expenses</a></td>
      <td><a class="btn btn-success" href="employee_addcollection.php?bid=<?php echo $row['bus_id'] ?>" >Add collection</a></td>
      <td><a class="btn btn-success" href="employee_addservice.php?bid=<?php echo $row['bus_id'] ?>">Add Services</a></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>