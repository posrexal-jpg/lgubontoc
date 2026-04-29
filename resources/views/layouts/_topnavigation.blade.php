<header class="app-header fixed-top">	   	            
<div class="app-header-inner">  
    <div class="container-fluid py-2">
        <div class="app-header-content"> 
            <div class="row justify-content-between align-items-center">
            	<div class="app-search-box col">
            		</div>
			            <div class="app-utilities col-auto">
				            <div class="app-utility-item app-user-dropdown dropdown">
					            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="{{asset('resources/img/bontoclogonobg.png')}}" alt="user profile">admin</a>
						        <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
							<li><a class="dropdown-item" href="{{ url('/logout')}}">Log Out</a></li>
						</ul>
				    </div>
				</div>
        	</div>
        </div>
    </div>
</div>
<div id="app-sidepanel" class="app-sidepanel"> 
    <div id="sidepanel-drop" class="sidepanel-drop">
    </div>
    <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ url('admin/dashboard') }}"><img class="logo-icon me-2" src="{{asset('resources/img/bontoclogonobg.png')}}" alt="logo"><span class="logo-text">Administrator</span></a>
        </div>  
<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
	<a class="nav-link active" href="{{ url('admin/home') }}">
		<span class="nav-icon">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"></path>
			<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"></path>
			</svg>
		</span>
		<span class="nav-link-text">Home</span>
	</a>
	<ul class="app-menu list-unstyled accordion" id="menu-accordion">
	    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
			<span class="nav-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-6-circle" viewBox="0 0 16 16">
 			<path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.21 3.855c1.612 0 2.515.99 2.573 1.899H9.494c-.1-.358-.51-.815-1.312-.815-1.078 0-1.817 1.09-1.805 3.036h.082c.229-.545.855-1.155 1.98-1.155 1.254 0 2.508.88 2.508 2.555 0 1.77-1.218 2.783-2.847 2.783-.932 0-1.84-.328-2.409-1.254-.369-.603-.597-1.459-.597-2.642 0-3.012 1.248-4.407 3.117-4.407Zm-.099 4.008c-.92 0-1.564.65-1.564 1.576 0 1.032.703 1.635 1.558 1.635.868 0 1.553-.533 1.553-1.629 0-1.06-.744-1.582-1.547-1.582"/>
			</svg>
			</span>
	        <span class="nav-link-text">About Us</span>
			<span class="submenu-arrow">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
			</svg>
			</span>
	    </a>
<div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
	<ul class="submenu-list list-unstyled">
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.history')}}">History</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.location')}}">Location</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.missionandvision')}}">Mission and Vision</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.municipalityseal')}}">Municipality Seal</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.servicepledge')}}">Service Pledge</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.mandate')}}">Mandate</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.aboutus.directory')}}">Directory</a></li>
	</ul>
</div>
<li class="nav-item has-submenu">
		<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" 	aria-controls="submenu-2">
			<span class="nav-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-1-circle" viewBox="0 0 16 16">
  <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M9.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383z"/>
</svg>
			</span>
			<span class="nav-link-text">Careers</span>
			<span class="submenu-arrow">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
			</svg>
			</span>
		</a>
		<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">
			<ul class="submenu-list list-unstyled">
			<li class="submenu-item"><a class="submenu-link" href="{{route('admin.careers.jobvacancies')}}">Job Vacancies</a></li>
			</ul>
		</div>
</li>
<li class="nav-item has-submenu">
	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-3">
		<span class="nav-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-3-circle" viewBox="0 0 16 16">
  <path d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z"/>
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8"/>
</svg>
		</span>
		<span class="nav-link-text">Transparency</span>
		<span class="submenu-arrow">
		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
		</svg>
		</span>
	</a>
		<div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
			<ul class="submenu-list list-unstyled">
				<li class="submenu-item"><a class="submenu-link" href="{{route('admin.transparency.municipalordinances')}}">Municipal Ordinances</a></li>
				<li class="submenu-item"><a class="submenu-link" href="{{route('admin.transparency.resolutions')}}">Resolutions</a></li>  
			</ul>
		</div>
</li>
<li class="nav-item has-submenu">
	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="false" aria-controls="submenu-5">
	<span class="nav-icon">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-4-circle" viewBox="0 0 16 16">
  <path d="M7.519 5.057c.22-.352.439-.703.657-1.055h1.933v5.332h1.008v1.107H10.11V12H8.85v-1.559H4.978V9.322c.77-1.427 1.656-2.847 2.542-4.265ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z"/>
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8"/>
</svg>
	</span>
	<span class="nav-link-text">News and Updates</span>
		<span class="submenu-arrow">
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
			</svg>
		</span>
	</a>
<div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">
	<ul class="submenu-list list-unstyled">
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.newsandupdates.news.list')}}">News</a></li>
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.newsandupdates.upcomingupdates.list')}}">Upcoming Updates</a></li>
	</ul>
</div>
</li>
<li class="nav-item has-submenu">
	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="false" aria-controls="submenu-6">
		<span class="nav-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-5-circle" viewBox="0 0 16 16">
  <path d="M1 8a7 7 0 1 1 14 0A7 7 0 0 1 1 8m15 0A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-8.006 4.158c-1.57 0-2.654-.902-2.719-2.115h1.237c.14.72.832 1.031 1.529 1.031.791 0 1.57-.597 1.57-1.681 0-.967-.732-1.57-1.582-1.57-.767 0-1.242.45-1.435.808H5.445L5.791 4h4.705v1.103H6.875l-.193 2.343h.064c.17-.258.715-.68 1.611-.68 1.383 0 2.561.944 2.561 2.585 0 1.687-1.184 2.806-2.924 2.806Z"/>
</svg>
		</span>
		<span class="nav-link-text">Tourism</span>
		<span class="submenu-arrow">
		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
		</svg>
	</span>
	</a>
	<div id="submenu-6" class="collapse submenu submenu-6" data-bs-parent="#menu-accordion">
		<ul class="submenu-list list-unstyled">
		<li class="submenu-item"><a class="submenu-link" href="{{route('admin.tourism.bontocattractions')}}">Bontoc Attractions</a></li>  
		</ul>
	</div>
</li>
<li class="nav-item has-submenu">
	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-7" aria-expanded="false" aria-controls="submenu-7">
		<span class="nav-icon">
		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-2-circle" viewBox="0 0 16 16">
  <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z"/>
</svg>
		</span>
		<span class="nav-link-text">Services</span>
		<span class="submenu-arrow">
		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
		</svg>
		</span>
	</a>
<div id="submenu-7" class="collapse submenu submenu-7" data-bs-parent="#menu-accordion">
		<ul class="submenu-list list-unstyled">
			<li class="submenu-item"><a class="submenu-link" href="{{route('admin.services.mayorsoffice')}}">Mayor's Office</a></li>  
			<li class="submenu-item"><a class="submenu-link" href="signup.html">Citizen's Charter</a></li>
		</ul>
</div>
</li>
	<li class="nav-item has-submenu">
		<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-8" aria-expanded="false" aria-controls="submenu-8">
			<span class="nav-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-0-circle" viewBox="0 0 16 16">
  <path d="M7.988 12.158c-1.851 0-2.941-1.57-2.941-3.99V7.84c0-2.408 1.101-3.996 2.965-3.996 1.857 0 2.935 1.57 2.935 3.996v.328c0 2.408-1.101 3.99-2.959 3.99ZM8 4.951c-1.008 0-1.629 1.09-1.629 2.895v.31c0 1.81.627 2.895 1.629 2.895s1.623-1.09 1.623-2.895v-.31c0-1.8-.621-2.895-1.623-2.895Z"/>
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8"/>
</svg>
			</span>
			<span class="nav-link-text">Others</span>
			<span class="submenu-arrow">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
				</svg>
			</span>
		</a>
		<div id="submenu-8" class="collapse submenu submenu-8" data-bs-parent="#menu-accordion">
			<ul class="submenu-list list-unstyled">
				<li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.downloadableforms') }}">Downloadable Forms</a></li>
				<li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.gallery') }}">Gallery</a></li> 
				<li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.memorandom') }}">Memorandum</a></li>
			</ul>
		</div>
	</li>
</ul>
</nav>
</div>
</div>
</header>