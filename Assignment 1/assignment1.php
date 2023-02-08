<!-- Assignment 1: Regular expressions -->
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
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
// First, we must open the file
$file = fopen("mathcourses.txt", "r");
if (!$file) { // if the file wont open
    echo "File failed to open. Exiting program...";
    exit();
}

// Now lets define our pattern. 
// We need to extract the course, title, and units 

$regEx = "/(Math\s\d{2,3}\w?)\s+((?:[a-z&-]+:?\s\&?)+)\s+(?>[a-z]+)*\s+(\d-?\d?)/i";

// Start table.
echo "<table>";
echo "<tr>";
echo "<th>Course</th>";
echo "<th>Title</th>";
echo "<th>Credits</th>";
echo "</tr>";
while ($currentLine = fgets($file)) { // Read file till all lines are read
    if (preg_match($regEx, $currentLine, $matches)) { // Paramaters: Reg Expression, String to check, array to output results
        echo "<tr>";
        echo "<td>$matches[1]</td>";
        echo "<td>$matches[2]</td>";
        echo "<td>$matches[3]</td>";
        echo "</tr>";
    }
} // end while

// finish table
echo "<tr>";
echo "<table>";

// Close file
fclose($file);
?>