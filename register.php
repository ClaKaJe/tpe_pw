<?php

include 'components/user_header.php';

if (isset($_POST['submit'])) {

   $id = create_unique_id();
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $pass = sha1($_POST['pass']);
   $c_pass = sha1($_POST['c_pass']);

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if ($select_users->rowCount() > 0) {
      $warning_msg[] = 'email already taken!';
   } else {
      if ($pass != $c_pass) {
         $warning_msg[] = 'Password not matched!';
      } else {
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $c_pass]);

         if ($insert_user) {
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);

            if ($verify_users->rowCount() > 0) {
               setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
               header('location:/');
            } else {
               $error_msg[] = 'something went wrong!';
            }
         }
      }
   }
}

?>

<!-- register section starts  -->

<section class="form-container">

   <form action="" method="post">
      <h3>create an account!</h3>
      <input type="tel" name="name" required maxlength="50" placeholder="enter your name" class="box">
      <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
      <input type="number" name="number" required min="0" max="9999999999" maxlength="10" placeholder="enter your number" class="box">
      <input type="password" name="pass" required maxlength="20" placeholder="enter your password" class="box">
      <input type="password" name="c_pass" required maxlength="20" placeholder="confirm your password" class="box">
      <p>already have an account? <a href="login.php">login now</a></p>
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register section ends -->

<?php include 'components/footer.php'; ?>