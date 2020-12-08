<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css';?>">
    <link rel="icon" href="<?php echo base_url().'assets/images/icon/icon.png';?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url().'assets/fontawsome/css/all.css';?>"> -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/jquery/jquery-ui.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.min.css';?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font.css';?>"> -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/fontawsome/css/all.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.min.css';?>">

    <script src="<?php echo base_url().'assets/js/jquery-3.4.1.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'; ?>"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css';?>">
    <title>Home | Defence Care</title>
</head>
<body>

  <div class="container">
    <nav class="navbar navbar-expand-md navbar-light">
      <a class="navbar-brand text-dark font-weight-bold" href="<?php echo base_url();?>">Defence Care CTG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if($this->session->userdata('logged_in')):?>
              <?php if($user_permission): ?>
              <!-- <a class="nav-link text-dark" href="<?php echo base_url();?>departments">Departments</a> -->
              <?php if(in_array('createWeb', $user_permission) || in_array('updateWeb', $user_permission) || in_array('viewWeb', $user_permission) || in_array('deleteWeb', $user_permission)): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Website
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                  <?php if(in_array('createWeb', $user_permission) ): ?>
                    <a class="dropdown-item" href="<?php echo base_url();?>website/loadAddSlider">Add Slider</a>
                  <?php endif; ?>

                  <?php if(in_array('updateWeb', $user_permission) || in_array('viewWeb', $user_permission) || in_array('deleteWeb', $user_permission)): ?>
                    <a class="dropdown-item" href="<?php echo base_url();?>website/loadSliders">Manage Sliders</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>website/manageNotices">Manage Notices</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php endif; ?>

            <?php if(in_array('createQuestions', $user_permission) || in_array('updateQuestions', $user_permission) || in_array('viewQuestions', $user_permission) || in_array('deleteQuestions', $user_permission)): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Questions
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                  <?php if(in_array('createQuestions', $user_permission) ): ?>

                    <a class="dropdown-item" href="<?php echo base_url();?>questions/addQuestion">Add Questions</a>
                  <?php endif; ?>
                  
                  <?php if(in_array('updateQuestions', $user_permission) || in_array('viewQuestions', $user_permission) || in_array('deleteQuestions', $user_permission)): ?>
                  <!-- <a class="dropdown-item" href="<?php echo base_url(); ?>">Add Set</a> -->
                    <a class="dropdown-item" href="<?php echo base_url();?>questions/viewAll">View All</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php endif; ?>


            <?php if(in_array('createStudents', $user_permission) || in_array('updateStudents', $user_permission) || in_array('viewStudents', $user_permission) || in_array('deleteStudents', $user_permission)): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Students
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                  <?php if(in_array('createStudents', $user_permission) ): ?>

                    <a class="dropdown-item" href="<?php echo base_url();?>students/loadAdd">Add Student</a>
                  <?php endif; ?>
                  <?php if(in_array('updateStudents', $user_permission) || in_array('viewStudents', $user_permission) || in_array('deleteStudents', $user_permission)): ?>
                    <a class="dropdown-item" href="<?php echo base_url();?>students/viewAll">View All</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php endif; ?>

              <?php if(in_array('createUser', $user_permission) || in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Manage Users
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                  <!-- <?php if(in_array('createUser', $user_permission) ): ?>

                    <a class="dropdown-item" href="<?php echo base_url(); ?>">Add User</a>
                  <?php endif; ?> -->
                  <?php if(in_array('updateUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
                    <a class="dropdown-item" href="<?php echo base_url();?>auth/pending">Pending Request</a>
                    <a class="dropdown-item" href="<?php echo base_url();?>auth/viewAll">View All</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php endif; ?>
            <?php if(in_array('createGroup', $user_permission) || in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Manage Groups
                </a>
                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                  <?php if(in_array('createGroup', $user_permission) ): ?>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>groups/create">Add Groups</a>
                  <?php endif; ?>
                  <?php if(in_array('updateGroup', $user_permission) || in_array('viewGroup', $user_permission) || in_array('deleteGroup', $user_permission)): ?>
                  <a class="dropdown-item" href="<?php echo base_url();?>groups/index">View All</a>
                  <?php endif; ?>

                </div>
              </li>
            <?php endif; ?>

            <?php endif;?>
            <?php endif;?>
        </ul>

        <ul class="navbar-nav ml-auto">

          <?php if($this->session->userdata('logged_in')){ ?>
            <?php if(in_array('createExam', $user_permission) || in_array('viewExam', $user_permission)): ?>
              <li class="nav-item">
                  <a class="nav-link text-dark" href="<?php echo base_url();?>pages/exam">Online Exam</a>
              </li>
            <?php endif;?>

          <?php } ?>

          <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo base_url();?>pages/demoexam">Demo Exam</a>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" href="<?php echo base_url();?>pages/contact">Contact</a>
          </li>

          <?php if($this->session->userdata('logged_in')){ ?>
            <li class="nav-item dropdown" id="profile">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-user-circle fa-2x"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if(in_array('viewProfile', $user_permission)): ?>
                <a class="dropdown-item text-dark" href="<?php echo base_url()?>pages/profile"><i class="fas fa-user-alt"></i>&nbsp;Profile</a>
                <?php endif;?>

                <a class="dropdown-item text-dark" href="<?php echo base_url();?>auth/logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
              </div>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link font-weight-bold text-dark" href="#" type="button" data-toggle="modal" data-target="#signinModal"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </div>



  <!--1.Login Modal-->
  <div class="modal fade modal-content-right" id="signinModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content" id="signinContent">
        <div class="modal-header pb-0">
          <div>
              <h3 class="modal-title">Log In</h3>
              <em>to your account</em>
          </div>
          <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button" data-dismiss="modal">
            <i class="material-icons">close</i>
          </button>
        </div>
        <div class="modal-body">
          <?php echo form_open('auth/login');?>
              <div class="form-group">
                <span class="input-icon">
                <i class="material-icons">Mobile Number</i>
                <input type="text" class="form-control" name="signinemail" id="" placeholder="Ex : 01********" required>
                </span>
              </div>
              <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Password</i>
          <input type="password" class="form-control" name="signinpassword" id="" placeholder="" required>
        </span>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberCheck" checked>
                    <label class="custom-control-label" for="rememberCheck">Remember me</label>
                </div>
                <u><a href="#" data-target="#forgotPassword" data-toggle="modal" class="text-primary small" id="showResetContent">Forgot password?<br>Contact Admin.</a></u>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
            <hr>
            <p class="font-weight-bold">Don't have an account ? <u><a href="#" id="" data-toggle="modal" data-target="#signUpModal">Register Now</a></u></p>
            <hr>
            <div class="text-center">
                <p class="font-weight-bold">Or sign in via</p>
                <button class="btn btn-icon btn-faded-primary rounded-circle" data-toggle="tooltip" title="Facebook" data-container="#signinContent">
                    <a href="#" target="_blank" id="facebook"><i class="fab fa-facebook"></i></a>
                </button>
                <button class="btn btn-icon btn-faded-info rounded-circle" data-toggle="tooltip" title="Twitter" data-container="#signinContent">
                    <a href="#" target="_blank" id="linkedId"><i class="fab fa-twitter"></i></a>
                </button>
                <button class="btn btn-icon btn-faded-danger rounded-circle" data-toggle="tooltip" title="Google" data-container="#signinContent">
                    <a href="#" id="gmail"><i class="fas fa-envelope"></i></a>
                </button>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!--3.Reset Password modal-->
  <!-- <div class="modal" id="forgotPassword" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">

          <div class="modal-content" id="forgotPasswordContent">
              <div class="modal-header pb-0">
                  <div>
                      <h3 class="modal-title">Reset Password</h3>
                      <em>of your account</em>
                  </div>
                  <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button" data-dismiss="modal">
                      <i class="material-icons">close</i>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="formforgotPassword">

                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Your Name</i>
          <input type="text" class="form-control" id="forgotPasswordNameInput" placeholder="Ex: John Doe" required>
        </span>
                      </div>

                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Your e-mail</i>
          <input type="email" class="form-control" id="forgotPasswordEmailInput" placeholder="Ex : mail@mail.com" required>
        </span>
                      </div>
                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Last Remember Password</i>
          <input type="password" class="form-control" id="forgotPasswordPasswordInput" placeholder="" required>
        </span>
                      </div>
                      <button type="submit" class="btn btn-primary btn-block" id="reset">Get Reset Instruction</button>
                  </form>
                  <hr>
                  <hr>
                  <hr>
                  <div class="text-center">
                      <p class="font-weight-bold">Or sign in via</p>
                      <button class="btn btn-icon btn-faded-primary rounded-circle" data-toggle="tooltip" title="Facebook" data-container="#signinContent">
                          <a href="#" target="_blank" id="forgotPasswordfacebook"><i class="fab fa-facebook"></i></a>
                      </button>
                      <button class="btn btn-icon btn-faded-info rounded-circle" data-toggle="tooltip" title="Twitter" data-container="#signinContent">
                          <a href="#" target="_blank" id="forgotPasswordlinkedId"><i class="fab fa-twitter"></i></a>
                      </button>
                      <button class="btn btn-icon btn-faded-danger rounded-circle" data-toggle="tooltip" title="Google" data-container="#signinContent">
                          <a href="#" id="forgotPasswordgmail"><i class="fas fa-envelope"></i></a>
                      </button>
                  </div>
                  <div id="show" style="display: none;">
                      <p class="text-primary font-weight-bold ml-4">An instruction email has sent. Please check your email.</p>
                  </div>
              </div>
          </div>
      </div>
  </div> -->

  <!--Sign Up Modal-->
  <div class="modal" id="signUpModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">

          <div class="modal-content" id="signUpContent">
              <div class="modal-header pb-0">
                  <div>
                      <h3 class="modal-title">Register</h3>
                      <em>to join our family</em>
                  </div>
                  <button class="btn btn-icon btn-sm btn-text-secondary rounded-circle" type="button" data-dismiss="modal">
                      <i class="material-icons">close</i>
                  </button>
              </div>
              <div class="modal-body">

                  <form id="formsignUp" action="<?php echo base_url()?>auth/register" method="post">

                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Your Name</i>
          <input type="text" name="signupname" class="form-control" id="signUpFirstNameInput" placeholder="Ex: John" autocomplete="off" required>
        </span>
                      </div>

                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Your e-mail</i>
          <input type="email" autocomplete="off" name="registeremail" class="form-control" id="signUpEmailInput" placeholder="Ex: mail@mail.com">
          <span id="email_result"></span>
        </span>
                      </div>

                      <div class="form-group">
        </span>
                      </div>

                       <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Your Mobile</i>
          <input type="text" name="mobile" autocomplete="off" class="form-control" id="signUpmobileInput" placeholder="Ex: 01*********" required>
        </span>
                      </div>

                      <div class="form-group">
        <span class="input-icon">
          <i class="material-icons">Password</i>
          <input type="password" name="password"  class="form-control" id="signUpPasswordInput" placeholder="" required>
        </span>
                      </div>

                      <div class="form-group">
                      <span class="input-icon">
          <i class="material-icons">Confirm Password</i>
          <input type="password" name="confirmpassword" class="form-control" id="signUpConfirmPasswordInput" placeholder="" required>
          <span id='message'></span>
        </span>
                      </div>
                      <button type="submit" id="register" class="btn btn-primary btn-block">Request to Join Family</button>
                  </form>
                  <hr>
                  <div class="text-center">
                      <p class="font-weight-bold">Or sign Up via</p>
                      <button class="btn btn-icon btn-faded-primary rounded-circle" data-toggle="tooltip" title="Facebook" data-container="#signinContent">
                          <a href="#" target="_blank" id="signUpfacebook"><i class="fab fa-facebook"></i></a>
                      </button>
                      <button class="btn btn-icon btn-faded-info rounded-circle" data-toggle="tooltip" title="Twitter" data-container="#signinContent">
                          <a href="#" target="_blank" id="signUplinkedId"><i class="fab fa-twitter"></i></a>
                      </button>
                      <button class="btn btn-icon btn-faded-danger rounded-circle" data-toggle="tooltip" title="Google" data-container="#signinContent">
                          <a href="#" id="signUpgmail"><i class="fas fa-envelope"></i></a>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>

<script type="text/javascript">

  var base_url = "<?php echo base_url(); ?>";

  $('#signUpPasswordInput, #signUpConfirmPasswordInput').on('keyup', function () {
    if ($('#signUpPasswordInput').val() == $('#signUpConfirmPasswordInput').val()) {
      $('#message').html('Matched').css('color', 'green');
      document.getElementById("register").disabled = false;
    } else {
      $('#message').html('Not Matched').css('color', 'red');
      document.getElementById("register").disabled = true;
    }
  });
 
  $('#signUpEmailInput').on('keyup',function(){  
       var email = $('#signUpEmailInput').val();  
       if(email != '')  
       {  
          $.ajax({  
           url:"<?php echo base_url(); ?>auth/check_email_avalibility",  
           method:"POST",  
           data:{email:email},  
           success:function(data){  
              $('#email_result').html(data);
              var check = $("#email_result").text();                        
              if(check == "Invalid Email"){
                $('#register').prop('disabled', true);
               }else if(check == "Email Already registered"){
                $('#register').prop('disabled', true);
               }else{
                $('#register').prop('disabled', false);
              }                         
            }  
        });  
      }  
  });  

</script>

<div class="container-fluid">

  <?php if($this->session->flashdata('login_successfull')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('login_successfull');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('wrong')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('wrong');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif; ?>

  <?php if($this->session->flashdata('slider_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('slider_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('slider_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('slider_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('image_not_uploading')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('image_not_uploading');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('slider_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('slider_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('slider_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('slider_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('dept_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('dept_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('dept_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('dept_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('dept_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('dept_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('dept_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('dept_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('set_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('set_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('set_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('set_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('set_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('set_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('set_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('set_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('Question_image_not_uploading')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('Question_image_not_uploading');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('answer_image_not_uploading')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('answer_image_not_uploading');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('question_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('question_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('question_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('question_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('op_updated_no')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('op_updated_no');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('q_updated_no')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('q_updated_no');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('op_added_no')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('op_added_no');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('student_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_updated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_not_updated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('student_not_updated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('student_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('student_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('student_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('notice_added')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('notice_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('notice_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('notice_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('notice_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('notice_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('notice_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('notice_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('validation_loss')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('validation_loss');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('requested')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('requested');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('requested_not_added')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('requested_not_added');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('request_approved')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('request_approved');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('request_not_approved')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('request_not_approved');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('request_deleted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('request_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('request_not_deleted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('request_not_deleted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('user_deactivated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_deactivated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('user_not_deactivated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_not_deactivated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('user_actived')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_actived');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('user_not_actived')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_not_actived');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('not_active')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_active');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('password_reseted')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('password_reseted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('password_not_reseted')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('password_not_reseted');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('profile_updated')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_updated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('profile_not_updated')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('profile_not_updated');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('email_sent')): ?>
  <?php echo '<p class="alert alert-success">'.$this->session->flashdata('email_sent');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('email_not_sent')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('email_not_sent');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('error')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('error');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>

  <?php if($this->session->flashdata('success')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('success');'</p>'?>
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php endif;?>












</div>


