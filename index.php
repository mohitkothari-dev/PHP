<?php require_once('includes/head.php'); ?>
  </head>
  <body>
  <div class="content">
    <div class="container">
      
      <div class="row justify-content-center">
        <div class="col-md-10">
          
          <div class="row align-items-center">
          <div class="col-lg-7 mb-5 mb-lg-0">

            <?php
            if(isset($_POST['submit'])){
              $name=mysqli_real_escape_string($connection,$_POST['name']);
              $email=mysqli_real_escape_string($connection,$_POST['email']);
              $ph_number=mysqli_real_escape_string($connection,$_POST['phone']);
              $address=mysqli_real_escape_string($connection,$_POST['address']);
              $house_number=mysqli_real_escape_string($connection,$_POST['house_number']);

              $emailquery = "SELECT * FROM `details` WHERE email='$email'";
              $query = mysqli_query($connection,$emailquery);
              
              $emailcount = mysqli_num_rows($query);
              if($emailcount>0)
              {
                echo "Email already Exists";
              }else{
              $insertquery = "INSERT INTO `details`(`id`, `name`, `email`, `ph_number`, `address`, `house_number`) VALUES (NULL,'$name','$email','$ph_number','$address','$house_number')";
                if(mysqli_query($connection,$insertquery)){
                echo "Your response has been Submitted";
                }else{
                echo "Your response hasn't been Submitted";  
                }
              }
            }
            ?>

              <h2 class="mb-5">Fill the form. <br> It's easy.</h2>

              <form class="border-right pr-5 mb-5" method="post" id="contactForm" name="contactForm">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" require>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" require>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Contact Number" require>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <textarea class="form-control" name="address" id="address" cols="30" rows="7" placeholder="Enter your address" require></textarea>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="number" class="form-control" name="house_number" id="house_number" placeholder="House Number" require>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <input type="submit" value="Send Message" name="submit" class="btn btn-primary rounded-0 py-2 px-4">
                    <span class="submitting"></span>
                  </div>
                </div>
              </form>

            </div>
            <div class="col-lg-4 ml-auto">
              <h3 class="mb-4">Let's talk about the given task.</h3>
              <p>Create a form for a testimonial with validations like name, email, phone, address, house number, etc. Store the data in a database. Display innovatively on the home page sorted by the latest first. </p>
            </div>
          </div>
          <p><h3>List</h3></p>
          <?php
          $listquery="SELECT * FROM `details` ORDER BY id DESC";
          $list_run= mysqli_query($connection,$listquery);
          if(mysqli_num_rows($list_run) > 0){
            while($list_row=mysqli_fetch_array($list_run)){
              $list_id=$list_row['id'];
              $list_name=$list_row['name'];
              $list_email=$list_row['email'];
              $list_ph_number=$list_row['ph_number'];
              $list_address=$list_row['address'];
              $list_house_number=$list_row['house_number'];
            ?>
            <p><?php 
          echo $list_id," | ",$list_name," | ",$list_email," | ",$list_ph_number," | ",$list_address," | ",$list_house_number;
          } ?></p>
          <?php }?>
        </div>  
        </div>
      </div>
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  </body>
</html>