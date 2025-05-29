<p>Merci pour votre inscription.</p>
<p>Total payé : €{{ $data['total'] }}</p>
<p>Détails :</p>
<ul>
    <li>Adultes : {{ $data['adultos'] }}</li>
    <li>Adolescents : {{ $data['adolescentes'] }}</li>
    <li>Enfants : {{ $data['menores'] }}</li>
    <li>Pain saucisse + sauce : {{ $data['combo_cantidad'] ?? 0 }}</li>
    <li>Pain saucisse VÉGÉTARIEN + sauce : {{ $data['combo_veg'] ?? 0 }}</li>
    <li>Frites + sauce : {{ $data['combo_frites'] ?? 0 }}</li>
    <li>Pain saucisse + frites + sauce : {{ $data['combo_mix'] ?? 0 }}</li>
    <li>Pain saucisse VÉGÉTARIEN + frites + sauce : {{ $data['combo_mix_veg'] ?? 0 }}</li>
    <li>Pain saucisse + frites + boisson + sauce : {{ $data['combo_mix_frites_boison_sauce'] ?? 0 }}</li>
    <li>Pain saucisse VÉGÉTARIEN + frites + boisson + sauce : {{ $data['combo_mix_frites_veg_boison_sauce'] ?? 0 }}</li>
    <li>Ticket Snack & Boisson : {{ $data['ticket'] ?? 0 }}</li>
    <li>Visite guidée "Vierge Marie" : {{ $data['visite'] ?? 'Non spécifié' }}</li>
    @if(!empty($data['comentario']))
        <li>Commentaire : {{ $data['comentario'] }}</li>
    @endif
    <li>Adresse e-mail : {{ $data['email'] }}</li>
    <li>Nom et prénom : {{ $data['fullname'] }}</li>
</ul>
