<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech - Accueil</title>
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

        .hero-section {
            background: linear-gradient(135deg, var(--forest-dark) 0%, var(--forest-mid) 100%);
            border-radius: 2rem;
            padding: 4rem 2rem;
            margin-bottom: 3rem;
            color: white;
        }

        .category-badge {
            background: rgba(82, 183, 136, 0.1);
            color: var(--forest-dark);
            padding: 0.5rem 1.2rem;
            border-radius: 999px;
            font-size: 0.875rem;
            font-weight: 600;
            transition: 0.3s;
            border: 2px solid transparent;
        }

        .category-badge:hover {
            background: var(--mint);
            color: white;
            border-color: var(--mint);
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
                    <input type="text" placeholder="Rechercher une plante..."
                        class="bg-transparent ml-3 outline-none text-sm w-full">
                </div>

                <!-- Right Side: Profile & Logout -->
                <div class="flex items-center gap-4">
                    <!-- Favorites Icon -->
                    <a href="/favorites" class="relative">
                        <svg class="w-6 h-6 text-gray-600 hover:text-red-500 transition" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                        <span
                            class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ count(($favorites)->where('user_id',Auth::user()->id)) }}</span>
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
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item text-red-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">

        <!-- Hero Section -->
        <section class="hero-section text-center">
            <h2 class="text-4xl md:text-5xl font-bold heading-font mb-4">
                Bienvenue dans votre jardin 🌱
            </h2>
            <p class="text-lg text-green-100 mb-6 max-w-2xl mx-auto">
                Découvrez notre collection de plantes soigneusement sélectionnées pour embellir votre espace
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <button class="category-badge">🌵 Plantes d'intérieur</button>
                <button class="category-badge">🌸 Plantes fleuries</button>
                <button class="category-badge">🌿 Plantes aromatiques</button>
                <button class="category-badge">🌳 Plantes d'extérieur</button>
            </div>
        </section>

        <!-- All Products Section -->
        <section>
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-2xl font-bold heading-font text-gray-800">Toutes nos plantes</h3>
                    <p class="text-gray-500">Explorez notre collection complète</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Additional products (without favorite) -->
                @foreach ($products as $product)
                    <div class="product-card group">
                        <div class="relative overflow-hidden bg-gray-100 h-64">
                            <img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8?w=500&h=500&fit=crop"
                                alt="Cactus"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            <button
                                class="favorite-btn absolute top-4 right-4 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 mb-1">{{ $product->name }}</h4>
                            @foreach ($categories as $category)
                                @if ($product->category_id == $category->id)
                                    <p class="text-sm text-gray-500 mb-3">{{ $category->name }}</p>
                                @endif
                            @endforeach

                            <div class="flex justify-between items-center">
                                <span class="text-2xl font-bold text-green-600">{{ $product->price }} DH</span>
                                <form action="" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition">
                                        Ajouter
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20 py-12">
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
