<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P R M S - Patient Record Management System</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Load Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Custom font loading */
        @import url("https://fonts.googleapis.com/css2?family=Jost:wght@400;600&family=Nunito:wght@600&family=Playball&family=Yanone+Kaffeesatz:wght@300;600&display=swap");

        .font-jost { font-family: 'Jost', sans-serif; }
        .font-nunito { font-family: 'Nunito', sans-serif; }
        .font-playball { font-family: 'Playball', cursive; }
        .font-yanone { font-family: 'Yanone Kaffeesatz', sans-serif; }

        /* The following classes ensure the logo placeholder is visible (Default/Desktop size) */
        .logo-placeholder {
            width: 240px; 
            height: 95px;
            background-color: #3b82f6; /* A placeholder color */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Mobile specific adjustment for the logo (screens under 768px) */
        @media (max-width: 767px) {
            .logo-placeholder {
                width: 120px; /* Reduced width for mobile */
                height: 45px; /* Reduced height for mobile */
                font-size: 1rem; /* Reduced font size for mobile */
            }
        }

        /* Responsive Dropdown logic using CSS (more complex in pure CSS, but necessary for single file) */
        .dropdown-menu {
            display: none;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Removed CSS hack for mobile toggle, using JS now */

        /* Placeholder images for sections */
        .placeholder-img-p {
            background-image: url('https://placehold.co/800x600/1D2C3D/FFF?text=Patient+Focus');
            background-size: cover;
            background-position: center;
        }
        .placeholder-img-d {
            background-image: url('https://placehold.co/600x750/065F46/FFF?text=Doctor+Focus');
            background-size: cover;
            background-position: center;
        }
        .placeholder-img-s {
            background-image: url('https://placehold.co/800x600/3A4F5E/FFF?text=Staff+Focus');
            background-size: cover;
            background-position: center;
        }

    </style>
</head>
<body class="bg-gray-50 font-jost">

    <!-- Navigation Bar (Responsive) -->
    <nav class="navigation-bar bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-24">
                <div class="flex items-center">
                    <!-- Logo Placeholder (Replaced your fixed-size <img>) -->
                    <div class="flex-shrink-0">
                        <div class="logo-placeholder rounded-lg">P R M S</div>
                    </div>
                </div>

                <!-- Desktop Menu (Hidden on small screens) -->
                <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                    <a href="index.php" class="text-gray-900 hover:bg-gray-900 hover:text-white px-3 py-2 rounded-md text-lg font-medium transition duration-150">Home</a>
                    <a href="about.php" class="text-gray-900 hover:bg-gray-900 hover:text-white px-3 py-2 rounded-md text-lg font-medium transition duration-150">About</a>
                    
                    <!-- Login Dropdown -->
                    <div class="relative dropdown">
                        <button class="dropbtn text-gray-900 bg-white hover:bg-gray-900 hover:text-white px-3 py-2 rounded-md text-lg font-medium transition duration-150 flex items-center">
                            Login <i class="fa fa-caret-down ml-2"></i>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20">
                            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <!-- UPDATED LOGIN LINKS -->
                                <a href="patient.login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-md">Patient Login</a>
                                <a href="doctor.login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Doctor Login</a>
                                <a href="staff.login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Staff Login</a>
                                <a href="admin.login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-md">Admin Login</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile menu button (Hamburger) - Now uses a button with an ID -->
                <div class="flex items-center md:hidden">
                    <button id="menu-toggle-button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php" class="text-gray-900 hover:bg-gray-900 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition duration-150">Home</a>
                <a href="about.php" class="text-gray-900 hover:bg-gray-900 hover:text-white block px-3 py-2 rounded-md text-base font-medium transition duration-150">About</a>
                <!-- Mobile Login Links -->
                <div class="pt-2 border-t border-gray-200">
                    <p class="text-gray-500 px-3 py-2 text-sm font-medium">Login as:</p>
                    <!-- UPDATED MOBILE LOGIN LINKS -->
                    <a href="patient.login.php" class="text-gray-700 hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Patient</a>
                    <a href="doctor.login.php" class="text-gray-700 hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Doctor</a>
                    <a href="staff.login.php" class="text-gray-700 hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Staff</a>
                    <a href="admin.login.php" class="text-gray-700 hover:bg-gray-100 block px-3 py-2 rounded-md text-base font-medium">Admin</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Intro/Hero Section (Responsive with Video Background) -->
    <header class="h-[700px] w-full relative shadow-xl overflow-hidden">
        
        <!-- Video Background -->
        <!-- IMPORTANT: Replace 'YOUR_VIDEO_FILE.mp4' with the actual path to your self-hosted video file -->
        <video autoplay muted loop playsinline poster="https://placehold.co/1920x700/000000/FFF?text=Loading+Video" 
               class="absolute z-0 w-full h-full object-cover">
            <!-- Replace the source URL below with your video source -->
            <source src="aman.mp4" type="video/mp4">
            <!-- Fallback content if video fails to load (shows a dark background) -->
            <div class="absolute inset-0 bg-gray-900"></div>
        </video>

        <!-- Overlay for contrast and text visibility -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>
        
        <!-- Hero Text Content -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 md:top-1/3 md:left-[10%] md:translate-x-0 md:translate-y-0 text-center md:text-left p-4 z-20">
            <h1 class="font-nunito text-white text-4xl sm:text-6xl lg:text-7xl mb-4 font-extrabold tracking-tight">
                Your Health Records. Simplified.
            </h1>
            <p class="font-playball text-gray-200 text-xl sm:text-2xl lg:text-3xl italic mt-2">
                Securely managing patient data for better care.
            </p>
        </div>
    </header>

    <!-- Patient Intro Section (Stacks on mobile, two-column on desktop) -->
    <section class="patient_intro w-full bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center md:space-x-12">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2 p-4 md:p-8 order-2 md:order-1 text-center md:text-left">
                <h2 class="font-yanone text-4xl sm:text-6xl font-semibold mb-6">
                    Patients
                </h2>
                <p class="text-lg mb-8">
                    Access your medical records, appointment history, prescriptions, and test results securely from anywhere. We put your health information at your fingertips.
                </p>
                <a href="patient.login.php" class="patient_intro_gs inline-block bg-white text-gray-900 border border-white px-8 py-4 rounded-lg text-lg font-nunito hover:bg-gray-300 transition duration-300 shadow-xl">
                    Get Started as a Patient
                </a>
            </div>

            <!-- Image/Placeholder -->
            <div class="w-full md:w-1/2 h-80 md:h-[600px] p-4 order-1 md:order-2">
                <div class="placeholder-img-p w-full h-full rounded-2xl shadow-2xl"></div>
            </div>

        </div>
    </section>

    <!-- Doctor Intro Section (Stacks on mobile, two-column on desktop, Reversed Order) -->
    <section class="doctor_intro w-full bg-gray-100 text-gray-900 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center md:space-x-12">
            
            <!-- Image/Placeholder (Order 1 on mobile, 1 on desktop) -->
            <div class="w-full md:w-1/2 h-80 md:h-[600px] p-4 order-1">
                <div class="placeholder-img-d w-full h-full rounded-2xl shadow-2xl"></div>
            </div>

            <!-- Text Content (Order 2 on mobile, 2 on desktop) -->
            <div class="w-full md:w-1/2 p-4 md:p-8 order-2 text-center md:text-left">
                <h2 class="font-yanone text-4xl sm:text-6xl font-semibold mb-6">
                    Doctors
                </h2>
                <p class="text-lg mb-8">
                    View complete patient histories, manage appointments, and quickly share data with other specialists. Streamline your workflow for better patient care.
                </p>
                <a href="doctor.login.php" class="doctor_intro_gs inline-block bg-gray-900 text-white border border-gray-900 px-8 py-4 rounded-lg text-lg font-nunito hover:bg-white hover:text-gray-900 transition duration-300 shadow-xl">
                    Get Started as a Doctor
                </a>
            </div>

        </div>
    </section>

    <!-- Staff Intro Section (Stacks on mobile, two-column on desktop) -->
    <section class="staff_intro w-full bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center md:space-x-12">
            
            <!-- Text Content -->
            <div class="w-full md:w-1/2 p-4 md:p-8 order-2 md:order-1 text-center md:text-left">
                <h2 class="font-yanone text-4xl sm:text-6xl font-semibold mb-6">
                    Staff
                </h2>
                <p class="text-lg mb-8">
                    Efficiently manage patient intake, billing, scheduling, and administrative tasks. Our system simplifies complex office procedures, ensuring everything runs smoothly.
                </p>
                <a href="staff.login.php" class="staff_intro_gs inline-block bg-white text-gray-900 border border-white px-8 py-4 rounded-lg text-lg font-nunito hover:bg-gray-300 transition duration-300 shadow-xl">
                    Get Started as Staff
                </a>
            </div>

            <!-- Image/Placeholder -->
            <div class="w-full md:w-1/2 h-80 md:h-[600px] p-4 order-1 md:order-2">
                <div class="placeholder-img-s w-full h-full rounded-2xl shadow-2xl"></div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="footer w-full bg-white shadow-inner py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end">
            <a href="#" class="group">
                <p class="text-gray-700 text-sm font-jost px-3 py-1 rounded-lg group-hover:bg-gray-900 group-hover:text-white transition duration-150">
                    Designed By Shahriar Khan
                </p>
            </a>
        </div>
    </footer>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('menu-toggle-button');
            const menu = document.getElementById('mobile-menu');
            
            if (button && menu) {
                button.addEventListener('click', () => {
                    // Toggles the 'hidden' class on the mobile menu
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>

</body>
</html>
