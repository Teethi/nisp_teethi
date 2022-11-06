<?php
include('config.php');
session_start();

$eid=$_POST['eid'];
$ieee_id=$_POST['ieee_id'];
$wie_member=$_POST['wie_member'];

$snm=$_POST['snm'];
$cnm=$_POST['cnm'];
$dnm=$_POST['dnm'];
$email=$_POST['email'];
$pno=$_POST['pno'];
$pwd=md5($_POST['pwd']); 

$capcode=$_POST['captcha_code'];

if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){ 
	header('location: services1.php?f=3');
	}
else
	{
		


$sql = "SELECT  * from participants where Email_Id=:email";
$query = $dbh -> prepare($sql);
$query -> bindParam(':email',$email, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=0;
if($query->rowCount() > 0)
{
	session_unset();
		echo "<script type='text/javascript'>alert('You are Already Registered.'); window.location.href='index.php'; </script>";
				//header('location: index.php');

}
else
{










	$sql="INSERT INTO participants(Stud_Name, Dept_Name, Class_Name,ieee_id,wie_member, Email_Id, Phno, Password) VALUES (:snm,:dnm,:cnm,:ieee_id,:wie_member,:email,:pno,:pwd)";
	$query = $dbh->prepare($sql);

	
	$query->bindParam(':snm',$snm,PDO::PARAM_STR);
	$query->bindParam(':dnm',$dnm,PDO::PARAM_STR);
	$query->bindParam(':cnm',$cnm,PDO::PARAM_STR);

	$query->bindParam(':ieee_id',$ieee_id,PDO::PARAM_STR);
	$query->bindParam(':wie_member',$wie_member,PDO::PARAM_STR);


	$query->bindParam(':email',$email,PDO::PARAM_STR);
	$query->bindParam(':pno',$pno,PDO::PARAM_STR);
	$query->bindParam(':pwd',$pwd,PDO::PARAM_STR);


	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	$sql1="INSERT INTO event_participant(Rid, e_id) VALUES (:Rid,:eid)";
	$query1 = $dbh->prepare($sql1);	
	$query1->bindParam(':Rid',$lastInsertId,PDO::PARAM_STR);
	$query1->bindParam(':eid',$eid,PDO::PARAM_STR);
	$query1->execute();
	if($lastInsertId){
		header('location: services1.php?f=1');
		}
	else 
		{
		header('location: services1.php?f=2');
		}
}
	}


?>