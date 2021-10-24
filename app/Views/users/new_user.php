<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>
    <div class="container col-md-9">        
        <div class="p-5">
            <form action="/admin-new-user" method="POST" class="border rounded p-2">
               <h1 class="text-center"> New user</h1> 
                <div class="form-group p-2">
                    <label for="exampleInputname">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputname" aria-describedby="emailHelp" placeholder="Enter name">
                    <?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                        <small><?=  $validation->getError('name'); ?> </small> 
                        </p>
                    <?php endif; ?>
                  </div>
                <div class="form-group p-2">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted small">We'll never share your email with anyone else.</small>
                     <?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                        <small><?=  $validation->getError('email'); ?> </small> 
                        </p>
                     <?php endif; ?>
                </div>
                <div class="form-group p-2">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                    <?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                            <small><?= $validation->getError('password'); ?> </small> 
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group p-2">
                    <label for="exampleInputPassword2">Confirm password</label>
                    <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword2" placeholder="Confirm password">
                    <?php if (isset($validation)): ?>
                        <p class="text-danger small text-center m-0 p-0">
                            <small><?= $validation->getError('confirm_password'); ?> </small> 
                        </p>
                    <?php endif; ?>    
                </div>
                <div class="p-2">
                   <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
                
            </form>
        </div>
    </div>

<?= $this->endSection() ?>