<?php include 'ownerheader.php' ;
 $oid=$_SESSION['owner_id'];
extract($_GET);
?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
  <h1>Search Daily Collection</h1>
  <form method="post">
    <table border="10" style="color: black;width: 100px">

  
       <td><input type="date" name="daily" > daily </td>
        <td> <input type="month" name="monthly"> monthly</td>

     <tr>
       <td align="center" colspan="2"><input type="submit" name="exdate" class="btn btn-success" value="submit"></td>
      </tr>
    

      </tr>
    </table>
  </form>
</center>
</article>
</div>
</div>
<center>
	<h1 style="color: white">View Collection</h1>
  <h1><a class="btn btn-success"  href="collection.php?">Print</a></h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			<th>Employee</th>
      <th>Bus</th>
   
      <th>coll Amount</th>
      <th>Date</th>
		</tr>
		<?php 
         if (isset($_POST['exdate'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
            // echo "hi";
            $q="select * from collection  inner join employee using (employee_id) inner join bus using (bus_id)  where date='$daily' ";
           }
            else if ($monthly!="") {

            
              $q="select * from collection  inner join employee using (employee_id) inner join bus using (bus_id)  where date like '$monthly%' ";

             }
           }
             else{
              $q="select * from collection inner join employee using(employee_id) inner join bus using (bus_id) WHERE `employee`.owner_id='$oid' ";
            }

                $res=select($q);
                $_SESSION['res']=$res;
                $r=$_SESSION['res'];

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
</center>
<?php include 'footer.php' ?>