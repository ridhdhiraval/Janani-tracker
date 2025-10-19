<?php
// PHP Section: Define dynamic data variables
$page_title = "Settings";
$log_in_text = "LOG IN";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?> - Full Desktop Size</title>
    
    <style>
        /* General body reset and font */
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #fcf6f7;
            min-height: 100vh;
        }

        /* --- Full Width Header Bar Wrapper (Simulates the App Header) --- */
        .header-bar-wrapper {
            width: 100%;
            background-color: #ffffff;
            border-bottom: 1px solid #e0d9cd;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        
        /* --- Top Header Bar Content (Wider) --- */
        .app-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px; 
            max-width: 90vw; 
            margin: 0 auto; 
        }
        
        .header-content {
            display: flex;
            align-items: center;
            flex-grow: 1;
            position: relative;
        }

        .app-header h1 {
            font-size: 24px; 
            font-weight: 500;
            color: #4b4b4b;
            margin: 0 auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap; 
        }

        .back-arrow {
            font-size: 30px; 
            text-decoration: none;
            color: #4b4b4b; 
            line-height: 1;
            z-index: 10;
        }
        
        .log-in-link {
            font-size: 16px;
            font-weight: 600;
            color: #4b4b4b;
            text-decoration: none;
            text-transform: uppercase;
        }

        /* --- Main Content Wrapper for Alignment --- */
        .content-wrapper {
            max-width: 90vw; 
            margin: 0 auto; 
            padding: 0 40px; 
            text-align: center;
        }

        /* --- ADD PREGNANCY Section --- */
        .add-pregnancy-section {
            padding-top: 60px; 
            padding-bottom: 60px;
        }

        .heart-icon-container {
            width: 100px;
            height: 100px;
            background-color: #fcebeb; 
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            position: relative;
            cursor: pointer; /* Indicate it's clickable */
        }

        .heart-icon-container .heart {
            font-size: 48px;
            color: #eb7c8c;
            line-height: 1;
        }

        .heart-icon-container .plus {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 20px;
            width: 25px;
            height: 25px;
            line-height: 25px;
            background-color: #eb7c8c;
            border-radius: 50%;
            color: white;
            text-align: center;
            font-weight: bold;
            border: 3px solid white;
        }

        .add-pregnancy-text {
            font-size: 16px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer; /* Indicate it's clickable */
        }

        /* --- Settings Menu List --- */
        .settings-menu-container {
            max-width: 800px; 
            margin: 0 auto; 
            text-align: left;
        }
        
        .setting-item {
            display: flex;
            align-items: center;
            padding: 20px 0;
            cursor: pointer;
            text-decoration: none; 
            color: #4b4b4b;
            border-bottom: 1px solid #f0e9ea;
            transition: background-color 0.1s;
        }

        .setting-item:last-child {
            border-bottom: none;
        }

        .setting-item:hover {
            background-color: #fcf6f7;
        }

        .item-icon {
            font-size: 22px;
            margin-right: 20px;
            color: #eb7c8c;
        }

        .item-label {
            font-size: 18px;
            font-weight: 500;
            flex-grow: 1;
        }

        .item-arrow {
            font-size: 28px;
            color: #ccc; 
            font-weight: bold; 
        }
    </style>
</head>
<body>

<div class="settings-app-container">
    
    <div class="header-bar-wrapper">
        <header class="app-header">
            <a href="5index.php" class="back-arrow">&leftarrow;</a> 
            
            <div class="header-content">
                <h1><?php echo htmlspecialchars($page_title); ?></h1>
            </div>
            
            <a href="1signinsignup.php" class="log-in-link"><?php echo htmlspecialchars($log_in_text); ?></a>
        </header>
    </div>

    <div class="content-wrapper">
        
        <div class="settings-menu-container">
            
            <a href="1signinsignup.php" class="setting-item" id="setting-create">
                <span class="item-icon">&#9825;</span> 
                <span class="item-label">Create account</span>
                <span class="item-arrow">&rsaquo;</span>
            </a>
            
            <a href="my_pregnancy.php" class="setting-item" id="setting-pregnancy">
                <span class="item-icon">&#x2665;</span> 
                <span class="item-label">My pregnancy</span>
                <span class="item-arrow">&rsaquo;</span>
            </a>
            
            <a href="app_settings.php" class="setting-item" id="setting-app">
                <span class="item-icon">&#x2699;</span> 
                <span class="item-label">App settings</span>
                <span class="item-arrow">&rsaquo;</span>
            </a>
            
            <a href="support_faq.php" class="setting-item" id="setting-faq">
                <span class="item-icon">&#x2753;</span> 
                <span class="item-label">Support and FAQ</span>
                <span class="item-arrow">&rsaquo;</span>
            </a>
            
            <a href="contact_us.php" class="setting-item" id="setting-contact">
                <span class="item-icon">&#x2709;</span> 
                <span class="item-label">Contact us</span>
                <span class="item-arrow">&rsaquo;</span>
            </a>
        </div>
    </div>
</div>

<script>
    // The JavaScript is now simple and just logs a message, as the navigation is handled by the HTML links.
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function() {
                // This will run when any link is clicked, before the browser navigates.
                console.log(`Navigating to: ${link.getAttribute('href')}`);
            });
        });
    });
</script>
    <?php include '15footer.php'; ?>

</body>
</html>