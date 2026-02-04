<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - GreenTech Solutions</title>
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

        /* Card styles */
        .stat-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(82, 183, 136, 0.1);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(45, 106, 79, 0.15);
        }

        /* Table styles */
        .table-container {
            background: white;
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, var(--forest-mid) 0%, var(--sage) 100%);
        }

        thead th {
            color: white;
            font-weight: 600;
            text-align: left;
            padding: 1rem 1.5rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.2s ease;
        }

        tbody tr:hover {
            background: rgba(82, 183, 136, 0.05);
        }

        tbody td {
            padding: 1rem 1.5rem;
            color: #374151;
        }

        /* Button styles */
        .btn-primary {
            background: linear-gradient(to right, var(--forest-mid), var(--sage));
            color: white;
            padding: 0.75rem 1.5rem;
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

        .btn-icon {
            width: 36px;
            height: 36px;
            border-radius: 0.5rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1e40af;
        }

        .btn-edit:hover {
            background: #3b82f6;
            color: white;
            transform: scale(1.1);
        }

        .btn-delete {
            background: #fee2e2;
            color: #991b1b;
        }

        .btn-delete:hover {
            background: #ef4444;
            color: white;
            transform: scale(1.1);
        }

        .btn-view {
            background: #e0e7ff;
            color: #4338ca;
        }

        .btn-view:hover {
            background: #6366f1;
            color: white;
            transform: scale(1.1);
        }

        /* Badge styles */
        .badge {
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Product image thumbnail */
        .product-thumb {
            width: 50px;
            height: 50px;
            border-radius: 0.5rem;
            object-fit: cover;
            border: 2px solid #f3f4f6;
        }

        /* Gradient icon backgrounds */
        .icon-gradient-blue {
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
        }

        .icon-gradient-green {
            background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);
        }

        .icon-gradient-purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
        }

        .icon-gradient-orange {
            background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: #ef4444;
            color: white;
            font-size: 0.625rem;
            font-weight: 700;
            padding: 0.125rem 0.375rem;
            border-radius: 9999px;
            min-width: 18px;
            text-align: center;
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
                <a href="/admin/dashboard"
                    class="sidebar-link active flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="font-medium">Tableau de bord</span>
                </a>

                <a href="/admin/products" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
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
        <header class="bg-white rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 heading-font">Tableau de bord</h1>
                    <p class="text-gray-500 mt-1">Bienvenue sur votre espace de gestion</p>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <button class="relative p-3 rounded-xl bg-gray-100 hover:bg-gray-200 transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span class="notification-badge">3</span>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-800">Admin User</p>
                            <p class="text-xs text-gray-500">Administrateur</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=52b788&color=fff"
                            class="w-10 h-10 rounded-xl" alt="Profile">
                    </div>
                </div>
            </div>
        </header>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-green flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-green-600 bg-green-100 px-2 py-1 rounded-full">+12%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Total Produits</h3>
                <p class="text-3xl font-bold text-gray-800">524</p>
            </div>

            <!-- Card 2 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-blue flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">+8%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Commandes</h3>
                <p class="text-3xl font-bold text-gray-800">1,248</p>
            </div>

            <!-- Card 3 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-purple flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded-full">+23%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Clients</h3>
                <p class="text-3xl font-bold text-gray-800">3,842</p>
            </div>

            <!-- Card 4 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-orange flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-xs font-semibold text-orange-600 bg-orange-100 px-2 py-1 rounded-full">+18%</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Revenus</h3>
                <p class="text-3xl font-bold text-gray-800">247K DH</p>
            </div>
        </div>

        <!-- Products Section -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <!-- Section Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 heading-font">Gestion des Produits</h2>
                    <p class="text-gray-500 text-sm mt-1">Gérez votre catalogue de produits écologiques</p>
                </div>

                <a href="/admin/create" class="btn-primary">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                        </path>
                    </svg>
                    Ajouter un produit
                </a>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="flex items-center gap-3">
                                        <img src="https://images.unsplash.com/photo-1463936575829-25148e1db1b8?w=100&h=100&fit=crop"
                                            class="product-thumb" alt="Product">
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($categories as $category)
                                        @if ($category->id == $product->category_id)
                                            <span class="text-sm text-gray-600">{{ $category->name }}</span>
                                        @endif
                                    @endforeach

                                </td>
                                <td>
                                    <span class="font-semibold text-gray-800">{{ $product->price . 'Dh' }} </span>
                                </td>
                                <td>
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="/admin/show/{{ $product->id }}" class="btn-icon btn-view"
                                            title="Voir">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="/admin/update/{{ $product->id }}" class="btn-icon btn-edit"
                                            title="Modifier">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form action="{{route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn-icon btn-delete" title="Supprimer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                {{ $products->links() }}

            </div>
        </div>
    </main>

</body>

</html>
