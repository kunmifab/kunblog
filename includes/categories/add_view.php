<div class="card" id="addbox">
                                    

                                <div class="card-body">

            
                                        <h4 class="card-title mb-4">Add New Category</h4>
                                        <?php echo $addmsg; ?>
                                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-email-input" class="form-label">Category Name</label>
                                                        <input type="text" required class="form-control" name="cat_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="formrow-password-input" class="form-label">Category Description</label>
                                                        <textarea class="form-control" required name="cat_desc"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md" name="cat_addbtn">Add Category</button>
                                            </div>
                                        </form>
                                    </div>

</div>