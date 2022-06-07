<div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Edit Category</h4>

                                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Category Name</label>
                                                        <input type="text" class="form-control" value="<?php echo $insert_cat_name; ?>" name="editcat_name">
                                                        <input type="hidden" name="catid_input" value="<?php echo $cat_editid; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Category Description</label>
                                                        <textarea class="form-control" name="editcat_desc"><?php echo $insert_cat_description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" name="cat_editbtn">Edit Category</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>