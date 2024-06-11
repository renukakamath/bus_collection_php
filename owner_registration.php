<?php include 'publicheader.php';

if (isset($_POST['ownerreg'])) {
	extract($_POST);
    $q="select * from login where username='$uname' and password='$pwd'";
    $r=select($q);
    if (sizeof($r)>0) {
    	alert('already exist');
      }else{

$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		 	
	  $q="insert into login values(null,'$uname','$pwd','pending')";
     $id=insert($q);




	$q="insert into owner values(null,'$id','$oname','$place','$phone','$email','$target') ";
	insert($q);
	alert('successfully');
	return redirect('owner_registration.php');

	
	}
		else
		{
			echo "file uploading error occured";
		}


}

}


 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
 <div id="pageintro" class="hoc clear"> 
   <article>
<center>
	<h1>Owner Registration</h1>
	<form method="post" enctype="multipart/form-data">
		<table class="table" style="width: 500px">
			<tr>
				<th>Owner Name</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="oname"></td>
			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="place"></td>
			</tr>
			<tr>
				<th>Phone</th>
				<td style="color: black"><input type="text"  class="form-control" required="" pattern="[0-9]{10}" name="phone"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td style="color: black"><input type="email"  class="form-control" required="" name="email"></td>
			</tr>
			<tr>
				<th>Id Proof</th>
				<td style="color: black"><input type="file" class="form-control"  required="" name="imgg"></td>
			</tr>
			<tr>
			<th>User Name</th>
			<td style="color: black"><input type="text" class="form-control"  required="" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td style="color: black"><input type="password"  class="form-control" required="" name="pwd"></td>
		</tr>
			<tr>
				<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="ownerreg" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<?php include 'footer.php' ?>