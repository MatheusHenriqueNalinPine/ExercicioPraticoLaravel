@extends('layouts.app')

@section('title', 'Calcular IMC')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Calculadora de IMC</h2>
        </div>
        <div class="card-body p-4">
            <p class="text-muted mb-4">Informe seu peso e altura para calcular seu Índice de Massa Corporal.</p>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('imc.calculate') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="peso" class="form-label">Peso (kg)</label>
                    <input 
                        type="number" 
                        class="form-control @error('peso') is-invalid @enderror" 
                        id="peso" 
                        name="peso" 
                        placeholder="Ex: 70.5"
                        step="0.1"
                        value="{{ old('peso') }}"
                        required
                    >
                    @error('peso')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="altura" class="form-label">Altura (m)</label>
                    <input 
                        type="number" 
                        class="form-control @error('altura') is-invalid @enderror" 
                        id="altura" 
                        name="altura" 
                        placeholder="Ex: 1.75"
                        step="0.01"
                        value="{{ old('altura') }}"
                        required
                    >
                    @error('altura')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-lg">
                    Calcular IMC
                </button>
            </form>

            <div class="mt-4 p-3 bg-light rounded">
                <h6 class="mb-2">Classificação de IMC:</h6>
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
