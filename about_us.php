<?php
// PHP code for processing or logic (Static content page, no session/form handling needed)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - JANANI</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-pink': '#ff69b4',
                        'light-pink-bg': '#fff4f7',
                        'card-bg': '#fff8f8',
                        'text-dark': '#2d2d2d',
                        'text-muted': '#555',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'Arial', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gradient-to-br from-pink-50 to-white text-text-dark min-h-screen">

    <div class="w-full max-w-6xl mx-auto px-10 py-16">
        
        <!-- Back Link -->
        <a href="5index.php" class="text-text-muted text-base flex items-center mb-12 hover:text-primary-pink transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Welcome
        </a>

        <!-- Header -->
        <header class="text-center mb-20">
            <div class="text-primary-pink text-7xl mb-4">
                <i class="fas fa-heart"></i>
            </div> 
            <h1 class="text-5xl font-extrabold tracking-tight">About <span class="text-primary-pink">JANANI</span></h1>
            <p class="text-text-muted text-xl mt-3">Your Caring Pregnancy Companion</p>
        </header>

        <!-- Main Content Card -->
        <div class="bg-white/80 backdrop-blur-sm p-14 rounded-3xl shadow-2xl border border-pink-100 space-y-16">

            <!-- 1. Introduction -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-5">1. Introduction</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    <b>JANANI</b> is not just an app — it’s a companion for every expecting mother.  
                    Our goal is to guide women through every stage of pregnancy — from the very first week to motherhood — 
                    with accurate medical information, emotional comfort, and digital tools that truly care.
                </p>
            </section>

            <!-- 2. Our Mission -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-5">2. Our Mission</h2>
                <div class="bg-card-bg p-8 rounded-2xl border border-pink-50 shadow-sm">
                    <p class="text-lg text-gray-700 leading-relaxed">
                        To empower every pregnant woman — especially in rural and semi-urban areas — 
                        by providing accessible guidance, emergency support, and emotional care through one easy-to-use digital platform.
                    </p>
                </div>
            </section>

            <!-- 3. Our Vision -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-5">3. Our Vision</h2>
                <p class="text-lg text-gray-700 leading-relaxed">
                    A world where every mother receives timely healthcare, emotional support, and confidence in her pregnancy journey — 
                    no matter her background or location.
                </p>
            </section>

            <!-- 4. What We Offer -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-8">4. What We Offer</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-chart-line text-primary-pink text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg mb-1">Pregnancy Tracker</p>
                            <p class="text-base text-text-muted">Week-by-week growth insights, health reminders, and development tracking.</p>
                        </div>
                    </div>

                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-calculator text-primary-pink text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg mb-1">Due Date Calculator</p>
                            <p class="text-base text-text-muted">Smart prediction using last period or ultrasound data.</p>
                        </div>
                    </div>

                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-bell text-red-500 text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg text-red-600 mb-1">Emergency Alert</p>
                            <p class="text-base text-text-muted">Connect instantly with nearby hospitals or ASHA workers during emergencies.</p>
                        </div>
                    </div>

                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-book-medical text-primary-pink text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg mb-1">Health Tips & Articles</p>
                            <p class="text-base text-text-muted">Doctor-verified, easy-to-understand advice for each stage of pregnancy.</p>
                        </div>
                    </div>

                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-baby text-primary-pink text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg mb-1">Baby Care Section</p>
                            <p class="text-base text-text-muted">Guidance for baby’s first 24 months — nutrition, hygiene, and growth tracking.</p>
                        </div>
                    </div>

                    <div class="flex items-start p-6 bg-light-pink-bg rounded-2xl shadow-md hover:shadow-lg transition">
                        <i class="fas fa-language text-primary-pink text-3xl mr-5 mt-2"></i>
                        <div>
                            <p class="font-semibold text-lg mb-1">Multi-language Support</p>
                            <p class="text-base text-text-muted">Supports English and regional Indian languages for easy understanding.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 5. Why Choose JANANI -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-5">5. Why Choose JANANI</h2>
                <div class="bg-card-bg p-8 rounded-2xl border border-pink-50">
                    <p class="text-xl text-gray-700 leading-relaxed font-semibold mb-2">
                        Because we combine compassion with technology.
                    </p>
                    <p class="text-lg text-gray-700 leading-relaxed">
                        JANANI is not just a tool — it’s a helping hand.  
                        It reminds you, supports you, and keeps you and your baby safe throughout the journey.
                    </p>
                </div>
            </section>

            <!-- 6. Our Team -->
            <section>
                <h2 class="text-3xl font-bold text-primary-pink mb-6">6. Our Team</h2>
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    JANANI is created by passionate students and developers who believe in using technology to make maternal healthcare more accessible.  
                    With guidance from doctors, nurses, and rural health workers, we ensure our platform is both reliable and user-friendly.
                </p>

                <!-- Optional: Team Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-center">
                    <div>
                        <img src="images/team1.jpg" alt="Team Member" class="w-36 h-36 mx-auto rounded-full shadow-lg object-cover mb-4">
                        <h3 class="font-semibold text-lg">Ridhdhi Raval</h3>
                        <p class="text-sm text-text-muted">Project Developer</p>
                    </div>
                    <div>
                        <img src="images/team2.jpg" alt="Team Member" class="w-36 h-36 mx-auto rounded-full shadow-lg object-cover mb-4">
                        <h3 class="font-semibold text-lg">Sneha Patel</h3>
                        <p class="text-sm text-text-muted">UI/UX Designer</p>
                    </div>
                    <div>
                        <img src="images/team3.jpg" alt="Team Member" class="w-36 h-36 mx-auto rounded-full shadow-lg object-cover mb-4">
                        <h3 class="font-semibold text-lg">Dr. Meera Shah</h3>
                        <p class="text-sm text-text-muted">Medical Advisor</p>
                    </div>
                </div>
            </section>
        </div>

        <footer class="text-center text-base text-text-muted mt-20 pb-8">
            &copy; <?php echo date("Y"); ?> JANANI App. All rights reserved.
        </footer>
    </div>
</body>
</html>
