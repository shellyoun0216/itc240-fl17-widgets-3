<?php include 'includes/config.php' ?>
<?php include 'includes/header.php' ?>
	<?php //form1.php

    //put client's email address here
    $to = 'I-hsuan.Oun@seattlecolleges.edu';


		if (isset($_POST["FirstName"])) {//show data
			
      //clean and process the post data
      $FirstName = clean_post('FirstName');
      $LastName = clean_post('LastName');
      $Email = clean_post('Email');
      $Comments = clean_post('Comments');

      //$subject = 'ITC240 Contact Form';
      $subject = "Ceramics Appointment Request From " . $FirstName . " " . $LastName . " " . date('l jS \of F Y h:i:s A');
      
      // $myText = "The user has entered the following info:" . PHP_EOL . PHP_EOL;
      // $myText .= 'FirstName . " " . $LastName . PHP_EOL';
      // $myText .= 'Comments . PHP_EOL';

      $myText = process_post();


      $headers = 'From: noreply@ih-o.com' . PHP_EOL .
          'Reply-To: ' . $Email . PHP_EOL .
          'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $myText, $headers);

      echo '
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">
          <strong>Messages sent</strong>
        </h2>
        <hr class="divider">
        <p>Thank you for you information!</p>
        <p>we will get back to you within 48 hours</p>
        <p><a href ="">Exit</a></p>
      ';


      // echo $FirstName;


			// echo "
			// <p>The user's name is $FirstName $LastName</p>
			// <p>$FirstName email is $Email</p>
			// <p>Here is what $FirstName to say:</p>
			// <p>$Comments</p>
			// ";

		}else{//show form
			echo '
        <hr class="divider">
        <h2 class="text-center text-lg text-uppercase my-0">Book Ceramics 
          <strong>Appointment</strong>
        </h2>
        <hr class="divider">
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-lg-4">
              <label class="text-heading">FirstName</label>
              <input type="text" name="FirstName" class="form-control" required="required" autofocus>
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">LastName</label>
              <input type="text" name="LastName" class="form-control" required="required" >
            </div>
            <div class="form-group col-lg-4">
              <label class="text-heading">Email Address</label>
              <input type="email" name="Email" class="form-control">
            </div>
            <div class="clearfix"></div>
            

            <div class="form-group col-lg-4">
              <label class="text-heading">Appointment Type</label>
            <p>
              <input type="radio" name="Appointment_Type" value="Beginning hand building" /> Beginning hand building<br />
              <input type="radio" name="Appointment_Type" value="Building" /> Building<br />
              <input type="radio" name="Appointment_Type" value="Advanced wheel throwing" /> Advanced wheel throwing
            </p>
            </div> 

             <div class="form-group col-lg-4">
              <label class="text-heading">Extras</label>
            <p>
              <input type="checkbox" name="Extras[]" value="Mosaic" /> Mosaic<br />
              <input type="checkbox" name="Extras[]" value="Beading" /> Beading<br />
              <input type="checkbox" name="Extras[]" value="Private Lesson" /> Private Lesson
            </p>
            </div>
       
            <div class="form-group col-lg-4">
            <label class="text-heading">Appointment Date</label>
            <input type="text" name="Appointment_Date" class="form-control">
            </div>
            

            <div class="form-group col-lg-12">
              <label class="text-heading">Comments</label>
              <textarea class="form-control" name="Comments" rows="6"></textarea>
            </div>
            <div class="form-group col-lg-12">
              <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
          </div>
        </form>
			';
		}


	?>

<?php include 'includes/footer.php';
  
  function clean_post($key)
{
    if(isset($_POST[$key])){
        $value = strip_tags(trim($_POST[$key]));
    }else{
        $value="";
    }
    return $value;
    
} 

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(", ",$_POST[$varName]) . PHP_EOL . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL . PHP_EOL;
         }
    }
    return $myReturn;
}


?>
