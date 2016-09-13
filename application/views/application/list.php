<script type="text/javascript">
    app.controller('mainCtrl', function ($scope, $http) {
        $scope.infos = <?php echo json_encode($infos);?>;
       
    });
</script>

<!-- Main row -->
<div class="row" ng-controller="mainCtrl">
    <section class="col-lg-6">
        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Create</h3>
                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <?php echo validation_errors(); ?>
                <form name="userForm" action="<?php echo site_url("welcome/add");?>" method="post">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">FirstName</label>
                            <input type="text" class="form-control" name="firstname" 
                            ng-model="user.firstname"  
                            ng-minlength="3" required>
                           <p ng-show="userForm.firstname.$invalid && !userForm.firstname.$pristine" class="help-block error">Firstname is required and at least 3 characters.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">LastName</label>
                            <input type="text" class="form-control" name="lastname" 
                            ng-model="user.lastname" 
                            ng-minlength="3" required>
                            <p ng-show="userForm.lastname.$invalid && !userForm.lastname.$pristine" class="help-block error">Lastname is required and at least 3 characters.</p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                          <div class="radio">
                              <label><input type="radio" name="gender" value="0" checked>Male</label>
                            </div>
                            <div class="radio">
                              <label><input type="radio" name="gender" value="1">Female</label>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-12">   
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" class="form-control" name="address" 
                            ng-model="user.address" required>
                            <p ng-show="userForm.address.$invalid && !userForm.address.$pristine" class="help-block error">Address is required.</p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tel</label>
                             <input type="text" 
                                class="form-control" 
                               ng-minlength="10"  ng-pattern="/^0[0-9]{9,9}$/" ng-maxlength="10"   name="tel" maxlength=10
                            ng-model="user.tel" required>
                            <p  class="help-block error" ng-show="userForm.tel.$error.pattern">Not a valid phone number! (ex 0000000000 ) start with 0</p>
                            <p  class="help-block error" ng-show="userForm.tel.$error.required && !userForm.tel.$pristine">Tel is required!</p>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control"  ng-pattern="/^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/"    name="email" maxlength=100
                            ng-model="user.email" required />
                            <p  class="help-block error" ng-show="userForm.email.$error.pattern">Not a valid email!</p>
                            <p  class="help-block error" ng-show="userForm.email.$error.required && !userForm.tel.$pristine">Email is required!</p>
                        </div>
                    </div> 
                    <div class="col-lg-12">  
                        <button type="reset" class="btn btn-default">Close</button>
                        <button type="submit" class="btn btn-primary" >Save</button>
                    </div>
                </form>
            </div>
        </div>
        
    </section>
    
    <!-- Left col -->
    <section class="col-lg-6">
        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">List</h3>
                <div class="box-tools pull-right">
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th style="width:180px">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="info in infos">
                            <td>{{info.firstname}} {{info.lastname}}  ( {{info.gender==0?'Male':'Female'}} )</td>
                            <td>{{info.address}}</td>
                            <th>
                               {{info.tel}} <br>
                                {{info.email}}
                            </th>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-tools pull-right" ng-bind-html="pagination | trustAsHtml"></div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->

    </section><!-- /.Left col -->

</div><!-- /.row (main row) -->
