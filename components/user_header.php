<?php
include 'components/connect.php';
include '../components/message.php'; 

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

$select_user = $conn->prepare("SELECT name FROM `users` WHERE id = ?");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="images/logo.svg">
   <title><?= isset($title) ? $title : 'Futura House Company' ?></title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>

   <header class="header">

      <nav class="navbar nav-1">
         <section class="flex">
            <a href="/" class="logo" style="width: 90px;"><img src="../images/logo.svg" alt="logo" /></a>

            <ul>
               <li><a href="post_property.php">post property<i class="fas fa-paper-plane"></i></a></li>
            </ul>
         </section>
      </nav>

      <nav class="navbar nav-2">
         <section class="flex">
            <div id="menu-btn" class="fas fa-bars"></div>

            <div class="menu">
               <ul>
                  <li><a href="#">my listings<i class="fas fa-angle-down"></i></a>
                     <ul>
                        <li><a href="dashboard.php">dashboard</a></li>
                        <li><a href="post_property.php">post property</a></li>
                        <li><a href="my_listings.php">my listings</a></li>
                     </ul>
                  </li>
                  <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                     <ul>
                        <li><a href="search.php">filter search</a></li>
                        <li><a href="listings.php">all listings</a></li>
                     </ul>
                  </li>
                  <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                     <ul>
                        <li><a href="about.php">about us</a></i></li>
                        <li><a href="contact.php">contact us</a></i></li>
                        <li><a href="contact.php#faq">FAQ</a></i></li>
                     </ul>
                  </li>
               </ul>
            </div>

            <ul>
               <li><a href="saved.php">saved <i class="far fa-heart"></i></a></li>
               <?php if ($user_id == '') : ?>
                  <li><a href="#">account <i class="fas fa-angle-down"></i></a>
                     <ul>
                        <li><a href="login.php">login now</a></li>
                        <li><a href="register.php">register new</a>
                     </ul>
                  </li>
               <?php else : ?>
                  <li><a href="#"><?= $fetch_user['name'] ?> <i class="fas fa-angle-down"></i></a>
                     <ul>
                        <li><a href="update.php">Update profile</a></li>
                        <li><a href="components/user_logout.php" onclick="return confirm('logout from this website?');">Logout</a>
                     </ul>
                  </li>
               <?php endif ?>
            </ul>
         </section>
      </nav>

   </header>