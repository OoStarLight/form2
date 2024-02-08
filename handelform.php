<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travelagency";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("no connection...".$conn->connect_error);
} else{
    echo "you can access the DB";
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    
    
    
    
    
    
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
    $allowed_destinations = ['Africa','Europa', 'Asia', 'North America0', 'Latin America', 'Oceania'];

    if(!in_array($destination, $allowed_destinations)){
        $error[] = 'This region is not Allowed';
    }

   }else{
    $error[] = 'this region is not available';
   }

// 4. Season - must be in the list.

   if(!empty($_POST['seasons'])){
    $seasons = $_POST['seasons'];
    $allowed_seasons = ['summer', 'winter', 'spring', 'autumn'];

    if(!in_array($seasons, $allowed_seasons)){
        $error[] = 'This season is not Allowed';
    }

   }else{
    $error[] = 'this season is not available';
   }

// 5. Interest - 

    if(isset($_POST['interests']) && is_array($_POST['interests'])) {
        $interests = $_POST['interests'];
        $allowed_interests = ["Photography", "Trekking", "Star Gazing", "Bird Watching"];
        
    
        foreach($interests as $interest) {
            if(!in_array($interest, $allowed_interests)) {
                $error[] = 'Interest "' . htmlspecialchars($interest) . '" is not allowed.';
            }
        }
    
       
    }
    

// 6. Participant - required, participant must be between 1-10.


        if(!empty($_POST['participants'])){
            $participants = (int)$_POST['participants'];
            if($participants < 1 && $participants > 10){
                $error[] = 'The number of participant must be between 1 and 10';
            }

        }else{
            $error[] = 'Enter the number of participants';
        }

// 7. requirement - required, must not contain htmltags or js script.

        if(!empty($_POST['requirement'])){
            $requirement = htmlentities($_POST['requirement'], ENT_QUOTES, "UTF-8");


        }else{
            $error[] = 'You can tell us all you need so we can make your trip better';
        }
        
        $interestsString = implode(', ', $interests);
        $sql = "INSERT INTO travelers (name, email, destination, seasons, interests, participants, requirement) VALUES('$name', '$email', '$destination', '$seasons', '$interestsString', '$participants', '$requirement')";

    if($conn ->query($sql) === TRUE){
        echo "you sent some data ...";
    }else{
        echo "No data is sent ...".$conn->error;
    }
    }

    