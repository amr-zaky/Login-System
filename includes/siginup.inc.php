

<?php


if(isset($_POST['submit']))
{
	include_once "dbh.inc.php";

 $first=mysqli_real_escape_string($conn,$_POST['first']) ;
 $last=mysqli_real_escape_string($conn,$_POST['last']);
 $email=mysqli_real_escape_string($conn,$_POST['email']);
 $uid=mysqli_real_escape_string($conn,$_POST['uid']);
 $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

   //error handlers
  //check for empty fields
   if(empty($first) ||empty($last) ||empty($email) ||empty($uid) ||empty($pwd) )
   {
   	
   	header("Location:../signup.php?signup=empty");
	exit(); 
   }

   else {

   	   //check if input char is valid
   	if(1==2)
   	{
   		header("Location:../signup.php?signup=invaled-user name-token");
	    exit();
   	}
   	else {
   		//check if email is valid
   		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
   		{
   			header("Location:../signup.php?signup=invalid email");
			exit();
   		}
   		else {
   			//check if id exsist
   			$sql= "SELECT * FROM USERS WHERE user_uid='uid'";
   			$res=mysqli_query($conn, $sql);
   			$rescheck=mysqli_num_rows($res);
   			if($rescheck >0)
   			{
   			header("Location:../signup.php?signup=user-taken");
			exit();

   			}
   			else 
   			{
   				//hashing pasword
   				$hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
   				//insert user 
   				$sql="
            INSERT INTO users (user_first,user_last,user_email,user_uid,user_pwd)
            VALUES('$first', '$last','$email','$uid','$hashedPwd');";
            mysqli_query($conn,$sql);

            header("Location:../signup.php?signup=success");
            exit();
   			}
   		}
   	}
   }

}

else {
	header("Location:../signup.php");
	exit();
}





 