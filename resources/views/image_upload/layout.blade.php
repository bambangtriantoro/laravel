<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/favicon.ico">
	<style>
		html {
			position: relative;
			min-height: 100%;
		}

		body {
			margin-bottom: 60px;
		}

		body>.container {
			padding: 60px 15px 0;
		}

		.container .text-muted {
			margin: 20px 0;
		}

		.footer>.container {
			padding-right: 15px;
			padding-left: 15px;
		}

		code {
			font-size: 80%;
		}
	</style>
	<title>Laravel Gallery</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	{{--  <link href="/css/app.css" rel="stylesheet">  --}}
</head>

<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
			<div id="navbar">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#">Home</a>
					</li>
					<li>
						<a href="#about">About</a>
					</li>
					<li>
						<a href="#contact">Contact</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Nav header</li>
							<li>
								<a href="#">Separated link</a>
							</li>
							<li>
								<a href="#">One more separated link</a>
							</li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#">Link</a>
					</li>
					<li>
						<a href="#">Link</a>
					</li>
					<li>
						<a href="#">Link</a>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>

	<!-- Begin page content -->
	<div class="container">
		<div class="page-header">
			<h1>Welcome To Laravel Gallery</h1>
		</div>
		@yield('body')
	</div>
	<!--/ End page content -->

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
	{{--  <script src="/js/app.js"></script>  --}}
</body>

</html>