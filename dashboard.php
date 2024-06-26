<?php

include 'components/user_header.php';

?>

<section class="dashboard">

  <h1 class="heading">dashboard</h1>

  <div class="box-container">

    <div class="box">

      <h3>welcome!</h3>
      <p><?= $user_name; ?></p>
      <a href="update.php" class="btn">update profile</a>
    </div>

    <div class="box">
      <h3>filter search</h3>
      <p>search your dream property</p>
      <a href="search.php" class="btn">search now</a>
    </div>

    <div class="box">
      <?php
      $count_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
      $count_properties->execute([$user_id]);
      $total_properties = $count_properties->rowCount();
      ?>
      <h3>Properties owned(<?= $total_properties; ?>)</h3>
      <p>properties listed</p>
      <a href="my_listings.php" class="btn">view all listings</a>
    </div>

    <div class="box">
      <?php
      $count_requests_received = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
      $count_requests_received->execute([$user_id]);
      $total_requests_received = $count_requests_received->rowCount();
      ?>
      <h3>Requests Received(<?= $total_requests_received; ?>)</h3>
      <p>requests received</p>
      <a href="requests_received.php" class="btn">view all requests</a>
    </div>

    <div class="box">
      <?php
      $count_requests_sent = $conn->prepare("SELECT * FROM `requests` WHERE sender = ?");
      $count_requests_sent->execute([$user_id]);
      $total_requests_sent = $count_requests_sent->rowCount();
      ?>
      <h3>Requests Sent(<?= $total_requests_sent; ?>)</h3>
      <p>requests sent</p>
      <a href="requests_sent.php" class="btn">view saved properties</a>
    </div>

    <div class="box">
      <?php
      $count_saved_properties = $conn->prepare("SELECT * FROM `saved` WHERE user_id = ?");
      $count_saved_properties->execute([$user_id]);
      $total_saved_properties = $count_saved_properties->rowCount();
      ?>
      <h3>Properties Saved(<?= $total_saved_properties; ?>)</h3>
      <p>properties saved</p>
      <a href="saved.php" class="btn">view saved properties</a>
    </div>

  </div>

</section>

<?php include 'components/footer.php'; ?>