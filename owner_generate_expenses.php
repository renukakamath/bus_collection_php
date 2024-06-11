<?php include 'ownerheader.php';
 $oid=$_SESSION['owner_id'];
extract($_GET);



 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
  <h1>Search Daily expenses</h1>
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
	<h1 style="color: white">View Expenses</h1>
  <h2><a class="btn btn-success" href="expenses.php">print</a></h2>
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
         if (isset($_POST['exdate'])) {
           extract($_POST);
           // echo $monthly;
           if ($daily!="") {
             // "hi";
           $q="select * from expenses  inner join employee using (employee_id) inner join bus using (bus_id)  where date='$daily' ";
           }
            else if ($monthly!="") {

            
             $q="select * from expenses  inner join employee using (employee_id) inner join bus using (bus_id)  where date like '$monthly%' ";

             }
           }
             else{
             $q="SELECT * FROM expenses INNER JOIN employee USING(employee_id) INNER JOIN bus USING (bus_id) WHERE `employee`.owner_id='$oid'";
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