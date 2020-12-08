
  <div class="container text-center">

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/update') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" value="<?php echo $group_data['group_name']; ?>" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="permission">Permission</label>

                  <?php $serialize_permission = unserialize($group_data['permission']); ?>

                  <table class="table text-center">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser" <?php if($serialize_permission) {
                          if(in_array('createUser', $serialize_permission)) { echo "checked"; }
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser" <?php
                        if($serialize_permission) {
                          if(in_array('updateUser', $serialize_permission)) { echo "checked"; }
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser" <?php
                        if($serialize_permission) {
                          if(in_array('viewUser', $serialize_permission)) { echo "checked"; }
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser" <?php
                        if($serialize_permission) {
                          if(in_array('deleteUser', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>

                      <tr>
                        <td>Websites</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createWeb" <?php if($serialize_permission) {
                          if(in_array('createWeb', $serialize_permission)) { echo "checked"; }
                        } ?> ></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateWeb" <?php
                        if($serialize_permission) {
                          if(in_array('updateWeb', $serialize_permission)) { echo "checked"; }
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewWeb" <?php
                        if($serialize_permission) {
                          if(in_array('viewWeb', $serialize_permission)) { echo "checked"; }
                        }
                        ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteWeb" <?php 
                        if($serialize_permission) {
                          if(in_array('deleteWeb', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>


                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup" <?php
                        if($serialize_permission) {
                          if(in_array('createGroup', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup" <?php
                        if($serialize_permission) {
                          if(in_array('updateGroup', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup" <?php
                        if($serialize_permission) {
                          if(in_array('viewGroup', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup" <?php
                        if($serialize_permission) {
                          if(in_array('deleteGroup', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Questions</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuestions" <?php
                        if($serialize_permission) {
                          if(in_array('createQuestions', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuestions" <?php
                        if($serialize_permission) {
                          if(in_array('updateQuestions', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuestions" <?php
                        if($serialize_permission) {
                          if(in_array('viewQuestions', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuestions" <?php
                        if($serialize_permission) {
                          if(in_array('deleteQuestions', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Students</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createStudents" <?php
                        if($serialize_permission) {
                          if(in_array('createStudents', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateStudents" <?php
                        if($serialize_permission) {
                          if(in_array('updateStudents', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewStudents" <?php
                        if($serialize_permission) {
                          if(in_array('viewStudents', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteStudents" <?php
                        if($serialize_permission) {
                          if(in_array('deleteStudents', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Exam</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createExam" <?php
                        if($serialize_permission) {
                          if(in_array('createExam', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewExam" <?php
                        if($serialize_permission) {
                          if(in_array('viewExam', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td>-</td>
                      </tr>
                      <tr>
                        <td>Contact</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createContact" <?php
                        if($serialize_permission) {
                          if(in_array('createContact', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateContact" <?php
                        if($serialize_permission) {
                          if(in_array('updateContact', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewContact" <?php
                        if($serialize_permission) {
                          if(in_array('viewContact', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteContact" <?php
                        if($serialize_permission) {
                          if(in_array('deleteContact', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>
                      <!-- <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createOrder" <?php
                        if($serialize_permission) {
                          if(in_array('createOrder', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateOrder" <?php
                        if($serialize_permission) {
                          if(in_array('updateOrder', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewOrder" <?php
                        if($serialize_permission) {
                          if(in_array('viewOrder', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteOrder" <?php
                        if($serialize_permission) {
                          if(in_array('deleteOrder', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                      </tr>
                      <tr>
                        <td>Report</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReport" <?php
                        if($serialize_permission) {
                          if(in_array('viewReport', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td> - </td>
                      </tr>
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany" <?php
                        if($serialize_permission) {
                          if(in_array('updateCompany', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td> - </td>
                        <td> - </td>
                      </tr> -->
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile" <?php
                        if($serialize_permission) {
                          if(in_array('viewProfile', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td> - </td>
                      </tr>
                      <!-- <tr>
                        <td>Setting</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting" <?php
                        if($serialize_permission) {
                          if(in_array('updateSetting', $serialize_permission)) { echo "checked"; }
                        }
                         ?>></td>
                        <td> - </td>
                        <td> - </td>
                      </tr> -->
                    </tbody>
                  </table>

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Changes</button>
                <a href="<?php echo base_url('groups/') ?>" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function() {
      $('#topMainNav').addClass('active');
      $('#groupMainNav').addClass('active');
      $('#manageGroupSubMenu').addClass('active');
    });
  </script>
