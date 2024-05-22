<?php

include 'components/user_header.php';

include 'components/save_send.php';

?>

<!-- search filter section starts  -->

<section class="filters" style="padding-bottom: 0;">

   <form action="" method="GET">
      <div id="close-filter"><i class="fas fa-times"></i></div>
      <h3>filter your search</h3>

      <div class="flex">
         <div class="box">
            <p>enter property name</p>
            <input type="text" name="propety_name" maxlength="50" placeholder="enter property name" class="input">
         </div>
         <div class="box">
            <p>enter location</p>
            <input type="text" name="location" maxlength="50" placeholder="enter city name" class="input">
         </div>
         <div class="box">
            <p>offer type</p>
            <select name="offer" class="input">
               <option value="" selected disabled>select offer</option>
               <option value="sale">sale</option>
               <option value="resale">resale</option>
               <option value="rent">rent</option>
            </select>
         </div>
         <div class="box">
            <p>property type</p>
            <select name="type" class="input">
               <option value="" selected disabled>select property type</option>
               <option value="flat">flat</option>
               <option value="house">house</option>
               <option value="shop">shop</option>
            </select>
         </div>
         <div class="box">
            <p>how many BHK</p>
            <select name="bhk" class="input">
               <option value="" selected disabled>select BHK</option>
               <option value="1">1 BHK</option>
               <option value="2">2 BHK</option>
               <option value="3">3 BHK</option>
               <option value="4">4 BHK</option>
               <option value="5">5 BHK</option>
               <option value="6">6 BHK</option>
               <option value="7">7 BHK</option>
               <option value="8">8 BHK</option>
               <option value="9">9 BHK</option>
            </select>
         </div>
         <div class="box">
            <p>minimum budget</p>
            <input type="number" name="min" placeholder="enter your minimum budget" class="input">
         </div>
         <div class="box">
            <p>maximum budget</p>
            <input type="number" name="max" placeholder="enter your maximum budget" class="input">
         </div>
         <div class="box">
            <p>status</p>
            <select name="status" class="input">
               <option value="" selected disabled>status</option>
               <option value="ready to move">ready to move</option>
               <option value="under construction">under construction</option>
            </select>
         </div>
         <div class="box">
            <p>furnished</p>
            <select name="furnished" class="input">
               <option value="" selected disabled>furnished?</option>
               <option value="unfurnished">unfurnished</option>
               <option value="furnished">furnished</option>
               <option value="semi-furnished">semi-furnished</option>
            </select>
         </div>
      </div>
      <input type="submit" value="search property" name="filter_search" class="btn">
   </form>

</section>

<!-- search
<div id="filter-btn" class="fas fa-filter"></div>

<?php

if (isset($_GET['filter_search'])) {

   $propety_name = $_GET['propety_name'];
   $location = $_GET['location'];
   $type = $_GET['type'];
   $offer = $_GET['offer'];
   $bhk = $_GET['bhk'];
   $min = $_GET['min'];
   $max = $_GET['max'];
   $status = $_GET['status'];
   $furnished = $_GET['furnished'];

   $conditions = array();

   if (!empty($_GET['property_name'])) {
      $conditions[] = "propety_name = :propety_name";
   }
   if (!empty($_GET['location'])) {
      $conditions[] = "address = :location";
   }
   if (!empty($_GET['type'])) {
      $conditions[] = "type = :type";
   }
   if (!empty($_GET['offer'])) {
      $conditions[] = "offer = :offer";
   }
   if (!empty($_GET['bhk'])) {
      $conditions[] = "bhk = :bhk";
   }
   if (!empty($_GET['min'])) {
      $conditions[] = "price >= :min";
   }
   if (!empty($_GET['max'])) {
      $conditions[] = "price <= :max";
   }
   if (!empty($_GET['status'])) {
      $conditions[] = "status = :status";
   }
   if (!empty($_GET['furnished'])) {
      $conditions[] = "furnished = :furnished";
   }

   var_dump($conditions);

   $sql = "SELECT * FROM `property`";
   // if (!empty($conditions)) {
   //    $sql .= " WHERE " . implode(" AND ", $conditions);
   // }
   // $sql .= " ORDER BY date DESC";

   // echo $sql;

   $select_properties = $conn->prepare($sql);

   $select_properties->bindParam(':location', $location);
   $select_properties->bindParam(':type', $type);
   $select_properties->bindParam(':offer', $offer);
   $select_properties->bindParam(':bhk', $bhk);
   $select_properties->bindParam(':status', $status);
   $select_properties->bindParam(':furnished', $furnished);
   $select_properties->bindParam(':min', $min);
   $select_properties->bindParam(':max', $max);
   $select_properties->execute();
} else {
   $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
   $select_properties->execute();
}

?>

<!-- listings section starts  -->

<section class="listings">

   <?php
   var_dump($conditions);
   if (isset($_GET['filter_search'])) {
      echo '<h1 class="heading">search results</h1>';
   } else {
      echo '<h1 class="heading">latest listings</h1>';
   }

   require 'components/listings.php';
   ?>



</section>

<!-- listings section ends -->

<script>
   document.querySelector('#filter-btn').onclick = () => {
      document.querySelector('.filters').classList.add('active');
   }

   document.querySelector('#close-filter').onclick = () => {
      document.querySelector('.filters').classList.remove('active');
   }
</script>

<?php include 'components/footer.php'; ?>