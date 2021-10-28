<?php

     $errors = array('email'=>'', 'title'=>'', 'ingredients'=>'');

     if(isset($_POST['submit'])) {
          // echo htmlspecialchars($_POST['email']);
          // echo htmlspecialchars($_POST['title']);
          // echo htmlspecialchars($_POST['ingredients']);

          // Check email
          if (empty($_POST['email'])){
               $errors['email'] = "An email is required <br/>";
          } else {
               $email = $_POST['email'];

               if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Enter a valid email address<br />";
               }
          }

          // Check title
          if (empty($_POST['title'])){
               $errors['title'] = "An title is required <br/>";
          } else {
               $title = $_POST['title'];

               if (!preg_match('/^[a-zA-Z\s]+$/', $title)){
                    $errors['title'] = "Title must be letters and spaces only";
               }
          }

          // Check ingredients
          if (empty($_POST['ingredients'])){
               
               $errors['ingredients'] = "An ingredient is required <br/>";
          } else {
               $ingredients = $_POST['ingredients'];

               if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                    $errors['ingredients'] = "Provide a comma  separated list of ingredients";
               }
          }


          // Check if there are no errors and redirect
          if (array_filter($errors)){
               // echo "errors in the form";
          } else {
               // echo "form is valid";
               header('Location: index.php');
          }




     }
     




?> 

<!DOCTYPE html>
<html>

     <?php include('templates/header.php'); ?> 

     <section class="container grey-text">

          <h4 class="center">Add a Pizza</h4>

          <form class="white" action="add.php" method="POST">
               <label>Your Email:</label>
               <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
               <div class="red-text"><?php echo $errors['email']; ?></div>


               <label>Pizza title:</label>
               <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
               <div class="red-text"><?php echo $errors['title']; ?></div>



               <label>Ingredients (comma separated)</label>
               <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
               <div class="red-text"> <?php echo $errors['ingredients']; ?></div>



               <div class="center">
                    <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
               </div>
          </form>

     </section>

    
    <?php include('templates/footer.php'); ?> 
    
</html>