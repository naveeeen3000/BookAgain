<?php  
include('envs.php');
session_start();
if(!isset($_SESSION['email'])){
	$_SESSION['previous']='checkout.php';
	echo '<script>alert("login to continue");</script>';
	header("Location: login.php");
}

$email=$_SESSION['email'];
require_once "./functions/database_functions.php";
require_once "./functions/cart_functions.php";
?>
<?php if($_SESSION['done']=='yes'){
	header("Location:cart.php");
} ?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Checkout</title>
<link href="preloader.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">	
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.min.js"></script>	
<style>
body{
	background-color:#FAFAFA !important;
	font-family:Arial !important;
	margin: 0;
	padding: 0;
	overflow-x: hidden;
	}  
.questionNumbers {
  display: flex;
  align-items: center;
}
.questionNumberIcon {
  display: flex;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  border: 2px solid #444;
  align-items: center;
  justify-content: center;
  color: #444;	
  background-color: white;	
}
.questionNumberLine {
  flex: 1 0 auto;
  height: 0;
  border-top: 2px solid #444;
  margin-left: 5px;
  margin-right: 5px;
	
}	

	.name span{
		color: #444;
		width: 100px;
		
	}

	
	.inner-container h4{
		margin-top: 20px;
		padding-left: 20px;
	}
	 
	.inner-container input,select{
		border:1px solid #AAA;
		outline-color: #ED8155;
	}
	
.collapsible {
  background-color: white;
  color: black;
  cursor: pointer;
  padding: 30px;		
  width: 87%;
  border: none;
  text-align: left;
  outline-color: black;
  font-size: 18px;		
	font-weight: bold;
  margin-left: 20px;
  border-left: 1px solid black;
  border-right: 1px solid black;		
}

.active, .collapsible:hover {
  background-color: #FFFFFF;
}

.collapsible:after {
  content: '\002B';
  color: #000000;  
  font-size: 18px;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 30px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #FFFFFF;
  width: 87%;	  	
  margin-left: 20px;
  border-bottom: 1px solid #DDDDDD;
  border-left: 1px solid black;
  border-right: 1px solid black;	
}
	
	.collapsible1 {
  background-color: white;
  color: black;
  padding: 30px;		
  width: 87%;
  border: none;
  text-align: left;
  outline-color: black;
  font-size: 18px;	
  margin-left: 20px;
  font-weight: bold;
  border-left: 1px solid black;
  border-right: 1px solid black;		
}	
</style>	
</head>

<body>

<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>
	
<main class="questionNumbers" style="margin-left: 150px;margin-right: 150px;margin-top: 25px;">
  <div class="questionNumberIcon" style="border-color: #ED8155;color: #ED8155;">
  <i class="fas fa-check"></i>
  </div>	
  <div class="questionNumberLine" style="border-color: #ED8155"></div>
  <div class="questionNumberIcon" style="background-color: #ED8155;color: white;border-color: #ED8155;">
    2
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    3
  </div>
  <div class="questionNumberLine"></div>
  <div class="questionNumberIcon">
    4
  </div>
   
</main>

	<div class="name">
	<p><span style="color: #ED8155;margin-left: 152px;">Login</span><span style="color: #ED8155;margin-left: 265px;">Shipping</span><span style="margin-left: 255px;">Payment</span><span style="margin-left: 260px;">Done!</span></p>
    </div>	

<br>	
<h3 style="text-align: center;"><a href="cart.php" style="float:left;padding-left: 40px;cursor: pointer;text-decoration: none;font-size: 18px;"><i class="fas fa-arrow-left"></i> back to cart</a><span style="margin-left: -170px;color: #093F55;">Checkout</span></h3>
<br>	
<div class="row">
<div class="col-md-8">
<div class="inner-container" style="margin-left: 40px;padding-bottom: 50px;padding-top: 20px;border:1px solid #000;background-color: white;">
<h4 style="font-weight: bold;color: #000">Billing details</h4>
	
<form action="checkout.php" method="post">	
	
<div class="col-md-6">
<h4 style="margin-left: -15px;">First name <span style="color: red">*</span></h4><br>
<input type="text" name="firstname" style="height: 50px;width: 97%;margin-left: 5px;" required>	
</div>
	
<div class="col-md-6" style="margin-bottom: 20px;">
<h4 style="margin-left: -15px;">Last name</h4><br>
<input type="text" name="lastname" style="height: 50px;width: 97%;margin-left: 5px;">		
</div>	

<h4>E-mail <span style="color: red">*</span></h4><br>
<input type="email" name="email" value="<?php echo $email ?>" style="width: 95%;height: 50px;margin-left: 20px;" readonly>	
	
<h4>Number <span style="color: red">*</span></h4><br>
<input type="text" maxlength="10" pattern="[789][0-9]{9}" name="number" style="width: 95%;height: 50px;margin-left: 20px;" required title="must contain 10 digits and start with either 6, 7, 8 or 9">	

<h4>Address <span style="color: red">*</span></h4><br>
<input type="text" name="address" style="width: 95%;height: 50px;margin-left: 20px;" required>
	
<h4>city <span style="color: red">*</span></h4><br>
<input type="text" name="city" style="width: 95%;height: 50px;margin-left: 20px;" required>
	
<h4>zipcode <span style="color: red">*</span></h4><br>
<input type="text" pattern="^[1-9][0-9]{5}$" maxlength="6" name="zipcode" style="width: 95%;height: 50px;margin-left: 20px;" required title="enter valid 6 digit zipcode">
	
<h4>country <span style="color: red">*</span></h4><br>
<!-- <input type="text" name="country" style="width: 95%;height: 50px;margin-left: 20px;" required>	-->

<select id="country" name="country" style="width: 95%;height: 50px;margin-left: 20px;" required>
   <option value="Afganistan">Afghanistan</option>
   <option value="Albania">Albania</option>
   <option value="Algeria">Algeria</option>
   <option value="American Samoa">American Samoa</option>
   <option value="Andorra">Andorra</option>
   <option value="Angola">Angola</option>
   <option value="Anguilla">Anguilla</option>
   <option value="Antigua & Barbuda">Antigua & Barbuda</option>
   <option value="Argentina">Argentina</option>
   <option value="Armenia">Armenia</option>
   <option value="Aruba">Aruba</option>
   <option value="Australia">Australia</option>
   <option value="Austria">Austria</option>
   <option value="Azerbaijan">Azerbaijan</option>
   <option value="Bahamas">Bahamas</option>
   <option value="Bahrain">Bahrain</option>
   <option value="Bangladesh">Bangladesh</option>
   <option value="Barbados">Barbados</option>
   <option value="Belarus">Belarus</option>
   <option value="Belgium">Belgium</option>
   <option value="Belize">Belize</option>
   <option value="Benin">Benin</option>
   <option value="Bermuda">Bermuda</option>
   <option value="Bhutan">Bhutan</option>
   <option value="Bolivia">Bolivia</option>
   <option value="Bonaire">Bonaire</option>
   <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
   <option value="Botswana">Botswana</option>
   <option value="Brazil">Brazil</option>
   <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
   <option value="Brunei">Brunei</option>
   <option value="Bulgaria">Bulgaria</option>
   <option value="Burkina Faso">Burkina Faso</option>
   <option value="Burundi">Burundi</option>
   <option value="Cambodia">Cambodia</option>
   <option value="Cameroon">Cameroon</option>
   <option value="Canada">Canada</option>
   <option value="Canary Islands">Canary Islands</option>
   <option value="Cape Verde">Cape Verde</option>
   <option value="Cayman Islands">Cayman Islands</option>
   <option value="Central African Republic">Central African Republic</option>
   <option value="Chad">Chad</option>
   <option value="Channel Islands">Channel Islands</option>
   <option value="Chile">Chile</option>
   <option value="China">China</option>
   <option value="Christmas Island">Christmas Island</option>
   <option value="Cocos Island">Cocos Island</option>
   <option value="Colombia">Colombia</option>
   <option value="Comoros">Comoros</option>
   <option value="Congo">Congo</option>
   <option value="Cook Islands">Cook Islands</option>
   <option value="Costa Rica">Costa Rica</option>
   <option value="Cote DIvoire">Cote DIvoire</option>
   <option value="Croatia">Croatia</option>
   <option value="Cuba">Cuba</option>
   <option value="Curaco">Curacao</option>
   <option value="Cyprus">Cyprus</option>
   <option value="Czech Republic">Czech Republic</option>
   <option value="Denmark">Denmark</option>
   <option value="Djibouti">Djibouti</option>
   <option value="Dominica">Dominica</option>
   <option value="Dominican Republic">Dominican Republic</option>
   <option value="East Timor">East Timor</option>
   <option value="Ecuador">Ecuador</option>
   <option value="Egypt">Egypt</option>
   <option value="El Salvador">El Salvador</option>
   <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
</select>	
	
</div><br><br>	
</div>	
<div class="col-md-4">
	
	
	
	
	
<button type="button" class="collapsible" style=" border-top: 1px solid black;">Your Order</button>
<div class="content">
	            
                 <?php
	                if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
	                foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = mysqli_connect(getenv('HOSTNAME'),getenv('USERNAME'),getenv("PASSWORD"),getenv("DATABASE"));
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));  ?>
	               <p><span><?php echo $book['book_title']; ?></span><span style="float: right">₹<?php echo $book['book_price']; ?></span> <i class="fas fa-times" style="font-size: 12px;"></i> <span><?php echo $qty; ?></span></p>
	             <?php } }?>
	               
</div>
	
<button type="button" class="collapsible">Cart totals</button>
<div class="content">  
<p><span>Subtotal</span><span style="float: right"><?php echo "₹" . $_SESSION['total_price']; ?></span></p>	
<p><span>Shipping</span><span style="float: right">₹0</span></p>		
</div>

<button type="button" class="collapsible">Discount</button>
<div class="content">  
<p><span>Discount</span><span style="float: right;">-₹<?php echo $_SESSION['discount']; ?></span></p>	
</div>	
	
<div class="collapsible1" style=" border-bottom: 1px solid #DDDDDD;">
<p><span>Grand total</span><span style="float: right;color: black">₹<?php echo $_SESSION['grandtotal']; ?></span></p>  
</div>	

	
<div class="collapsible1" style=" border-bottom: 1px solid black;">
<p><span style="color: #309EB7">Payment method</span></p><br>  
<p style="font-weight: 600;font-size: 17px;color: black"><input type="radio" name="mode" value="1" required style="cursor: pointer;"> Cash on delivery</p>	
<p style="font-weight: normal;font-size: 16px;color: black">&nbsp;&nbsp;&nbsp;&nbsp;pay with cash upon delivery</p><br>	
<p style="font-weight:600;font-size: 17px;color: black"><input type="radio" name="mode" value="2" style="cursor: pointer"> Credit Card</p>	
<p style="font-weight: normal;font-size: 16px;color: black">&nbsp;&nbsp;&nbsp;&nbsp;pay with credit card</p>		
</div>	
	
<button type="submit" class="btn btn-primary" name="place_order" style="margin-left: 20px;margin-top: 30px; height: 50px; border-radius: 0;background-color: #093F55; width: 350px;font-size: 18px;">Place order</button>	

	
</div>
</form>	
</div><br><br>	
	
	

<script>
$(function(){
    $("input[name=firstname]")[0].oninvalid = function () {
        this.setCustomValidity("First name cannot be empty");
    };
});
	
$(function(){
    $("input[name=firstname]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
	
$(function(){
    $("input[name=number]")[0].oninvalid = function () {
        this.setCustomValidity("Invalid phone number");
    };
});
	
$(function(){
    $("input[name=number]")[0].oninput= function () {
        this.setCustomValidity("");
    };
});	
</script>	
	
<script src="preloader.js"></script>	
<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>	
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
	</body>
	
</html>

<?php 
if(isset($_POST['place_order'])){
$firstname = trim($_POST['firstname']);	
$lastname = trim($_POST['lastname']);
$number = trim($_POST['number']);	
$address = trim($_POST['address']);	
$city = trim($_POST['city']);	
$zipcode = trim($_POST['zipcode']);	
$country = trim($_POST['country']);	
$mode = trim($_POST['mode']);	
	
$name = $firstname." ".$lastname;	

$_SESSION['name']= $name;	
$_SESSION['number']= $number;	
$_SESSION['adress']= $address;	
$_SESSION['city']= $city;	
$_SESSION['zipcode']= $zipcode;	
$_SESSION['country']= $country;		
	
if($mode == 1){   
   $_SESSION['payment']=0;	
   echo '<script>window.location.href="process.php";</script>';
}else if($mode == 2){
   echo '<script>window.location.href="purchase.php";</script>';
}
	
}
?>







