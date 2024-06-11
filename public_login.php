<?php include 'publicheader.php' ;

if (isset($_POST['login'])) {
extract($_POST);
$q="select * from login where username='$uname' and password='$pwd'";
$res=select($q);
if (sizeof($res)>0) {
	$_SESSION['login_id']=$res[0]['login_id'];
	$lid=$_SESSION['login_id'];
	if ($res[0]['usertype']=="admin") {
		return redirect('admin_home.php');

	}elseif ($res[0]['usertype']=="owner") {
    $q="select * from owner where login_id='$lid'";
    $r=select($q);
      if (sizeof($r)>0) {
      $_SESSION['owner_id']=$r[0]['owner_id'];
      $oid=$_SESSION['owner_id'];
      }



		return redirect('owner_home.php');

	}elseif ($res[0]['usertype']=="employee") {
		echo$q="select * from employee where login_id='$lid'";
		$r=select($q);
		if (sizeof($r)>0) {
			$_SESSION['employee_id']=$r[0]['employee_id'];
			$eid=$_SESSION['employee_id'];
			$_SESSION['owner_id']=$r[0]['owner_id'];
			$oid=$_SESSION['owner_id'];

		}

		return redirect('employee_home.php');
	}
}else{
	alert('invalid username and password');
}

}






?>
   <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/3.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
     
      <center>
	<h1>Login</h1>
	<form method="post">
	<table class="table" style="width: 500px">
		<tr>
			<th>User Name</th>
			<td  style="color: black"><input type="text"  class="form-control" required="" name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td  style="color: black"><input type="password" class="form-control"  required="" name="pwd"></td>
		</tr>
		<tr>
			<td  align="center" colspan="2"><input type="submit" class="btn btn-success" name="login" value="submit"></td>
		</tr>
	</table>
	</form>
</center>
   
    </article>
  </div>
</div>

<?php include 'footer.php' ?>