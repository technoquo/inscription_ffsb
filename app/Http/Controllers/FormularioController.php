<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroFormulario;
use Illuminate\Support\Facades\DB;
use App\Mail\ConfirmacionFormulario;
use Illuminate\Support\Facades\Mail;

class FormularioController extends Controller
{
    public function index()
    {
        return view('formulario');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'adultos' => 'required|integer|min:0',
            'adolescentes' => 'required|integer|min:0',
            'menores' => 'required|integer|min:0',
            'email' => 'required|email',
            'combo_cantidad' => 'nullable|integer|min:0|max:5',
            'combo_veg' => 'nullable|integer|min:0|max:5',
            'combo_mix_frites_boison_sauce' => 'nullable|integer|min:0|max:5',
            'combo_mix_frites_veg_boison_sauce' => 'nullable|integer|min:0|max:5',
            'combo_frites' => 'nullable|integer|min:0|max:5',
            'combo_mix' => 'nullable|integer|min:0|max:5',
            'combo_mix_veg' => 'nullable|integer|min:0|max:5',
            'visite' => 'nullable|string|in:oui,non,peut-etre',
            'comentario' => 'nullable|string|max:255',
            'ticket' => 'nullable|integer|min:0|max:5',
            'total' => 'nullable|numeric|min:0',
        ]);

        $data = $validated;
        $total = 0;

        $total += $data['adultos'] * 5;
        $total += $data['adolescentes'] * 3;
        $total += $data['menores'] * 0;

        $total += ($data['combo_cantidad'] ?? 0) * 7;
        $total += ($data['combo_veg'] ?? 0) * 8;
        $total += ($data['combo_frites'] ?? 0) * 3.5;
        $total += ($data['combo_mix'] ?? 0) * 9;
        $total += ($data['combo_mix_veg'] ?? 0) * 10;
        $total += ($data['combo_mix_frites_boison_sauce'] ?? 0) * 11;
        $total += ($data['combo_mix_frites_veg_boison_sauce'] ?? 0) * 12;
        $total += ($data['ticket'] ?? 0) * 10;
       // Formatear el total a dos decimales con coma como separador decimal

        $data['total'] = $total;

     
      

         RegistroFormulario::create([
            'adultos' => $data['adultos'],
            'adolescentes' => $data['adolescentes'],
            'menores' => $data['menores'],
            'combo_cantidad' => $data['combo_cantidad'] ?? 0,
            'combo_veg' => $data['combo_veg'] ?? 0,
            'combo_frites' => $data['combo_frites'] ?? 0,
            'combo_mix' => $data['combo_mix'] ?? 0,
            'combo_mix_veg' => $data['combo_mix_veg'] ?? 0,
            'combo_mix_frites_boison_sauce' => $data['combo_mix_frites_boison_sauce'] ?? 0,
            'combo_mix_frites_veg_boison_sauce' => $data['combo_mix_frites_veg_boison_sauce'] ?? 0,
            'ticket' => $data['ticket'] ?? 0,
            'visite' => $data['visite'] ?? 'non',
            'comentario' => $data['comentario'] ?? '',
            'fullname' => $data['fullname'] ?? '',
            'email' => $data['email'],
            'total' => $data['total'],
        ]);

       

        Mail::to($data['email'])->cc('lelobo75@gmail.com')->send(new ConfirmacionFormulario($data));

        
        return view('merci', ['data' => $data])->with('success', 'Formulario enviado correctamente.');
    }

    public function registro()
    {
       $registros =  RegistroFormulario::orderBy('created_at', 'desc')->get();
        // Aquí podrías pasar los datos a la vista si es necesario
       
         return view('registros', ['registros' => $registros]);
       
    }

    public function exportCsv()
{
    $registros = \App\Models\RegistroFormulario::all();

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="enregistrements.csv"',
    ];

    $callback = function() use ($registros) {
        $file = fopen('php://output', 'w');

        // Encabezados del archivo CSV
        fputcsv($file, [
            'Nom', 'Adresse e-mail', 'Adultes', 'Adolescents', 'Enfants',
            'Pain + sauce', 'Végétarien + sauce', 'Frites + sauce',
            'Pain + frites + sauce', 'Veg + frites + sauce',
            'Pain + frites + boisson + sauce', 'Veg + frites + boisson + sauce',
            'Ticket snack', 'Visite', 'Commentaire', 'Total (€)', 'Date'
        ]);

        

        foreach ($registros as $r) {
            fputcsv($file, [
                $r->fullname,
                $r->email,
                $r->adultos,
                $r->adolescentes,
                $r->menores,
                $r->combo_cantidad,
                $r->combo_veg,
                $r->combo_frites,
                $r->combo_mix,
                $r->combo_mix_veg,
                $r->combo_mix_frites_boison_sauce,
                $r->combo_mix_frites_veg_boison_sauce,
                $r->ticket,
                $r->visite,
                $r->comentario,
                number_format($r->total, 2, ',', ' '),
                $r->created_at->format('d/m/Y H:i')
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
}
