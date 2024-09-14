<?php

@include 'config.php';

if(isset($_POST['add_portfolio'])){

   $portfolio_title = $_POST['portfolio_title'];
   $portfolio_url = $_POST['portfolio_url'];
   $protfolio_type = $_POST['protfolio_type'];

   $protfolio_image = $_FILES['protfolio_image']['name'];
   $protfolio_image_tmp_name = $_FILES['protfolio_image']['tmp_name'];
   $protfolio_image_folder = 'uploaded_img/'.$protfolio_image;



   if(empty($portfolio_title) || empty($portfolio_url) || empty($protfolio_type) || empty($protfolio_image)){
      $message[] = 'Please fill out all!';
   }else{
      $insert = "INSERT INTO items(title, url, type, image) VALUES('$portfolio_title', '$portfolio_url', '$protfolio_type','$protfolio_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($protfolio_image_tmp_name, $protfolio_image_folder);
         $message[] = 'New protfolio added successfully!';
      }else{
         $message[] = 'Could not able to add portfolio!';
      }
   }

};


if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM items WHERE id = $id");
   header('location:admin_page.php');
};





?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>


<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}
?>

   <div class="container">

      <div class="admin-portfolio-form-container">
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>ADD PORTFOLIO</h3>
            <input type="text" placeholder="Enter Your Portifolio Title" name="portfolio_title" class="box">
            <input type="text" placeholder="Enter Your URL" name="portfolio_url" class="box">
            <input type="text" placeholder="Portfolio Type" name="protfolio_type" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="protfolio_image" class="box">
            <input type="submit" class="btn" name="add_portfolio" value="Add">
         </form>
      </div>


      <?php

         $select = mysqli_query($conn, "SELECT * FROM items");

      ?> 

      
      <div class="portfolio-display">
         <table class="portfolio-display-table">
            <thead>
               <tr>
                  <th>Portfolio Image</th>
                  <th>Portfolio Title</th>
                  <th>Portfolio Type</th>
                  <th>action</th>
               </tr>
            </thead>     
            
            
            <?php while($row = mysqli_fetch_assoc($select)){  ?>

               <tr>
                  <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['type']; ?></td>





                  <td>
                     <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
                     <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> Delete </a>
                  </td>
               </tr>
            <?php }          
            ?>




         </table>
      </div>

   </div>
   


   



</body>
</html>