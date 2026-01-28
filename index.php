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

    <?php include('filter-logic.php'); ?>

    <main class="content-wrapper">
        <aside class="filters">
            <form action="index.php#reizen" method="GET">
                  <h3>Verfijn je zoekopdracht</h3>

                    <div class="filter-group">
                        <h4>Bestemming</h4>
                        <select name="destination">
                            <option value="">Alle landen</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Bali">Bali</option>
                            <option value="Frankrijk">Frankrijk</option>
                            <option value="Marokko">Marokko</option>
                            <option value="Spanje">Spanje</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4>Niveau</h4>
                        <select name="difficulty">
                            <option value="">Alle niveaus</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4>Vibe</h4>
                        <select name="vibe">
                            <option value="">Alle vibes</option>
                            <option value="Yoga & chill">Yoga & chill</option>
                            <option value="Party & surf">Party & surf</option>
                            <option value="Family friendly">Family friendly</option>
                            <option value="Coaching focus">Coaching focus</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4>Wave Type</h4>
                        
                        <label>
                            <input type="radio" name="wave_type" value="" <?php echo (!isset($_GET['wave_type']) || $_GET['wave_type'] == '') ? 'checked' : ''; ?>> Alle types
                        </label>

                        <label>
                            <input type="radio" name="wave_type" value="Beach break" <?php echo ($_GET['wave_type'] ?? '') == 'Beach break' ? 'checked' : ''; ?>> Beach break
                        </label>

                        <label>
                            <input type="radio" name="wave_type" value="Reef break" <?php echo ($_GET['wave_type'] ?? '') == 'Reef break' ? 'checked' : ''; ?>> Reef break
                        </label>

                        <label>
                            <input type="radio" name="wave_type" value="Point break" <?php echo ($_GET['wave_type'] ?? '') == 'Point break' ? 'checked' : ''; ?>> Point break
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Minimale Rating</h4>
                        
                        <div class="rating-slider-container">
                            <input type="range" 
                                name="rating" 
                                id="ratingRange" 
                                min="1" 
                                max="5" 
                                step="0.5" 
                                class="rating-slider"
                                value="<?php echo $_GET['rating'] ?? 3.0; ?>">
                                
                            <div class="rating-labels">
                                <span>1 ⭐</span>
                                <span id="ratingVal">5 ⭐</span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h4>Prijs per nacht</h4>
                        
                        <input type="range" 
                            name="price" 
                            id="priceRange" 
                            min="0" 
                            max="2000" 
                            step="50" 
                            class="price-slider" 
                            value="<?php echo $_GET['price'] ?? 2000; ?>">
                        
                        <div class="price-labels">
                            <span>€0</span>
                            <span id="priceVal">€2000</span>
                        </div>
                    </div>

                    <button type="submit" class="btn-filter-apply">Toon reizen</button> 
            </form>
          
        </aside>

        <pre>
            Gekozen land: <?php echo $fLand; ?> <br>
            Aantal resultaten gevonden: <?php echo count($filteredResults); ?>
        </pre>

        <section id="reizen" class="reizen-container">
            <?php foreach ($filteredResults as $destination): ?>
                <div class="reis-card">
                    <div class="image-wrapper">
                        <img src="<?php echo $destination['image']; ?>" alt="">
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
        </section>
    </main>
    
    <script>
        // Prijs Slider Logica
        const priceSlider = document.getElementById('priceRange');
        const priceOutput = document.getElementById('priceVal');

        priceSlider.oninput = function() {
            priceOutput.innerHTML = '€' + this.value;
        }

        // Rating Slider Logica
        const ratingSlider = document.getElementById('ratingRange');
        const ratingOutput = document.getElementById('ratingVal');

        ratingSlider.oninput = function() {
            ratingOutput.innerHTML = this.value + '+ ⭐';
        }
    </script>
</body>
</html>
