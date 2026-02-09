<?php
include 'admin_auth.php';
include '../partials/_test.php';

if(isset($_POST['add'])){
    mysqli_query($conn,"INSERT INTO games(game_name) VALUES('".$_POST['game']."')");
}
$games=mysqli_query($conn,"SELECT * FROM games");
?>
<h2>Games</h2>
<form method="POST">
<input name="game" placeholder="Game Name">
<button name="add">Add</button>
</form>
<ul>
<?php while($g=mysqli_fetch_assoc($games)){ ?>
<li><?= $g['game_name'] ?> (<?= $g['status'] ?>)</li>
<?php } ?>
</ul>
