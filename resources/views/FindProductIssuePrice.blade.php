<!doctype html>
<html lang="en">
  <head>
    <title>We Repair Mobile Phones</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="index.html">We Repair Mobile Phones</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
              <!-- <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Courses</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="#">HTML</a>
                  <a class="dropdown-item" href="#">WordPress</a>
                  <a class="dropdown-item" href="#">Laravel</a>
                  <a class="dropdown-item" href="#">JavaScript</a>
                  <a class="dropdown-item" href="#">Python</a>
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

              </li> -->
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li> -->
            </ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="{{url('login')}}">Logout</a> / <a href="{{url('register')}}">Register</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-inner">
          <div class="col-md-10">
  
            <div class="mb-5 element-animate">
              <div class="block-17">
                <h2 class="heading text-center mb-4">Find Oneline Solution That Suits You</h2>
                <form action="" name="frm" method="post" class="d-block d-lg-flex mb-4">
                   {{ csrf_field() }}
                  <div class="fields d-block d-lg-flex">

                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select type="text" name="com_id" id="com_id" class="form-control com_id">
                        <option value="0">Company</option>
                        @foreach($getCompany as $val)
                            <option value="{{ $val->company_id }}">{{ $val->company_name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select type="text" name="modelid" id="modelid" class="form-control">
                        <option value="0">Model</option>
                      </select>
                    </div>
                    <div class="select-wrap one-third">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select type="text" name="issueid" id="issueid" class="form-control">
                        <option value="0">Issue</option>
                        @foreach($getissue as $data)
                         <option value="{{ $data->issue_id }}">{{ $data->issue_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <input type="button" id="submit" name="submit" class="search-submit btn btn-primary" value="Search">  
                </form>
                <p class="text-center mb-5">We have more than 500 solution to solved your mobile.</p>
                <p class="text-center"><a href="{{url('register')}}" class="btn py-3 px-5">Register Now</a></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/main.js"></script>
    <script type="text/javascript">
      $('.com_id').change(function(){
          var companyid = $(this).val();
          $('#modelid').empty();
          $.ajax({
            url:'get-model-depend-company/{companyid}',
            type:'get',
            data:{ companyid:companyid },
            success:function(resdata){
              $.each(resdata, function(index) {
              $('#modelid').append('<option value="'+resdata[index].model_id+'">'+resdata[index].modal_name+'</option>');
              });
            }
          })
      });

      $("#submit").click(function(e) {
        e.preventDefault();
        var comid = $("#com_id").val(); 
        var mid = $("#modelid").val();
        var iid = $("#issueid").val();
        if(comid == '0'){
          alert("Please select company.");
        }else if(mid == '0'){
          alert("Please select model.");
        }else if(iid == '0'){
          alert("Please select issue.");
        }else{
          $.ajax({
            url:'get-price/{comid}/{mid}/{iid}',
            type:'get',
            data:{ comid:comid,mid:mid,iid:iid },
            success:function(datamsg) {
              $('#priceModal').modal('show');
              $('#comname').append(datamsg[0].company_name);
              $('#modname').append(datamsg[0].modal_name);
              $('#issuename').append(datamsg[0].issue_name);
              $('#price').append(datamsg[0].price);
            }
          });
        }
      });
    </script>
  <!-- Modal -->
  <div class="modal fade" id="priceModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <label><b>Company Name :</b></label> <label id="comname"></label><br>
          <label><b>Model Name :</b></label> <label id="modname"></label><br>
          <label><b>Issue :</b></label> <label id="issuename"></label><br>
          <label><b>Price :</b></label> <label id="price"></label><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
  </body>
</html>