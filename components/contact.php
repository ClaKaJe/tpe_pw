<?php

if (isset($_POST['send'])) {

   $msg_id = create_unique_id();

   $name = $_POST['name'];
   $email = $_POST['email'];
   $number = $_POST['number'];
   $message = $_POST['message'];

   $verify_contact = $conn->prepare(
      "SELECT * FROM `messages` WHERE name = :name AND email = :email AND number = :number AND message = :message"
   );
   $verify_contact->execute([
      ':name' => $name,
      ':email' => $email,
      ':number' => $number,
      ':message' => $message
   ]);

   if ($verify_contact->rowCount() > 0) {
      $warning_msg[] = 'message sent already!';
   } else {
      $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
      $send_message->execute([$msg_id, $name, $email, $number, $message]);
      $success_msg[] = 'message send successfully!';
   }
}

?>

<!-- contact section starts  -->

<section class="contact" id="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="" method="post">
         <h3>get in touch</h3>
         <input type="text" name="name" value="<?= $user_name; ?>" maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" value="<?= $user_email; ?>" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="number" value="<?= $user_number; ?>" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">FAQ</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>how to cancel booking?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box active">
         <h3><span>when will I get the possession?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>how to contact with the buyers?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>why my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

      <div class="box">
         <h3><span>how to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus veritatis ducimus aut accusantium sunt error esse laborum cumque ipsum ab.</p>
      </div>

   </div>

</section>

<!-- faq section ends -->