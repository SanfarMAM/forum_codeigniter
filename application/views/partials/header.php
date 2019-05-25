<html lang="en">
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/global.css');?>">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css');?>">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="<?=base_url('assets/js/jquery.js');?>"></script>
    <script src="<?=base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js');?>"></script>
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
                <a class="navbar-brand page-scroll" href="<?=base_url();?>"></a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="<?=base_url();?>">CSIT FORUM</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="#quest"> Post a Question</a></li>
                </ul>
     				 <ul class="nav navbar-nav navbar-right">
				 <ul class="nav navbar-nav navbar-right">
                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?=$this->session->userdata('username');?></a></li>
                        <li ><a href="<?=base_url('logout');?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                
                </ul>   
               
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>