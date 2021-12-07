<?php
$output="";
if (count($_POST) > 0){
    require_once 'classes/Pdo_methods.php';
    require_once('classes/StickyForm.php');
    $stickyForm = new StickyForm();
}


function init()
{

  global $output;
  global $elementsArr, $stickyForm;



  function login($post)
  {

    $pdo = new PdoMethods();

    $sql = "SELECT admin_email, admin_password, admin_name, admin_status FROM admins WHERE admin_email = :email";

    $bindings = [
      [':email', $post['email'], 'str']
    ];

    $records = $pdo->selectBinded($sql, $bindings);

    /** IF THERE WAS AN RETURN ERROR STRING */
    if ($records == 'error') {
      return "There was an error logging it";
    }

    /** */
    else {
      if (count($records) != 0) {
        /** IF THE PASSWORD IS NOT VERIFIED USING PASSWORD_VERIFY THEN RETURN FAILED, OTHERWISE RETURN SUCCESS, IF NO RECORDS ARE FOUND RETURN NO RECORDS FOUND. */
        if (($post['password'] === $records[0]['admin_password'])) {
          session_start();
          $_SESSION['access'] = "accessGranted";
          $_SESSION['userName'] = $records[0]['admin_name'];
          $_SESSION['privilege'] = $records[0]['admin_status'];
          return "success";
        } else {
          return "There was a problem logging in with that password";
        }
      } else {
        return "There was a problem logging in with those credentials";
      }
    }
  }


  if (isset($_POST['login'])) {
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

    if($postArr['masterStatus']['status'] == "noerrors"){
      
      $output = login($_POST);
      if ($output === 'success') {
        header('Location: index.php?page=welcome');
       } else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      echo "login failed";
      return getForm("",$postArr);
    }
      }else{
        return getForm("",$postArr);
        //echo "there was an error";
      }

  }else{
    $emptyArray = [];
    //echo "No sumbmit button click";
    return getForm("", $elementsArr);
  }
}

  $elementsArr = [
    "masterStatus"=>[
      "status"=>"noerrors",
      "type"=>"masterStatus"
    ],
     
    "email"=>["errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be in proper format</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"epoeana@test.com",
      "regex"=>"email"
    ],
  
    "password"=>[
      "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank and must be in proper format</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"password",
      "regex"=>"password"
    ],
  
   
  ];

  function getForm($acknowledgement, $elementsArr){
  global $output;
  $acknowledgement = "";

  $form = <<<HTML

<div style="margin:20px">
<h1>Login Page</h1>

<p><?php echo $output ?></p>

<form action="index.php?page=login" method="post">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label for="email">Email address{$elementsArr['email']['errorOutput']}</label>
      <input type="email" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label for="password">Password {$elementsArr['password']['errorOutput']}</label>
      <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="login" value="Login">
          </div>
        </div>
      </div>
      </form>
</div>

HTML;

  return [$acknowledgement, $form];
}
