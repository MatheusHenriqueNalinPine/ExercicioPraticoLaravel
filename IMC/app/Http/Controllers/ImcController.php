<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImcController extends Controller
{
    public function index()
    {
        return view('imc.form');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'peso' => 'required|numeric|min:0.1|max:500',
            'altura' => 'required|numeric|min:0.5|max:2.5',
        ], [
            'peso.required' => 'O peso é obrigatório.',
            'peso.numeric' => 'O peso deve ser um número.',
            'peso.min' => 'O peso deve ser maior que 0,1 kg.',
            'peso.max' => 'O peso deve ser menor que 500 kg.',
            'altura.required' => 'A altura é obrigatória.',
            'altura.numeric' => 'A altura deve ser um número.',
            'altura.min' => 'A altura deve ser maior que 0,5 m.',
            'altura.max' => 'A altura deve ser menor que 2,5 m.',
        ]);

        $peso = $request->peso;
        $altura = $request->altura;

        // Calcular IMC
        $imc = $peso / ($altura * $altura);

        // Classificar IMC
        if ($imc < 18.5) {
            $classificacao = 'Abaixo do peso';
            $classe = 'info';
        } elseif ($imc < 25) {
            $classificacao = 'Normal';
            $classe = 'success';
        } elseif ($imc < 30) {
            $classificacao = 'Sobrepeso';
            $classe = 'warning';
        } else {
            $classificacao = 'Obesidade';
            $classe = 'danger';
        }

        return view('imc.result', [
            'peso' => $peso,
            'altura' => $altura,
            'imc' => number_format($imc, 2, ',', '.'),
            'classificacao' => $classificacao,
            'classe' => $classe,
        ]);
    }
}
