<main class="admin">
    <?php require  '../template/admin_left_nav.html.php';?>


    <section class="right">

        <h2>Admin List</h2>

        <a class="new" href="/edit_admin">Add Admin</a>
        <table>
            <thead>
            <tr>
                <th style="width: 10%">First Name</th>
                <th style="width: 10%">Last Name</th>
                <th style="width: 10%">User Name</th>
                <th style="width: 10%">&nbsp;</th>
                <th style="width: 10%">&nbsp;</th>
                <th style="width: 3%"></th>


            </tr>


            <?php foreach($admins as $admin_show){

                ?>

                <tr>
                    <td><?=$admin_show['firstname']?></td>
                    <td><?= $admin_show['lastname'] ?></td>
                    <td><?= $admin_show['user_name'] ?></td>

                    <td><a style="float: right" href="/edit_admin?id=<?=$admin_show['id']?>">Edit</a></td>
                    <td><form method="POST" action="/delete_admin">
                            <input type="hidden" name="id" value="<?=$admin_show['id']?>" />
                            <input type="submit" name="submit" value="Delete" />
                        </form></td>

                </tr>
            <?php }?>
            </thead>
        </table>
    </section>
</main>
