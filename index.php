
<?php
require_once("contacts/contacts.php");
if(isset($_POST["search"])){
$name = $_POST["name"];
$search_results=search($name);

}
require 'partials/header.php';
?>

    <div class="container mt-5">

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <lablel for="name">Name</label>
                <input  
                class="form-control  <?php echo $errors['name']?'is-invalid':''?>" id="name" name="name" placeholder="Enter Contact Name">
                <p class="invalid-feedback"><?php echo $errors['name']?></p>
            </div>
            <div class="form-group">
                <input name ="search" type="submit"  class="btn btn-success form-control " value="Search">
            </div>
            
        </form>
        <form action="add_contact.php">
             <button class="btn btn-success form-control">Add new contact</button>
        </form>
       
    </div>
    <?php if(!empty($search_results)):?>
        <div class="container mt-5">
        <div>
        <div class ="card-header text-center"><h2>Search results</h2></div>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>

            </thead>
            <tbody>
                <?php
                foreach($search_results as $contact):?>
                <tr>
            
                    <td><?php echo $contact['name']?></td>
                    <td><?php echo $contact['phone']?></td>
                    <td><?php echo $contact['email']?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        
            
    </div>
<?php endif;?>


<?php require 'partials/footer.php'?>