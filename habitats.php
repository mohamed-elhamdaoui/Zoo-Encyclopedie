<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Habitats - Zoo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-r from-yellow-100 to-green-100 p-10">

  <!-- ===== HEADER ===== -->
  <div class="text-center mb-10">
    <div class="flex justify-center items-center gap-2 text-2xl font-bold text-orange-500">
      🐾 <span>Zoo des Petits Explorateurs</span> 🐘
    </div>
    <p class="text-green-700 mt-2 text-lg">Apprends tout sur les animaux du zoo !</p>
  </div>

  <!-- ===== TABS ===== -->
  <div class="flex justify-center mb-10">
  <div class="bg-white shadow rounded-full flex overflow-hidden">

    <!-- ANIMAUX -->
    <a href="index.php" class="px-6 py-2 text-gray-500 flex items-center gap-2 hover:bg-gray-100">
      🐾 Animaux
    </a>

    <!-- HABITATS -->
    <a href="habitats.php" class="px-6 py-2 font-semibold text-black flex items-center gap-2">
      🌴 Habitats
    </a>

    <!-- STATS -->
    <a href="stats.php" class="px-6 py-2 text-gray-500 flex items-center gap-2 hover:bg-gray-100">
      📊 Statistiques
    </a>

  </div>
</div>

  <!-- ===== ADD BUTTON ===== -->
  <div class="text-center mb-10">
    <button class="bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold py-3 px-8 rounded-xl shadow flex items-center gap-2 mx-auto">
      ➕ Ajouter un Nouvel Habitat
    </button>
  </div>

  <!-- ===== HABITATS GRID ===== -->
  <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">

    <!-- CARD 1 -->
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-start">
      <div>
        <h2 class="text-xl font-bold flex items-center gap-2 mb-2">🌾 Savane</h2>
        <p class="text-gray-600">Vastes plaines herbeuses avec quelques arbres</p>
      </div>
      <div class="flex gap-3">
        <button class="text-blue-500">✏️</button>
        <button class="text-red-500">🗑️</button>
      </div>
    </div>

    <!-- CARD 2 -->
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-start">
      <div>
        <h2 class="text-xl font-bold flex items-center gap-2 mb-2">🌴 Jungle</h2>
        <p class="text-gray-600">Forêt tropicale dense et humide</p>
      </div>
      <div class="flex gap-3">
        <button class="text-blue-500">✏️</button>
        <button class="text-red-500">🗑️</button>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-start">
      <div>
        <h2 class="text-xl font-bold flex items-center gap-2 mb-2">🌵 Désert</h2>
        <p class="text-gray-600">Terres arides avec peu de végétation</p>
      </div>
      <div class="flex gap-3">
        <button class="text-blue-500">✏️</button>
        <button class="text-red-500">🗑️</button>
      </div>
    </div>

    <!-- CARD 4 -->
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-start">
      <div>
        <h2 class="text-xl font-bold flex items-center gap-2 mb-2">🌊 Océan</h2>
        <p class="text-gray-600">Environnement aquatique marin</p>
      </div>
      <div class="flex gap-3">
        <button class="text-blue-500">✏️</button>
        <button class="text-red-500">🗑️</button>
      </div>
    </div>

  </div>

</body>
</html>
