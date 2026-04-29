<!DOCTYPE html>
<html lang="en"> 

<head>

    <title>Municipality of Bontoc | Administrator </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/bontoclogo.png')}}" sizes="32x32" />

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css')}}">

</head> 

<body class="app admin-shell"> 


	@include('layouts._topnavigation') 

    
	<div class="app-wrapper">
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-fluid admin-content-container">

				@yield('content')
                
			</div>
		</div>
	</div>
       
    <!-- Javascript -->          
    <script src="{{asset('assets/plugins/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  

    <!-- Charts JS -->
    <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> 
    <script src="{{asset('assets/js/index-charts.js')}}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
      if (window.tinymce) {
        tinymce.init({
          selector: 'textarea[name="description"]',
          branding: false,
          promotion: false,
          menubar: false,
          height: 340,
          plugins: 'advlist anchor autolink charmap code codesample fullscreen image link lists media preview searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | preview fullscreen code | removeformat',
          content_style: 'body { font-family: Arial, Helvetica, sans-serif; font-size: 15px; line-height: 1.6; }',
        });

        document.addEventListener('submit', function () {
          tinymce.triggerSave();
        }, true);
      }
    </script>
</body>
</html>
