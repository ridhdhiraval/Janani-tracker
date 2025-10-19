<?php
// PHP Section: Define dynamic data and navigation links
$page_title = "Mum"; // Title for the current page
$back_link = "family.php"; // Link back to the family list page
// $photo_link is no longer needed as we use a hidden input for file selection

// Initial data (can be fetched from a database)
$member_initial = "M";
$initial_mother_name = "Maya Sharma"; // Example initial name
$initial_pre_pregnancy_weight = "55 kg"; 
$initial_profile_image = ""; // Default empty path or URL to current image

// Links for the editable fields (now managed by modals, but targets are kept for future use)
$edit_weight_link = "edit_weight.php?member=mum";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <style>
        /* General body reset and font */
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #f7f3ed; 
        }

        /* --- Full Width Header Bar Wrapper --- */
        .header-bar-wrapper {
            width: 100%;
            background-color: #f7f3ed; 
            border-bottom: 1px solid #e0d9cd;
        }
        
        /* --- Top Header Bar Content (Constrained width) --- */
        .app-header {
            display: flex;
            align-items: center;
            padding: 25px 30px; 
            max-width: 1200px; 
            margin: 0 auto;
        }
        
        .app-header .header-content {
            display: flex;
            align-items: center;
            flex-grow: 1;
            position: relative;
        }

        .app-header h1 {
            font-size: 24px; 
            font-weight: normal;
            color: #4b4b4b;
            margin: 0 auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap; 
        }

        .back-arrow {
            font-size: 36px; 
            text-decoration: none;
            color: #4b4b4b;
            line-height: 1;
            position: relative;
            z-index: 10;
        }

        /* --- Main Content Area --- */
        .content-area {
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 30px; 
            text-align: center;
        }

        /* --- Avatar Styling --- */
        .large-avatar-container {
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .large-avatar {
            width: 150px; 
            height: 150px;
            border-radius: 50%;
            background-color: #e69999;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        
        /* Initial Text Styling */
        .large-avatar .initial {
            font-size: 72px; 
            font-weight: bold;
            color: #ffffff; 
            position: absolute; 
        }
        
        /* Image inside Avatar Styling */
        .large-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            border-radius: 50%; 
            display: none; /* Hidden by default or when no image is set */
            position: absolute;
            top: 0;
            left: 0;
        }

        /* photo-link ab ek div hai jo click trigger karega */
        .photo-link {
            display: block;
            text-decoration: none;
            color: #4b4b4b;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
        }

        .camera-icon {
            font-size: 24px;
            color: #4b4b4b;
            display: block;
        }
        
        /* Hidden file input */
        #photoInput {
            display: none;
        }
        
        /* --- Settings/Data List Container --- */
        .data-list-container {
            background-color: white; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); 
            margin-top: 20px; 
        }
        
        .data-list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            border-bottom: 1px solid #e0d9cd;
            cursor: pointer;
            text-decoration: none;
            color: #4b4b4b;
            transition: background-color 0.1s;
        }
        
        .data-list-item:hover {
            background-color: #fcfcfc;
        }

        .data-list-item:last-child {
            border-bottom: none; 
        }

        .item-label {
            font-size: 18px;
            font-weight: normal;
        }

        .item-value {
            font-size: 18px;
            color: #888; 
            margin-right: 15px; 
        }

        .arrow-right {
            font-size: 28px;
            color: #b0b0b0;
            line-height: 1;
            flex-shrink: 0;
        }
        
        /* ================================================= */
        /* --- Mother's Name Modal Styles --- */
        /* ================================================= */

        .modal-overlay {
            display: none; 
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); 
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .name-modal {
            background-color: white;
            width: 90%;
            max-width: 320px; 
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .modal-header-text {
            font-size: 18px;
            font-weight: bold;
            color: #4b4b4b;
            margin-bottom: 15px;
        }
        
        .modal-input-container {
            margin-bottom: 25px;
        }

        .name-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; 
            font-size: 16px;
            color: #4b4b4b;
            outline: none;
            height: 40px; 
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            padding-top: 10px;
        }

        .modal-button {
            background: none;
            border: none;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.1s;
        }

        #cancelNameBtn {
            color: #4b4b4b; 
        }

        #okNameBtn {
            background-color: #333; 
            color: white;
            padding: 10px 20px; 
        }
        
        #okNameBtn:hover {
            background-color: #222;
        }

    </style>
</head>
<body>

<div class="profile-app-container">
    
    <div class="header-bar-wrapper">
        <header class="app-header">
            <div class="header-content">
                <a href="<?php echo htmlspecialchars($back_link); ?>" class="back-arrow">&#x2329;</a> 
                <h1><?php echo htmlspecialchars($page_title); ?></h1>
            </div>
        </header>
    </div>

    <div class="content-area">
        
        <div class="large-avatar-container">
            <div class="large-avatar" id="avatarContainer">
                <span class="initial" id="avatarInitial"><?php echo htmlspecialchars($member_initial); ?></span>
                <img id="profileImage" src="<?php echo htmlspecialchars($initial_profile_image); ?>" alt="Profile Image" 
                     style="<?php echo !empty($initial_profile_image) ? 'display: block;' : 'display: none;'; ?>">
            </div>
            
            <div class="photo-link" id="photoLink">
                <span class="camera-icon">&#128247;</span> 
                SELECT FROM ALBUM
            </div>
            
            <input type="file" id="photoInput" accept="image/*">
        </div>
        
        <div class="data-list-container">
            
            <div class="data-list-item" id="row-name">
                <span class="item-label">Mother's name</span>
                <span class="item-value" id="motherNameValue"><?php echo htmlspecialchars($initial_mother_name); ?></span>
                <span class="arrow-right">&#x232a;</span>
            </div>
            
            <a href="<?php echo htmlspecialchars($edit_weight_link); ?>" class="data-list-item" id="row-weight">
                <span class="item-label">Pre-pregnancy weight</span>
                <span class="item-value"><?php echo htmlspecialchars($initial_pre_pregnancy_weight); ?></span>
                <span class="arrow-right">&#x232a;</span>
            </a>
            
        </div>
    </div>
</div>

<div class="modal-overlay" id="nameModalOverlay">
    <div class="name-modal">
        <div class="modal-header-text">Mother's name</div>
        
        <div class="modal-input-container">
            <input type="text" class="name-input" id="nameInput" placeholder="Enter name">
        </div>

        <div class="modal-footer">
            <button class="modal-button" id="cancelNameBtn">CANCEL</button>
            <button class="modal-button" id="okNameBtn">OK</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backArrow = document.querySelector('.back-arrow');
        const photoLink = document.getElementById('photoLink');
        const photoInput = document.getElementById('photoInput'); // New
        const avatarInitial = document.getElementById('avatarInitial'); // New
        const profileImage = document.getElementById('profileImage'); // New
        
        const nameRow = document.getElementById('row-name');
        const weightRow = document.getElementById('row-weight');
        
        // Modal elements
        const nameModalOverlay = document.getElementById('nameModalOverlay');
        const nameInput = document.getElementById('nameInput');
        const motherNameValue = document.getElementById('motherNameValue');
        const cancelNameBtn = document.getElementById('cancelNameBtn');
        const okNameBtn = document.getElementById('okNameBtn');
        
        // --- Modal Control Functions ---
        
        function openNameModal() {
            nameInput.value = motherNameValue.textContent.trim();
            nameModalOverlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => nameInput.focus(), 100); 
        }

        function closeNameModal() {
            nameModalOverlay.style.display = 'none';
            document.body.style.overflow = '';
        }
        
        // --- Event Listeners ---

        // 1. SELECT FROM ALBUM Click -> Trigger File Input (Gallery/Camera)
        photoLink.addEventListener('click', function() {
            console.log("Triggering photo selection...");
            photoInput.click(); // This line opens the file dialog/gallery
        });
        
        // 2. Handle file selection change (Display selected image)
        photoInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                    profileImage.style.display = 'block'; // Show the image
                    avatarInitial.style.display = 'none'; // Hide the initial
                    console.log("Profile image updated.");
                };

                reader.readAsDataURL(this.files[0]); // Read the selected file as a Data URL
            } else {
                // If no file is selected (e.g., user cancels), revert to initial or default image
                profileImage.style.display = 'none';
                avatarInitial.style.display = 'block';
                // Note: In a real app, you'd check for a default image URL here
                console.log("No photo selected, showing initial.");
            }
        });

        // 3. Mother's Name Row Click -> Open Modal
        nameRow.addEventListener('click', openNameModal);

        // 4. OK Button Click -> Save and Close
        okNameBtn.addEventListener('click', function() {
            const newName = nameInput.value.trim();
            if (newName) {
                motherNameValue.textContent = newName;
                // In a real app, send newName to the server here
            }
            closeNameModal();
        });

        // 5. CANCEL Button Click -> Discard and Close
        cancelNameBtn.addEventListener('click', closeNameModal);

        // 6. Close Modal on Overlay Click
        nameModalOverlay.addEventListener('click', function(event) {
            if (event.target === nameModalOverlay) {
                closeNameModal();
            }
        });

        // 7. General Navigation (Handling back and weight rows as links)
        backArrow.addEventListener('click', () => {
             console.log("Navigating back to: " + backArrow.getAttribute('href'));
        });

        if (weightRow.tagName === 'A') {
            weightRow.addEventListener('click', function(event) {
                const targetUrl = this.getAttribute('href');
                event.preventDefault(); 
                console.log(`Navigating from Weight Row: ${targetUrl}`);
            });
        }
        
        // Initial Image Check on load
        if (profileImage.src && profileImage.src !== window.location.href) {
            profileImage.style.display = 'block';
            avatarInitial.style.display = 'none';
        } else {
            profileImage.style.display = 'none';
            avatarInitial.style.display = 'block';
        }
    });
</script>

</body>
</html>