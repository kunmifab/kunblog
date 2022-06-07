<style>
 .modal {
  display: none;
  align-items: center;
  justify-content: center;
  position: fixed;
  margin-top: 3rem;
  z-index: 10;
  width: 100%;
  height: 90%;
}
.modal[open] {
  display: flex;
}
.model-inner {
  background-color: white;
  border-radius: 0.5em;
  max-width: 500px;
  padding: 2em;
  margin: auto;
}
.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 2px solid black;
}
#modal-overlay {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 0;
  background-color: black;
  opacity: 0.5;  
}

</style>

<?php
if(isset($_GET['viewbtn'])){

    $view_id = mysqli_real_escape_string($connect,filter_var($_GET['viewbtn'],FILTER_SANITIZE_STRING));
    $check_admin_view_sql = "SELECT * FROM admins WHERE id = $view_id";
    $check_admin_view = mysqli_query($connect,$check_admin_view_sql);
    if(mysqli_num_rows($check_admin_view) == 1){
        while($all_admin_info = mysqli_fetch_assoc($check_admin_view)){
            $admin_profile_fullname = $all_admin_info['fullname'];
            $admin_profile_mobile = $all_admin_info['mobile'];
            $admin_profile_email = $all_admin_info['email'];
            $admin_profile_info = $all_admin_info['info'];
            $admin_profile_role = $all_admin_info['role'];
            $admin_profile_location = $all_admin_info['location'];
        }

        if($admin_profile_role == "superadmin"){
            $role = "<div class='badge bg-primary p-3'>Super-Admin</div>";
        }elseif($admin_profile_role == "editor"){
            $role = "<div class='badge bg-secondary p-3'>Editor</div>";
        }
    }

?>

<div id="myModal" class="modal" role="dialog" tabindex="-1">
  <div class="model-inner">
    <div class="modal-header">
      <h3>PROFILE</h3>
      <span class="close btn font-size-20">&times;</span>
      </button>
    </div>
    <div class="row">
                            <div class="col-xl-12">
                                <div class="card overflow-hidden">
                                    <div class="bg-primary bg-soft">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="text-primary p-3 text-center mt-3">
                                                <img src="assets/images/profile-img.png" alt="" width="80px"class=" rounded-circle">
                                                <h2 class="font-size-20 text-truncate"><?php echo $admin_profile_fullname;?></h2>
                                                <p class="text-muted mb-0 text-truncate"><?php echo $role;?></p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            

                                            <div class="col-sm-8">
                                                <div class="pt-4">
                                                   
                                                    <div class="row">
                                                        
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">0</h5>
                                                            <p class="text-muted mb-0">Posts</p>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>
                                        <p class="text-muted mb-4"><?php echo $admin_profile_info;?></p>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td><?php echo $admin_profile_fullname;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td><?php echo $admin_profile_mobile;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td><?php echo $admin_profile_email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td><?php echo $admin_profile_location;?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>

                               
                               
                            </div>         
                            
                           
                        </div>
  </div>
</div>

<?php }?>

<!-- <a title="View Profile" id="myBtn" href="<?php echo $_SERVER['PHP_SELF'] ."?viewbtn=$admin_id";?>" class="text-dark"><i class="bx bx-show font-size-18"></i></a> -->
<!-- <button id="myBtn">Open Modal</button> -->

<script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// $(document).ready(function(){
//     $("#myBtn").on('click', function(){
//         var id = $(this).attr("rel");
          
//     });
// });
</script>
