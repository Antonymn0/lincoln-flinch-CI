<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>
    <div class="container col-md-9">        
        <div class="p-5">
            <form action="<?php echo '/update-user/'. $user['id'];?>" method="POST" class="border rounded p-2">
               <h1 class="text-center"> Update user</h1> 
                <div class="form-group p-2">
                    <label for="exampleInputname">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $user['id'] ?>" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter name">
                  </div>
                <div class="form-group p-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                
                <div class="p-2">
                   <button type="submit" class="btn btn-primary">Update</button> 
                </div>                
            </form>
        </div>
    </div>

<?= $this->endSection() ?>