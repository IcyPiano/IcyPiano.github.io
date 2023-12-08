<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
// Pregenerated list of users with names inspired by "The Legend of Korra"
$users = [
    ['name' => 'Korra Waters', 'ssn' => '123-45-6789', 'email' => 'korra.waters@afa.com'],
    ['name' => 'Mako Flame', 'ssn' => '987-65-4321', 'email' => 'mako.flame@afa.com'],
    ['name' => 'Asami Sato', 'ssn' => '234-56-7890', 'email' => 'asami.sato@afa.com'],
    ['name' => 'Bolin Earthbender', 'ssn' => '876-54-3210', 'email' => 'bolin.earthbender@afa.com'],
    ['name' => 'Tenzin Airbender', 'ssn' => '567-89-0123', 'email' => 'tenzin.airbender@afa.com'],
    ['name' => 'Lin Beifong', 'ssn' => '345-67-8901', 'email' => 'lin.beifong@afa.com'],
    ['name' => 'Jinora Spirit', 'ssn' => '012-34-5678', 'email' => 'jinora.spirit@afa.com'],
];

// Encode the user data as JSON for JavaScript use
$encodedUsers = json_encode($users);
?>

<script>
    // Decode the JSON data in JavaScript
    var users = <?php echo $encodedUsers; ?>;

    // Function to create a table from user data
    function createTable(users) {
        var table = "<table><tr><th>Name</th><th>Social Security Number</th><th>Email</th></tr>";

        for (var i = 0; i < users.length; i++) {
            table += "<tr><td>" + users[i].name + "</td><td>" + users[i].ssn + "</td><td>" + users[i].email + "</td></tr>";
        }

        table += "</table>";

        // Display the table in the HTML body
        document.body.innerHTML += table;
    }

    // Call the function to create the table
    createTable(users);
</script>

</body>
</html>
