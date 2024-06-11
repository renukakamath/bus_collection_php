<?php include 'adminheader.php';
extract($_GET);
if (isset($_POST['reply'])) {
	extract($_POST);


	$q="update complaints set reply='$rep' where complaint_id='$cid' ";
	update($q);
     alert('successfully');
     return redirect('admin_viewcomplaints.php');

}



 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
<center>
	<h1>Send Reply</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>Reply</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="rep"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="reply" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<?php include 'footer.php' ?>