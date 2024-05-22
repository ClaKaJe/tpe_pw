<?php

include 'components/user_header.php';

if (isset($_POST['submit'])) {

   $old_name = $_POST['old_name'];
   $old_email = $_POST['old_email'];
   $old_number = $_POST['old_number'];
   $old_pass = $_POST['old_pass'];

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];

   if (!empty($name) && $old_name === $user_name) {
      $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $success_msg[] = 'name updated!';
   }

   if (!empty($email) && $old_email === $user_email) {
      $verify_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
      $verify_email->execute([$email]);
      if ($verify_email->rowCount() > 0) {
         $warning_msg[] = 'email already taken!';
      } else {
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $success_msg[] = 'email updated!';
      }
   }

   if (!empty($number) && $old_number === $user_number) {
      $verify_number = $conn->prepare("SELECT number FROM `users` WHERE number = ?");
      $verify_number->execute([$number]);
      if ($verify_number->rowCount() > 0) {
         $warning_msg[] = 'number already taken!';
      } else {
         $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
         $update_number->execute([$number, $user_id]);
         $success_msg[] = 'number updated!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
   $prev_pass = $fetch_user['password'];
   $old_pass = sha1($_POST['old_pass']);
   $new_pass = sha1($_POST['new_pass']);
   $c_pass = sha1($_POST['c_pass']);

   if ($old_pass != $empty_pass) {
      if ($old_pass != $prev_pass) {
         $warning_msg[] = 'old password not matched!';
      } elseif ($new_pass != $c_pass) {
         $warning_msg[] = 'confirm passowrd not matched!';
      } else {
         if ($new_pass != $empty_pass) {
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$c_pass, $user_id]);
            $success_msg[] = 'password updated successfully!';
         } else {
            $warning_msg[] = 'please enter new password!';
         }
      }
   }
}

?>

<section class="form-container">

   <form action="" method="post">
      <h3>update your account!</h3>
      <input type="text" name="old_name" maxlength="50" value="<?= $fetch_user['name']; ?>" class="box">
      <input type="text" name="name" maxlength="50" placeholder="New Name 
      (You can leave empty if you dont want to change)" class="box">
      <input type="email" name="old_email" maxlength="50" value="<?= $fetch_user['email']; ?>" class="box">
      <input type="email" name="email" maxlength="50" placeholder="New Email (You can leave empty if you dont want to change)" class="box">
      <input type="number" name="old_number" min="0" max="9999999999" maxlength="10" value="<?= $fetch_user['number']; ?>" class="box">
      <input type="number" name="number" min="0" max="9999999999" maxlength="10" placeholder="New Phone Number (You can leave empty if you dont want to change)" class="box">
      <input type="password" name="old_pass" maxlength="20" placeholder="enter your old password" class="box">
      <input type="password" name="new_pass" maxlength="20" placeholder="enter your new password (You can leave empty if you dont want to change)" class="box">
      <input type="password" name="c_pass" maxlength="20" placeholder="confirm your new password (You can leave empty if you dont want to change)" class="box">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>

<?php include 'components/footer.php'; ?>