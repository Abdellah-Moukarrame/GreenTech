<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Utilisateur - GreenTech Solutions</title>
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
        .form-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(82, 183, 136, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-size: 0.875rem;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            background: white;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.1);
        }

        /* Checkbox styles */
        .permission-card {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .permission-card:hover {
            border-color: var(--sage);
            background: rgba(82, 183, 136, 0.05);
        }

        .permission-checkbox {
            width: 1.25rem;
            height: 1.25rem;
            border-radius: 0.375rem;
            border: 2px solid #d1d5db;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .permission-checkbox:checked {
            background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);
            border-color: var(--sage);
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
            color: #374151;
            padding: 0.875rem 2rem;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid #e5e7eb;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
        }

        /* Section header */
        .section-header {
            background: linear-gradient(135deg, var(--forest-mid) 0%, var(--sage) 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }

        /* Toggle switch */
        .toggle-switch {
            position: relative;
            width: 48px;
            height: 24px;
            background: #d1d5db;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .toggle-switch.active {
            background: linear-gradient(135deg, var(--sage) 0%, var(--mint) 100%);
        }

        .toggle-switch::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            background: white;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .toggle-switch.active::after {
            transform: translateX(24px);
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
                        <h1 class="text-3xl font-bold text-gray-800 heading-font">Créer un Utilisateur</h1>
                    </div>
                    <p class="text-gray-500 mt-1 ml-9">Ajoutez un nouvel utilisateur et définissez ses permissions</p>
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

        <!-- Form -->
        <form action="" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Main Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Basic Information -->
                    <div class="form-card">
                        <div class="section-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Informations de Base</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label class="form-label">Nom <span class="text-red-500">*</span></label>
                                <input type="text" name="name" class="form-input" placeholder="Dupont" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Adresse Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" class="form-input"
                                placeholder="jean.dupont@greentech.com" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-group">
                                <label class="form-label">Mot de passe <span class="text-red-500">*</span></label>
                                <input type="password" name="password" class="form-input"
                                    placeholder="••••••••" required>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Right Column - Role & Status -->
                <div class="space-y-6">
                    <!-- Role Assignment -->
                    <div class="form-card">
                        <div class="section-header">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                                <span>Rôle Principal</span>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <label class="form-label">Sélectionner un rôle <span class="text-red-500">*</span></label>
                            <select name="role_id" class="form-select" required>
                                <option value="">Choisir un rôle</option>
                                <option value="1">Admin</option>
                                <option value="2">Gestionnaire</option>
                                <option value="3">Éditeur</option>
                                <option value="4">Modérateur</option>
                                <option value="5">Analyste</option>
                                <option value="6">Gestionnaire de Stock</option>
                                <option value="7">Utilisateur</option>
                            </select>
                        </div>

                        <div class="mt-4 p-3 bg-blue-50 rounded-lg">
                            <p class="text-xs text-blue-700">
                                <strong>Info :</strong> Le rôle définit les permissions de base. Vous pouvez ajouter des
                                permissions supplémentaires ci-dessus.
                            </p>
                        </div>
                    </div>



                    <!-- Action Buttons -->
                    <div class="form-card">
                        <div class="space-y-3">
                            <button type="submit" class="btn-primary w-full justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Créer l'utilisateur
                            </button>

                            <a href="/admin/users" class="btn-secondary w-full justify-center">
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

    <script>
        // Avatar Preview
        //
    </script>

</body>

</html>
