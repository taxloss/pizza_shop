<?php 

include('config/db_connect.php');
//connect to database

$conn = mysqli_connect('localhost','hello','12345678','pizza_tong');

//check connection

if(!$conn){
   echo 'connection fail '.mysqli_connect_error();
}

//write qurey for all pizzas

$sql = 'SELECT title, ingredients,id FROM pizzas ORDER BY created_at';

//make a query and get result

$result = mysqli_query($conn, $sql);

//fetch the resulting row as an array

$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);
//free result from memory
mysqli_free_result($result);
mysqli_close($conn);

//print_r($pizzas)
//print_r(explode(',',$pizzas[0]['ingredients']));


?>

<!DOCTYPE html>
<html lang="en">

   <?php include('templates/header.php'); ?>

   <h4 class="center grey-text">Order List!</h4>

    <div class="container">
        <div class="row">
           <?php foreach($pizzas as $pizza) : ?>
               <div class="col s6 md3">
                  <div class="card z-depth-0">
                    <img src="img/pizza.jpeg" class="pizza">
                     <div class="card-content center">
                       <h6><?php echo htmlspecialchars($pizza['title']);?></h6>
                       <ul>
                         <?php foreach(explode(',', $pizza['ingredients']) as $ing) :?>
                           <li><?php echo htmlspecialchars($ing); ?></li>
                         <?php endforeach; ?>
                       </ul>
                     </div>
                     <div class="card-action right-align">
                       <a href="details.php?id=<?php echo $pizza['id']; ?>" class="brand-text" >More info</a>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
            <?php if(count($pizzas) >= 2): ?>
               <p>there are 2 or more pizzas</p>
            <?php else:?>
               <p>there are less than 2 pizzas</p>
            <?php endif; ?>

        </div>
    </div>

   <?php include('templates/footer.php'); ?>
    

</html>