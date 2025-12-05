<?php
include 'connection.php';

if (!empty($_POST["search"])) {
    echo $_POST["search"];
}

$total_anim = "select Nom from animals";
$resu = $conn->query($total_anim);

$Herbivores = "select * from animals where Type_alimentaire = '🌿 Herbivore'";
$exc_herb = $conn->query($Herbivores);
$total_herb = mysqli_fetch_all($exc_herb);

$Carnivores = "select * from animals where Type_alimentaire = '🥩 Carnivore' ";
$total_carn = $conn->query($Carnivores);

$Omnivores = "select * from animals where Type_alimentaire = '🍽️ Omnivore' ";
$total_omni = $conn->query($Omnivores);
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
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .habitat-badge {
            animation: float 3s ease-in-out infinite;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            backdrop-filter: blur(5px);
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            animation: slideUp 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
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
                        <p class="text-4xl font-bold mt-2"><?= $resu->num_rows ?></p>
                    </div>
                    <div class="text-6xl opacity-80">🦒</div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-400 to-green-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium">Herbivores</p>
                        <p class="text-4xl font-bold mt-2"><?= count($total_herb) ?></p>
                    </div>
                    <div class="text-6xl opacity-80">🐘</div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-red-400 to-red-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium">Carnivores</p>
                        <p class="text-4xl font-bold mt-2"><?= $total_carn->num_rows ?></p>
                    </div>
                    <div class="text-6xl opacity-80">🦁</div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-3xl p-6 text-white shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium">Omnivores</p>
                        <p class="text-4xl font-bold mt-2"><?= $total_omni->num_rows ?></p>
                    </div>
                    <div class="text-6xl opacity-80">🐻</div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <form method="POST" action="index.php" class="bg-white rounded-3xl shadow-xl p-6 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="text-3xl mr-3">🔍</span>
                Rechercher des animaux
            </h2>

            <div class="flex flex-col lg:flex-row gap-4 items-end">
                <!-- HABITAT -->
                <div class="w-full lg:w-1/5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Habitat</label>
                    <select name="habitat" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200">
                        <option value="">Tous les habitats</option>
                        <option value="Savane">🌾 Savane</option>
                        <option value="Jungle">🌴 Jungle</option>
                        <option value="Désert">🏜️ Désert</option>
                        <option value="Océan">🌊 Océan</option>
                    </select>
                </div>

                <!-- TYPE -->
                <div class="w-full lg:w-1/5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Type alimentaire</label>
                    <select name="type" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200">
                        <option value="">Tous les types</option>
                        <option value="🥩 Carnivore">🥩 Carnivore</option>
                        <option value="🌿 Herbivore">🌿 Herbivore</option>
                        <option value="🍽️ Omnivore">🍽️ Omnivore</option>
                    </select>
                </div>

                <!-- FILTER BUTTON -->
                <div class="w-full lg:w-[12%]">
                    <button type="submit" name="filter_select" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl font-semibold transition">
                        ✅ Filtrer
                    </button>
                </div>

                <!-- SEARCH -->
                <div class="w-full lg:flex-1">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Recherche</label>
                    <input type="text" name="search" placeholder="Nom de l'animal..." class="w-full px-4 py-3 rounded-xl border-2 border-gray-200">
                </div>

                <!-- SEARCH BUTTON -->
                <div class="w-full lg:w-[12%]">
                    <button type="submit" name="filter_search" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-semibold transition">
                        🔍 Rechercher
                    </button>
                </div>
            </div>
        </form>

        <!-- Animals Grid -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center">
                <span class="text-4xl mr-3">🦁</span>
                Nos Animaux
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php
                $sql = 'select * FROM animals, habitats where animals.`idHab`=habitats.`idHab`';

                if (!empty($_POST["type"])) {
                    $sql .= " and Type_alimentaire = '{$_POST["type"]}' ";
                }
                if (!empty($_POST["habitat"])) {
                    $sql .= " and NamHab = '{$_POST["habitat"]}'";
                }
                if (isset($_POST["filter_search"]) && !empty($_POST["search"])) {
                    $sql .= " and Nom = '{$_POST["search"]}' ";
                }

                $result = $conn->query($sql);

                if ($result->num_rows == 0) {
                    echo '<div class="col-span-full text-center py-12">
                            <div class="text-6xl mb-4">😢</div>
                            <p class="text-2xl font-bold text-gray-600">Aucun animal trouvé</p>
                          </div>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="animal-card bg-white rounded-3xl overflow-hidden shadow-lg">
                    <div class="relative">
                        <div class="h-48 w-full bg-gradient-to-br from-blue-200 to-blue-400 flex items-center justify-center">
                    <img src="' . $row['image'] . '" class="w-full h-full object-cover" alt="">
                    </div>

                        <span class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-sm font-semibold text-red-600 shadow-md">
                           ' . $row["Type_alimentaire"] . '
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">' . $row["Nom"] . '</h3>
                        <div class="flex items-center space-x-2 mb-4">
                            <span class="habitat-badge bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">
                                ' . $row["NamHab"] . '
                            </span>
                        </div>
                        <div class="flex space-x-2">

    <!-- ✏️ MODIFY -->
    <button onclick="openModal(' . $row["ID"] . ')"
    class="flex-1 h-fit bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-xl font-semibold transition">
    ✏️ Modifier
</button>

    <!-- 🗑️ DELETE -->
    <form action="delete_animal.php" method="POST" class="flex-1">
        <button type="submit" name="id" value="' . $row["ID"] . '"
            class="w-full bg-red-500 hover:bg-red-600 text-white py-2 rounded-xl font-semibold transition">
            🗑️ Supprimer
        </button>
    </form>

</div>
                    </div>
                </div>';
                    }
                }
                ?>
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

    <!-- ✅ STYLED MODAL -->
    <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">

        <div class="bg-white rounded-3xl shadow-2xl w-[450px] p-6 animate-fade-in">

            <!-- ✅ TITLE -->
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
                ✏️ Modifier l'animal
            </h2>

            <form action="update_animal.php" method="POST" class="space-y-4">

                <!-- ✅ HIDDEN ID -->
                <input type="hidden" name="id" id="animal_id" >

                <!-- ✅ NAME -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                    <input type="text" name="nom" placeholder="Nom de l'animal"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- ✅ TYPE -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Type alimentaire</label>
                    <select name="type"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="🥩 Carnivore">Carnivore 🥩</option>
                        <option value="🌿 Herbivore">Herbivore 🌿</option>
                        <option value="🍽️ Omnivore">Omnivore 🍽️</option>
                    </select>
                </div>

                <!-- ✅ HABITAT -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Habitat</label>
                    <select name="habitat"
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="1">Savane</option>
                        <option value="2">Jungle</option>
                        <option value="3">Désert</option>
                        <option value="4">Océan</option>
                    </select>
                </div>

                <!-- ✅ IMAGE URL -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image (URL)</label>
                    <input type="text" name="image" placeholder="https://..."
                        class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- ✅ BUTTONS -->
                <div class="flex justify-end gap-3 pt-4">

                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2 rounded-xl bg-gray-400 hover:bg-gray-500 text-white font-semibold transition">
                        Annuler
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-xl bg-blue-500 hover:bg-blue-600 text-white font-semibold transition">
                        Modifier
                    </button>

                </div>

            </form>
        </div>

    </div>



    <script>
        function openModal(id) {
            document.getElementById("animal_id").value = id;
            document.getElementById("modal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
        }
    </script>

</body>

</html>