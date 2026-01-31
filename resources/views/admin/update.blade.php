<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Produit - GreenTech Solutions</title>
    @vite('resources/css/app.css')
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
        }

        .heading-font {
            font-family: 'Playfair Display', serif;
        }

        /* Sidebar styles */
        .sidebar {
            background: linear-gradient(180deg, var(--forest-dark) 0%, var(--forest-mid) 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            z-index: 40;
        }

        .sidebar-link {
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: var(--mint);
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        /* Form styles */
        .form-container {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* Button styles */
        .btn-primary {
            background: linear-gradient(to right, var(--forest-mid), var(--sage));
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(45, 106, 79, 0.3);
        }

        .btn-secondary {
            background: white;
            color: var(--forest-mid);
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 2px solid #e5e7eb;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary:hover {
            border-color: var(--sage);
            color: var(--sage);
        }

        /* Current image preview */
        .current-image {
            width: 100%;
            max-width: 300px;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* File upload */
        .file-upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 0.75rem;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #f9fafb;
        }

        .file-upload-area:hover {
            border-color: var(--sage);
            background: rgba(82, 183, 136, 0.05);
        }

        /* Icon gradients */
        .icon-gradient-green {
            background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);
        }
    </style>
</head>

<body class="antialiased">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center transform rotate-6 shadow-xl">
                    <span class="text-2xl font-bold transform -rotate-6" style="color: var(--forest-dark);">G</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white heading-font">GreenTech</h1>
                    <p class="text-xs text-mint">Admin Dashboard</p>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="/admin/dashboard" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="font-medium">Tableau de bord</span>
                </a>

                <a href="/admin/products"
                    class="sidebar-link active flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium">Produits</span>
                </a>

                <a href="/admin/orders" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="font-medium">Commandes</span>
                </a>

                <a href="/admin/customers" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <span class="font-medium">Clients</span>
                </a>

                <a href="/admin/categories"
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <span class="font-medium">Catégories</span>
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-white/10">
                <a href="/" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="font-medium">Retour au site</span>
                </a>
                <a href="/logout" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="font-medium">Déconnexion</span>
                </a>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content p-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center gap-4 mb-4">
                <a href="/admin/dashboard" class="p-2 rounded-xl bg-white hover:bg-gray-50 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                </a>
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 heading-font">Modifier le Produit</h1>
                    <p class="text-gray-500 mt-1">Mettez à jour les informations du produit</p>
                </div>
            </div>
        </div>

        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information -->
                    <div class="form-container">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg icon-gradient-green flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Informations de base
                        </h2>

                        <div class="space-y-4">
                            <div>
                                <label for="name" class="form-label">Nom du produit *</label>
                                <input type="text" id="name" name="name" class="form-input"
                                    value="{{ $product->name }}" required>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                {{-- <div>
                                <label for="sku" class="form-label">SKU *</label>
                                <input type="text" id="sku" name="sku" class="form-input" value="PLN-001" required>
                            </div> --}}

                                <div>
                                    <label for="category" class="form-label">Catégorie *</label>
                                    <select id="category" name="category" class="form-select" required>
                                        <option value="">Sélectionner...</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $product->category_id)
                                                <option value="{{$category->id}}" selected>{{ $category->name }}</option>
                                            @endif
                                            <option value={{$category->id}}>{{ $category->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div>
                                <label for="description" class="form-label">Description *</label>
                                <textarea id="description" name="description" class="form-textarea" required>{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing & Stock -->
                    <div class="form-container">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg icon-gradient-green flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            Prix
                        </h2>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="form-label">Prix (DH) *</label>
                                <input type="number" id="price" name="price" class="form-input"
                                    value="{{ $product->price }}" step="0.01" required>
                            </div>
                        </div>
                    </div>

                    <!-- Product Image -->
                    <div class="form-container">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg icon-gradient-green flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            Image du produit
                        </h2>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-700 mb-3">Image actuelle</p>
                            <img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8?w=400&h=400&fit=crop"
                                alt="Current product" class="current-image">
                        </div>

                        <div class="file-upload-area">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <input type="file" id="image" name="image" class="hidden" accept="image/*">
                            <label for="image" class="cursor-pointer">
                                <span class="text-sm font-semibold" style="color: var(--sage);">Cliquez pour uploader
                                    une nouvelle image</span>
                                <span class="text-sm text-gray-500"> ou glissez-déposez</span>
                            </label>
                            <p class="text-xs text-gray-500 mt-2">PNG, JPG jusqu'à 10MB (Optionnel)</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Status -->
                    {{-- <div class="form-container">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Statut</h3>

                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="status" value="en_stock" class="w-4 h-4" style="accent-color: var(--sage);" checked>
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">En stock</p>
                                <p class="text-xs text-gray-500">Produit disponible</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="status" value="stock_faible" class="w-4 h-4" style="accent-color: var(--sage);">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Stock faible</p>
                                <p class="text-xs text-gray-500">Quantité limitée</p>
                            </div>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="radio" name="status" value="rupture" class="w-4 h-4" style="accent-color: var(--sage);">
                            <div class="flex-1">
                                <p class="font-medium text-gray-800">Rupture</p>
                                <p class="text-xs text-gray-500">Non disponible</p>
                            </div>
                        </label>
                    </div>
                </div> --}}

                    <!-- Features -->
                    {{-- <div class="form-container">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Caractéristiques</h3>

                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="bio" class="w-4 h-4 rounded" style="accent-color: var(--sage);" checked>
                            <span class="text-sm text-gray-700">🌱 Produit Bio</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="local" class="w-4 h-4 rounded" style="accent-color: var(--sage);" checked>
                            <span class="text-sm text-gray-700">📍 Production Locale</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="eco" class="w-4 h-4 rounded" style="accent-color: var(--sage);" checked>
                            <span class="text-sm text-gray-700">♻️ Éco-responsable</span>
                        </label>

                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="checkbox" name="featured" class="w-4 h-4 rounded" style="accent-color: var(--sage);" checked>
                            <span class="text-sm text-gray-700">⭐ Produit vedette</span>
                        </label>
                    </div>
                </div> --}}

                    <!-- Actions -->
                    <div class="form-container">
                        <div class="space-y-3">
                            <button type="submit" class="btn-primary w-full justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Enregistrer les modifications
                            </button>

                            <a href="/admin/dashboard" class="btn-secondary w-full justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Annuler
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>

</body>

</html>
