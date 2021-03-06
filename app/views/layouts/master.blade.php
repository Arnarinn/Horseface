<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/foundation.css') }}">
</head>
<body>
<nav class="top-bar header" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="../" class="blackText">Horseface</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
  	<ul class="right">
  		@if(Auth::check())
  			<li><a href="#">{{ Auth::user()->email }}</a></li>
    	@else
	   		<li><a href="{{ url('register') }}">Register</a></li>
    		<li><a href="{{ url('login') }}">Login</a></li>
    	@endif
  	</ul>
    
    

    <!-- Left Nav Section -->
    <ul class="left">
    </ul>
  </section>
</nav>
@yield('content')
</body>
</html>