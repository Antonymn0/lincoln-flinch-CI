<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/sideNav') ?>
    
    <div class="container col-md-9 justify-content-center mx-auto">
        <h1 class="p-2 w-50 text-center ">Dashboard</h1>    

        <!-- Panels     -->
       <div class="row  justify-content-center mx-auto ">
            <div class="col-md-3 grid-margin mb-1  stretch-card hover-zoom">
                <div class="card  bg-success card-rounded text-center">
                    <div class=" justify-content-center p-2">
                        <h4 class=" text-white mb-4">Registered users</h4>
                        <div class="text-center">
                            <div class=" text-center">
                                <p class="status-summary-ight-white mb-1">All users</p>
                                <h2 class="text-info">357</h2>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3  grid-margin mb-1  stretch-card">
                <div class="card  bg-primary card-rounded text-center hover-zoom">
                    <div class=" justify-content-center p-2">
                        <h4 class=" text-white mb-4">New users</h4>
                        <div class="text-center">
                            <div class=" text-center">
                                <p class="status-summary-ight-white mb-1">Newly registered</p>
                                <h2 class="text-info">52</h2>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3  grid-margin mb-1  stretch-card">
                <div class="card  bg-danger card-rounded text-center hover-zoom">
                    <div class=" justify-content-center p-2">
                        <h4 class=" text-white mb-4">Pending</h4>
                        <div class="text-center">
                            <div class=" text-center">
                                <p class="status-summary-ight-white mb-1">Registration pending</p>
                                <h2 class="text-info">37</h2>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
           <div class="col-md-3  grid-margin mb-1  stretch-card">
                <div class="card  bg-secondary card-rounded text-center hover-zoom">
                    <div class=" justify-content-center p-2">
                        <h4 class=" text-white mb-4">Complete</h4>
                        <div class="text-center">
                            <div class=" text-center">
                                <p class="status-summary-ight-white mb-1">Registration complete</p>
                                <h2 class="text-info">198</h2>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>            
       </div>
       <div class="container p-2">
         <hr>  
       </div>

        <!-- recent tickets section -->
       <div class=" m-1 mb-2">
            <div class="card p-2">
                <h4 class="p-2">Recent Tickets</h4>
                <div class="table-responsive p-2">
                    <table class="table">
                    <thead>
                        <tr>
                        <th> Assignee </th>
                        <th> Subject </th>
                        <th> Status </th>
                        <th> Last Update </th>
                        <th> Tracking ID </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="assets/images/faces/face1.jpg" class="mr-2" alt="image"> David Grey
                            </td>
                            <td> Fund is not recieved </td>
                            <td>
                                <label class="badge bg-success">DONE</label>
                            </td>
                            <td> Dec 5, 2017 </td>
                            <td> WD-12345 </td>
                            </tr>
                        <tr>
                            <td>
                                <img src="assets/images/faces/face2.jpg" class="mr-2" alt="image"> Stella Johnson
                            </td>
                            <td> High loading time </td>
                            <td>
                                <label class="badge bg-warning">PROGRESS</label>
                            </td>
                            <td> Dec 12, 2017 </td>
                            <td> WD-12346 </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/images/faces/face3.jpg" class="mr-2" alt="image"> Marina Michel
                            </td>
                            <td> Website down for one week </td>
                            <td>
                                <label class="badge bg-info">ON HOLD</label>
                            </td>
                            <td> Dec 16, 2017 </td>
                            <td> WD-12347 </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe
                            </td>
                            <td> Loosing control on server </td>
                            <td>
                                <label class="badge bg-danger">REJECTED</label>
                            </td>
                            <td> Dec 3, 2017 </td>
                            <td> WD-12348 </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="assets/images/faces/face4.jpg" class="mr-2" alt="image"> John Doe
                            </td>
                            <td> Loosing control on server </td>
                            <td>
                                <label class="badge bg-danger">REJECTED</label>
                            </td>
                            <td> Dec 3, 2017 </td>
                            <td> WD-12348 </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Todo list section -->
        <div class="m-1 mb-2">
            <div class="card card-rounded">
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="p-2 ml-5">Todo list</h4>
                        <div class="add-items d-flex mb-0">
                        <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                        <button class=" btn btn-icons btn-rounded btn-primary  text-white hover-zoom"><i class="mdi mdi-plus"> </i>+</button>
                        </div>
                    </div>
                    <div class="list-wrapper p-0 m-0">
                        <ul class="todo-list todo-list-rounded m-0 p-0">
                            <li class="d-block border-bottom p-2">
                                <div class=" w-100">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                <i class="input-helper"></i></label>
                                <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                    <div class="badge bg-warning me-3">Due tomorrow</div>
                                    <i class="mdi mdi-flag ms-2 flag-color"></i>
                                </div>
                                </div>
                            </li>
                            <li class="d-block border-bottom p-2">
                                <div class=" w-100">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                <i class="input-helper"></i></label>
                                <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">23 June 2020</div>
                                    <div class="badge bg-success me-3">Done</div>
                                </div>
                                </div>
                            </li>
                            <li class="d-block border-bottom p-2">
                                <div class=" w-100">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                <i class="input-helper"></i></label>
                                <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                    <div class="badge bg-success me-3">Done</div>
                                </div>
                                </div>
                            </li>
                            <li class="border-bottom-0 d-block p-2">
                                <div class=" w-100">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                <i class="input-helper"></i></label>
                                <div class="d-flex mt-2">
                                    <div class="ps-4 text-small me-3">24 June 2020</div>
                                    <div class="badge bg-danger me-3">Expired</div>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
    


<?= $this->endSection() ?>