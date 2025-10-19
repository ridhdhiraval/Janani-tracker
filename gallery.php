<?php
// PHP Section: Define dynamic data and navigation links
$page_title = "Ultrasound Gallery"; 
$back_link = "6child.php"; // Back link to the main profile page (as discussed earlier)

// Example Gallery Data (replace with actual file system scanning or database fetch)
$scan_photos = [
    ["id" => 1, "filename" => "scan_08w.jpg", "caption" => "8 Weeks Scan"],
    ["id" => 2, "filename" => "scan_12w.jpg", "caption" => "12 Weeks Nuchal Scan"],
    ["id" => 3, "filename" => "scan_20w.jpg", "caption" => "20 Weeks Anatomy Scan"],
    ["id" => 4, "filename" => "scan_32w.jpg", "caption" => "32 Weeks Growth Check"],
];

// File Upload Handling placeholder
$upload_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['scan_file'])) {
    // Note: Actual file upload handling (security, saving to server) requires proper PHP setup.
    // This is just a basic placeholder for demonstration.
    $upload_message = "File '" . htmlspecialchars($_FILES['scan_file']['name']) . "' processed successfully (Placeholder).";
}
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
            max-width: 900px; /* Wider for gallery grid */
            margin: 0 auto;
        }
        
        /* --- Upload Section Styles --- */
        .upload-section {
            background-color: #a8dadc; /* Theme color */
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .upload-section h3 {
            margin-top: 0;
            color: #333;
            font-weight: 600;
            font-size: 18px;
        }

        .upload-form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .file-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
        }
        
        .upload-btn {
            background-color: #e69999; /* Pinkish accent */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.2s;
        }

        .upload-btn:hover {
            background-color: #d17a7a;
        }
        
        .upload-message {
            margin-top: 10px;
            color: #333;
            font-weight: bold;
        }

        /* --- Gallery Grid Styles --- */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* Responsive grid */
            gap: 20px;
        }
        
        .scan-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            cursor: pointer;
        }

        .scan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .scan-image {
            width: 100%;
            height: 150px; /* Fixed height for consistent look */
            object-fit: cover; /* Image ko fit karega */
            display: block;
        }
        
        .scan-caption {
            padding: 10px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
            color: #4b4b4b;
        }
        
        .no-photos {
            text-align: center;
            padding: 50px;
            color: #999;
            background-color: white;
            border-radius: 8px;
            grid-column: 1 / -1; /* Pure white background with centered text */
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
        
        <div class="upload-section">
            <h3>Upload New Scan Photo</h3>
            <form action="gallery.php" method="POST" enctype="multipart/form-data" class="upload-form">
                <input type="file" name="scan_file" accept="image/*" required class="file-input">
                <button type="submit" class="upload-btn">Upload</button>
            </form>
            <?php if ($upload_message): ?>
                <p class="upload-message"><?php echo htmlspecialchars($upload_message); ?></p>
            <?php endif; ?>
        </div>

        <div class="gallery-grid">
            <?php if (!empty($scan_photos)): ?>
                <?php foreach ($scan_photos as $photo): ?>
                    <div class="scan-card" onclick="viewPhoto(<?php echo htmlspecialchars($photo['id']); ?>)">
                        <img src="placeholder/<?php echo htmlspecialchars($photo['filename']); ?>" 
                             alt="<?php echo htmlspecialchars($photo['caption']); ?>" 
                             class="scan-image">
                        <div class="scan-caption">
                            <?php echo htmlspecialchars($photo['caption']); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-photos">
                    No ultrasound photos found. Please use the upload option above!
                </div>
            <?php endif; ?>
        </div>
        
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backButton = document.getElementById('backButton'); 
            
            // --- GUARANTEED BACK BUTTON LOGIC (Pichhle pages ki tarah) ---
            backButton.addEventListener('click', function(e) {
                e.preventDefault(); 
                
                if (window.history.length > 1) {
                    window.history.back();
                } else {
                    // Fallback to the defined PHP link (6child.php)
                    window.location.href = backButton.href; 
                }
            });

            // Photo viewing function (Aap ismein modal/lightbox functionality add kar sakte hain)
            window.viewPhoto = function(photoId) {
                alert("Viewing photo ID: " + photoId + "\n(In a real application, this would open a fullscreen view or modal.)");
            };
        });
    </script>

</body>
</html>