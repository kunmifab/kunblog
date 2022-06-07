

 <div class="vertical-menu">

 <div data-simplebar class="h-100">

     <!--- Sidemenu -->
     <div id="sidebar-menu">
         <!-- Left Menu Start -->
         <ul class="metismenu list-unstyled" id="side-menu">
             <li class="menu-title" key="t-menu">Menu</li>

             <li>
                 <a href="index.php" class="waves-effect">
                     <i class="bx bx-home-circle"></i>
                     <span key="t-dashboards">Home</span>
                 </a>
                 
             </li>

            
             <li class="menu-title" key="t-apps">Blog</li>

             

             <li>
                 <a href="categories.php" class="waves-effect">
                     <i class="bx bx-store"></i>
                     <span key="t-ecommerce">Categories</span>
                 </a>
             </li>

             <li>
                 <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="bx bx-bitcoin"></i>
                     <span key="t-crypto">Blog Posts</span>
                 </a>
                 <ul class="sub-menu" aria-expanded="false">
                     <li><a href="add-post.php" key="t-wallet">Add New Post</a></li>
                     <li><a href="posts.php" key="t-buy">All Posts</a></li>
                 </ul>
             </li>

             <li>
                 <a href="javascript: void(0);" class="has-arrow waves-effect">
                     <i class="bx bx-envelope"></i>
                     <span key="t-email">Comments</span>
                 </a>
                 <ul class="sub-menu" aria-expanded="false">
                     <li><a href="add-comment.php" key="t-inbox">Add New Comments</a></li>
                     <li><a href="comments.php" key="t-inbox">View All Comments</a></li>
                 </ul>
             </li>

            
             <?php if($user_role == "superadmin"){?>
             <li class="menu-title" key="t-pages">Admins</li>


             <li>
                 <a href="view-admins.php" >
                     <i class="bx bx-user-circle"></i>
                     <span key="t-utility">View All Admins</span>
                 </a>
             </li>

             <li>
                 <a href="add-admin.php">
                     <i class="bx bx-user-circle"></i>
                     <span key="t-utility">Add New Admin</span>
                 </a>
             </li>

             <?php }?>

             <li class="menu-title" key="t-components">Account</li>

             <li>
                 <a href="notifications.php">
                     <i class="bx bx-tone"></i>
                     <span key="t-ui-elements">My Notifications</span>
                 </a> 
             </li>

             <li>
                 <a href="profile.php">
                     <i class="bx bx-tone"></i>
                     <span key="t-ui-elements">My Profile</span>
                 </a> 
             </li>

             <li>
                 <a href="javascript: void(0);">
                     <i class="bx bx-tone"></i>
                     <span key="t-ui-elements">My Profile Settings</span>
                 </a> 
             </li>

             <li>
                 <a href="logout.php">
                     <i class="bx bx-tone"></i>
                     <span key="t-ui-elements">Logout</span>
                 </a> 
             </li>

             

         </ul>
     </div>
     <!-- Sidebar -->
 </div>
</div>