<div class="card">
                                    

                                    <div class="card-body">
    
                
                                            <h4 class="card-title mb-4">Edit Profile Details</h4>
                                            <?php echo $add_profile_details_msg; ?>
                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Fullname</label>
                                                            <input type="text" class="form-control" required name="edit_admin_fullname" value="<?php echo $get_admin_fullname;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Email</label>
                                                            <input type="email" class="form-control" required name="edit_admin_email" value="<?php echo $get_admin_email;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Mobile</label>
                                                            <input type="number" class="form-control" required name="edit_admin_mobile" value="<?php echo $get_admin_mobile;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Location</label>
                                                            <input type="text" placeholder="e.g Lagos, Nigeria" class="form-control" name="edit_admin_location" value="<?php echo $get_admin_location;?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Personal Info:</label>
                                                            <textarea class="form-control" name="edit_admin_info"><?php echo $get_admin_info;?></textarea>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Admin Image <img src="assets/images/admins/<?php echo $get_admin_image; ?>" width="60px" alt=""></label>
                                                            <input type="file" class="form-control" name="edit_admin_image">
                                                            <input type="hidden" name="current_image" value="<?php echo $get_admin_image; ?>">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="profile_editbtn">Edit Details</button>
                                                </div>
                                            </form>
                                        </div>
                                        
    
                         </div>