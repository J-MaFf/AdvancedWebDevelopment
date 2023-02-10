<?php
    // Use an appropriate regular expression to capture all the scheduled course sections. 
    $courseSectionRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})/";

    // Modify the regular expression in Part 1 to capture all the scheduled course sections with titles.
    $courseTitleSectionRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})/";

    // Modify the regular expression in Part 2 to capture all the scheduled course sections with titles, components, and credits.
    $courseTitleSectionComponentCreditsRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})\s([A-z\s]+)\s+(\d\s-\s\d)/";

    // Modify the regular expression in Part 3 to capture all the scheduled course sections with titles, components, credits, and instructors. 
    $courseTitleSectionComponentCreditsInstructorRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})\s([A-z\s]+)\s+(\d\s-\s\d)(?>\s+.+:\s)([A-z,]+\s[A-z]+)/";

    
?>