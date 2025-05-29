<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Merci pour votre inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  
    <div class="bg-white max-w-2xl w-full p-8 rounded-2xl shadow-lg border border-gray-200 text-center">
        <div class="flex justify-center mb-4">
            <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-4">Merci pour votre inscription !</h1>
        <p class="text-gray-700 text-base mb-6">
            Votre formulaire a été envoyé correctement.<br>
            Voici un résumé de votre inscription :
        </p>

        <div class="bg-gray-100 text-left rounded-lg p-6 mb-6 text-sm leading-relaxed">
            <ul class="space-y-2">
                <li><strong>Nom:</strong> {{ $data['fullname'] }}</li>
                <li><strong>Email:</strong> {{ $data['email'] }}</li>
                <li><strong>Adultes:</strong> {{ $data['adultos'] }}</li>
                <li><strong>Adolescents:</strong> {{ $data['adolescentes'] }}</li>
                <li><strong>Enfants:</strong> {{ $data['menores'] }}</li>
                <li><strong>Pain saucisse + sauce:</strong> {{ $data['combo_cantidad'] }}</li>
                <li><strong>Pain VÉGÉTARIEN + sauce:</strong> {{ $data['combo_veg'] }}</li>
                <li><strong>Frites + sauce:</strong> {{ $data['combo_frites'] }}</li>
                <li><strong>Pain + frites + sauce:</strong> {{ $data['combo_mix'] }}</li>
                <li><strong>Pain VÉGÉTARIEN + frites + sauce:</strong> {{ $data['combo_mix_veg'] }}</li>
                <li><strong>Pain + frites + boisson + sauce:</strong> {{ $data['combo_mix_frites_boison_sauce'] }}</li>
                <li><strong>Pain VÉGÉTARIEN + frites + boisson + sauce:</strong> {{ $data['combo_mix_frites_veg_boison_sauce'] }}</li>
                <li><strong>Tickets snack & boisson:</strong> {{ $data['ticket'] }}</li>
                <li><strong>Visite guidée:</strong> {{ $data['visite'] }}</li>
                <li><strong>Commentaire:</strong> {{ $data['comentario'] }}</li>
                <li><strong>Total:</strong> €{{ number_format($data['total'], 2, ',', ' ') }}</li>
            </ul>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('formulario.index') }}"
           class="inline-block mt-4 px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            🔙 Retour au formulaire
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
