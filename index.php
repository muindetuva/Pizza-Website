<?php
    

    include('config/db_connect.php');

    // Get all the pizzass
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // Make query
    $result = mysqli_query($conn, $sql);

    // Fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the results from memory
    mysqli_free_result($result);


    // Close connection
    mysqli_close($conn);


    // explode(',', $pizzas[0]['ingredients'])



?>

<!DOCTYPE html>
<html>

     <?php include('templates/header.php'); ?> 

     <h4 class="center grey-text"></h4>

     <div class="container">
        <div class="row">
            <?php foreach ($pizzas as $pizza):  ?>

                <div class="col s6 m3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6>
                                <?php echo htmlspecialchars($pizza['title'])?>
                            </h6>
                            <div>
                                <ul>
                                    <?php foreach(explode(',', $pizzas[0]['ingredients']) as $ing): ?>

                                        <li>
                                            <?php echo htmlspecialchars($ing); ?>
                                        </li>

                                    <?php endforeach; ?>


                                </ul>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>


            <?php if(count($pizzas) >= 3): ?>
                <p>There are 3 or more pizzas</p>
            <?php else: ?>
                <p>There are less than 3 pizzas</p>
            <?php endif; ?>
        </div>
     </div>


    
    <?php include('templates/footer.php'); ?> 

</html>