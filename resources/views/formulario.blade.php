<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inscription Marche Balisée, Beauraing, 28 juin 2025</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-200 py-10">

    <section class="max-w-4xl mx-auto px-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Inscription Marche Balisée, Beauraing, 28 juin
            2025</h1>
            <img src="{{ asset('img/marche.png') }}" alt="Logo" class="mx-auto mb-4 w-60 h-60 rounded-full shadow-lg">
        <p class="text-gray-700 text-base leading-relaxed mb-4">
            Participez à notre événement de récolte de fonds au profit de la
            <span class="font-semibold text-blue-700">Fédération Francophone des Sourds de Belgique</span> et profitez
            d’une belle marche balisée de
            <span class="font-medium">7 km ou 12 km</span>, suivie de moments conviviaux autour de pain saucisse, frites
            et boissons.
            Merci de remplir ce formulaire pour confirmer votre participation.
        </p>

        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4 rounded-md">
            <p class="text-blue-800 font-semibold">
                💶 Paiement à effectuer par virement avant le <strong>25 juin 2025</strong> au compte :
            </p>
            <p class="text-blue-900 mt-1 font-mono">BE37 7340 3805 5028</p>
            <p class="text-blue-700 mt-2 italic">Communication : NOM + PRÉNOM + MARCHE BALISÉE 2025</p>
        </div>

        <div class="bg-gray-100 border border-gray-300 p-4 rounded-md mb-4">
            <p class="text-gray-800 font-semibold">📍 Adresse de l'événement :</p>
            <p class="text-gray-700 mt-1">Institut Notre-Dame Beauraing,<br>
                Rue de Givet, 21 – 5570 Beauraing</p>
        </div>

        <p class="text-gray-600 text-sm">
            📧 Pour toute question, contactez-nous à
            <a href="mailto:inscription@ffsb.be"
                class="text-blue-600 hover:underline font-medium">inscription@ffsb.be</a>
        </p>
        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-md border border-gray-300 mt-4">

            <div class="flex justify-center my-6">
                <iframe src="https://player.vimeo.com/video/22439234?h=e08a7aa443" title="Présentation de l'événement"
                    allowfullscreen width="640" height="360" class="rounded-lg shadow-lg border border-gray-300">
                </iframe>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-8 space-y-6 border border-gray-200">
            @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('formulario.store') }}" method="POST" x-data="formulario()" x-init="
                adultos = {{ old('adultos', 0) }};
                adolescentes = {{ old('adolescentes', 0) }};
                menores = {{ old('menores', 0) }};
                comboCantidad = {{ old('combo_cantidad', 0) }};
                comboVeg = {{ old('combo_veg', 0) }};
                comboFrites = {{ old('combo_frites', 0) }};
                comboMix = {{ old('combo_mix', 0) }};
                comboMixVeg = {{ old('combo_mix_veg', 0) }};
                comboMixFritesBoisonSauce = {{ old('combo_mix_frites_boison_sauce', 0) }};
                comboMixFritesVegBoisonSauce = {{ old('combo_mix_frites_veg_boison_sauce', 0) }};
                ticket = {{ old('ticket', 0) }};"       
                class=" space-y-4 bg-white p-6 rounded shadow">
                @csrf

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Combien de personnes adultes, à partir
                        de 16 ans (5 euros par
                        personne)?:</label>
                    <input type="number" name="adultos" x-model="adultos"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                        min="0" required>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Combien d'adolescents de 12 à 15 ans (3
                        euros par personne) ?:</label>
                    <input type="number" name="adolescentes" x-model="adolescentes"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                        min="0" required>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Combien d'enfants, moins de 12 ans
                        (gratuit) ?</label>
                    <input type="number" name="menores" x-model="menores"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500"
                        min="0" required>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖 Pain saucisse + sauce (7€ c/u):</label>
                    <select name="combo_cantidad" x-model="comboCantidad"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1 - pain saucisse avec sauce (7€)</option>
                        <option value="2">2 - pains saucisses avec sauces (14€)</option>
                        <option value="3">3 - pains saucisses avec sauces (21€)</option>
                        <option value="4">4 - pains saucisses avec sauces (28€)</option>
                        <option value="5">5 - pains saucisses avec sauces (35€)</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖 Pain saucisse VÉGÉTARIEN + sauce (8€
                        c/u):</label>
                    <select name="combo_veg" x-model="comboVeg"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1 pain saucisse VEGETARIEN avec sauce (8€)</option>
                        <option value="2">2 pains saucisses VEGETARIEN avec sauces (16€)</option>
                        <option value="3">3 pains saucisses VEGETARIEN avec sauces (24€)</option>
                        <option value="4">4 pains saucisses VEGETARIEN avec sauces (32€)</option>
                        <option value="5">5 pains saucisses VEGETARIEN avec sauces (40€)</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🍟 Frites + sauce (3.50€ c/u):</label>
                    <select name="combo_frites" x-model="comboFrites"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1 portion de frites avec sauce (3.50€)</option>
                        <option value="2">2x frites avec sauces (7 €)</option>
                        <option value="3">3x frites avec sauces (10,50€)</option>
                        <option value="4">4x frites avec sauces (14€)</option>
                        <option value="5">5x frites avec sauces (17,50€)</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖+🍟 Pain saucisse + frites + sauce (9€
                        c/u):</label>
                    <select name="combo_mix" x-model="comboMix"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1 Pain saucisse avec frites et sauce (9€)</option>
                        <option value="2">2x Pains saucisses avec frites et sauces (18€)</option>
                        <option value="3">3x Pains saucisses avec frites et sauces (27€)</option>
                        <option value="4">4x Pains saucisses avec frites et sauces (36€)</option>
                        <option value="5">5 ou plus ? (à préciser dans "commentaires" à la fin de ce formulaire)
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖+🍟 Pain saucisse VÉGÉTARIEN + frites +
                        sauce (10€ c/u):</label>
                    <select name="combo_mix_veg" x-model="comboMixVeg"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1 Pain saucisse VEGETARIEN avec frites et sauce (10€)</option>
                        <option value="2">2x Pains saucisses VEGETARIEN avec frites et sauces (20€)</option>
                        <option value="3">3x Pains saucisses VEGETARIEN avec frites et sauces (30€)</option>
                        <option value="4">4x Pains saucisses VEGETARIEN avec frites et sauces (40€)</option>
                        <option value="5">5 ou plus ? (à préciser dans "commentaires" à la fin de ce formulaire)
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖+🍟+🥤 Pain saucisse + frites + boisson + sauce
                        (11 €):</label>
                    <select name="combo_mix_frites_boison_sauce" x-model="comboMixFritesBoisonSauce"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1x Pain saucisse avec frites, sauces et un boisson (11€)</option>
                        <option value="2">2x Pains saucisses avec frites, sauces et 2 boissons (22€)</option>
                        <option value="3">3x Pains saucisses avec frites, sauces et 2 boissons (33€)</option>
                        <option value="4">4x Pains saucisses avec frites, sauces et 2 boissons (44€)</option>
                        <option value="5">5 ou plus ? (à préciser dans "commentaires" à la fin de ce formulaire)
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">🥖+🍟+🥤 Pain saucisse VÉGÉTARIEN + frites +
                        boisson + sauce (12 €):</label>
                    <select name="combo_mix_frites_veg_boison_sauce" x-model="comboMixFritesVegBoisonSauce"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">0</option>
                        <option value="1">1x Pain saucisse VEGETARIEN avec frites, sauces et un boisson (12€)</option>
                        <option value="2">2x Pains saucisses VEGETARIEN avec frites, sauces et 2 boissons (24€)</option>
                        <option value="3">3x Pains saucisses VEGETARIEN avec frites, sauces et 3 boissons (36€)</option>
                        <option value="4">4x Pains saucisses VEGETARIEN avec frites, sauces et 4 boissons (48€)</option>
                        <option value="5">5 ou plus ? (à préciser dans "commentaires" à la fin de ce formulaire)
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">  🎟️ Ticket Snack & Boisson – 10 € :</label>
                    <select name="ticket" x-model="ticket"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="0">Pas de ticket</option>
                        <option value="1">1 ticket = 10 euros</option>
                        <option value="2">2 tickets = 20 euros</option>
                        <option value="3">3 tickets = 30 euros</option>
                        <option value="4">4 tickets = 40 euros</option>
                        <option value="5">5 tickets = 50 euros</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Visite guidée "Vierge Marie" à 18 h :
                        vous serez présent ou pas ?</label>
                    <select name="visite"
                        class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                        <option value="peut-etre">Peut-être</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Remarques ou commentaires:</label>
                    <textarea name="comentario" class="border p-2 w-full" rows="3"></textarea>
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" class="border p-2 w-full">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Nom et Prénom:</label>
                    <input type="text" name="fullname" class="border p-2 w-full">
                </div>

                <div class="text-xl font-bold text-gray-800 text-right">Total: €<span x-text="total"></span></div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300 shadow-md">Envoyer</button>
            </form>
        </div>
    </section>
    <script>
        function formulario() {
        return {
            adultos: 0,
            adolescentes: 0,
            menores: 0,
            comboCantidad: 0,
            comboVeg: 0,
            comboFrites: 0,
            comboMix: 0,
            comboMixVeg: 0,
            comboMixFritesBoisonSauce: 0,
            comboMixFritesVegBoisonSauce: 0,
            ticket: 0,        
            get total() {
                return (
                    parseFloat(this.adultos) * 5 +
                    parseFloat(this.adolescentes) * 3 +
                    parseFloat(this.menores) * 0 +
                    parseFloat(this.comboCantidad) * 7 +
                    parseFloat(this.comboVeg) * 8 +
                    parseFloat(this.comboFrites) * 3.5 +
                    parseFloat(this.comboMix) * 9 +
                    parseFloat(this.comboMixVeg) * 10 +
                    parseFloat(this.comboMixFritesBoisonSauce) * 11 +
                    parseFloat(this.comboMixFritesVegBoisonSauce) * 12 +
                    parseFloat(this.ticket) * 10

                ).toFixed(2);
            }
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>

</html>