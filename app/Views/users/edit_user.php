<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>
    <div class="container col-sm-9 mx-auto">  
        <?php if(session('success')) :?>
            <div class="alert alert-success mt-2 col-sm-6 text-center mx-auto">
                <?= session('success');?>
            </div>  
        <?php endif ?>  
        <div class="p-5">
            <form action="<?php echo '/admin/update-user/'. $user['id'];?>" method="POST" enctype="multipart/form-data" class="border rounded p-2">
               <h1 class="text-center"> Update user</h1> 
                <div class="form-group p-2">
                    <label for="exampleInputname">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter name">
                  </div>
                <div class="form-group p-2">
                    <label for="exampleInputname">Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter Phone number">
                  </div>
                <div class="form-group p-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group col-md-6">
            <label for="formGroupExampleInput">Image <small> (optional) </small></label>
            <input type="file" name="file" class="form-control" id="file"  accept=".png, .jpg, .jpeg" />
          </div>
                
                <div class="p-2">
                   <button type="submit" class="btn btn-primary">Update</button> 
                </div>                
            </form>
        </div>
    </div>

<?= $this->endSection() ?>