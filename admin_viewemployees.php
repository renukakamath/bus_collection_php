<?php include 'adminheader.php' ?>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
  <div id="pageintro" class="hoc clear"> 
   
</div>
</div>
<center>
	<h1 style="color: white">View Employees Details</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
      <th>Owner</th>
			<th>employee Name</th>
      <th>Place</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Id Proof</th>
		</tr>
		<?php 

       $q="SELECT * ,CONCAT (employee.email) AS eemail ,CONCAT(employee.phone)  AS ephone ,CONCAT (employee.place) AS eplace ,CONCAT (employee.id_proof) AS eid_proof FROM employee INNER JOIN `owner` USING(owner_id)";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	<td><?php echo $row['owner_name'] ?></td>
    	<td><?php echo $row['employee_name'] ?></td>
      <td><?php echo $row['eplace'] ?></td>
      <td><?php echo $row['eemail'] ?></td>
      <td><?php echo $row['ephone'] ?></td>
      <td><a href="<?php echo $row['eid_proof'] ?>"><img src="<?php echo $row['eid_proof'] ?>"></a></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>