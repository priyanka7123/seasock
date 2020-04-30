<?php
include_once("include/config.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>seasock |  connect Together</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-light">
 <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
     <div class="container">
         <a href="index.php" class="navbar-brand mt-2"><h5>SeaSock</h5></a>
     
     <form action="" method="post">
         <table class="ml-auto">
         <tr>
             <th class="small text-white">username/email</th>
             <th class="small text-white">password</th>
         </tr>
         <tr>
             <td><input type="text" name="username" placeholder="username/email" class="form-control-sm mr-3"></td>
             <td><input type="password" name="password" placeholder="password" class="form-control-sm"></td>
             <td><input type="submit" name="login" class="btn btn-info btn-sm"></td>
         </tr>
     </table>
     </form>
     </div>
 </nav>  
 
  <div class="container mt-3">
      <div class="row">
          <div class="col-lg-8">
              <h1 class="display-4">welcome in no.1 social networking site</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas ratione mollitia magni id vitae ad nihil dignissimos nobis ipsa atque ea, fuga nam dolor facere sed libero. Totam, consequuntur, voluptates!</p>
          </div>
          <div class="col-lg-4">
           <div class="card">
               <div class="card-body">
                  <h2 class="blockquote m-0 p-0">create an account</h2>
                  <small class="text-muted">100% free of cost</small>
                   <form action="index.php" method="post" class="mt-2">
                      <div class="row">
                       <div class="form-group col">
                           <label for="fname" class="m-0 p-0 text-muted">first name</label>
                           <input type="text" id="fname" name="fname" class="form-control">
                       </div> 
                           <div class="form-group col">
                           <label for="lname" class="m-0 p-0 text-muted">last name</label>
                           <input type="text" id="lname" name="lname" class="form-control"> 
                       </div>
                       </div>
                       <div class="form-group">
                       
                           <label for="email" class="m-0 p-0 text-muted">email</label>
                           <input type="email" id="email" name="email" class="form-control">     
                       </div>
                      <div class="form-group">
                           <label for="contact" class="m-0 p-0 text-muted">contact</label>
                           <input type="number" id="contact" name="contact" class="form-control"> 
                       </div> 
                          <div class="form-group">
                           <label for="dateofbirth" class="m-0 p-0 text-muted">date of birth</label>
                           <input type="date" id="dateofbirth" name="dateofbirth" class="form-control"> 
                       </div> 
                          <div class="form-group">
                           <label for="password" class="m-0 p-0 text-muted">create password</label>
                           <input type="password" id="password" name="password" class="form-control"> 
                       </div> 
                          <div class="form-group">
                           
                           <input type="submit"  name="create_account" class="btn btn-success btn-block"> 
                       </div> 
                          
                   </form>
               </div>
           </div>   
          </div>
      </div>
  </div> 
</body>
</html>



<?php
if(isset($_POST['create_account'])){
    $data = [
        'first_name' => $_POST['fname'],
        'last_name' => $_POST['lname'],
        'email' => $_POST['email'],
        'contact' => $_POST['contatct'],
        'dob' => $_POST['dateofbirth'],
        'password' => md5($_POST['password']),
    ];
    
    if(insertdata('account',$data)){
        redirect('index');
    }
    else{
        echo"fail";
    }
    
}
//login work

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    
    $count = countdata('account',"(email='$username' OR contact='$username')AND password='$password'");
    
    if($count > 0){
        $_SESSION['user'] = $username;
        redirect('profile');
    }
    else {
        echo "username and password is incorrect try again";
    }
}

?>
