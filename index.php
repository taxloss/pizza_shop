<?php
//Ternary Operators
// Superglobals
// echo $_SERVER['SERVER_NAME'] . '<br/>';
// echo $_SERVER['REQUEST_METHOD'] . '<br/>';
// echo $_SERVER['SCRIPT_FILENAME'] . '<br/>';
// echo $_SERVER['PHP_SELF'] . '<br/>';
if(isset($_POST['submit'])){
    session_start();

    $_SESSION['name'] = $_POST['name'];

    //echo $_SESSION['name'];
    header('Location: index1.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Sandbox</title>
    <style>
 
 .roll {
    animation-name: rainbowtext;
    animation-duration: 5s;
    animation-timing-function: ease-in-out;
    animation-delay: 0s;
    animation-iteration-count: infinite;
  }

@keyframes rainbowtext{
  100%{ 
  transform: translateX(1600px);
   }
}

  
  .roll:hover {
    transform: rotate(1080deg);
  }
  .enter {
  outline: none;
  border: none;
  cursor: pointer;
  display: block;
  position: relative;
  background: #cbb09c;
  font-size: 14px;
  font-weight: bold;
	color:white;
  text-transform: uppercase;
	letter-spacing: 2px;
  padding: 20px 8px;
  margin: 0 auto;
	box-shadow: 0 6px #b48765;
  border-radius: 15px;
  
}

.enter:hover {
	box-shadow: 0 4px #b48765;
	top: 2px;
}

  </style>
</head>
<body>
    <img src="img/pizza.jpeg"  class="roll center" />
    <div class="circle0"></div>
    <div class="form-group">
    <form action="index.php" method="POST">
       <h4>Please enter your name:</h4>
       <input type="text" name="name">
       <input class="enter" type="submit" name="submit" value="Enter Pizza Shop">
    </form>
</div>
</body>
</html> 