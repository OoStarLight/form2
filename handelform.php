<?php 


   $error = [];



// 1. name - required, alphabet und spaces only.
   if (!empty($_POST['name'])) {

        $name = $_POST['name'];
        if(ctype_alpha(str_replace(" ","",$name)) === false){
            $error[] = 'the name should contain only alphabet and spaces !'; 
        }

   }else{
    $error[] = 'Name field cannot be empty !';
   }



// 2. email - required
   if(!empty($_POST['email'])){
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL) !== $email){
        $error[] = 'Email is not valid';
    }
   }else{
    $error[] = 'Email field cannot be empty !';
   }




// 3. region - required, value should be in the array to avoid bad manipulation from the browsers "inspect".

   if(!empty($_POST['destination'])){
    $destination = $_POST['destination'];
    $allowed_regions = ['Africa','Europa', 'Asia', 'North America0', 'Latin America', 'Oceania'];

    if(!in_array($region, $allowed_regions)){
        $error[] = 'This region is not Allowed';
    }

   }else{
    $error[] = 'this region is not available';
   }

  