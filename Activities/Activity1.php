<!-- Activity 1-->
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
// Use an appropriate regular expression to capture all the COMPSCI courses. 
$courseRegEx = "/(COMPSCI\s\d{2,3}\w?)/";

// Use an appropriate regular expression to capture all the COMPSCI courses and their titles. 
$courseTitleRegEx = "/(COMPSCI\s\d{2,3}\w?)\s+((?:[A-Z\+#-]+\s)*[A-Z\+#-]+)\s+(?>Repeatable\s+)?/";

// Use an appropriate regular expression to capture the course, title, and credits of all the COMPSCI courses.
$courseTitleCreditsRegEx = "/(?'course'COMPSCI\s\d{2,3}\w?)\s+(?'title'(?:[A-Z\+#-]+\s)*[A-Z\+#-]+)\s+(?>Repeatable\s+)?(?'credits'[\w-]+)/m";

// Use an appropriate regular expression to capture the course, title, credits, and description of all the COMPSCI courses.
$courseTitleCreditsDiscriptionRegEx = "/(?'course'COMPSCI\s\d{2,3}\w?)\s+(?'title'(?:[A-Z\+#-]+\s)*[A-Z\+#-]+)\s+(?>Repeatable\s+)?(?'credits'[\w-]+)\s(?>\w+\s+)(?'description'[\s\S]+?(?=\n{2}))/m";

// Use an appropriate regular expression to capture the course, title, credits,  description, and prerequisite of all the COMPSCI courses.
$regEx = "/(?'course'COMPSCI\s\d{2,3}\w?)\s+(?'title'(?:[A-Z\+#-]+\s)*[A-Z\+#-]+)\s+(?>Repeatable\s+)?(?'credits'[\w-]+)\s(?>\w+\s+)(?'description'[\s\S]+?(?=PREREQ:))PREREQ:\s(?'prerequisite'[\s\S]+?(?=\n{2})|[\w\s.]+)/";

if (file_exists("cscourselist.txt")) { // Check to make sure the file exists
    $fileString = file_get_contents("cscourselist.txt"); // empty contents of file to singular string
} else { // if file does not exist
    echo "File does not exist.";
}

// Open Table
echo "<table>";
echo "<tr>";
echo "<th>Course</th>";
echo "<th>Title</th>";
echo "<th>Credits</th>";
echo "<th>Description</th>";
echo "<th>Prerequisites</th>";
echo "</tr>";

// Fill table
if (preg_match_all($regEx, $fileString, $matches)) {
    for ($i = 0; $i < count($matches[0]); $i++) { // FOR EACH MATCH
        echo "<tr>"; // open row
        echo "<td>{$matches[1][$i]}</td>"; // table data row (Course)
        echo "<td>{$matches[2][$i]}</td>"; // table data row (Title)
        echo "<td>{$matches[3][$i]}</td>"; // table data row (Credits)
        echo "<td>{$matches[4][$i]}</td>"; // table data row (Description)
        echo "<td>{$matches[5][$i]}</td>"; // table data row (Prerequisites)
        echo "</tr>";
    }
}

// close table
echo "</table>";
?>