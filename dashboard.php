<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Read data from data.json
$data = json_decode(file_get_contents(__DIR__ . '/data.json'), true);


// TODO: Use $data to display graphs or other relevant information on the dashboard
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFA PlantDashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .dashboard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            color: #61a5c2;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logout-link {
            margin-top: 20px;
            color: #61a5c2;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="logo">
            <img src="logo.png" alt="AFA PlantDashboard Logo" width="100">
        </div>
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        
        <!-- Display production rate -->
        <p>Production Rate: <?php echo isset($data['production_rate']) ? $data['production_rate'] : 'N/A'; ?> bottles per hour</p>

        <!-- Display a bar chart using Chart.js -->
        <canvas id="productionChart" width="400" height="200"></canvas>

        <a class="logout-link" href="logout.php">Logout</a>
    </div>

    <script>
        // Sample data from data.json
        var data = <?php echo json_encode($data); ?>;

        // Get the canvas element
        var ctx = document.getElementById('productionChart').getContext('2d');

        // Create a bar chart
        var productionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(data.resource_utilization),
                datasets: [{
                    label: 'Resource Utilization',
                    data: Object.values(data.resource_utilization),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
