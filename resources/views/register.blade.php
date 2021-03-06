<!doctype html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    <style>
    .invisible {
        display : none;
    }
    .visible {
        display : block;
    }
    </style>
  </head>
  <body>
    
  <!--  <header role="banner">
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="index.html">Service</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="courses.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="courses.html">HTML</a>
                  <a class="dropdown-item" href="courses.html">WordPress</a>
                  <a class="dropdown-item" href="courses.html">Laravel</a>
                  <a class="dropdown-item" href="courses.html">JavaScript</a>
                  <a class="dropdown-item" href="courses.html">Python</a>
                </div>

              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="#">HTML</a>
                  <a class="dropdown-item" href="#">WordPress</a>
                  <a class="dropdown-item" href="#">Laravel</a>
                  <a class="dropdown-item" href="#">JavaScript</a>
                  <a class="dropdown-item" href="#">Python</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.html">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="login.html">Login</a> / <a href="register.html">Register</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header> -->
    <!-- END header -->
    <!-- {{ csrf_token() }} -->
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/bannerimage.jpg);">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">
  
            <!-- <div class="mb-5 element-animate">
              <h1 class="mb-2">Register</h1>
              <p class="bcrumb"><a href="index.html">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span>  <span class="current">Register</span></p>
            </div> -->
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-5">Register new account</h2>
              <!-- <form action="#" method="post"> -->
                  
              <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Full Name <span style="color:red;">*</span></label>
                      <input type="text" id="fullname" class="form-control py-2">
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12 form-group">
                      <label for="name">Mobile No <span style="color:red;">*</span></label>
                      <input  type="text" id="mobileno"  class="form-control py-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Email Address </label>
                      <input type="text" id="email" class="form-control py-2">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Password <span style="color:red;">*</span></label>
                      <input type="password" id="password" class="form-control py-2 ">
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-12 form-group">
                      <label for="name">Re-type Password <span style="color:red;">*</span></label>
                      <input type="password" id="confirmpassword" class="form-control py-2">
                    </div>
                  </div>
                  

                   <div class="row display" id="errormessage">
                    <div class="col-md-6 form-group">
                    <span style="color:red;" id="message"></span>
                    </div>
                    
                  </div>


                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Register" onclick="return validate();" class="btn btn-primary px-5 py-2">
                    </div>
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Already have account?" onclick="callLogin();" class="btn btn-primary px-5 py-2">
                    </div>
                  </div>
                
              </div>
          </div>
        </div>
      </div>
    </section>
    
  <!-- <footer class="site-footer border-top">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3>University</h3>
            <p>Perferendis eum illum voluptatibus dolore tempora consequatur minus asperiores temporibus.</p>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3 class="heading">Quick Link</h3>
            <div class="row">
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Courses</a></li>
                  <li><a href="#">Pages</a></li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="list-unstyled">
                  <li><a href="#">News</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Privacy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3 class="heading">Blog</h3>
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Consectetur Adipisicing Elit</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Dolore Tempora Consequatur</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Perferendis eum illum</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>  
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3 class="heading">Contact Information</h3>
            <div class="block-23">
              <ul>
                <li><span class="icon ion-android-pin"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon ion-ios-telephone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon ion-android-mail"></span><span class="text">info@yourdomain.com</span></a></li>
                <li><span class="icon ion-android-time"></span><span class="text">Monday &mdash; Friday 8:00am - 5:00pm</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-12 text-center copyright">
            
            <p class="float-md-left">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
</p>
            <p class="float-md-right">
              <a href="#" class="fa fa-facebook p-2"></a>
              <a href="#" class="fa fa-twitter p-2"></a>
              <a href="#" class="fa fa-linkedin p-2"></a>
              <a href="#" class="fa fa-instagram p-2"></a>

            </p>
          </div>
        </div>
      </div>
    </footer> -->
    <!-- END footer -->
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>


<script>


function callLogin(){
    window.location.href ="/";
}

 function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
    return false;
  }else{
    return true;
  }
}
function registeruser(){
  $.ajax({
          url: '/api/register-user',
          type: "POST",   
          data : { "fullname" :$('#fullname').val() ,"phoneno" :$('#mobileno').val() ,"emailid": $('#email').val(),"password": $('#password').val() },        
          success:function(data) {            
            if(data.Data[0].SavedStatus=="0"){//Error
              $('#message').text(data.Data[0].Message);
            }
            else{
              alert('User Registration Successfully.');
              location.reload();
            }          
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#tablediv').addClass('hidden');
            alert("error");
          }
        });
 
}

function validatePhone() {
  var a = $('#mobileno').val();
  var filter = /^[0-9-+]+$/;
  if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}

// function validatePhone() {
//   var a = $('#mobileno').val();
//  var filter = /^[0-9-+]+$/;
    // if (filter.test(a)) {
    //     return true;
    // }
    // else {
    //     return false;
    // }
// }​

function validate(){
    $('#message').text("");
    if($('#fullname').val()==""){       
        $('#message').text("Enter Full Name");
    }
    else if($('#mobileno').val()==""){       
        $('#message').text("Enter Mobile No");
    }
    else if(!validatePhone()){       
        $('#message').text("Enter Valid Mobile No");
    } 
    else if($('#mobileno').val().length!="10"){       
        $('#message').text("Enter Valid Mobile No");
    }
    else if($('#email').val()==""){       
        $('#message').text("Enter Email Id");
    }
    else if(!IsEmail($('#email').val())){
      $('#message').text("Enter Valid Email Id");
    }
    else if($('#password').val()==""){       
        $('#message').text("Enter Password");
    }
    else if($('#confirmpassword').val()==""){       
        $('#message').text("Enter Confirm Password");
    }
    else if($('#password').val()!=$('#confirmpassword').val()){       
        $('#message').text("Password and Confirm Password does not match");
    }
    
    else{       
      registeruser();      
    }
}

</script>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>