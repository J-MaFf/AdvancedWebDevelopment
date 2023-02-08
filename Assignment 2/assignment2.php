<?php
    // Use an appropriate regular expression to capture all the scheduled course sections. 
    $courseAndSectionRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})/";

    // Modify the regular expression in Part 1 to capture all the scheduled course sections with titles.
    $courseAndSectionAndTitleRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})/";

    // Modify the regular expression in Part 2 to capture all the scheduled course sections with titles, components, and credits.
    
?>