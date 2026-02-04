<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Admin - GreenTech Solutions</title>
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

        .tech-grid {
            background-image:
                linear-gradient(rgba(74, 144, 226, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(74, 144, 226, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.15);
            border-color: var(--sage);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }

        .float-animation {
            animation: float 4s ease-in-out infinite;
        }

        .leaf-decoration {
            position: absolute;
            opacity: 0.08;
            pointer-events: none;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--forest-mid) 0%, var(--sage) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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

        .divider-label {
            position: relative;
            z-index: 1;
            background: white;
            padding: 0 16px;
            font-size: 0.82rem;
            color: #9ca3af;
        }

        .select-styled {
            appearance: none;
            -webkit-appearance: none;
            background-color: white;
            cursor: pointer;
        }

        .custom-check {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            min-width: 20px;
            border: 2px solid #d1d5db;
            border-radius: 6px;
            background: white;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            margin-top: 2px;
        }

        .custom-check:checked {
            background: linear-gradient(135deg, var(--forest-mid), var(--sage));
            border-color: transparent;
        }

        .custom-check:checked::after {
            content: '';
            position: absolute;
            left: 5px;
            top: 2px;
            width: 6px;
            height: 10px;
            border: solid white;
            border-width: 0 2.5px 2.5px 0;
            transform: rotate(45deg);
        }

        .custom-check:focus {
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.2);
            outline: none;
        }

        .link-green {
            color: var(--forest-mid);
            font-weight: 600;
            transition: color 0.2s;
        }
        .link-green:hover {
            color: var(--sage);
        }

        .back-link {
            color: #4b5563;
            transition: color 0.2s;
        }
        .back-link:hover {
            color: var(--forest-mid);
        }
        .back-link:hover svg {
            transform: translateX(-3px);
        }
        .back-link svg {
            transition: transform 0.2s;
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

        <!-- Left Side – Branding -->
        <div class="hidden lg:flex flex-col flex-1">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3 mb-12 logo-rotate group">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center transform rotate-6 shadow-xl">
                    <span class="logo-inner text-white text-2xl font-bold transform -rotate-6">G</span>
                </div>
                <div>
                    <h1 class="text-3xl font-bold heading-font" style="color: var(--forest-dark);">GreenTech</h1>
                    <p class="text-sm text-gray-500">Solutions Durables</p>
                </div>
            </a>

            <!-- Hero -->
            <div class="mb-12">
                <h2 class="text-5xl font-bold mb-6 heading-font leading-tight" style="color: var(--forest-dark);">
                    Rejoignez notre
                    <span class="gradient-text block">mission verte</span>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed mb-8">
                    Créez votre compte administrateur et commencez à contribuer à un avenir plus durable dès aujourd'hui.
                </p>

                <!-- Features -->
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Compte Admin Sécurisé</h3>
                            <p class="text-sm text-gray-600">Accès personnel avec des permissions personnalisées</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Tableau de Bord Complet</h3>
                            <p class="text-sm text-gray-600">Visualisez et pilotez votre impact environnemental</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg" style="background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-1">Onboarding Rapide</h3>
                            <p class="text-sm text-gray-600">Opérationnel en quelques minutes avec notre guide</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">120+</div>
                    <div class="text-sm text-gray-600">Admins</div>
                </div>
                <div class="text-center border-x border-gray-200">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">24/7</div>
                    <div class="text-sm text-gray-600">Support</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold mb-1" style="color: var(--sage);">🌍</div>
                    <div class="text-sm text-gray-600">Mondial</div>
                </div>
            </div>
        </div>

        <!-- Right Side – Register Form -->
        <div class="flex-1 max-w-md w-full">
            <div class="glass rounded-3xl shadow-2xl p-10">

                <!-- Header -->
                <div class="text-center mb-8">
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

                    <h2 class="text-3xl font-bold text-gray-800 mb-2 heading-font">Créer un compte</h2>
                    <p class="text-gray-500 text-sm">Remplissez les informations ci-dessous</p>
                </div>

                <!-- Form -->
                <form class="space-y-5" action="{{route('register.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <!-- Nom complet -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nom complet</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input type="text" id="name" name="name"
                                class="input-glow w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all bg-white text-gray-800 placeholder-gray-400"
                                placeholder="Jean Dupont">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                            <input type="email" id="email" name="email"
                                class="input-glow w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all bg-white text-gray-800 placeholder-gray-400"
                                placeholder="jean@greentech.com">
                        </div>
                    </div>

                    <!-- Mot de passe -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password"
                                class="input-glow w-full pl-12 pr-4 py-3.5 border border-gray-200 rounded-xl focus:outline-none transition-all bg-white text-gray-800 placeholder-gray-400"
                                placeholder="••••••••">
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Minimum 8 caractères avec une lettre et un chiffre</p>
                    </div>

                    <!-- Bouton -->
                    <button type="submit"
                        class="btn-primary w-full text-white font-semibold py-4 rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center gap-2"
                        style="background: linear-gradient(to right, var(--forest-mid), var(--sage));">
                        Créer mon compte
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </button>
                </form>

                <!-- Séparateur -->
                <div class="relative my-7">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="divider-label">ou</span>
                    </div>
                </div>

                <!-- Déjà un compte -->
                <p class="text-center text-sm text-gray-500">
                    Vous avez déjà un compte ?
                    <a href="login" class="link-green ml-1">Se connecter</a>
                </p>
            </div>

            <!-- Retour accueil -->
            <div class="mt-6 text-center">
                <a href="/" class="back-link inline-flex items-center gap-2 text-sm">
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
