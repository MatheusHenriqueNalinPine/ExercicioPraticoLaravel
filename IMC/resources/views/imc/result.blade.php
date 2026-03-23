@extends('layouts.app')

@section('title', 'Resultado IMC')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Resultado do IMC</h2>
        </div>
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <div class="alert alert-{{ $classe }} mb-3 py-4">
                    <h3 class="mb-0" style="font-size: 2.5rem;">{{ $imc }}</h3>
                    <h4 class="mb-0 mt-2">{{ $classificacao }}</h4>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 text-center border-end">
                    <p class="text-muted small mb-1">Peso</p>
                    <h5>{{ $peso }} kg</h5>
                </div>
                <div class="col-md-6 text-center">
                    <p class="text-muted small mb-1">Altura</p>
                    <h5>{{ $altura }} m</h5>
                </div>
            </div>

            <div class="alert alert-info mb-4">
                <small>
                    <strong>Classificação:</strong> Seu IMC de <strong>{{ $imc }}</strong> indica que você está na categoria "<strong>{{ $classificacao }}</strong>".
                </small>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="{{ route('imc.index') }}" class="btn btn-secondary w-100">
                        Voltar
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('imc.index') }}" class="btn btn-primary w-100">
                        Novo Cálculo
                    </a>
                </div>
            </div>

            <div class="mt-4 p-3 bg-light rounded">
                <h6 class="mb-2">Referência de Classificação:</h6>
                <small class="text-muted">
                    <ul class="mb-0">
                        <li><strong>< 18,5:</strong> Abaixo do peso</li>
                        <li><strong>18,5 - 24,9:</strong> Normal</li>
                        <li><strong>25 - 29,9:</strong> Sobrepeso</li>
                        <li><strong>≥ 30:</strong> Obesidade</li>
                    </ul>
                </small>
            </div>
        </div>
    </div>
@endsection
