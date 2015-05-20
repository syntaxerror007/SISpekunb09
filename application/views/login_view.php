<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI Spekun Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('./bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo site_url('./bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo site_url('./dist/css/timeline.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('./dist/css/sb-admin-2.css');?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo site_url('./bower_components/morrisjs/morris.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div class="container">
		<div class="col-lg-12">
			<div class="col-lg-8">
				<div class="panel-body">
					<h1><center>SI Spekun</center></h1>
					<h3><center>Sistem Informasi S'peda Kuning</center></h3>
					<center><img src="<?php echo base_url(). "assets/spekun.png"; ?>" alt="SISpekun_Logo" style="height:500px"/></center>
				</div>
			</div>
			<div class="col-lg-4">
				<br>
				<br>
				<br>
				<br>
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Login</h3>
					</div>
					<div class="panel-body" id='login_form'>
						<form action='<?php echo base_url();?>verifylogin/check_database' method='post' name='check_database'>
						<?php //echo form_open('verifylogin/check_database'); ?>
						<div class="form-group">
							<input class="form-control" placeholder="Username" name="username" type="username" id="username" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" ide="password" value="">
						</div>

						<div class="checkbox">
							<label>
								<input name="remember" type="checkbox" value="Remember Me">Remember Me
							</label>
						</div>
						<button type="Submit" class="btn btn-lg btn-success btn-block" name="Login">Login </button>
						<div style="color:red" align="center"><?php if(! is_null($error_message)) echo $error_message;?></div>
					</div>
				</div>
			</div>
		</div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo site_url('./bower_components/jquery/dist/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url(''); ?>./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url(''); ?>./bower_components/metisMenu/dist/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url(''); ?>./dist/js/sb-admin-2.js"></script>

</body>

</html>
