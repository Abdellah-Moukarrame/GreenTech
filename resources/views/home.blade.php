<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech Solutions - Catalogue Écologique</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap');

        :root {
            --forest-dark: #1a4d2e;
            --forest-mid: #2d6a4f;
            --sage: #52b788;
            --mint: #74c69d;
            --cream: #faf8f3;
            --earth: #8b7355;
            --tech-blue: #4a90e2;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #faf8f3 0%, #f1f8f4 100%);
        }

        .heading-font {
            font-family: 'Playfair Display', serif;
        }

        /* Organic shapes background */
        .organic-bg {
            position: relative;
            overflow: hidden;
        }

        .organic-bg::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(116, 198, 157, 0.15) 0%, transparent 70%);
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            top: -200px;
            right: -200px;
            animation: morph 20s ease-in-out infinite;
        }

        .organic-bg::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(82, 183, 136, 0.1) 0%, transparent 70%);
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            bottom: -100px;
            left: -100px;
            animation: morph 15s ease-in-out infinite reverse;
        }

        @keyframes morph {

            0%,
            100% {
                border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            }

            25% {
                border-radius: 60% 40% 50% 50% / 30% 60% 40% 70%;
            }

            50% {
                border-radius: 50% 50% 30% 70% / 50% 40% 60% 40%;
            }

            75% {
                border-radius: 70% 30% 40% 60% / 70% 50% 30% 50%;
            }
        }

        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Tech grid overlay */
        .tech-grid {
            background-image:
                linear-gradient(rgba(74, 144, 226, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(74, 144, 226, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Leaf accent */
        .leaf-accent {
            position: relative;
        }

        .leaf-accent::before {
            content: '🌿';
            position: absolute;
            font-size: 3rem;
            opacity: 0.1;
            top: -20px;
            right: -20px;
            transform: rotate(25deg);
        }

        /* Product card hover effect */
        .product-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(82, 183, 136, 0.1), transparent);
            transition: left 0.5s;
        }

        .product-card:hover::before {
            left: 100%;
        }

        .product-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(45, 106, 79, 0.15);
        }

        /* Category button effects */
        .category-btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .category-btn::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--sage);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .category-btn:hover::after,
        .category-btn.active::after {
            width: 80%;
        }

        /* Search bar glow */
        .search-glow:focus {
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.2);
        }

        /* Floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }

        /* Bio badge */
        .bio-badge {
            background: linear-gradient(135deg, #52b788 0%, #2d6a4f 100%);
            box-shadow: 0 4px 15px rgba(82, 183, 136, 0.3);
        }

        /* Pulse effect */
        @keyframes pulse-green {

            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(82, 183, 136, 0.7);
            }

            50% {
                box-shadow: 0 0 0 10px rgba(82, 183, 136, 0);
            }
        }

        .pulse {
            animation: pulse-green 2s infinite;
        }
    </style>
</head>

<body class="antialiased">

    <!-- HEADER -->
    <header class="glass sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center transform rotate-6 shadow-lg">
                    <span class="text-white text-xl font-bold transform -rotate-6">G</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-forest-dark heading-font">GreenTech</h1>
                    <p class="text-xs text-gray-500">Solutions Durables</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative">
                    <input type="text" placeholder="Rechercher un produit..."
                        class="search-glow border border-gray-200 rounded-2xl pl-10 pr-4 py-2.5 w-72 focus:outline-none focus:border-sage transition-all text-sm bg-white/80">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>

                <a href="/login"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-200 hover:border-sage hover:bg-mint/10 transition-all text-sm font-medium text-gray-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Admin
                </a>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section class="organic-bg relative py-24 tech-grid overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 backdrop-blur-sm border border-sage/20 mb-6">
                    <span class="w-2 h-2 bg-sage rounded-full pulse"></span>
                    <span class="text-sm font-medium text-forest-mid">Nouveau : Collection Printemps 2026</span>
                </div>

                <h2 class="text-6xl font-bold mb-6 text-forest-dark heading-font leading-tight">
                    Catalogue Écologique
                    <span class="text-sage block">& Durable</span>
                </h2>

                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Découvrez nos plantes, graines et outils respectueux de l'environnement.
                    Une technologie au service de la nature pour un avenir plus vert.
                </p>

                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#catalogue"
                        class="group flex items-center gap-2 bg-white text-forest-mid px-8 py-4 rounded-2xl font-semibold hover:shadow-xl hover:scale-105 transition-all">
                        Voir le catalogue
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <a href="#about"
                        class="flex items-center gap-2 bg-white text-forest-mid px-8 py-4 rounded-2xl font-semibold border-2 border-forest-mid/20 hover:border-sage hover:bg-mint/10 transition-all">
                        Notre mission
                    </a>
                </div>
            </div>

            <!-- Floating elements -->
            <div class="absolute top-20 left-10 float-animation opacity-20">
                <span class="text-6xl">🌱</span>
            </div>
            <div class="absolute bottom-20 right-20 float-animation opacity-20" style="animation-delay: 1s;">
                <span class="text-6xl">🍃</span>
            </div>
        </div>
    </section>

    <!-- STATS SECTION -->
    <section class="max-w-7xl mx-auto px-6 -mt-12 relative z-20">
        <div class="glass rounded-3xl shadow-xl p-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-sage mb-2">500+</div>
                    <div class="text-gray-600 font-medium">Produits éco-responsables</div>
                </div>
                <div class="text-center border-x border-gray-200">
                    <div class="text-4xl font-bold text-sage mb-2">98%</div>
                    <div class="text-gray-600 font-medium">Satisfaction client</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-sage mb-2">CO₂ -40%</div>
                    <div class="text-gray-600 font-medium">Réduction d'empreinte</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIES FILTER (SELECT) -->
    <section class="max-w-7xl mx-auto px-6 mt-16">
        <div class="flex justify-center">
            <select
                class="w-full max-w-xs px-5 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-sage focus:border-sage">

                <option value="all">Tous les produits</option>
                @foreach ($categories as $category)
                    <option value="all">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </section>


    <!-- CATALOGUE -->
    <section id="catalogue" class="max-w-7xl mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h3 class="text-4xl font-bold mb-4 text-forest-dark heading-font">
                Nos Produits
            </h3>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Chaque produit est soigneusement sélectionné pour son impact environnemental positif
                et sa qualité exceptionnelle.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- PRODUCT CARD 1 -->
            @foreach ($products as $product)
                <div class="product-card bg-white rounded-3xl shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8?w=400&h=300&fit=crop"
                            class="w-full h-56 object-cover" alt="Plante Verte">
                        <div class="absolute top-4 left-4">
                            <span class="bio-badge text-white text-xs font-semibold px-3 py-1.5 rounded-full">
                                🌱 Bio
                            </span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button
                                class="w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white transition-all shadow-lg">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h4 class="font-semibold text-xl text-gray-800 mb-1">{{ $product->name }}</h4>
                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <span class="w-2 h-2 bg-mint rounded-full"></span>
                                    Plantes d'intérieur
                                </p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-sage">{{ $product->price }}</div>
                            </div>
                        </div>

                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            {{ $product->description }}
                        </p>

                        <div class="flex items-center gap-2 mb-4 text-xs text-gray-500">
                            <span class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                4.8
                            </span>
                            <span>•</span>
                            <span>En stock</span>
                            <span>•</span>
                            <span>Livraison 48h</span>
                        </div>

                        <a href="/product/1"
                            class="block w-full text-center bg-gradient-to-r from-forest-mid to-sage text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg hover:scale-105 transition-all">
                            Voir les détails
                        </a>
                    </div>
                </div>
            @endforeach




        </div>

        <div class="text-center mt-12">
            <button
                class="px-8 py-4 border-2 border-sage text-sage font-semibold rounded-2xl hover:bg-sage hover:text-white transition-all">
                Charger plus de produits
            </button>
        </div>
    </section>

    <!-- NEWSLETTER SECTION -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="glass rounded-3xl p-12 text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-10 left-10 text-6xl">🌿</div>
                <div class="absolute bottom-10 right-10 text-6xl">🍃</div>
                <div class="absolute top-1/2 left-1/4 text-4xl">🌱</div>
            </div>

            <div class="relative z-10">
                <h3 class="text-3xl font-bold text-forest-dark mb-4 heading-font">
                    Restez connecté avec la nature
                </h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    Inscrivez-vous à notre newsletter pour recevoir nos conseils de jardinage,
                    nos nouveautés et nos offres exclusives.
                </p>

                <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="votre@email.com"
                        class="flex-1 px-6 py-4 rounded-2xl border border-gray-200 focus:outline-none focus:border-sage focus:ring-2 focus:ring-sage/20 transition-all">
                    <button type="submit"
                        class="bg-green from-forest-mid to-sage text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-xl hover:scale-105 transition-all whitespace-nowrap">
                        S'inscrire
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-forest-dark text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-sage rounded-xl flex items-center justify-center">
                            <span class="text-white text-xl font-bold">G</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold heading-font">GreenTech</h3>
                            <p class="text-xs text-mint">Solutions Durables</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-300 mb-4">
                        Nous cultivons un avenir plus vert grâce à la technologie et l'innovation durable.
                    </p>
                    <div class="flex gap-3">
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-sage transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-sage transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center hover:bg-sage transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">Produits</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-mint transition-colors">Plantes d'intérieur</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Graines bio</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Outils de jardinage</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Nouveautés</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">À propos</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-mint transition-colors">Notre mission</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Engagement écologique</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Blog & Conseils</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Carrières</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold text-lg mb-4">Support</h4>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="#" class="hover:text-mint transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Livraison</a></li>
                        <li><a href="#" class="hover:text-mint transition-colors">Retours</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-300">
                    © 2026 GreenTech Solutions – Tous droits réservés
                </p>
                <div class="flex gap-6 text-sm text-gray-300">
                    <a href="#" class="hover:text-mint transition-colors">Mentions légales</a>
                    <a href="#" class="hover:text-mint transition-colors">Confidentialité</a>
                    <a href="#" class="hover:text-mint transition-colors">CGV</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
