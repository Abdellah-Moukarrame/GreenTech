<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Client - GreenTech</title>
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

        .sidebar {
            background: linear-gradient(180deg, var(--forest-dark), var(--forest-mid));
            min-height: 100vh;
            width: 260px;
            position: fixed;
        }

        .sidebar-link {
            transition: 0.3s;
            border-left: 3px solid transparent;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            background: rgba(255,255,255,.1);
            border-left-color: var(--mint);
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .badge {
            padding: .3rem .7rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 600;
        }

        .badge-success {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }
    </style>
</head>

<body>

<!-- Sidebar -->
<aside class="sidebar p-6 text-white">
    <div class="mb-10">
        <h1 class="text-xl font-bold heading-font">GreenTech</h1>
        <p class="text-sm text-mint">Espace Client</p>
    </div>

    <nav class="space-y-2">
        <a href="/client/dashboard" class="sidebar-link active block px-4 py-3 rounded-lg">
            🏠 Tableau de bord
        </a>
        <a href="/client/orders" class="sidebar-link block px-4 py-3 rounded-lg">
            📦 Mes commandes
        </a>
        <a href="/client/favorites" class="sidebar-link block px-4 py-3 rounded-lg">
            🌱 Mes favoris
        </a>
        <a href="/client/profile" class="sidebar-link block px-4 py-3 rounded-lg">
            👤 Mon profil
        </a>
    </nav>

    <div class="absolute bottom-6 left-6 right-6">
        <a href="/logout" class="sidebar-link block px-4 py-3 rounded-lg">
            🚪 Déconnexion
        </a>
    </div>
</aside>

<!-- Main -->
<main class="main-content">

    <!-- Header -->
    <header class="bg-white rounded-2xl p-6 mb-8 flex justify-between items-center">
        <div>
            <h2 class="text-3xl font-bold heading-font text-gray-800">
                Bienvenue 🌿
            </h2>
            <p class="text-gray-500">Heureux de vous revoir sur GreenTech</p>
        </div>

        <div class="flex items-center gap-3">
            <img src="https://ui-avatars.com/api/?name=Client&background=52b788&color=fff"
                 class="w-12 h-12 rounded-xl">
        </div>
    </header>

    <!-- Stats -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="card">
            <h4 class="text-gray-500 text-sm">Commandes</h4>
            <p class="text-3xl font-bold text-gray-800">12</p>
        </div>

        <div class="card">
            <h4 class="text-gray-500 text-sm">Plantes favorites</h4>
            <p class="text-3xl font-bold text-gray-800">7</p>
        </div>

        <div class="card">
            <h4 class="text-gray-500 text-sm">Total dépensé</h4>
            <p class="text-3xl font-bold text-gray-800">3 420 DH</p>
        </div>
    </section>

    <!-- Orders -->
    <section class="card">
        <h3 class="text-xl font-bold heading-font mb-4">Dernières commandes</h3>

        <table class="w-full">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-3 text-left">Commande</th>
                    <th class="p-3">Date</th>
                    <th class="p-3">Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-3">#CMD-1201</td>
                    <td class="p-3">12/02/2026</td>
                    <td class="p-3">
                        <span class="badge badge-success">Livrée</span>
                    </td>
                </tr>
                <tr>
                    <td class="p-3">#CMD-1198</td>
                    <td class="p-3">08/02/2026</td>
                    <td class="p-3">
                        <span class="badge badge-warning">En cours</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>

</main>

</body>
</html>
