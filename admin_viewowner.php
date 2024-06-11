<?php include 'adminheader.php';

if (isset($_GET['uid'])) {
	extract($_GET);

	$q="update login set usertype='owner' where login_id='$uid'";
	update($q);
}
if (isset($_GET['did'])) {
	extract($_GET);

	$q="update login set usertype='block' where login_id='$did'";
	update($q);
}




 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg'); height: 200px">
 
      
 
</div>
<center>
	<h1 style="color: white">View Owner</h1>
  <form>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Owner Name</th>
			<th>Place</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Id Proof</th>
		</tr>
		<?php 

           $q="select * from owner inner join login using(login_id)";
           $res=select($q);
           $slno=1;
           foreach ($res as $row) {
           	?>
         <tr>
         	<td><?php echo $slno++; ?></td>
         	<td><?php echo $row['owner_name'] ?></td>
         	<td><?php echo $row['place'] ?></td>
         	<td><?php echo $row['phone'] ?></td>
         	<td><?php echo $row['email'] ?></td>
          <td><a href="<?php echo $row['id_proof'] ?>"><img src="<?php echo $row['id_proof'] ?>"></a></td>
            <?php 

           if ($row['usertype']=="pending") {
           	?>
                 <td><a class="btn btn-success" href="?uid=<?php echo $row['login_id'] ?>">accept</a></td>
                 <td><a class="btn btn-success" href="?did=<?php echo $row['login_id'] ?>">reject</a></td>
         <?php
          }



             ?>
         </tr>
       <?php 
         }




		 ?>
		
	</table>
  </form>
</center>
<?php include 'footer.php' ?>