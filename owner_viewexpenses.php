<?php include 'ownerheader.php';
extract($_GET);



 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
  <div id="pageintro" class="hoc clear"> 
    <article>
     
      
    </article>
  </div>
</div>
<center>
	<h1 style="color: white">View Expenses</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Employee</th>
      <th>Bus</th>
      <th>Expence Name</th>
      <th>Expence Amount</th>
      <th>Date</th>
		</tr>
		<?php 

       $q="select * from expenses inner join employee using(employee_id) inner join bus using (bus_id) where bus_id='$bid'";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    	<td><?php echo $row['employee_name'] ?></td>
      <td><?php echo $row['bus_number'] ?></td>
      <td><?php echo $row['expence_name'] ?></td>
      <td><?php echo $row['expence_amount'] ?></td>
      <td><?php echo $row['date'] ?></td>
    </tr>
     <?php
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>