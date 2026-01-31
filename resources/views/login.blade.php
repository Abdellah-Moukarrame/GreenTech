<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin - GreenTech Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --forest-dark: #1a4d2e;
            --forest-mid: #2d6a4f;
            --sage: #52b788;
            --mint: #74c69d;
            --cream: #faf8f3;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #faf8f3 0%, #f1f8f4 100%);
            min-height: 100vh;
        }

        .heading-font {
            font-family: 'Playfair Display', serif;
        }

        /* Animated background */
        .login-bg {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .login-bg::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(82, 183, 136, 0.12) 0%, transparent 70%);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            top: -300px;
            right: -200px;
            animation: morph 25s ease-in-out infinite;
        }

        .login-bg::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(116, 198, 157, 0.08) 0%, transparent 70%);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            bottom: -200px;
            left: -150px;
            animation: morph 20s ease-in-out infinite reverse;
        }

        @keyframes morph {
            0%, 100% {
                border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
                transform: rotate(0deg);
            }
            25% {
                border-radius: 60% 40% 50% 50% / 30% 60% 40% 70%;
                transform: rotate(90deg);
            }
            50% {
                border-radius: 50% 50% 30% 70% / 50% 40% 60% 40%;
                transform: rotate(180deg);
            }
            75% {
                border-radius: 70% 30% 40% 60% / 70% 50% 30% 50%;
                transform: rotate(270deg);
            }
        }

        /* Tech grid overlay */
        .tech-grid {
            background-image:
                linear-gradient(rgba(74, 144, 226, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(74, 144, 226, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        /* Glass morphism */
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Input focus glow */
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.15);
            border-color: var(--sage);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        .float-animation {
            animation: float 4s ease-in-out infinite;
        }

        /* Pulse effect */
        @keyframes pulse-green {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(82, 183, 136, 0.7);
            }
            50% {
                box-shadow: 0 0 0 15px rgba(82, 183, 136, 0);
            }
        }

        .pulse {
            animation: pulse-green 2s infinite;
        }

        /* Leaf decorations */
        .leaf-decoration {
            position: absolute;
            opacity: 0.08;
            pointer-events: none;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, var(--forest-mid) 0%, var(--sage) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Hover effects */
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 40px rgba(45, 106, 79, 0.3);
        }

        .logo-rotate:hover .logo-inner {
            transform: rotate(12deg);
        }

        .logo-inner {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="antialiased">

<!-- Animated Background -->
<div class="login-bg tech-grid"></div>

<!-- Floating leaf decorations -->
<div class="leaf-decoration text-9xl top-20 left-10 float-animation">🌿</div>
<div class="leaf-decoration text-7xl top-1/3 right-20 float-animation" style="animation-delay: 1s;">🍃</div>
<div class="leaf-decoration text-8xl bottom-32 left-1/4 float-animation" style="animation-delay: 2s;">🌱</div>

<!-- Main Container -->
<div class="relative z-10 min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-6xl flex items-center gap-12">

        <!-- Left Side - Branding & Info -->
        <div class="hidden lg:flex flex-col flex-1">
            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 mb-12 logo-rotate group">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center transform rotate-6 shadow-xl">
                    <span class="logo-inner text-white text-2xl font-bold transform -rotate-6">G</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 heading-font" style="color: var(--forest-dark);">GreenTech</h1>
                    <p class="text-sm text-gray-500">Solutions Durables</p>
                </div>
            </a>

            <!-- Hero Text -->
            <div class="mb-12">
                <h2 class="text-5xl font-bold mb-6 heading-font leading-tight" style="color: var(--forest-dark);">
                    Cultivons ensemble
                    <span class="gradient-text block">un avenir vert</span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    Accédez à votre espace administrateur pour gérer votre catalogue écologique et suivre l'impact environnemental de votre activité.
                </p>

                <!-- Features -->
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Gestion Simplifiée</h3>
                            <p class="text-sm text-gray-600">Interface intuitive pour gérer vos produits et commandes</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Analytics en Temps Réel</h3>
                            <p class="text-sm text-gray-600">Suivez vos performances et votre impact écologique</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Sécurité Maximale</h3>
                            <p class="text-sm text-gray-600">Vos données sont protégées avec un cryptage de niveau entreprise</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">500+</div>
                    <div class="text-sm text-gray-600">Produits</div>
                </div>
                <div class="text-center border-x border-gray-200">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">98%</div>
                    <div class="text-sm text-gray-600">Satisfaction</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">-40%</div>
                    <div class="text-sm text-gray-600">CO₂</div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="flex-1 max-w-md w-full">
            <div class="glass rounded-3xl shadow-2xl p-10">

                <!-- Form Header -->
                <div class="text-center mb-8">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden flex justify-center mb-6">
                        <a href="/" class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center transform rotate-6 shadow-xl">
                                <span class="text-white text-xl font-bold transform -rotate-6">G</span>
                            </div>
                            <div>
                                <h1 class="text-2xl font-bold heading-font" style="color: var(--forest-dark);">GreenTech</h1>
                            </div>
                        </a>
                    </div>

                    <h2 class="text-3xl font-bold text-gray-800 mb-2 heading-font">Bon retour !</h2>
                    <p class="text-gray-600">Connectez-vous à votre espace admin</p>
                </div>

                <!-- Login Form -->
                <form class="space-y-6">

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Adresse email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input
                                type="email"
                                id="email"
                                class="input-glow w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all bg-white text-gray-800 placeholder-gray-400"
                                placeholder="admin@greentech.com"
                            >
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Mot de passe
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input
                                type="password"
                                id="password"
                                class="input-glow w-full pl-12 pr-12 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all bg-white text-gray-800 placeholder-gray-400"
                                placeholder="••••••••"
                            >
                            <button
                                type="button"
                                class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 transition-colors" style="color: #9ca3af;"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="btn-primary w-full text-white font-semibold py-4 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center gap-2"
                        style="background: linear-gradient(to right, var(--forest-mid), var(--sage));"
                    >
                        Se connecter
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                </div>
            </div>

            <!-- Back to Home -->
            <div class="mt-6 text-center">
                <a href="/" class="inline-flex items-center gap-2 text-sm text-gray-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour à l'accueil
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
