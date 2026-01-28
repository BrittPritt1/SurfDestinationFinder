<?php 
    $jsonData = file_get_contents('destination.json');
    $destinations = json_decode($jsonData, true);

    $fLand = $_GET['destination'] ?? '';
    $fVibe = $_GET['vibe'] ??'';
    $fWave = $_GET['wave_type'] ??'';
    $fDifficulty = $_GET['difficulty'] ??'';

    $fMaxPrice = isset($_GET['price']) ? (int)$_GET['price'] : 2000;
    $fMinRating = isset($_GET['rating']) ? (float)$_GET['rating'] : 0;

    $filteredResults = array_filter($destinations, function($trip) use ($fLand, $fVibe, $fWave, $fMaxPrice, $fDifficulty, $fMinRating) {
        
        if ($fLand !== '') {
            $jsonDestination = strtolower(trim($trip['destination'] ?? ''));
            $selectedLand = strtolower(trim($fLand));

            if ($jsonDestination !== $selectedLand) {
                return false; // Geen match? Weg ermee.
            }
        }
        
       /*  if ($fVibe !== '' && $trip['vibe'] !== $fVibe) return false;

        if ($fWave !== '' && $trip['wave_type'] !== $fWave) return false;

        if (isset($trip['price']) && (int)$trip['price'] > $fMaxPrice) { return false; }

        if ($fDifficulty !== '' && $trip['difficulty'] !== $fDifficulty) return false;

        if (isset($trip['rating']) && (float)$trip['rating'] < $fMinRating) { return false; }
 */
        return true;
    });
