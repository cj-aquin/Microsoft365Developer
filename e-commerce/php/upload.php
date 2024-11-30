
<?php

require_once 'connection.php';

$upload_message = "";

if(isset($_POST["submit"])){
  $productname = $_POST["productname"];
  $price = $_POST["price"];

  //For uploads photos
  $upload_dir = "../product_img/"; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  if(file_exists($upload_file)){
      $upload_message = 'The file already exist';
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            $upload_message = "please change the image format";
        }
      }else{
          $upload_message = "The photo size is 0 please change the photo ";
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     $upload_message ="Sorry your file is doesn\'t uploaded. Please try again";
  }else{
      if($productname != "" && $price !=""){
          move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO items(item_name,item_price,product_image)
          VALUES('$productname','$price','$product_image')";

          if($conn->query($sql) === TRUE){
              $upload_message = 'Your product uploaded successfully';
          }
      }
  }


  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/upload.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
</head>
<body>
    <?php
         include_once 'header.php';

    ?>

<section id="upload_container">
<?php if (!empty($upload_message)): ?>
    <div class="alert alert-info" id="uploadMessage">
        <?php echo $upload_message; ?>
    </div>
<?php endif; ?>

</section>


<?php if (!empty($upload_message)): ?>
    <script>
        // Hide the message after 3 seconds
        setTimeout(function() {
            var message = document.getElementById("uploadMessage");
            if (message) {
                message.style.display = "none";
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
<?php endif; ?>


    <section id="upload_container">
        <form action="upload.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var price = document.getElementById("price");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>
</body>
</html>