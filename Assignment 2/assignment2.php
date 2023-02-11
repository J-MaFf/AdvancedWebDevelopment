<!-- Assignment 2 -->
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: #3f51b5;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Nothing needed, table is produced in PHP code -->
</body>

</html>

<?php
// Use an appropriate regular expression to capture all the scheduled course sections. 
$courseSectionRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})/";

// Modify the regular expression in Part 1 to capture all the scheduled course sections with titles.
$courseTitleSectionRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})/";

// Modify the regular expression in Part 2 to capture all the scheduled course sections with titles, components, and credits.
$courseTitleSectionComponentCreditsRegEx = "/(\w*[A-Z]+\s?\t?\d{2,3}[A-Z]?)\s(\d{2})(?>\s\d+\s)([A-Z\s]+[A-Z]{3,})\s([A-z\s]+)\s+(\d\s-\s\d)/";

// Modify the regular expression in Part 3 to capture all the scheduled course sections with titles, components, credits, and instructors. 
$courseTitleSectionComponentCreditsInstructorRegEx = "/([A-Z]+\s\d{2,3}[A-Z]?)\s(\d{2}\w?)(?>\s\d+\s)([A-Z\s&:\/-]+)\s([A-z\s]+)\s(\d\s?-?\s?\d*)(?>\s[\w:\s\/\d-]+Instructor:\s)([\w,\s\-']+)(?!.+\n)/";

$docString = "summer2023schedule.txt";
if (file_exists($docString)) { // Check to make sure the file exists
    $fileString = file_get_contents($docString); // empty contents of file to singular string
} else { // if file does not exist
    echo "File does not exist.";
}



// Fill table
// matches[group][class]
if (preg_match_all($courseTitleSectionComponentCreditsInstructorRegEx, $fileString, $matches)) {
    openTable();
    for ($i = 0; $i < count($matches[0]); $i++) {
        echo "<tr>"; // open row
        $num = $i + 1; // in order to count classes
        echo "<td>$num</td>";
        echo "<td>{$matches[1][$i]}</td>"; // table data row (Course)
        echo "<td>{$matches[2][$i]}</td>"; // table data row (Title)
        echo "<td>{$matches[3][$i]}</td>"; // table data row (Section)
        echo "<td>{$matches[4][$i]}</td>"; // table data row (Component)
        echo "<td>{$matches[5][$i]}</td>"; // table data row (Credits)
        echo "<td>{$matches[6][$i]}</td>"; // table data row (Instructor)
        echo "</tr>";
    }
    // close table
    echo "</table>";
}

function openTable()
{
    // Open Table
    echo "<table>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Course</th>";
    echo "<th>Section</th>";
    echo "<th>Title</th>";
    echo "<th>Credits</th>";
    echo "<th>Description</th>";
    echo "<th>Prerequisites</th>";
    echo "</tr>";
} // end openTable
?>