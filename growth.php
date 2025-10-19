<?php
// PHP Section: Define dynamic data and navigation links
$page_title = "Growth Tracking"; 
$back_link = "6child.php"; 

// Initial Child Data 
$child_name = "Aarav"; 
$child_age = "6 Months"; 
$child_gender = "Boy"; 

// Current Growth Metrics (Example data)
// Is data ko chart mein use kiya jaayega.
$growth_data = [
    ["date" => "2024-07-01", "weight" => 7.0, "height" => 65],
    ["date" => "2024-08-01", "weight" => 7.5, "height" => 66.5],
    ["date" => "2024-09-01", "weight" => 8.0, "height" => 68],
    ["date" => "2024-10-01", "weight" => 8.2, "height" => 69],
];

// PHP mein growth data ko JSON format mein convert karein, jisse JavaScript use kar sake.
$js_growth_data = json_encode($growth_data);

// Link to add new data 
$add_data_link = "#openGrowthModal"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
    <style>
        /* Base Theme Styles (Consistent with previous files) */
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f7f3ed; /* Light, warm background */
            color: #4b4b4b;
        }
        
        /* Header Bar */
        .app-header {
            position: sticky;
            top: 0;
            width: 100%;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            z-index: 1000;
        }

        .back-arrow {
            font-size: 28px; 
            text-decoration: none;
            color: #4b4b4b;
        }
        
        .header-title {
            font-size: 20px;
            font-weight: 600;
            flex-grow: 1;
            text-align: center;
            margin-left: -28px; 
        }

        /* Main Content Area */
        .content-area {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Child Info Card */
        .child-info-card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 5px solid #a8dadc; 
        }
        
        .info-detail h2 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: #2a9d8f;
        }
        
        .info-detail p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }

        /* Section Header and Button */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 0 5px;
        }
        
        .section-header h3 {
            font-size: 18px;
            font-weight: 600;
            color: #4b4b4b;
            margin: 0;
        }

        .add-data-btn {
            background-color: #e69999; 
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .add-data-btn:hover {
            background-color: #d17a7a;
        }

        /* Chart Visualization Area - Ab yeh canvas ko hold karega */
        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            height: 300px; 
            /* Flex properties ko hata diya hai taki canvas sahi se render ho */
        }
        
        /* Data History Table */
        .data-history-table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .data-history-table th, .data-history-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .data-history-table th {
            background-color: #a8dadc;
            color: white;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }

        .data-history-table tr:last-child td {
            border-bottom: none;
        }
        
        .data-history-table .action-cell {
            text-align: right;
        }
        
        .data-history-table .action-cell a {
            color: #e69999;
            text-decoration: none;
            font-size: 14px;
        }
        
    </style>
</head>
<body>

    <header class="app-header">
        <a href="<?php echo htmlspecialchars($back_link); ?>" class="back-arrow">&#x2329;</a> 
        <div class="header-title"><?php echo htmlspecialchars($page_title); ?></div>
        <div></div> 
    </header>

    <div class="content-area">
        
        <div class="child-info-card">
            <div class="info-detail">
                <h2><?php echo htmlspecialchars($child_name); ?></h2>
                <p>Age: <?php echo htmlspecialchars($child_age); ?> | Gender: <?php echo htmlspecialchars($child_gender); ?></p>
            </div>
            <div style="font-size: 30px;">👶</div>
        </div>

        <div class="section-header">
            <h3>Growth Chart (Weight/Height)</h3>
            <a href="<?php echo htmlspecialchars($add_data_link); ?>" class="add-data-btn">
                + Add Data
            </a>
        </div>
        
        <div class="chart-container">
            <canvas id="growthChart"></canvas>
        </div>
        
        <div class="section-header">
            <h3>Measurement History</h3>
        </div>
        
        <table class="data-history-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                    <th>Height (cm)</th>
                    <th class="action-cell">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($growth_data as $data): ?>
                    <tr>
                        <td><?php echo date("d M Y", strtotime(htmlspecialchars($data['date']))); ?></td>
                        <td><?php echo htmlspecialchars($data['weight']); ?></td>
                        <td><?php echo htmlspecialchars($data['height']); ?></td>
                        <td class="action-cell">
                            <a href="edit_growth.php?date=<?php echo htmlspecialchars($data['date']); ?>">Edit</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                <?php if (empty($growth_data)): ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: #999;">No growth data recorded yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // PHP se JSON data ko JavaScript object mein convert kiya
            const rawData = <?php echo $js_growth_data; ?>;
            
            // Labels (X-Axis) aur Data Points (Y-Axis) prepare karein
            const labels = rawData.map(item => {
                // Date ko "Jul 24" format mein dikhane ke liye
                const date = new Date(item.date);
                return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            });
            const weights = rawData.map(item => item.weight);
            const heights = rawData.map(item => item.height);

            // Chart.js Context
            const ctx = document.getElementById('growthChart').getContext('2d');

            // Chart Create karna
            new Chart(ctx, {
                type: 'line', // Line chart for growth tracking
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Weight (kg)',
                            data: weights,
                            borderColor: '#e69999', // Pinkish color for weight
                            backgroundColor: 'rgba(230, 153, 153, 0.5)',
                            tension: 0.4, // Smooth line
                            fill: false,
                            yAxisID: 'yWeight',
                        },
                        {
                            label: 'Height (cm)',
                            data: heights,
                            borderColor: '#2a9d8f', // Greenish color for height
                            backgroundColor: 'rgba(42, 157, 143, 0.5)',
                            tension: 0.4,
                            fill: false,
                            yAxisID: 'yHeight',
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Measurement Date'
                            }
                        },
                        yWeight: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            title: {
                                display: true,
                                text: 'Weight (kg)'
                            },
                            // Suggested min/max value set kar sakte hain
                            // min: 5, 
                        },
                        yHeight: {
                            type: 'linear',
                            display: true,
                            position: 'right', // Right side par height scale
                            title: {
                                display: true,
                                text: 'Height (cm)'
                            },
                            grid: {
                                drawOnChartArea: false, // Right scale ke liye gridlines off
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    }
                }
            });
            
            // Add Data Button Handler
            const addDataBtn = document.querySelector('.add-data-btn');
            addDataBtn.addEventListener('click', function(e) {
                e.preventDefault();
                alert("Opening modal to add new growth data...");
            });
        });
    </script>

</body>
</html>