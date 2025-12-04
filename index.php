<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Crèche - Apprendre en s'amusant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
        }
        .animal-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .animal-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .habitat-badge {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 min-h-screen">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <div class="text-5xl">🦁</div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-orange-500 to-pink-500 bg-clip-text text-transparent">
                            Zoo Crèche
                        </h1>
                        <p class="text-sm text-gray-500">Apprendre en s'amusant</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-gradient-to-r from-green-400 to-green-600 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition">
                        ➕ Ajouter Animal
                    </button>
                    <button class="bg-gradient-to-r from-blue-400 to-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg transform hover:scale-105 transition">
                        🏠 Ajouter Habitat
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-orange-400 to-orange-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-orange-100 text-sm font-medium">Total Animaux</p>
                        <p class="text-4xl font-bold mt-2">24</p>
                    </div>
                    <div class="text-6xl opacity-80">🦒</div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Herbivores</p>
                        <p class="text-4xl font-bold mt-2">12</p>
                    </div>
                    <div class="text-6xl opacity-80">🐘</div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-red-400 to-red-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium">Carnivores</p>
                        <p class="text-4xl font-bold mt-2">8</p>
                    </div>
                    <div class="text-6xl opacity-80">🦁</div>
                </div>
            </div>
            
            <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Omnivores</p>
                        <p class="text-4xl font-bold mt-2">4</p>
                    </div>
                    <div class="text-6xl opacity-80">🐻</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="text-3xl mr-3">🔍</span>
                Rechercher des animaux
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Habitat</label>
                    <select class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">
                        <option>Tous les habitats</option>
                        <option>🌾 Savane</option>
                        <option>🌴 Jungle</option>
                        <option>🏜️ Désert</option>
                        <option>🌊 Océan</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Type alimentaire</label>
                    <select class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">
                        <option>Tous les types</option>
                        <option>🥩 Carnivore</option>
                        <option>🌿 Herbivore</option>
                        <option>🍽️ Omnivore</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Recherche</label>
                    <input type="text" placeholder="Nom de l'animal..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition">
                </div>
            </div>
        </div>

        <!-- Animals Grid -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                <span class="text-4xl mr-3">🦁</span>
                Nos Animaux
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                
                
                

            </div>
        </div>

        <!-- Habitats Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                <span class="text-4xl mr-3">🏠</span>
                Les Habitats
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Habitat Card 1 -->
                <div class="bg-gradient-to-br from-yellow-100 to-yellow-300 rounded-3xl p-6 shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <div class="text-6xl mb-4 text-center">🌾</div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Savane</h3>
                    <p class="text-gray-700 text-center mb-4 text-sm">Grande plaine herbeuse avec quelques arbres</p>
                    <div class="text-center">
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-semibold text-yellow-700">12 animaux</span>
                    </div>
                    <div class="flex space-x-2 mt-4">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            ✏️ Modifier
                        </button>
                        <button class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            🗑️
                        </button>
                    </div>
                </div>

                <!-- Habitat Card 2 -->
                <div class="bg-gradient-to-br from-green-100 to-green-300 rounded-3xl p-6 shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <div class="text-6xl mb-4 text-center">🌴</div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Jungle</h3>
                    <p class="text-gray-700 text-center mb-4 text-sm">Forêt tropicale dense et humide</p>
                    <div class="text-center">
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-semibold text-green-700">8 animaux</span>
                    </div>
                    <div class="flex space-x-2 mt-4">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            ✏️ Modifier
                        </button>
                        <button class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            🗑️
                        </button>
                    </div>
                </div>

                <!-- Habitat Card 3 -->
                <div class="bg-gradient-to-br from-orange-100 to-orange-300 rounded-3xl p-6 shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <div class="text-6xl mb-4 text-center">🏜️</div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Désert</h3>
                    <p class="text-gray-700 text-center mb-4 text-sm">Zone aride avec peu d'eau et beaucoup de sable</p>
                    <div class="text-center">
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-semibold text-orange-700">3 animaux</span>
                    </div>
                    <div class="flex space-x-2 mt-4">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            ✏️ Modifier
                        </button>
                        <button class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            🗑️
                        </button>
                    </div>
                </div>

                <!-- Habitat Card 4 -->
                <div class="bg-gradient-to-br from-blue-100 to-blue-300 rounded-3xl p-6 shadow-lg hover:shadow-xl transition transform hover:scale-105">
                    <div class="text-6xl mb-4 text-center">🌊</div>
                    <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Océan</h3>
                    <p class="text-gray-700 text-center mb-4 text-sm">Grande étendue d'eau salée</p>
                    <div class="text-center">
                        <span class="bg-white px-4 py-2 rounded-full text-sm font-semibold text-blue-700">5 animaux</span>
                    </div>
                    <div class="flex space-x-2 mt-4">
                        <button class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            ✏️ Modifier
                        </button>
                        <button class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold text-sm transition">
                            🗑️
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer class="bg-white mt-16 py-8 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-600 font-medium">🦁 Zoo Crèche - Application éducative pour enfants 🎨</p>
            <p class="text-gray-400 text-sm mt-2">Apprendre les animaux en s'amusant !</p>
        </div>
    </footer>

</body>
</html>