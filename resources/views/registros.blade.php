<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Enregistrements du formulaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="p-8 bg-gray-50 text-gray-800">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">📋 Enregistrements du formulaire</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg border border-gray-200">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="px-4 py-3">Id</th>
                        <th class="px-4 py-3">Nom</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Adultes</th>
                        <th class="px-4 py-3">Ados</th>
                        <th class="px-4 py-3">Enfants</th>
                        <th class="px-4 py-3">Saucisse</th>
                        <th class="px-4 py-3">Veg</th>
                        <th class="px-4 py-3">Frites</th>
                        <th class="px-4 py-3">Mix</th>
                        <th class="px-4 py-3">Mix Veg</th>
                        <th class="px-4 py-3">Mix + Boisson</th>
                        <th class="px-4 py-3">Mix Veg + Boisson</th>
                        <th class="px-4 py-3">Tickets</th>
                        <th class="px-4 py-3">Visite</th>
                        <th class="px-4 py-3">Commentaires</th>
                        <th class="px-4 py-3">Total (€)</th>
                        <th class="px-4 py-3">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registros as $registro)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $registro->id }}</td>
                            <td class="px-4 py-3">{{ $registro->fullname }}</td>
                            <td class="px-4 py-3">{{ $registro->email }}</td>
                            <td class="px-4 py-3">{{ $registro->adultos }}</td>
                            <td class="px-4 py-3">{{ $registro->adolescentes }}</td>
                            <td class="px-4 py-3">{{ $registro->menores }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_cantidad }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_veg }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_frites }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_mix }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_mix_veg }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_mix_frites_boison_sauce }}</td>
                            <td class="px-4 py-3">{{ $registro->combo_mix_frites_veg_boison_sauce }}</td>
                            <td class="px-4 py-3">{{ $registro->ticket }}</td>
                            <td class="px-4 py-3">{{ $registro->visite }}</td>
                            <td class="px-4 py-3">{{ $registro->comentario }}</td>
                            <td class="px-4 py-3 font-semibold text-green-700">€{{ number_format($registro->total, 2, ',', ' ') }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $registro->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="17" class="px-6 py-4 text-center text-gray-500">Aucun enregistrement trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('formulario.export.csv') }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition">
                📥 Télécharger CSV
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
