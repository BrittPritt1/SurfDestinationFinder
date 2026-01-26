<?php

//data uit json ophalen (simulatie API call)
$json_data = file_get_contents('destination.json');

//decodeer json naar array
$destinations = json_decode($json_data, true);

if($destinations === null) {
    $destinations = [];
}

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Travelbase Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Onze Reizen</h1>

    <div class="reizen-container">
        <?php foreach ($destinations as $destination): ?>

            <?php 
                $difficulty = $destination['difficulty'];
                $color = 'gray';
                $textcolor = 'black';

                if($difficulty == 'Beginner') {
                    $color = '#00CCF5';
                    $textcolor = '#000000';
                } elseif($difficulty == 'Intermediate') {
                    $color = '#0091AD';
                    $textcolor = '#FFFFFF';
                } elseif($difficulty == 'Expert') {
                    $color = '#00667A';
                    $textcolor = '#FFFFFF';
                }
            ?>


            <div class="reis-card">
                <span class="difficulty-badge" style="background-color: <?php echo $color; ?>; color: <?php echo $textcolor; ?>;"> <?php echo $difficulty; ?> </span>
                <h3><?php echo $destination['title']; ?></h3>
                <p><?php echo $destination['country']; ?></p>
                <img src="<?php echo $destination['image'] ?>" alt="<?php echo $destination['title'] ?>">
                </div>

        <?php endforeach; ?>
    </div>

</body>
</html>
