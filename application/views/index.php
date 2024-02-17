<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/assets/style.css">
<link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100..900&display=swap" rel="stylesheet">
<title>User Search</title>
</head>
<body>
<div id="container">
    <section id="search_side">
        <p>Search Players</p>
        <form action="<?= base_url('players/search') ?>" method="post">
            <input type="search" name="search" placeholder="Name">
            <p>Gender</p>
            <label for="female"><input type="checkbox" name="gender[]" value="female"> Female</label>
            <label for="male"><input type="checkbox" name="gender[]" value="male"> Male</label>
            <p>Sports</p>
            <label for="basketball"><input type="checkbox" name="sports[]" value="basketball"> Basketball</label>
            <label for="volleyball"><input type="checkbox" name="sports[]" value="volleyball"> Volleyball</label>
            <label for="baseball"><input type="checkbox" name="sports[]" value="baseball"> Baseball</label>
            <label for="soccer"><input type="checkbox" name="sports[]" value="soccer"> Soccer</label>
            <label for="football"><input type="checkbox" name="sports[]" value="football"> Football</label>
            <input type="submit" value="Search">
        </form>
    </section>
    <section id="players_side">
<?php 	foreach ($players as $player)
		{	?>
		<div class="player_card">
			<img src="/assets/img" alt="Player Image">
			<p class="player_info">Name: <span><?= $player['name'] ?></span></p>
			<p class="player_info">Gender: <span><?= $player['gender'] ?></span></p>
			<p class="player_info">Sports: <span><?= $player['sport_name'] ?></span></p>
		</div>
<?php 	} 	?>
    </section>
</div>
</body>
</html>
