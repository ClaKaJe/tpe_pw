<?php  

include 'components/user_header.php';

include 'components/save_send.php';

$limit = "";

?>

<!-- listings section starts  -->

<section class="listings">

   <h1 class="heading">All Listings</h1>

   <?php require 'components/listings.php'; ?>

</section>

<!-- listings section ends -->

<?php include 'components/footer.php'; ?>