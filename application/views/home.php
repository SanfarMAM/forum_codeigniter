<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html lang="en">
<head>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/global.css');?>">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
	<title>Educational Forum</title>
</head>
<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php">Educational Forum</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<!--
                <ul class="nav navbar-nav navbar-left">
                    <li><a href=""><span class="glyphicon glyphicon-list"></span> Topics</a></li>
                </ul>
            -->
                <div>
					<?=form_open('login', array(
						'class' => 'navbar-form navbar-right'
					));?>
					<div class="form-group">
					<input type="text" class="form-control" name="username"placeholder="Username">
					<input type="password" class="form-control" name="password"placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">Login</button>
					<?=form_close();?>
				</div>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
			<div class="container" style="margin:8% auto;">
				<div class="col-sm-4 col-md-3">
					<h2>Educational Forum</h2>
					<p>
						Forum Project by MAM Sanfar
					</p>
						<?=validation_errors('<p class="validation_errors">', '</p>');?>
						<?php
						if(!empty($user_error)) {
							echo $user_error;
						}
						?>
				</div>
				 <div class="col-sm-5 col-md-4 pull-right">
                   <div class="row">
                   <?=form_open('register', array(
						'class' => 'form-signin'
					));?>
								<h3 class="text-center">Signup Here!</h3>
							<input type="text" name="fname"placeholder="First Name"class="form-control" required>
							<input type="text" name="lname"placeholder="Last Name"class="form-control" required>
							<select class="form-control" name="gender"required>
								<option>Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
							<input type="text" placeholder="Username" name="username"class="form-control" required>
							<input type="password" placeholder="Password" name="password" class="form-control" required>
							<input type="submit" value="Signup" class="btn btn-success" style="width:100%;">
							<?=form_close();?>
				</div>
			</div>
		</div>
<hr>

</body>
</html>