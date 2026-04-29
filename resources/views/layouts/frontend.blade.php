<!DOCTYPE html>
<html lang="en">
<head>
    <title>Municipality of Bontoc | Official Website</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

   
    <link rel="icon" href="{{ asset('resources/bontoclogonobg.png')}}" sizes="32x32" />

    
    <link rel="preconnect" href='https://fonts.googleapis.com'>
    <link rel="preconnect" href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap' rel="stylesheet">   

    
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css' rel="stylesheet">


    <link href="{{ asset('resources/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

   
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/homepage.css') }}" rel="stylesheet">

    <style>
        h5{
            color: white;
            font-family: Helvetica;
        }
        p{
            color: black;
            font-family: 'Helvetica';
        }
        .photo-overlay {
            width: 120%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            background: #f8f9fa4a;
            /*background: linear-gradient(179deg, rgba(0,48,103,1) 0%, rgba(0,212,255,0) 75%);*/
        }
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row" style="background-image: url('{{asset('resources/img/IMG20230719081550.jpg')}}'); background-repeat: no-repeat;background-position: center;background-size: 100% 300%;">
                <div class="col-sm-10"> <br>
                    <div class="photo-overlay"></div>
                     <img style="    width: 43%;float: left; padding-right: 5px;margin-bottom: 2%;position: relative;" src="{{asset('resources/img/websitelogo.png')}}">   
                </div>

                <div class="col-sm-2" >
                    <p  style="color: white; padding-right: -1px;">Philippine Standard Time <iframe src="https://oras.pagasa.dost.gov.ph/time_display/time/" allowtransparency="true" scrolling="no" frameborder="0" height="30px" width="100%"></iframe></p>
                </div>
        </div>

        @include('layouts._mainnav')
        @yield('content')

    </div>
<div class="container-fluid bg-success pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-sm-12 col-lg-4 text-light">
        <h5>Public Sector Links</h5>
            <ul>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://www.gov.ph/">GOV.PH</a></li>
                <!-- <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://cscro8.weebly.com/">Civil Service Commision Region 8</a></li> -->
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://www.officialgazette.gov.ph/">Republic of the Philippines Official Gazette</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://op-proper.gov.ph/">Office of the President</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="http://legacy.senate.gov.ph/">Senate of the Philippines</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://www.congress.gov.ph/">House of the Representatives</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://sc.judiciary.gov.ph/">Supreme Court</a></li>
                <li><a style="font-family: Helvetica;" class="text-light"target="_blank" href="https://dilg.gov.ph/">Department of Interior &amp; Local Government</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://dfa.gov.ph/">Department of Foreign Affairs</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="http://www.tourism.gov.ph/general_information.aspx">Department of Tourism</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://pia.gov.ph/">Philippine Information Agency</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://dict.gov.ph/">Department of Information &amp; Communication Technology</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://data.gov.ph/">Open Data</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://www.foi.gov.ph/">Freedom of Information</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" target="_blank" href="https://fdpp.dilg.gov.ph/">Full Disclosure Portal</a></li>
            </ul>
        </div>
    <div class="col-sm-12 col-lg-4 text-light">
        <h5>Important Matters</h5>
                <ul>
               <!--  <li><a style="font-family: Helvetica;" class="text-light" href="">Terms and Conditions</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" href="">Privacy Policy</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" href="">Cultural Mapping</a></li>
                <li><a style="font-family: Helvetica;" class="text-light" href="">Legislations</a></li> -->
                </ul>
        <br>
            <div>
                <a href="#"><img height="100px" width="100px" src="{{ asset('resources/img/transparencyseal.png') }}"></a>
                <a href="#"><img height="100px" width="100px" src="{{ asset('resources/img/bontoclogonobg.png') }}"></a>
            </div>
        <br>
        <hr>
    </div>
    <div class="col-sm-12 col-lg-4">
        <h5>Contact Us</h5>
        <form action="javascript:void(0);">
            <div class="form-group">
                <label for="email" class="text-light">Email address</label>
                <input type="email" class="form-control" placeholder="bontoclgu@gmail.com">
            </div>
        <div class="form-group">
                <label for="email" class="text-light">Type your feedback here.</label>
                 <textarea rows="3" cols="55" class="form-control" style="resize: none;" data-gramm="false" wt-ignore-input="true">
                </textarea>
        </div>
            <button id="submit-button" type="submit" class="btn bg-light">Submit</button>
        </form><hr>
        <p style="color: white;">Contact Number:<br>+63-9566483040</p>
        <p style="color: white;" >Socials</p>
            <p>
                <a target="_blank" href="https://www.facebook.com/BontocPIO"><img height="25" width="25" src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-facebook-circle-512.png"></a>
                <a target="_blank" href="https://www.instagram.com/guillerms03/"><img height="25" width="25" src="https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/instagram-512.png"></a>
                <a target="_blank" href="#"><img height="25" width="25" src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-youtube-circle-512.png"></a>
                <a target="_blank" href="https://www.threads.net/@guillerms03"><?xml version="1.0" ?><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="25px" height="25px" viewBox="0 0 128 128" enable-background="new 0 0 128 128" xml:space="preserve"><g><g><path d="M59.431,67.349c-1.505,0.942-2.334,2.107-2.535,3.563c-0.253,1.836,0.546,3.125,1.261,3.885    c1.543,1.638,4.191,2.483,7.088,2.254c6.33-0.492,8.473-5.595,9.003-10.709c-2.376-0.565-4.707-0.848-6.858-0.848    C64.199,65.494,61.402,66.114,59.431,67.349z"/></g><g><path d="M64.076,0.962h-0.152C29.109,0.962,0.886,29.185,0.886,64v0c0,34.815,28.223,63.038,63.038,63.038h0.152    c34.815,0,63.038-28.223,63.038-63.038v0C127.114,29.185,98.891,0.962,64.076,0.962z M37.892,66.349    c0.267,8.744,3.392,29.082,26.582,29.082c12.672,0,22.229-6.817,22.229-15.858c0-4.725-1.45-7.919-4.82-10.182    c-1.676,9.247-7.4,14.966-16.016,15.637c-5.356,0.419-10.296-1.311-13.531-4.744c-2.704-2.87-3.899-6.586-3.364-10.465    c0.521-3.783,2.729-7.068,6.215-9.251c4.707-2.946,11.425-3.797,18.656-2.488c-1.366-5.743-5.028-7.283-8.206-7.448    c-6.487-0.336-8.837,3.362-9.084,3.786l-7.033-3.811c0.186-0.351,4.662-8.573,16.532-7.964    c7.371,0.382,15.215,5.343,16.231,17.927c8.35,3.595,12.42,9.837,12.42,19.003c0,13.602-12.995,23.858-30.229,23.858    c-20.947,0-33.874-13.771-34.578-36.838c-0.432-14.117,3.068-25.422,10.12-32.693c6.004-6.191,14.33-9.33,24.746-9.33    c25.065,0,31.793,19.129,33.259,24.992l-7.762,1.939c-1.422-5.692-6.754-18.931-25.497-18.931c-8.169,0-14.563,2.321-19.003,6.899    C38.797,46.646,37.638,58.048,37.892,66.349z"/></g></g></svg></a>
                <a target="_blank" href="https://twitter.com/GuillermoGavio1"><img height="25" width="25" src="https://cdn3.iconfinder.com/data/icons/popular-services-brands/512/twitter-512.png"></a>
                
                
            </p>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">&copy;The Official Website of Municipality Government of Bontoc. All Right Reserved 2024.
        <p class="m-0 text-center">Developed by Southern Leyte State University - Bontoc Campus. Bontoc Information Technology Society Department (BITS) <br>
        <a target="_blank" href="https://www.facebook.com/guillermogaviola.s" style="color: blue;">&copy;Guillerms.</a>
        </p>
    </div>
    </div>
</div>

    <a href="#" class="btn btn-info back-to-top"><i class="fa fa-angle-up"></i></a>

    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script src="{{ asset('resources/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('resources/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('resources/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('resources/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('resources/js/main.js') }}"></script>
</body>
</html>
