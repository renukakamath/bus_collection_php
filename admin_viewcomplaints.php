<?php include 'adminheader.php' ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
 
      
 
</div>
<center>
	<h1 style="color: white">View Complaints</h1>
  <form method="post">
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
		
			<th>Complaints</th>
       <th>Date</th>
      <th>Reply</th>
     
		</tr>
		<?php 

       $q=" select * from complaints";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	<td><?php echo $row['complaint_des'] ?></td>
      <td><?php echo $row['date'] ?></td>
      <?php 


      if ($row['reply']=="pending") {
        ?>
      <td><a class="btn btn-danger" href="admin_sendreply.php?cid=<?php echo $row['complaint_id'] ?> ">Send Reply</a></td>
    <?php 
  }else{

       ?>
      <td><?php echo $row['reply'] ?></td>
      
    </tr>
     <?php
       }
}

		 ?>
	</table>
  </form>
</center>
<?php include 'footer.php' ?>