<?php
@include 'config.php';

$message = array(); // Initialize an array for error messages
$id = ''; // Initialize $id outside the if-block

if (isset($_GET['edit'])) {
   $id = $_GET['edit'];

   if (isset($_POST['update_portfolio'])) {
       // Handle portfolio update when the form is submitted
       $portfolio_title = $_POST['portfolio_title'];
       $portfolio_url = $_POST['portfolio_url'];
       $portfolio_type = $_POST['portfolio_type'];

       // Handle image upload
       $portfolio_image = $_FILES['portfolio_image']['name'];
       $portfolio_image_tmp_name = $_FILES['portfolio_image']['tmp_name'];
       $portfolio_image_folder = 'uploaded_img/' . $portfolio_image;

       if (empty($portfolio_title) || empty($portfolio_url) || empty($portfolio_type) || empty($portfolio_image)) {
           $message[] = 'Please fill out all fields!';
       } else {
           $update_data = "UPDATE items SET title='$portfolio_title', url='$portfolio_url', type='$portfolio_type', image='$portfolio_image' WHERE id = '$id'";
           $upload = mysqli_query($conn, $update_data);

           if ($upload) {
               move_uploaded_file($portfolio_image_tmp_name, $portfolio_image_folder);
               header('location:admin_page.php');
           } else {
               $message[] = 'Could not update portfolio!';
           }
       }
   }

   // Rest of your code for displaying the update form
} else {
   // Handle the case where 'edit' is not set, for example, display an error message or redirect to another page.
   $message[] = 'Invalid edit request.';
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/style.css">
   </head>

   <body>
   <?php
      if(isset($message)){
         foreach($message as $msg){
            echo '<span class="message">'.$msg.'</span>';
         }
      }
   ?>

      <div class="container">
         <div class="admin-portfolio-form-container centered">
            <?php
               $select = mysqli_query($conn, "SELECT * FROM items WHERE id = '$id'");
               while($row = mysqli_fetch_assoc($select)){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">UPDATE PORTFOLIO</h3>
               <input type="text" class="box" name="portfolio_title" value="<?php echo $row['title']; ?>" placeholder="Enter the portfolio title">
               <input type="text" class="box" name="portfolio_url" value="<?php echo $row['url']; ?>" placeholder="Enter the portfolio URL">
               <input type="text" class="box" name="portfolio_type" value="<?php echo $row['type']; ?>" placeholder="Enter the portfolio type">
               <input type="file" class="box" name="portfolio_image"  accept="image/png, image/jpeg, image/jpg">
               <input type="submit" value="Update" name="update_portfolio" class="btn">
               <a href="admin_page.php" class="btn">Back</a>
            </form>
            <?php }; ?>
         </div>
      </div>
   </body>
</html>
