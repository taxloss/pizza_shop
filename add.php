<?php 

include('config/db_connect.php');
//  if(isset($_GET['submit'])){
//     echo htmlspecialchars($_GET['email']);
//     echo htmlspecialchars($_GET['title']);
//     echo htmlspecialchars($_GET['ingredients']);
//  }

$title = $email = $ingredients = '';
$errors = array('email'=>'','title'=>'','ingredients'=>'');

 if(isset($_POST['submit'])){
//     echo htmlspecialchars($_POST['email']);
//     echo htmlspecialchars($_POST['title']);
//     echo htmlspecialchars($_POST['ingredients']);


//check email
  if(empty($_POST['email'])){
     $errors['email']= 'An email is required <br />';
  }else{
     $email = $_POST['email'];
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']= 'ERROR: email must be a validated email address <br />';
     }
  }

  //check title
  if(empty($_POST['title'])){
    $errors['title']= 'A title is required <br />';
}else{
      $title=$_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
       $errors['title']= 'ERROR: Title must be letters and spaces only <br/>';
      }
}

//check ingredients
if(empty($_POST['ingredients'])){
     $errors['ingredients']= 'An ingredients is required <br />';
   }else{
      $ingredients = $_POST['ingredients'];
      if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/' , $ingredients)){
       $errors['ingredients']='ERROR: Ingredients must be seperated by comma  <br/>';
      }
  }

     if(array_filter($errors)){
        //echo 'errors in the form <br/>';
     }else{
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $ingredients=mysqli_real_escape_string($conn,$_POST['ingredients']);
        //create sql
        $sql = "INSERT INTO pizzas(title, email , ingredients) VALUES('$title', '$email','$ingredients')";
        //echo 'form is valid <br/>';

        //save to db and check
        if(mysqli_query($conn, $sql)){
         header('Location: index1.php');
        }else{
        echo 'query error: '.mysqli_error($conn);
        }
        
     }
 } //end of the post
?>

<!DOCTYPE html>
<html lang="en">

   <?php include('templates/header.php'); ?>
 <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
  <form class="white" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
     <label><h5>Your email:</h5></label>
     <input type="text" name="email" value="<?php echo htmlspecialchars($email) ; ?>">
     <div class="red-text"><h5><?php echo $errors['email']; ?></h5></div>
     <label><h5>Pizza title:</h5></label>
     <input type="text" name="title" value="<?php echo htmlspecialchars($title) ; ?>">
     <div class="red-text"><h5><?php echo $errors['title']; ?></h5></div>
     <label><h5>Ingredients (comma separated):</h5></label>
     <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ; ?>">
     <div class="red-text"><h5><?php echo $errors['ingredients']; ?></h5></div>
     <div class="center">
       <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
     </div>
  </form>
</section>
   <?php include('templates/footer.php'); ?>
    

</html>