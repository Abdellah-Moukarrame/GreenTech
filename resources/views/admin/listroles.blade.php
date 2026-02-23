<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Rôles - GreenTech Solutions</title>
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
            margin: 0;
            padding: 0;
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
            text-decoration: none;
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
            border: none;
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

        .badge-admin {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: white;
        }

        .badge-manager {
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 100%);
            color: white;
        }

        .badge-editor {
            background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);
            color: white;
        }

        .badge-moderator {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            color: white;
        }

        .badge-user {
            background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);
            color: white;
        }

        .permission-badge {
            background: #f0fdf4;
            color: #15803d;
            padding: 0.25rem 0.5rem;
            border-radius: 0.375rem;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
            margin: 0.125rem;
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

        .icon-gradient-red {
            background: linear-gradient(135deg, #ef4444 0%, #f87171 100%);
        }

        /* Search box */
        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 0.75rem 1rem 0.75rem 3rem;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            width: 300px;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--sage);
            box-shadow: 0 0 0 3px rgba(82, 183, 136, 0.1);
        }

        .search-box svg {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
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

        /* Utility classes */
        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
        }

        .gap-2 {
            gap: 0.5rem;
        }

        .gap-3 {
            gap: 0.75rem;
        }

        .gap-4 {
            gap: 1rem;
        }

        .gap-6 {
            gap: 1.5rem;
        }

        .grid {
            display: grid;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        .grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .p-3 {
            padding: 0.75rem;
        }

        .p-4 {
            padding: 1rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-3 {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .mb-10 {
            margin-bottom: 2.5rem;
        }

        .mt-1 {
            margin-top: 0.25rem;
        }

        .text-white {
            color: white;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .text-gray-600 {
            color: #4b5563;
        }

        .text-gray-800 {
            color: #1f2937;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-lg {
            font-size: 1.125rem;
        }

        .text-2xl {
            font-size: 1.5rem;
        }

        .text-3xl {
            font-size: 1.875rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-bold {
            font-weight: 700;
        }

        .rounded-xl {
            border-radius: 0.75rem;
        }

        .rounded-2xl {
            border-radius: 1rem;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .space-y-2>*+* {
            margin-top: 0.5rem;
        }

        .border-l {
            border-left: 1px solid #e5e7eb;
        }

        .pl-4 {
            padding-left: 1rem;
        }

        .w-5 {
            width: 1.25rem;
        }

        .h-5 {
            height: 1.25rem;
        }

        .w-6 {
            width: 1.5rem;
        }

        .h-6 {
            height: 1.5rem;
        }

        .w-10 {
            width: 2.5rem;
        }

        .h-10 {
            height: 2.5rem;
        }

        .w-12 {
            width: 3rem;
        }

        .h-12 {
            height: 3rem;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .bottom-0 {
            bottom: 0;
        }

        .left-0 {
            left: 0;
        }

        .right-0 {
            right: 0;
        }

        .border-t {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .w-full {
            width: 100%;
        }

        .bg-white {
            background: white;
        }

        .bg-gray-100 {
            background: #f3f4f6;
        }

        .hover\:bg-gray-200:hover {
            background: #e5e7eb;
        }

        .transition-colors {
            transition: color 0.3s, background-color 0.3s;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }
    </style>
</head>

<body class="antialiased">

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center gap-3 mb-10">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center"
                    style="transform: rotate(6deg); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);">
                    <span class="text-2xl font-bold" style="transform: rotate(-6deg); color: var(--forest-dark);">G</span>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white heading-font">GreenTech</h1>
                    <p class="text-xs" style="color: var(--mint);">Admin Dashboard</p>
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

                <a href="/admin/products" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    <span class="font-medium">Produits</span>
                </a>

                <a href="/admin/manage_user" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                    <span class="font-medium">Utilisateurs</span>
                </a>

                <a href="/admin/roles_permessions"
                    class="sidebar-link active flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                        </path>
                    </svg>
                    <span class="font-medium">Rôles & Permissions</span>
                </a>

                <a href="/admin/categories" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    <span class="font-medium">Catégories</span>
                </a>
            </nav>

            <!-- Bottom Section -->
            <div class="absolute bottom-0 left-0 right-0 p-6 border-t">
                <a href="/" class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg mb-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="font-medium">Retour au site</span>
                </a>
                <form action="#" method="post">
                    <button type="submit"
                        class="sidebar-link flex items-center gap-3 px-4 py-3 text-white rounded-lg w-full text-left">
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
                    <h1 class="text-3xl font-bold text-gray-800 heading-font">Gestion des Rôles</h1>
                    <p class="text-gray-500 mt-1">Gérez les rôles et leurs permissions</p>
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
                    <div class="flex items-center gap-3 pl-4 border-l">
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
        <div class="grid grid-cols-1 grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-purple flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold"
                        style="color: #7c3aed; background: #f3e8ff; padding: 0.25rem 0.5rem; border-radius: 9999px;">Total</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Rôles Actifs</h3>
                <p class="text-3xl font-bold text-gray-800">5</p>
            </div>

            <!-- Card 2 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-green flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold"
                        style="color: #059669; background: #d1fae5; padding: 0.25rem 0.5rem; border-radius: 9999px;">Total</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Permissions</h3>
                <p class="text-3xl font-bold text-gray-800">24</p>
            </div>

            <!-- Card 3 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-blue flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold"
                        style="color: #2563eb; background: #dbeafe; padding: 0.25rem 0.5rem; border-radius: 9999px;">Actifs</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Utilisateurs Assignés</h3>
                <p class="text-3xl font-bold text-gray-800">47</p>
            </div>

            <!-- Card 4 -->
            <div class="stat-card">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl icon-gradient-red flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold"
                        style="color: #dc2626; background: #fee2e2; padding: 0.25rem 0.5rem; border-radius: 9999px;">Admin</span>
                </div>
                <h3 class="text-gray-500 text-sm font-medium mb-1">Rôles Admin</h3>
                <p class="text-3xl font-bold text-gray-800">3</p>
            </div>
        </div>

        <!-- Roles Management Section -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
            <!-- Section Header with Search & Filters -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 heading-font">Liste des Rôles</h2>
                    <p class="text-gray-500 text-sm mt-1">Gérez les rôles et leurs permissions système</p>
                </div>

                <div class="flex items-center gap-3">
                    <!-- Search -->
                    <div class="search-box">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Rechercher un rôle...">
                    </div>

                    <!-- Add Role Button -->
                    <a href="{{route('role.create')}}" class="btn-primary whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Nouveau rôle
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nom du Rôle</th>
                            <th>Permissions</th>
                            <th>Utilisateurs</th>
                            <th>Date de création</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Admin Role -->
                        @foreach ($roles as $role)


                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl icon-gradient-red flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">{{$role->name}}</</p>
                                        <span class="badge badge-admin">{{$role->name}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div style="max-width: 300px;">
                                    <span class="permission-badge">Toutes permissions</span>
                                    <span class="permission-badge">Gestion complète</span>
                                    <span class="permission-badge">Accès système</span>
                                </div>
                            </td>
                            <td>
                                <span class="text-sm font-semibold text-gray-800">8 utilisateurs</span>
                            </td>
                            <td>
                                <span class="text-sm text-gray-600">{{$role->created_at}}</span>
                            </td>
                            <td>
                                <div class="flex items-center justify-center gap-2">
                                    <a href="view_role.html" class="btn-icon btn-view" title="Voir">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="{{url("/admin/roles_permessions/edit/$role->id")}}" class="btn-icon btn-edit" title="Modifier">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{route('delete_role' , $role->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon btn-delete" title="Supprimer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button></form>


                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>

</html>
