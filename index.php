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
    <header class="hero">
        <div class="hero-content">
            <h1>Vind jouw perfecte surf-break</h1>
            <p>Ontdek de beste surf-accomodaties wereldwijd, van Portugal tot Bali</p>
            <a href="#reizen" id="hero-btn" class="btn-primary">Bekijk aanbod</a>
        </div>
    </header>

    <div class="reizen-container">
        <?php foreach ($destinations as $destination): ?>

            <?php 
              /*  $difficulty = $destination['difficulty'];
                $color = 'gray';
                $textcolor = 'black';

                if($difficulty == 'Beginner') {
                    $color = '#0091AD';
                    $textcolor = '#FFFFFF';
                } elseif($difficulty == 'Intermediate') {
                    $color = '#00778F';
                    $textcolor = '#FFFFFF';
                } elseif($difficulty == 'Expert') {
                    $color = '#005566';
                    $textcolor = '#FFFFFF';
                } */
            ?>


           <div id="reizen" class="reis-card">
                <div class="image-wrapper">
                    <img src="<?php echo $destination['image']; ?>" alt="">
             <!--        <span class="difficulty-badge" style="background-color: <?php echo $color; ?>; color: <?php echo $textcolor; ?>;">
                        <?php echo $difficulty; ?>
                    </span> -->
                    <span class="difficulty-badge"><?php echo $destination['vibe']; ?></span>
                </div>

                <div class="card-content">
                    <div class="card-header">
                        <h3><?php echo $destination['destination']; ?></h3>
                        <span class="rating">⭐ <?php echo $destination['rating']; ?></span>
                    </div>

                    <p class="accommodation-info"><?php echo $destination['accommodation']; ?> • <?php echo $destination['transport']; ?></p>
                    
                    <div class="wave-info">
                        <span>🌊 <?php echo $destination['wave_type']; ?></span>
                        <span>🗓 <?php echo $destination['period']; ?></span>
                    </div>

                    <div class="price-btn">
                        <div class="price-info">
                            <span class="price-label">Vanaf</span>
                            <span class="price-amount">€<?php echo $destination['price']; ?></span>
                        </div>

                        <a href="#" class="btn-primary">Bekijk reis</a>
                    </div>
                    
                </div>
            </div>

        <?php endforeach; ?>
    </div>

</body>
</html>
