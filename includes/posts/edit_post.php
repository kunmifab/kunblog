                        
                        <div class="card">
                             <div class="card-body">
                                            <h4 class="card-title mb-4">Edit Post</h4>
                                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Post Title</label>
                                                            <input type="text" class="form-control" required name="edit_post_title" value="<?php echo $post_edit_title; ?>">
                                                            <input type="hidden" name="post_id" value="<?php echo $edit_post_id;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-password-input" class="form-label">Post Content</label>
                                                            <textarea class="form-control" required name="edit_post_content"><?php echo $post_edit_content; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Post Category:</label>
                                                            <select name="edit_post_cat" id="" class="form-control">
                                                            <option value="<?php echo $post_edit_cat_id; ?>"><?php echo $cat_edit_name; ?></option>
                                                                <?php
                                                                $get_cat_info_sql = "SELECT * FROM categories";
                                                                $get_cat_info = mysqli_query($connect,$get_cat_info_sql);
                                                                while($all_cat = mysqli_fetch_assoc($get_cat_info)){
                                                                    $cat_name = $all_cat['name'];
                                                                    $cat_id = $all_cat['id'];
                                                                 
                                                                
                                                                ?>
                                                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" class="form-label">Post Image: <img src="assets/images/blog/<?php echo $post_edit_image; ?>" width="50px" alt=""></label>
                                                            <input type="file" class="form-control" name="edit_post_image">
                                                            <input type="hidden" name="current_image" value="<?php echo $post_edit_image; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="formrow-email-input" >Post Status:</label>
                                                            <select name="edit_post_status" id="" class="form-control">
                                                            
                                                                <option value="<?php echo $post_edit_status_id; ?>"><?php echo $post_edit_status_msg; ?></option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Draft</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md" name="post_editbtn">Edit Post</button>
                                                </div>
                                            </form>
                                        </div>
    
                         </div>