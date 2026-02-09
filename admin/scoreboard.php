<?php
include 'admin_auth.php';
include '../partials/_test.php';

$res=mysqli_query($conn,"
SELECT user.username,game_name,score 
FROM scoreboard 
JOIN user ON scoreboard.user_id=user.id
");
?>
<h2>Scoreboard</h2>
<table border="1" cellpadding="10">
<tr><th>User</th><th>Game</th><th>Score</th></tr>
<?php while($s=mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?= $s['username'] ?></td>
<td><?= $s['game_name'] ?></td>
<td><?= $s['score'] ?></td>
</tr>
<?php } ?>
</table>
