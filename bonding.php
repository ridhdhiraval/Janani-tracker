<?php
// PHP Section: Define dynamic data and navigation links
$page_title = "Bonding Activities"; 
$back_link = "6child.php"; // Back link to the main profile/dashboard page

// Data for different sections (Can be dynamic or static content)
$activities = [
    [
        "title" => "Music for Baby",
        "icon" => "🎵",
        "description" => "Playing soft music and classical melodies can soothe your baby and aid brain development. Choose a few tracks to play regularly.",
        "link_text" => "Create Playlist",
        "link_url" => "#music_playlist"
    ],
    [
        "title" => "Talking to Baby",
        "icon" => "🗣️",
        "description" => "Your baby recognizes your voice from the womb. Talk, read, and sing to them often. Describe what you are doing throughout the day.",
        "link_text" => "Tips & Prompts",
        "link_url" => "#talking_tips"
    ],
    [
        "title" => "Name Ideas",
        "icon" => "✨",
        "description" => "Searching for the perfect name? Explore different names, meanings, and origins. Try saying them out loud to feel the connection.",
        "link_text" => "Name Explorer",
        "link_url" => "#name_explorer"
    ],
    [
        "title" => "Lullabies & Singing",
        "icon" => "🎤",
        "description" => "Singing simple lullabies establishes a calming routine. It’s a powerful way to bond and help baby transition to sleep.",
        "link_text" => "View Lullabies",
        "link_url" => "#lullaby_list"
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
        /* Base Theme Styles (Consistent) */
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
            max-width: 700px; 
            margin: 0 auto;
        }
        
        /* --- Bonding Card Styles --- */
        .activities-grid {
            display: grid;
            gap: 20px;
            /* Simple grid for responsiveness on various screens */
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        }
        
        .activity-card {
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-top: 5px solid #2a9d8f; /* Greenish theme highlight */
            transition: box-shadow 0.2s;
        }
        
        .activity-card:hover {
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .activity-icon {
            font-size: 40px;
            margin-bottom: 10px;
            line-height: 1;
        }

        .activity-card h3 {
            font-size: 20px;
            font-weight: bold;
            color: #e69999; /* Pinkish accent color */
            margin: 0 0 10px;
        }

        .activity-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .activity-link {
            display: inline-block;
            background-color: #a8dadc; /* Blueish theme color */
            color: #333;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.2s;
        }

        .activity-link:hover {
            background-color: #92c6c8;
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
        
        <div class="activities-grid">
            <?php foreach ($activities as $activity): ?>
                <div class="activity-card">
                    <div class="activity-icon"><?php echo htmlspecialchars($activity['icon']); ?></div>
                    <h3><?php echo htmlspecialchars($activity['title']); ?></h3>
                    <p><?php echo htmlspecialchars($activity['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($activity['link_url']); ?>" class="activity-link">
                        <?php echo htmlspecialchars($activity['link_text']); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backButton = document.getElementById('backButton'); 
            
            // --- GUARANTEED BACK BUTTON LOGIC ---
            backButton.addEventListener('click', function(e) {
                e.preventDefault(); 
                
                if (window.history.length > 1) {
                    window.history.back();
                } else {
                    // Fallback to the defined PHP link (6child.php)
                    window.location.href = backButton.href; 
                }
            });
            // ------------------------------------

            // Add any other specific activity link handlers here if needed
            // For example, if 'Create Playlist' opens a modal, the JS would go here.
        });
    </script>

</body>
</html>