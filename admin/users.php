<?php
include 'admin_auth.php';
include '../partials/_test.php';

if(isset($_GET['block'])){
    mysqli_query($conn,"UPDATE user SET status='blocked' WHERE id=".$_GET['block']);
}
$users=mysqli_query($conn,"SELECT * FROM user");
?>
<h2>Users</h2>
<table border="1" cellpadding="10">
<tr><th>ID</th><th>Username</th><th>Status</th><th>Action</th></tr>
<?php while($u=mysqli_fetch_assoc($users)){ ?>
<tr>
<td><?= $u['id'] ?></td>
<td><?= $u['username'] ?></td>
<td><?= $u['status'] ?></td>
<td><a href="?block=<?= $u['id'] ?>">Block</a></td>
</tr>
<?php } ?>
</table>
