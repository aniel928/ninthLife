 <!DOCTYPE html>	
<!--header for all pages -->

 <html>
 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> <?php echo $title ?></title>

    <style>
      #map {
        height: 400px;
        width: 100%;
      }
    </style>
  </head>
	<body class='bg-light'>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Ninth Life </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">Dashboard </a>
            </li>
      	</ul>

        <ul class='my-2 my-lg-0 navbar-nav'>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href=# id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                  <a class="dropdown-item" href="edit.php">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <?php 
                  if($title == "Ninth Life - Register" || $title == "Ninth Life - Log In"){
                    echo '<a class="dropdown-item" href="index.php">Log In</a>';
                  }
                  else{
                    echo '<a class="dropdown-item" href="index.php">Log Out</a>';  
                  }
                ?>
                  
              </div>
            </li>
        </ul>
      </div>
     </nav>

     <div class='container mt-5'>