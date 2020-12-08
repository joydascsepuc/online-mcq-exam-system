


  <div class="container text-center">

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">

          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Group</h3>
            </div>
            <form role="form" action="<?php base_url('groups/create') ?>" method="post">
              <div class="box-body">

                <?php echo validation_errors(); ?>

                <div class="form-group">
                  <label for="group_name">Group Name</label>
                  <input type="text" class="form-control" id="group_name" name="group_name" placeholder="Enter group name" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="permission">Permissions</label>

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
                        <td><input type="checkbox" name="permission[]" id="permission" value="createUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewUser"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteUser"></td>
                      </tr>
                      <tr>
                        <td>Websites</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createWeb"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateWeb"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewWeb"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteWeb"></td>
                      </tr>

                      <tr>
                        <td>Groups</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewGroup"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteGroup"></td>
                      </tr>
                      <tr>
                        <td>Questions</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createQuestions"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateQuestions"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewQuestions"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteQuestions"></td>
                      </tr>
                      <tr>
                        <td>Students</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createStudents"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateStudents"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewStudents"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteStudents"></td>
                      </tr>
                      <tr>
                        <td>Exam</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createExam"></td>
                        <td>-</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewExam"></td>
                        <td>-</td>
                      </tr>

                      <tr>
                        <td>Contact</td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="createContact"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateContact"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewContact"></td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="deleteContact"></td>
                      </tr>
                      
                      <!-- <tr>
                        <td>Report</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewReport"></td>
                        <td> - </td>
                      </tr> -->
                      <!-- <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateCompany"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr> -->
                      <tr>
                        <td>Profile</td>
                        <td> - </td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="viewProfile"></td>
                        <td> - </td>
                      </tr>
                      <!-- <tr>
                        <td>Setting</td>
                        <td> - </td>
                        <td><input type="checkbox" name="permission[]" id="permission" value="updateSetting"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr> -->
                    </tbody>
                  </table>

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
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
      $('#createGroupSubMenu').addClass('active');
    });
  </script>
