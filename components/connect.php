<?php

   $db_name = getenv('DB_NAME');
   $db_user_name = getenv('DB_USER_NAME');
   $db_user_pass = getenv('DB_USER_PASS');

   $conn = new PDO($db_name, $db_user_name, $db_user_pass, [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  
   ]);

   function create_unique_id(){
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 20; $i++) {
          $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }