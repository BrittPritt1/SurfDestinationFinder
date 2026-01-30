<?php
$jsonData = file_get_contents('destination.json');
$destinations = json_decode($jsonData, true);

// 1. Welke ID is aangeklikt?
$id = $_GET['id'] ?? null;

// 2. Zoek de juiste reis in de lijst
$selectedTrip = null;
foreach ($destinations as $trip) {
    if ($trip['id'] == $id) {
        $selectedTrip = $trip;
        break;
    }
}

// 3. Als de reis niet bestaat (valse ID), stuur terug naar home
if (!$selectedTrip) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?php echo "Surf in " . $selectedTrip['city']; ?></title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <div class="container-detail">
        <header class="detail-hero" style="background-image: url('<?php echo $selectedTrip['image']; ?>');">
            <a href="index.php#reizen" class="back-link">← Terug naar overzicht</a>
            <div class="hero-content">
                <h1><?php echo $selectedTrip['city'] . ", " . $selectedTrip['destination']; ?></h1>
            </div>
        </header>

        <section class="trip-details">
            <div class="main-info">
                <h2>Over deze surfbestemming</h2>
                <p class="description-text">
                    <?php echo $selectedTrip['description']; ?>
                </p>
            </div>
            
            <div class="sidebar-info">
                <div class="info-card">
                    <h3>Specificaties</h3>
                    <ul>
                        <li><strong>Prijs:</strong> €<?php echo $selectedTrip['price']; ?></li>
                        <li><strong>Niveau:</strong> <?php echo $selectedTrip['difficulty']; ?></li>
                        <li><strong>Rating:</strong> <?php echo $selectedTrip['rating']; ?> / 5</li>
                    </ul>
                    <button class="btn-primary">Boek nu deze trip</button>
                </div>
            </div>
        </section>
    </div>
</body>
</html>