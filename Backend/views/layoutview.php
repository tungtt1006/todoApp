<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/client/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/client/css/layout.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>	
</head>

<body>
    <nav class="nav justify-content-center">
      <a class="nav-link active" aria-current="page" href="#">Home</a>
      <a class="nav-link" href="#">About us</a>
      <a class="nav-link" href="#">Sign in</a>
    </nav>

    <div class="container my-4">
        <div class="row">
            <!-- Side bar -->
            <div class="col-md-3">
                <?php include "views/sidebarview.php"; ?>  
            </div>
            <!-- Side bar end -->

            <!-- Content -->
            <div class="col-md-9" style="background-color: white;">
                <?php echo $this->view; ?>   
            </div>
            <!-- Content end -->
        <div>
    </div>
</body>   
<script src="assets/client/js/vue.js"></script>
<script src="assets/client/js/my_vue.vue"></script>
</html>
   

