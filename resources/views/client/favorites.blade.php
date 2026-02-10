<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes Favoris - GreenTech</title>
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

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .product-card {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 30px rgba(42, 157, 143, 0.15);
        }

        .favorite-btn {
            transition: all 0.3s ease;
        }

        .favorite-btn:hover {
            transform: scale(1.1);
        }

        .favorite-btn.active {
            color: #ef4444;
        }

        .remove-btn {
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-card:hover .remove-btn {
            opacity: 1;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            margin-top: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 50;
        }

        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            transition: 0.2s;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-item:hover {
            background: #f0fdf4;
        }

        .badge {
            background: var(--mint);
            color: white;
            padding: 0.25rem 0.6rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .filter-btn {
            padding: 0.5rem 1.2rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: 0.3s;
            border: 2px solid #e5e7eb;
            background: white;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--mint);
            color: white;
            border-color: var(--mint);
        }

        .stock-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: rgba(239, 68, 68, 0.9);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .stock-badge.in-stock {
            background: rgba(34, 197, 94, 0.9);
        }

        /* Empty State Styles */
        .empty-state-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
            padding: 3rem 1.5rem;
            width: 100%;
        }

        .empty-state-content {
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #f8fffe 100%);
            border-radius: 2.5rem;
            padding: 4rem 3rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08), 0 0 1px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(82, 183, 136, 0.1);
            overflow: hidden;
        }

        /* Heart Icon Animation */
        .empty-heart-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        .empty-heart-icon {
            width: 120px;
            height: 120px;
            stroke: #e5e7eb;
            stroke-width: 1.5;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.1));
            transition: all 0.3s ease;
        }

        .empty-heart-wrapper:hover .empty-heart-icon {
            stroke: #fca5a5;
            transform: scale(1.1);
        }

        .heart-pulse {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border: 2px solid rgba(239, 68, 68, 0.3);
            border-radius: 50%;
            animation: pulse 2s ease-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: translate(-50%, -50%) scale(0.8);
                opacity: 1;
            }

            100% {
                transform: translate(-50%, -50%) scale(1.8);
                opacity: 0;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        /* Text Styles */
        .empty-state-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1rem;
            line-height: 1.2;
            background: linear-gradient(135deg, #1a4d2e 0%, #2d6a4f 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .empty-state-description {
            font-size: 1.125rem;
            color: #6b7280;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        /* CTA Button */
        .empty-state-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, #2d6a4f 0%, #52b788 100%);
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 9999px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(45, 106, 79, 0.3);
            position: relative;
            overflow: hidden;
        }

        .empty-state-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .empty-state-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(45, 106, 79, 0.4);
        }

        .empty-state-button:hover::before {
            left: 100%;
        }

        .empty-state-button:active {
            transform: translateY(-1px);
        }

        /* Floating Leaves Animation */
        .floating-leaves {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .leaf {
            position: absolute;
            font-size: 2rem;
            opacity: 0.15;
            animation: float-leaf 8s ease-in-out infinite;
        }

        .leaf-1 {
            top: 10%;
            left: 10%;
            animation-delay: 0s;
            animation-duration: 7s;
        }

        .leaf-2 {
            top: 60%;
            right: 15%;
            animation-delay: 2s;
            animation-duration: 9s;
        }

        .leaf-3 {
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
            animation-duration: 6s;
        }

        @keyframes float-leaf {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            25% {
                transform: translateY(-20px) rotate(10deg);
            }

            50% {
                transform: translateY(-10px) rotate(-5deg);
            }

            75% {
                transform: translateY(-25px) rotate(15deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .empty-state-content {
                padding: 3rem 2rem;
                border-radius: 2rem;
            }

            .empty-heart-icon {
                width: 90px;
                height: 90px;
            }

            .empty-state-title {
                font-size: 2rem;
            }

            .empty-state-description {
                font-size: 1rem;
            }

            .empty-state-button {
                padding: 0.875rem 2rem;
                font-size: 0.9375rem;
            }
        }

        @media (max-width: 480px) {
            .empty-state-container {
                padding: 2rem 1rem;
            }

            .empty-state-content {
                padding: 2.5rem 1.5rem;
            }

            .empty-heart-icon {
                width: 70px;
                height: 70px;
            }

            .empty-state-title {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-green-600 to-green-700 rounded-xl flex items-center justify-center">
                        <span class="text-white text-xl font-bold">🌿</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold heading-font text-gray-800">GreenTech</h1>
                        <p class="text-xs text-gray-500">Plantes & Jardin</p>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex items-center bg-gray-100 rounded-full px-4 py-2 w-96">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" placeholder="Rechercher dans mes favoris..."
                        class="bg-transparent ml-3 outline-none text-sm w-full">
                </div>

                <!-- Right Side: Profile & Logout -->
                <div class="flex items-center gap-4">
                    <!-- Home Icon -->
                    <a href="/client/dash" class="text-gray-600 hover:text-green-600 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>

                    <!-- Favorites Icon (Active) -->
                    <a href="/favorites" class="relative">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ count($favorites) }}</span>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="dropdown">
                        <button class="flex items-center gap-2 hover:opacity-80 transition">
                            <img src="https://ui-avatars.com/api/?name=Client&background=52b788&color=fff"
                                class="w-10 h-10 rounded-full border-2 border-green-500">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div class="dropdown-menu">
                            <a href="/profile" class="dropdown-item">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Mon Profil</span>
                            </a>
                            <a href="/orders" class="dropdown-item">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                                <span>Mes Commandes</span>
                            </a>
                            <div class="border-t border-gray-100"></div>
                            <a href="/logout" class="dropdown-item text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Déconnexion</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">

        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                </svg>
                <h2 class="text-4xl font-bold heading-font text-gray-800">Mes Plantes Favorites</h2>
            </div>
            <p class="text-gray-600 text-lg">Vous avez <span class="font-bold text-green-600">{{ count($favorites) }}
                    plante</span> dans vos
                favoris</p>
        </div>


        @if (count($favorites) == 0)

            <div class="empty-state-container">
                <div class="empty-state-content">
                    <!-- Animated Heart Icon -->
                    <div class="empty-heart-wrapper">
                        <svg class="empty-heart-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                        <div class="heart-pulse"></div>
                    </div>

                    <!-- Message -->
                    <h3 class="empty-state-title">Aucun favori pour le moment</h3>
                    <p class="empty-state-description">
                        Vous n'avez pas encore ajouté de plantes à vos favoris.<br>
                        Explorez notre collection et sauvegardez vos plantes préférées !
                    </p>

                    <!-- CTA Button -->
                    <a href="client/dash" class="empty-state-button">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Découvrir nos plantes
                    </a>

                    <!-- Decorative Elements -->
                    <div class="floating-leaves">
                        <span class="leaf leaf-1">🌿</span>
                        <span class="leaf leaf-2">🍃</span>
                        <span class="leaf leaf-3">🌱</span>
                    </div>
                </div>
            </div>
        @else
            <!-- Products Grid -->
            @foreach ($favorites as $fav)
                @foreach ($products as $product)
                    @if ($fav->product_id == $product->id)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
                            <!-- Product Cards Here -->
                            <div class="product-card group">
                                <div class="relative overflow-hidden bg-gray-100 h-72">
                                    <img src="https://images.unsplash.com/photo-1509587584298-0f3b3a3a1797?w=500&h=500&fit=crop"
                                        alt="Lavande"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                    <button
                                        class="favorite-btn active absolute top-4 right-4 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                        </svg>
                                    </button>
                                    <button
                                        class="remove-btn absolute top-16 right-4 bg-red-500 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg hover:bg-red-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="p-5">
                                    <div class="flex items-start justify-between mb-2">
                                        <div>

                                            <h4 class="font-bold text-gray-800 text-lg">

                                                {{ $product->name }}

                                            </h4>
                                            <p class="text-sm text-gray-500">Plante aromatique</p>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 mb-4">Ajouté le 30/01/2026</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-2xl font-bold text-green-600">{{ $product->price }} DH</span>
                                        <button
                                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-full text-sm font-semibold transition flex items-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                            Ajouter
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach

            <!-- Action Buttons (Only show when there are favorites) -->
            <div class="flex justify-center gap-4 mb-12">
                <button
                    class="bg-white hover:bg-gray-50 text-gray-700 px-8 py-4 rounded-2xl font-semibold transition shadow-md flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    Ajouter tous au panier
                </button>
                <button
                    class="bg-red-50 hover:bg-red-100 text-red-600 px-8 py-4 rounded-2xl font-semibold transition shadow-md flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    Vider mes favoris
                </button>
            </div>
        @endif

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="mb-6">
                <h2 class="text-2xl font-bold heading-font mb-2">GreenTech</h2>
                <p class="text-gray-400">Votre partenaire pour un jardin magnifique</p>
            </div>
            <p class="text-gray-500 text-sm">&copy; 2026 GreenTech. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>
