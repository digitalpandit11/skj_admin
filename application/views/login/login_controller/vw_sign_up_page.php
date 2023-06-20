<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>BMS Sign Up</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var allowsubmit = false;
        $(function(){
            //on keypress 
            $('#confpass').keyup(function(e){
                //get values 
                var pass = $('#password').val();
                var confpass = $(this).val();
                
                //check the strings
                if(pass == confpass){
                    //if both are same remove the error and allow to submit
                    $('.error').text('');
                    allowsubmit = true;
                }else{
                    //if not matching show error and not allow to submit
                    $('.error').text('Password not matching');
                    allowsubmit = false;
                }
            });
            
            //jquery form submit
            $('#form').submit(function(){
            
                var pass = $('#password').val();
                var confpass = $('#confpass').val();
 
                //just to make sure once again during submit
                //if both are true then only allow submit
                if(pass == confpass){
                    allowsubmit = true;
                }
                if(allowsubmit){
                    return true;
                }else{
                    return false;
                }
            });
        });
    </script>
<style>

.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

body {
    color: #fff;
    background-image: linear-gradient(to right, #3ab5b0 0%, #3d99be 31%, #56317a 100%);
    font-family: 'Roboto', sans-serif;
}
.form-control {
    height: 41px;
    background: #f2f2f2;
    box-shadow: none !important;
    border: none;
}
.form-control:focus {
    background: #e2e2e2;
}
.form-control, .btn {        
    border-radius: 3px;
}
.signup-form {
    width: 700px;
    margin: 30px auto;
}
.signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #fff;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.signup-form h2  {
    color: #333;
    font-weight: bold;
    margin-top: 0;
}
.signup-form hr  {
    margin: 0 -30px 20px;
}    
.signup-form .form-group {
    margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
    margin-top: 3px;
}
.signup-form .row div:first-child {
    padding-right: 10px;
}
.signup-form .row div:last-child {
    padding-left: 10px;
}
.signup-form .btn {        
    font-size: 16px;
    font-weight: bold;
    background: #3598dc;
    border: none;
    min-width: 140px;
}
.signup-form .btn:hover, .signup-form .btn:focus {
    background: #2389cd !important;
    outline: none;
}
.signup-form a {
    color: #fff;
    text-decoration: underline;
}
.signup-form a:hover {
    text-decoration: none;
}
.signup-form form a {
    color: #3598dc;
    text-decoration: none;
}   
.signup-form form a:hover {
    text-decoration: underline;
}
.signup-form .hint-text  {
    padding-bottom: 15px;
    text-align: center;
}
</style>
</head>
    <body>
        <div class="signup-form">
            <form id="form" action="<?php echo site_url('login/login_controller/save_sign_up');?>" method="post">
                <div class="img-circular"><center><img src="assets/login/maxresdefaultxcxc.jpg" style="width: 90px;height: 90px; border-radius: 50%;"></center></div><br>
                <center><h4 style="color: #2ebf91;">Sign Up</h4></center>
                <p><center>Please fill in this form to create an account!</center></p>
                
                <hr>
                <div class="form-group">
                    <div class="row">
                        <div class="col"><input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required"></div>
                        <div class="col"><input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name" required="required"></div>
                        <div class="col"><input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="required"></div>
                    </div>          
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Email Address" required="required">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number" required="required">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" required="required">
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confpass" id="confpass" placeholder="Confirm Password" required="required">
                </div>   
                <div class="form-group">
                    <span class="error" style="color:red"></span><br />
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label class="container">GST NOT APPLICABLE
                                <input type="radio" name="gst_applicable" checked="checked" value="2">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="col">
                            <label class="container">GST APPLICABLE
                                <input type="radio" name="gst_applicable" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>          
                </div>

                <center> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg" >Sign Up</button>
                    </div>
                </center>
            </form>
            <div class="hint-text">Already have an account? <a href="Welcome">Login here</a></div>
        </div>
        <script type="text/javascript">

            $('#email_id').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('master/user_master/check_user_profile');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success : function(data) {
                        },
                    error : function(data) {
                        alert("Customer Already Exist");
                        //location.reload();
                        $("#email_id").val('');
                    }
                });
                return false;
            });
        </script>
    </body>
</html>