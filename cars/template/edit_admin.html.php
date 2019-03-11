<main class="admin">

    <?php	require  '../template/admin_left_nav.html.php';?>
    <section class="right">
        <h2>
            <?php if(isset($_GET['id'])){
                echo "EDIT ADMIN"."</h2>";
            }
                else{
                    echo "ADD ADMIN"."</h2>";
                }
            ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="admin_info[id]" value="<?=$admin_var['id'] ?? ''?>" />
            <label>First name</label>
            <input type="text" name="admin_info[firstname]" value="<?=$admin_var['firstname'] ?? ''?>" />
            <label>Last Name</label>
            <input type="text" name="admin_info[lastname]" value="<?=$admin_var['lastname'] ?? ''?>" />
            <label>Username</label>
            <input type="text" name="admin_info[user_name]" value="<?=$admin_var['user_name'] ?? ''?>" />
            <label>Password</label>
            <input type="text" name="admin_info[user_password]" value="<?=$admin_var['user_password'] ?? ''?>" />
            <?php if(isset($_GET['id'])){
                echo ' <input type="submit" name="submit_admin" value="Save Admin" />';
            }
            else{
                echo '<input type="submit" name="submit_admin" value="Add Admin" />';
            }
            ?>




        </form>

    </section>
</main>
