<?php 
$errors=[
    "name"=> "",
    "phone"=> "",
    "email"=> "",
];
require 'contacts/contacts.php';
if(isset($_POST['add']) ){
  $contact=[
    'name'=>$_POST['name'],
    'phone'=>$_POST['phone'],
    'email'=>$_POST['email'],
  ];
  if(validate_contact($contact,$errors)){
      putJSON($contact);
      header('location:index.php');
  }


}




require 'partials/header.php';?>
<div class="container mt-5">
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <lablel for="name">Name</label>
            <input  
            class="form-control  <?php echo $errors['name']?'is-invalid':''?>" id="name" name="name" placeholder="Enter Contact Name">
            <p class="invalid-feedback"><?php echo $errors['name']?></p>
        </div>
            
        <div class="form-group">
            <lablel  for="phone">Phone Number</label>
            <input 
            class="form-control <?php echo $errors['phone']?'is-invalid':''?>" id="phone" name="phone" placeholder="Enter Contact Phone">
            <p class="invalid-feedback"><?php echo $errors['phone']?></p>
        </div>   
        <div class="form-group">
            <lablel for="email">Email</label>
            <input 
            class="form-control  <?php echo $errors['email']?'is-invalid':''?>"  id="email" name="email" placeholder="Enter Your Email">
            <p class="invalid-feedback"><?php echo $errors['email']?></p>
        </div>

        <div class="form-group">
            <input name ="add" type="submit"  class="btn btn-success form-control" value="Add contact">
        </div>
    </form>
</div>
<?php require'partials/footer.php';?>