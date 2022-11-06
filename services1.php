<?php
require_once __DIR__.'/gplus-lib/vendor/autoload.php';

const CLIENT_ID = '291346635496-vtrbr6mqp6tiglf1e18a2hl451jadqci.apps.googleusercontent.com';
const CLIENT_SECRET = '0AmyldGNxnqE6tTcb5ajyq96';
const REDIRECT_URI = 'http://localhost/james/wie_27-01-18/wie_1/services1.php';
//const REDIRECT_URI = 'https://www.spitWIE.ac.in/register';

session_start();
if(isset($_REQUEST['id']))
  $eid=$_GET['id'];
else
  $eid=1;
$client = new Google_Client();
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setScopes('email');

$plus = new Google_Service_Plus($client);

if (isset($_REQUEST['logout'])) {
   session_unset();
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}


if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
  $me = $plus->people->get('me');

  $name =  $me['displayName'];
  $email =  $me['emails'][0]['value'];

} else {
  // get the login url   
  $authUrl = $client->createAuthUrl();
}
$f=0;
if(array_key_exists('f', $_GET))
  $f=$_GET['f'];


$br="<br><br><br><br><br><br><br><br><br><br><br><br>";



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>IIC SPIT | Events</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
    <!-- favicon-->
<link rel="icon" type="image/png" sizes="16x16" href="img/iic_logo_s.jpeg">
 


<script type="text/javascript">
function valid()
{
if(document.fr1.pwd.value!= document.fr1.cpwd.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.fr1.cpwd.value="";
return false;
}
return true;
}


function ValidPhno()
{

  var phoneno = /^\d{10}$/;
  if(document.fr1.pno.value.match(phoneno))
        {
      return true;
        }
      else
        {
        alert("Please enter 10 Digit Phone Number");
        return false;
        }
}


function refreshCaptcha(){
            var img = document.images['captchaimg'];
            img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
        }

function emptyblock(x){
            var inputVal = document.getElementById(x);
      
    if (inputVal.value == "") {

        inputVal.style.backgroundColor = "yellow";
        return false;
    }
    else{
        inputVal.style.backgroundColor = "";
        return true;
    }

        }



</script>

</head>
<body>
<div id="wrapper">

	<!-- start header -->
  <?php include('header.php');?>
  <!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="pageTitle">Register for WIE</h2>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
		<div class="container content">
        <!-- Events Blcoks -->
						
        <div class="row service-v1 margin-bottom-40">
            <div class="col-md-4 md-margin-bottom-40">


              
          <?php
   
    if (isset($authUrl)) {
       echo "<a class='login' href='" . $authUrl . "'> <img src='gplus-lib/signin_button.png' height='50px'/></a>";
       echo $br;
    } else {
        if($f == 2)
          echo "<script>alert('Something went wrong. Please try again');</script>";
        if($f== 3)
          echo "<script type='text/javascript'>alert('The Validation code does not match!');</script>";
        if($f != 1 )
        {
?>
     

<form method="post" enctype="multipart/form-data" action="services2.php"  name="fr1">
  <input type="hidden" name="eid" id="eid" value="<?php echo $eid; ?>">
<table>

<tr>
    <td><br><label>Student Name: </label></td>
    <td><br><input type="text" size="30" name="snm" id="snm" value="<?php echo $name; ?>" onblur="return emptyblock('snm'); " placeholder="Mandatory" required></td>
</tr>
    <td><br><label>Class Name: </label></td>
    <td><br><input type="text" size="30" name="cnm" id="cnm" placeholder="Mandatory"  onblur="return emptyblock('cnm'); " autofocus></td>
</tr>

<tr>
    <td><br><label>Department Name: </label></td>
    <td><br><input type="text" name="dnm" size="30" placeholder="Mandatory" id="dnm" onblur="return emptyblock('dnm'); " ></td>
</tr>

<tr>
    <td><br><label>IEEE Member No: </label></td>
    <td><br><input type="text" name="ieee_id" size="30"   id="ieee_id"  maxlength="10"  ></td><br><br>
</tr>

<tr>
    <td><br><label>IIC Member: </label></td>
    <td><br> YES :<input type="radio" name="wie_member" size="30" id="wie_member" value="1" >&nbsp;&nbsp;&nbsp;
             No  :<input type="radio" name="wie_member" size="30" id="wie_member" value="0" >
    </td><br><br>
</tr>

<tr>
    <td><br><label>Email ID:</label></td>
    <td><br><input type="email" name="email" value="<?php echo $email; ?>" size="30" required readonly></td><br>
</tr>

<tr>
    <td><br><label>Phone Number: </label></td>
    <td><br><input type="text" name="pno"  size="30" maxlength="10" placeholder="Mandatory 10 digit phone number " onblur="return ValidPhno();"></td>
</tr>

<tr>
    <td><br><label>Password: </label></td>
    <td><br><input type="Password" name="pwd"  size="30"  ></td>
</tr>

<tr>
    <td><br><label>Confirm Password: </label></td>
    <td><br><input type="Password" name="cpwd"  size="30" onblur="return valid();"></td>
</tr>

</table>
        <?php
          echo "<table> ";

          
          echo "<div class='card-body'>".
               
               "<div class='card' style='margin: 0.5rem; width: 9rem;'>".
               "<img class='card-img-top' src='captcha.php?rand=<?php echo rand();?>' id='captchaimg' alt='Card image cap' style='padding: 0.1rem;'></div> ".
               "<label for='captcha_code'>Enter the code above here</label>".
               "<input type='password class='form-control' id='captcha_code' name='captcha_code' placeholder='Captcha Text' onblur='return validate1(this.value);'>".
                "<br><small class=''>  Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</small></div>";
                

                echo "<br><input type='submit' value='Submit' class='lineBtn' onclick='return validate();'  > </table> ".
                " </form>";

        } else
        {
          session_unset();
            echo "<script type='text/javascript'>alert('Register Successfully Completd !');window.location.href='index.php'; </script>";
            //echo "<a class='lineBtn' href='?logout'>Logout</a>";
        
    }
  }
    ?>

			</div>
            
            <div class="col-md-4">
			    </div>
        </div>

        
    </div>
    </section>
    <?php include('footer.php');?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>  
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<!-- Vendor Scripts -->
<script src="js/modernizr.custom.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
</body>
</html>