<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Permissions - GreenTech Solutions</title>
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
        .info-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(82, 183, 136, 0.1);
        }

        /* Permission card */
        .permission-group {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .permission-group:hover {
            border-color: var(--sage);
            box-shadow: 0 4px 15px rgba(82, 183, 136, 0.1);
        }

        .permission-item {
            padding: 1rem;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .permission-item:hover {
            background: rgba(82, 183, 136, 0.05);
        }

        .permission-item.active {
            background: linear-gradient(135deg, rgba(82, 183, 136, 0.1) 0%, rgba(116, 198, 157, 0.1) 100%);
            border-left: 3px solid var(--sage);
        }

        /* Switch */
        .permission-switch {
            position: relative;
            width: 52px;
            height: 28px;
            background: #d1d5db;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .permission-switch.active {
            background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);
        }

        .permission-switch::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 3px;
            width: 22px;
            height: 22px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .permission-switch.active::after {
            transform: translateX(24px);
        }

        /* Badge styles */
        .badge {
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .badge-admin {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: white;
        }

        .badge-manager {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
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
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(45, 106, 79, 0.3);
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

        /* Stats */
        .stat-box {
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
            border-radius: 0.75rem;
            padding: 1rem;
            border: 1px solid #e5e7eb;
            text-align: center;
        }

        .category-header {
            background: linear-gradient(135deg, var(--forest-mid) 0%, var(--sage) 100%);
            color: white;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            font-weight: 600;
            margin-bottom: 1rem;
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
                    class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
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

                <a href="/admin/users" class="sidebar-link active flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <span class="font-medium">Utilisateurs</span>
                </a>

                <a href="/admin/roles" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    <span class="font-medium">Rôles & Permissions</span>
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
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg w-full text-left">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <span class="font-medium">Déconnexion</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content p-8">
        <!-- Header -->
        <header class="bg-white rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <a href="/admin/users" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <h1 class="text-3xl font-bold text-gray-800 heading-font">Gérer les Permissions</h1>
                    </div>
                    <p class="text-gray-500 mt-1 ml-9">Personnalisez les accès pour cet utilisateur</p>
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

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - User Info -->
            <div class="lg:col-span-1">
                <!-- User Profile Card -->
                <div class="info-card mb-6">
                    <div class="text-center mb-6">
                        <img src="https://ui-avatars.com/api/?name=Marie+Martin&background=2563eb&color=fff&size=128"
                            class="w-24 h-24 rounded-2xl mx-auto mb-4 shadow-lg" alt="User">
                        <h3 class="text-xl font-bold text-gray-800">Marie Martin</h3>
                        <p class="text-sm text-gray-500">marie.martin@greentech.com</p>
                        <span class="badge badge-manager mt-2">Gestionnaire</span>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">ID Utilisateur</span>
                            <span class="text-sm font-semibold text-gray-800">#USR002</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Département</span>
                            <span class="text-sm font-semibold text-gray-800">Ventes</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Membre depuis</span>
                            <span class="text-sm font-semibold text-gray-800">20 Jan 2024</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Dernière connexion</span>
                            <span class="text-sm font-semibold text-gray-800">Il y a 2h</span>
                        </div>
                    </div>
                </div>

                <!-- Permissions Summary -->
                <div class="info-card">
                    <h4 class="font-bold text-gray-800 mb-4">Résumé des Permissions</h4>

                    <div class="grid grid-cols-2 gap-3 mb-4">
                        <div class="stat-box">
                            <p class="text-2xl font-bold text-green-600">12</p>
                            <p class="text-xs text-gray-600">Accordées</p>
                        </div>
                        <div class="stat-box">
                            <p class="text-2xl font-bold text-gray-400">12</p>
                            <p class="text-xs text-gray-600">Disponibles</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <p class="text-xs text-gray-500 mb-2">Permissions du rôle :</p>
                        <div class="flex flex-wrap gap-1">
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">Voir produits</span>
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">Créer produits</span>
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">Modifier produits</span>
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded">+6 autres</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Permissions Management -->
            <div class="lg:col-span-2">
                <form action="/admin/users/2/permissions" method="POST">
                    @csrf

                    <!-- Products Permissions -->
                    <div class="permission-group mb-6">
                        <div class="category-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                <span>Gestion des Produits</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <!-- Permission 1 -->
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Voir les produits</p>
                                        <p class="text-xs text-gray-500">Consulter le catalogue complet</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[view-products]" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Permission 2 -->
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Créer des produits</p>
                                        <p class="text-xs text-gray-500">Ajouter de nouveaux produits</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[create-product]" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Permission 3 -->
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Modifier des produits</p>
                                        <p class="text-xs text-gray-500">Éditer les produits existants</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[edit-product]" value="1">
                                    </div>
                                </div>
                            </div>

                            <!-- Permission 4 -->
                            <div class="permission-item">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Supprimer des produits</p>
                                        <p class="text-xs text-gray-500">Retirer du catalogue</p>
                                    </div>
                                    <div class="permission-switch" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[delete-product]" value="0">
                                    </div>
                                </div>
                            </div>

                            <!-- Permission 5 -->
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Gérer le stock</p>
                                        <p class="text-xs text-gray-500">Modifier les quantités en stock</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[manage-stock]" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Users Permissions -->
                    <div class="permission-group mb-6">
                        <div class="category-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                                <span>Gestion des Utilisateurs</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Voir les utilisateurs</p>
                                        <p class="text-xs text-gray-500">Consulter la liste des utilisateurs</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[view-users]" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="permission-item">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Gérer les utilisateurs</p>
                                        <p class="text-xs text-gray-500">Créer, modifier et supprimer</p>
                                    </div>
                                    <div class="permission-switch" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[manage-users]" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="permission-item">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Attribuer des rôles</p>
                                        <p class="text-xs text-gray-500">Changer les rôles utilisateurs</p>
                                    </div>
                                    <div class="permission-switch" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[assign-roles]" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Analytics & Export Permissions -->
                    <div class="permission-group mb-6">
                        <div class="category-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                    </path>
                                </svg>
                                <span>Rapports & Analytics</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Voir les statistiques</p>
                                        <p class="text-xs text-gray-500">Accès aux rapports et analytics</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[view-analytics]" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Exporter les données</p>
                                        <p class="text-xs text-gray-500">Export Excel/CSV</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[export-data]" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categories Permissions -->
                    <div class="permission-group mb-6">
                        <div class="category-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                    </path>
                                </svg>
                                <span>Gestion des Catégories</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Voir les catégories</p>
                                        <p class="text-xs text-gray-500">Consulter les catégories</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[view-categories]" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="permission-item active">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-gray-800">Gérer les catégories</p>
                                        <p class="text-xs text-gray-500">Créer, modifier et supprimer</p>
                                    </div>
                                    <div class="permission-switch active" onclick="this.classList.toggle('active')">
                                        <input type="hidden" name="permissions[manage-categories]" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button type="submit" class="btn-primary flex-1 justify-center">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>

</html>
