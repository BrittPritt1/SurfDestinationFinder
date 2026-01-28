<?php 
    $jsonData = file_get_contents('destination.json');
    $destinations = json_decode($jsonData, true);

    $fLand = $_GET['destination'] ?? '';

    $filteredResults = array_filter($destinations, function($trip) use ($fLand) {
        
        if ($fLand !== '') {
            $jsonDestination = strtolower(trim($trip['destination'] ?? ''));
            $selectedLand = strtolower(trim($fLand));

            if ($jsonDestination !== $selectedLand) {
                return false;
            }
        }

        return true;
    });
