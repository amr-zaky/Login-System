<?php

session_start();

if(isset($_POST['submit']))
{
	include_once "dbh.inc.php";
	$uid=mysqli_real_escape_string($conn,$_POST['user-id']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

	//eror handler
	//check is empty
	if(empty($uid)||empty($pwd))
	{
		header("Location:../index.php?login=empty");
		exit();
	}
	else
	 {
	 	$sql="SELECT * FROM USERS WHERE user_uid='$uid' OR user_email='$uid';";
	 	$res=mysqli_query($conn,$sql);
	 	$check=mysqli_num_rows($res);
	 	if($check<1)
	 	{
		 	header("Location:../index.php?login=error");
			exit();	
	 	}

	 	else {
	 		if($row = mysqli_fetch_assoc($res))
	 		{
	 			//dehashing password
	 			$dehashedPwd =password_verify($pwd,$row['user_pwd']);
	 			if($dehashedPwd==false)
	 			{
	 				header("Location:../index.php?login=password=wrong");
					exit();
	 			}

	 			elseif($dehashedPwd ==true) 
	 			{
	 				//log in user here !
	 				$_SESSION['u_id']=$row['user_id'];
	 				$_SESSION['u_first']=$row['user_first'];
	 				$_SESSION['u_last']=$row['user_last'];
	 				$_SESSION['u_email']=$row['user_email'];
	 				$_SESSION['u_uid']=$row['user_uid'];
	 				header("Location:../index.php?login=success");
					exit();
	 			}
	 		}
	 	}

	}
}
else {

	header("Location:../index.php?login=errorone");
					exit();

}