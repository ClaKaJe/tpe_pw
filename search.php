<?php

include 'components/user_header.php';

include 'components/save_send.php';

?>

<!-- search filter section starts  -->

<section class="filters" style="padding-bottom: 0;">

   <form action="" method="post">
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

if (isset($_POST['h_search'])) {

   $h_location = filter_var($_POST['h_location'], FILTER_SANITIZE_STRING);
   $h_type = filter_var($_POST['h_type'], FILTER_SANITIZE_STRING);
   $h_offer = filter_var($_POST['h_offer'], FILTER_SANITIZE_STRING);
   $h_min = filter_var($_POST['h_min'], FILTER_SANITIZE_STRING);
   $h_max = filter_var($_POST['h_max'], FILTER_SANITIZE_STRING);

   // $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address = :h_location AND type = :h_type AND offer = :h_offer AND price BETWEEN :h_min AND :h_max ORDER BY date DESC");

   if (!empty($_POST['h_location'])) {
      $conditions[] = "address = :location";
   }
   if (!empty($_POST['h_type'])) {
      $conditions[] = "type = :type";
   }
   if (!empty($_POST['h_offer'])) {
      $conditions[] = "offer = :offer";
   }
   if (!empty($_POST['h_min'])) {
      $conditions[] = "price >= :min";
   }
   if (!empty($_POST['h_max'])) {
      $conditions[] = "price <= :max";
   }

   $sql = "SELECT * FROM `property`";
   if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
   }
   $sql .= " ORDER BY date DESC";

   $select_properties = $conn->prepare($sql);

   $select_properties->bindParam(':h_location', $h_location);
   $select_properties->bindParam(':h_type', $h_type);
   $select_properties->bindParam(':h_offer', $h_offer);
   $select_properties->bindParam(':h_min', $h_min);
   $select_properties->bindParam(':h_max', $h_max);
   $select_properties->execute();

} elseif (isset($_POST['filter_search'])) {

   $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
   $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
   $offer = filter_var($_POST['offer'], FILTER_SANITIZE_STRING);
   $bhk = filter_var($_POST['bhk'], FILTER_SANITIZE_STRING);
   $min = filter_var($_POST['min'], FILTER_SANITIZE_STRING);
   $max = filter_var($_POST['max'], FILTER_SANITIZE_STRING);
   $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
   $furnished = filter_var($_POST['furnished'], FILTER_SANITIZE_STRING);

   // $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address = :location AND type = :type AND offer = :offer AND bhk = :bhk AND status = :status AND furnished = :furnished AND price BETWEEN :min AND :max ORDER BY date DESC");

   if (!empty($_POST['location'])) {
      $conditions[] = "address = :location";
   }
   if (!empty($_POST['type'])) {
      $conditions[] = "type = :type";
   }
   if (!empty($_POST['offer'])) {
      $conditions[] = "offer = :offer";
   }
   if(!empty($_POST['bhk'])) {
      $conditions[] = "bhk = :bhk";
   }
   if (!empty($_POST['min'])) {
      $conditions[] = "price >= :min";
   }
   if (!empty($_POST['max'])) {
      $conditions[] = "price <= :max";
   }
   if(!empty($_POST['status'])) {
      $conditions[] = "status = :status";
   }
   if(!empty($_POST['furnished'])) {
      $conditions[] = "furnished = :furnished";
   }
   
   $sql = "SELECT * FROM `property`";
   if (!empty($conditions)) {
      $sql .= " WHERE " . implode(" AND ", $conditions);
   }
   $sql .= " ORDER BY date DESC";

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
   if (isset($_POST['h_search']) or isset($_POST['filter_search'])) {
      echo '<h1 class="heading">search results</h1>';
   } else {
      echo '<h1 class="heading">latest listings</h1>';
   }
   ?>

   <div class="box-container">
      <?php
      $total_images = 0;
      if ($select_properties->rowCount() > 0) {
         while ($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)) {
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

            if (!empty($fetch_property['image_02'])) {
               $image_coutn_02 = 1;
            } else {
               $image_coutn_02 = 0;
            }
            if (!empty($fetch_property['image_03'])) {
               $image_coutn_03 = 1;
            } else {
               $image_coutn_03 = 0;
            }
            if (!empty($fetch_property['image_04'])) {
               $image_coutn_04 = 1;
            } else {
               $image_coutn_04 = 0;
            }
            if (!empty($fetch_property['image_05'])) {
               $image_coutn_05 = 1;
            } else {
               $image_coutn_05 = 0;
            }

            $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
            <form action="" method="POST">
               <div class="box">
                  <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
                  <?php
                  if ($select_saved->rowCount() > 0) {
                  ?>
                     <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
                  <?php
                  } else {
                  ?>
                     <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
                  <?php
                  }
                  ?>
                  <div class="thumb">
                     <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                     <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
                  </div>
                  <div class="admin">
                     <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
                     <div>
                        <p><?= $fetch_user['name']; ?></p>
                        <span><?= $fetch_property['date']; ?></span>
                     </div>
                  </div>
               </div>
               <div class="box">
                  <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
                  <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
                  <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
                  <div class="flex">
                     <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
                     <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
                     <p><i class="fas fa-bed"></i><span><?= $fetch_property['bhk']; ?> BHK</span></p>
                     <p><i class="fas fa-trowel"></i><span><?= $fetch_property['status']; ?></span></p>
                     <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
                     <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
                  </div>
                  <div class="flex-btn">
                     <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
                     <input type="submit" value="send enquiry" name="send" class="btn">
                  </div>
               </div>
            </form>
      <?php
         }
      } else {
         echo '<p class="empty">no results found!</p>';
      }
      ?>

   </div>

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