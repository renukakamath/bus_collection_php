<?php include 'connection.php';
extract($_GET);
 $r=$_SESSION['res'];

 ?>
<script> 
    function printDiv() { 
      var divContents = document.getElementById("div_print").innerHTML; 
      var a = window.open('', '', 'height=500, width=500'); 
      a.document.write(divContents); 
      a.document.close(); 
      a.print(); 
    } 
  </script> 
<body onload="printDiv()">
  <div id="div_print" >
<center>
  
<h1 style="padding-top: 30px;font-size: 60px">Generate Expences Report</h1>

<h1>View Expenses</h1>
<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">
		<tr>
		<th>Slno</th>
		<th>Employee</th>
      <th>Bus</th>
      <th>Expence Name</th>
      <th>Expence Amount</th>
      <th>Date</th>
		</tr>
		<?php 

       // $q="select * from expenses inner join employee using(employee_id) inner join bus using (bus_id) ";
      $res=$r;
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