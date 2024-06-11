<?php include 'employeeheader.php';
$eid=$_SESSION['employee_id'];
extract($_GET);
if (isset($_POST['coll'])) {
	extract($_POST);
         $q="select * from collection where date=curdate() and bus_id='$bid'";
    $r=select($q);
    if (sizeof($r)>0) {
    	alert('already exist');
    }else{
	echo$q="insert into collection values(null,'$eid','$bid','$camo',curdate())";
	insert($q);
	alert('successfully');
	return redirect("employee_addcollection.php?bid=$bid");
}

}

 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Add Collection</h1>
	<form method="post">
		<table  class="table" style="width: 500px">
			
			<tr>
				<th>Collection amount</th>
				<td style="color: black"><input type="text"  required=""  class="form-control" name="camo"></td>
			</tr>
			
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="coll" value="submits"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Collection</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Employee</th>
      <th>Bus</th>
   
      <th>collection Amount</th>
      <th>Date</th>
		</tr>
		<?php 

       $q="select * from collection inner join employee using(employee_id) inner join bus using (bus_id)  where bus_id='$bid' and employee_id='$eid' ";
      $res=select($q);
       $slno=1;
       foreach ($res as $row) {
       	?>
    <tr>
    	<td><?php echo $slno++; ?></td>
    	
    	<td><?php echo $row['employee_name'] ?></td>
      <td><?php echo $row['bus_number'] ?></td>
      <td><?php echo $row['collection_amount'] ?></td>
      <td><?php echo $row['date'] ?></td>
  
    </tr>
     <?php
       }


		 ?>
	</table>
<?php include 'footer.php' ?>