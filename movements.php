<?php
// PHP Section: Define dynamic data and navigation links
$page_title = "Baby Movements Log"; 
$back_link = "6child.php"; // Always go to this page

// Example log data (you can replace this with database data later)
$movement_sessions = [
    [
        "session_date" => "2025-10-16",
        "start_time" => "19:00",
        "end_time" => "20:30",
        "kicks_count" => 12,
        "notes" => "After dinner, very active."
    ],
    [
        "session_date" => "2025-10-15",
        "start_time" => "10:00",
        "end_time" => "11:00",
        "kicks_count" => 10,
        "notes" => "Morning session, felt strong jabs."
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <style>
        /* Base Theme Styles */
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f7f3ed;
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

        /* Back Arrow Button */
        .back-arrow-btn {
            font-size: 28px; 
            text-decoration: none;
            color: #4b4b4b;
            cursor: pointer;
            padding: 0 5px;
            line-height: 1;
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
        
        /* Record Button Section */
        .record-section {
            text-align: center;
            margin-bottom: 25px;
            padding: 20px;
            background-color: #a8dadc; 
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .record-button {
            background-color: #e69999; 
            color: white;
            border: none;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s, background-color 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 auto 10px;
            line-height: 1.2;
        }
        
        .record-button:hover {
            background-color: #d17a7a;
            transform: scale(1.05);
        }
        
        .record-button span {
            font-size: 36px;
        }

        .record-section p {
            color: #333;
            margin: 0;
            font-weight: 500;
        }

        /* Movement History List */
        .history-list-header {
            font-size: 18px;
            font-weight: 600;
            color: #4b4b4b;
            margin-bottom: 15px;
        }
        
        .movement-session-card {
            background-color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
            border-left: 5px solid #2a9d8f;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .session-details {
            text-align: left;
            flex-grow: 1;
        }

        .session-details .date {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .session-details .time {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        
        .session-details .notes {
            font-size: 14px;
            color: #888;
            margin-top: 5px;
        }

        .kicks-count {
            text-align: right;
            padding: 5px 10px;
        }
        
        .kicks-count .number {
            font-size: 36px;
            font-weight: bold;
            color: #e69999; 
            line-height: 1;
        }
        
        .kicks-count .label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
        }

        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            background-color: white;
            border-radius: 8px;
            margin-top: 20px;
        }

    </style>
</head>
<body>

    <header class="app-header">
        <a href="<?php echo htmlspecialchars($back_link); ?>" id="backButton" class="back-arrow-btn">&#x2329;</a> 
        <div class="header-title"><?php echo htmlspecialchars($page_title); ?></div>
        <div></div> 
    </header>

    <div class="content-area">
        
        <div class="record-section">
            <button class="record-button" id="startKickSession">
                <span>👣</span>
                START LOG
            </button>
            <p>Start a new session to count kicks.</p>
        </div>

        <div class="history-list-header">Previous Sessions</div>
        
        <?php if (!empty($movement_sessions)): ?>
            <?php foreach ($movement_sessions as $session): ?>
                <div class="movement-session-card">
                    <div class="session-details">
                        <div class="date"><?php echo date("l, d M Y", strtotime(htmlspecialchars($session['session_date']))); ?></div>
                        <div class="time">
                            <?php echo htmlspecialchars($session['start_time']); ?> to 
                            <?php echo htmlspecialchars($session['end_time']); ?>
                        </div>
                        <div class="notes"><?php echo htmlspecialchars($session['notes']); ?></div>
                    </div>
                    <div class="kicks-count">
                        <div class="number"><?php echo htmlspecialchars($session['kicks_count']); ?></div>
                        <div class="label">Kicks</div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-data">
                No movement sessions recorded yet. Start a new log!
            </div>
        <?php endif; ?>

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startButton = document.getElementById('startKickSession');
            const backButton = document.getElementById('backButton');
            
            // --- Always go to 6child.php ---
            backButton.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = backButton.href; 
            });
            // -------------------------------

            startButton.addEventListener('click', function() {
                alert("Starting a new kick counting session! \n\n(In a real app, this would open a timer and counter screen.)");
            });
        });
    </script>

</body>
</html>
