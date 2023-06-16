<!DOCTYPE html>
<html lang="en">
<head>
  <!-- favicon -->
<link rel="shortcut icon" href="images/favlogo.ico" type="image/x-icon">
<link rel="icon" href="images/favlogo.ico" type="image/x-icon">

    <title>Mang Hiram</title>
   <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  
</head>
<body>

  

{{-- NAVBAR --}}
@include('_navbar')


<!-- Image Header -->
<header class="masthead">
  
  <div class="container h-100">
    
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center">
        @if (!$user)
            <div id="login-btn"><button onclick="document.getElementById('id01').style.display='block'" style="width:300px; border-radius: 48px;">Login</button></div> 
            <div id="signup-btn"><button onclick="document.getElementById('id02').style.display='block'" style="width:300px; border-radius: 48px;">Sign Up</button></div>
        @endif          
        <h1 class="fw-light"></h1>
        <p class="lead"></p>
      </div>
    </div>
  </div>
</header>

<!-- MODAL LOGIN-->

<div id="id01" class="modal">
  <div class="modal-box " style="width: 400px;  margin: 5% auto 15% auto;">
    
  <form class="modal-content animate" action="/login" method="post">
    @csrf  

    
    <div class="imgcontainer">      
      <h3>Welcome back!</h3>
      @if(session('error'))
          <div class="alert alert-danger">
            <script>document.getElementById('id01').style.display='block'</script>            
              {{ session('error') }}
          </div>
      @endif
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container2">
      
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
        
      <button type="submit" style="border-radius: 40px;">Login</button>
      
    </div>

    <div class="container2" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>
</div>

<!-- MODAL SIGN UP -->

<div id="id02" class="modal">
  <div class="modal-box " style="width: 600px;  margin: 5% auto 15% auto;">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" method="post" action="/signup">
    <div class="container2">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <div class="row">
				<div class="col">
					<div class="form-group my-2">
						<label for="fname_input">First Name</label>
						<input type="text" class="form-control" id="fname_input" name="fname" placeholder="First Name" required>		
					</div>
				</div>
				<div class="col">
					<div class="form-group my-2">
						<label for="lname_input">Last Name</label>
						<input type="text" class="form-control" id="lname_input" name="lname" placeholder="Last Name" required>
					</div>
				</div>					
			</div>
			
			<div class="row">
				<div class="col">
					<div class="form-group my-2">
						<label for="email_input">Email Address</label>
						<input type="text" class="form-control" id="email_input" name="email" placeholder="Email" required>	
					</div>
				</div>
				<div class="col">
					<div class="form-group my-2">
						<label for="phonenum_input">Phone Number</label>
						<input type="text" class="form-control" id="phonenum_input" name="phone_num" placeholder="Phone Number" minlength="11" maxlength = "13" required>	
					</div>
				</div>
			</div>
      <div class="row">
				<div class="col">
					<div class="form-group">
						<label for="email_input">Enter Username</label>
						<input type="text" class="form-control" id="username_input" name="username" placeholder="Username" minlength="4" maxlength = "16" required>		
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="pass_input">Enter Password</label>
						<input type="password" class="validate form-control" id="password_input" name = "password" placeholder="Password" minlength="8" maxlength = "16" required>
						
					</div>
				</div>	
				
				<div class="col">
					<div class="form-group">
						<label for="pass_input">Re-Enter Password</label>
						<input type="password" class="validate form-control" id="password_input" name = "password2" placeholder="Password" required>
						
					</div>
				</div>		
			</div>
			<br>
			<div class="row">
        <h5>Complete Address</h5>
				<div class="col">
					<div class="form-group my-2">
						<label for="house_num">House number</label>
						<input type="text" class="form-control" id="house_num" name="housmumber" placeholder="House Number" required>	
					</div>
				</div>
        <div class="col">
					<div class="form-group my-2">
						<label for="street_name">Street Name</label>
						<input type="text" class="form-control" id="street_name" name="street" placeholder="Street Name" required>	
					</div>
				</div>
        <div class="col">
					<div class="form-group my-2">
						<label for="barangay">Barangay Name</label>
						<input type="text" class="form-control" id="barangay" name="barangay" placeholder="Barangay" required>	
					</div>
				</div>
			</div>
      <div class="row">
				<div class="col">
					<div class="form-group my-2">
						<label for="district">District/Municipality</label>
						<input type="text" class="form-control" id="district" name="district" placeholder="District/Municipality" required>	
					</div>
				</div>
        <div class="col">
					<div class="form-group my-2">
						<label for="city_prov">City/Province</label>
						<input type="text" class="form-control" id="city_prov" name="city_prov" placeholder="City/Province" required>	
					</div>
				</div>
			</div>
      


      
      <label>
        <input type="checkbox" name="terms" style="margin-bottom:35px" required> By creating an account you agree to our 
        <a href="/rentalAgreement" target="_blank" style="color:dodgerblue">Terms & Privacy</a>.
      </label>

      

      <div class="clearfix">
        <button type="submit" class="signupbtn"  style="border-radius: 40px; margin-bottom: 10px;">Sign Up</button>
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </div>
  </form>
</div>
</div>

<!-- Page Content -->


<section class="py-5">
  <div class="container">
    <h1>Welcome to Mang Hiram!</h1>
    <br>
    <p style="font-size: 25px;">Our technology inspires people to share and connects local communities. 
      We’d love you to join us, whether you’re looking for a cost-effective way to rent what you need locally, 
      or you’re a business or individual keen to make money from the things you own that are sitting unused.</p>
  </div>
</section>
<div class="container mt-5">
<div class="categories">
<h2>What's Popular on Mang Hiram right now?</h2>
<div class="row">
  <div class="col">
    <div class="card shadow">
      <div>
          <a href="/items/Musical Instrument">
            <img src="images/music.png" alt="Image1" class="img-fluid card-img-top" style="height: 250px">
           </a>
        </div>
      <div class="card-body">
             <h5 class="card-title">Musical Instruments</h5>                                                          
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow">
      <div>
          <a href="/items/Gowns & Suits">
            <img src="/images/gown.png" alt="Image1" class="img-fluid card-img-top" style="height: 250px">
           </a>
        </div>
      <div class="card-body">
             <h5 class="card-title">Gowns and Suits</h5>                                                          
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow">
      <div>
          <a href="/items/Entertainment">
            <img src="/images/karaoke.png" alt="Image1" class="img-fluid card-img-top" style="height: 250px">
           </a>
        </div>
      <div class="card-body">
             <h5 class="card-title">Entertainment</h5>                                                          
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card shadow">
      <div>
          <a href="/items/Furnitures">
            <img src="/images/chair.png" alt="Image1" class="img-fluid card-img-top" style="height: 250px">
           </a>
        </div>
      <div class="card-body">
             <h5 class="card-title">Chair Covers</h5>                                                          
      </div>
    </div>
  </div>
  </div>
</div>
</div>


<section class="banner2">
  <div class="row"> 
      <div class="col" style="margin-left: 80px;">
  <h2>Rent An Item</h1>
  <p class="p1">Access items without owning them by renting them from people in your neighbourhood in a few easy steps.</p>
  <a href="/items" class="btn-bgstroke">Rent An Item</a>
      </div>
      <div class="col">
        <h2>Start Earning</h1>
        <p class="p1">Make money lending your belongings to people in your area.</p>
        <br>
        <a href="/email/check-verified" class="btn-bgstroke">List an Item</a>
            </div>
  </div>
</section>
<br>
<br>
<br>
<br>

<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Mang Hiram
          </h6>
          <p>
            Our technology encourages people to share and brings local communities together. We'd love for you to join us, whether you're looking for a low-cost way to rent what you need locally, or you're a business or individual looking to make money from items you own that are sitting idle.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
          <p>
            <a href="#!" class="text-reset"></a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> Manila City, Philippines</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            manghiram@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="#">MangHiram.com</a>
  </div>
  <!-- Copyright -->
</footer>

<script src="/assets/scripts/app.js"></script>

<script>
  
//   async function getStatus(){   
//     var status = '<%=status%>'

//     if(status == 'authenticationError'){
//       const alertPlaceholder = document.getElementById('liveAlertPlaceholder')    
//       const wrapper = document.createElement('div')
//       wrapper.innerHTML = [
//         `<div class="alert alert-danger alert-dismissible" role="alert">`,
//         `   <div>Incorrect Password!</div>`,
//         '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
//         '</div>'
//       ].join('')

//       alertPlaceholder.append(wrapper)   
//     }   
//     else if(status == 'authenticationRequired'){
//       document.getElementById('id01').style.display='block'
//     }
//     else if(status == 'signupSuccess'){
//       const alertPlaceholder = document.getElementById('liveAlertPlaceholder')    
//       const wrapper = document.createElement('div')
//       wrapper.innerHTML = [
//         `<div class="alert alert-success alert-dismissible" role="alert">`,
//         `   <div>Sign-up Success!</div>`,
//         '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
//         '</div>'
//       ].join('')

//       alertPlaceholder.append(wrapper)   
//     }

//   }
  
//   getStatus()
</script>
</body>
</html>
