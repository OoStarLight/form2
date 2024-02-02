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

// 4. Season - must be in the list.

   if(!empty($_POST['season'])){
    $season = $_POST['season'];
    $allowed_seasons = ['Summer', 'Winter', 'Spring', 'Autumn'];

    if(!in_array($season, $allowed_seasons)){
        $error[] = 'This season is not Allowed';
    }

   }else{
    $error[] = 'this season is not available';
   }

// 5. Interest - 

    if(!empty($_POST['interests'])){
        $interests = $_POST['interests'];
        $allowed_interests = ['Photography', 'Trekking', 'Star Gazing', 'Bird Watching'];

        foreach($interest as $interest){
            if(!in_array($interests, $allowed_interests)){
                $error[] = 'This interest is not Allowed';
            }
            break;
        }
        

    }

// 6. Participant - required, participant must be between 1-10.


        if(!empty($_POST['participant'])){
            $participant = (int)$_POST['participant'];
            if($participant < 1 && $participant > 10){
                $error[] = 'The number of participant must be between 1 and 10';
            }

        }else{
            $error[] = 'Enter the number of participants';
        }

// 7. Message - required, must not contain htmltags or js script.

        if(!empty($_POST['message'])){
            $message = htmlentities($_POST['message'], ENT_QUOTES, "UTF-8");


        }else{
            $error[] = 'You can tell us all you need so we can make your trip better';
        }