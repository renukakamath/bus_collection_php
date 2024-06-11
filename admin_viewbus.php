<?php include 'adminheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
  <div id="pageintro" class="hoc clear"> 
    <article>
     
      
    </article>
  </div>
</div>
<center>
	<h1 style="color: white">View Bus Details</h1>
  <form>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Owners</th>
			<th>Bus Number</th>
		</tr>
		<?php 

       $q="select * from bus inner join owner using (owner_id)";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	<td><?php echo $row['owner_name'] ?></td>
    	<td><?php echo $row['bus_number'] ?></td>
    </tr>
     <?php
       }


		 ?>
	</table>
  </form>
</center>
<?php include 'footer.php' ?>