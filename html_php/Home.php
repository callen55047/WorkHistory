<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="style-main.css" rel="stylesheet">

</head>

<body>

  

<nav class="navbar navbar-default navbar-inverse " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Callen Egan Q & A</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pictures <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" >
            <li><img src="CharacterPlatform.PNG"></li>
            <li><img src="DistantTower.JPG"></li>
            <li><a href="#"> <img src = "PlanetCB.JPG"></a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>

      </ul>
      


      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">New and Existing Members here</p></li>
        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
    			<ul id="login-dp" class="dropdown-menu">
    				<li>
    					 <div class="row">
    							<div class="col-md-12">
    								Login via
    								<div class="social-buttons">
    									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
    									<a href="#" class="btn btn-tw"><i class="fa fa-instagram"></i> Instagram</a>
    								</div>
                                    or

                                    <!-- Form for collecting user data and signing in -->
    								 <form class="form" id ="form-signin" role="form" method="POST" 
                     action="controller-main.php" accept-charset="UTF-8" id="login-nav">

    										<div class="form-group">

                          <!-- HIDDEN FORM COMMANDS -->
                          <input type='hidden' name='page' value='StartPage'>
                          <input type='hidden' name='command' value='SignIn'>

                          <!-- USERNAME AND PASSWORD -->
    											 <label class="sr-only" for="username">User Name</label>
    											 <input  class="form-control" name="username" placeholder="User Name" required>
    										</div>
    										<div class="form-group">
    											 <label class="sr-only" for="password">Password</label>
    											 <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                 <div class="help-block text-right"><a href="">Forget the password ?</a></div>
    										</div>
    										<div class="form-group">
    											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    										</div>
    										<div class="checkbox">
    											 <label>
    											 <input type="checkbox"> keep me logged-in
    											 </label>
    										</div>
    								 </form>


    							</div>
    							<div class="bottom text-center">
    								<button class="btn btn-primary center-block" data-target='#modal-signin' data-toggle='modal'>Join The Crew</button>
    							</div>
    					 </div>
    				</li>
    			</ul>



        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <!-- div box for adding user into database -->
  <div id="modal-signin" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Sign Your Life Away </h4>
        </div>

        <div class="modal-body">
          <form id='signup' method='POST' action='controller-main.php'>
            <input type='hidden' name='page' value='StartPage'>
            <input type='hidden' name='command' value='SignUp'>
            <div class="form-group">
                <label for='username'> Email:</label>
                <input type='email' class='form-control' name='NewEmail' placeholder='RickSherman@cb.ca' pattern="^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
              </div>
              <div class="form-group">
                <label for='username'> Full Name:</label>
                <input type='text' class='form-control' name='FullName' placeholder='Rick Sherman' required>
              </div>
              <div class='form-group'>
                <label for='username'> Username:</label>
                <input type='text' class="form-control" name='NewUserName' placeholder='Rick Sherman' required>
              </div>
              <div class="form-group">
                <label for='username'> Password:</label>
                <input type='password' class='form-control' name='NewPassword' placeholder='Something Clever' required>
              </div>
              <button type='submit' class='btn btn-default'>Create User</button>
          </form>
        </div>

      </div>
    </div>
  </div>


</body>