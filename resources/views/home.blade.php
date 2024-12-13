<x-layout conto="Saldo €{{ number_format($balance, 2) }}">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-6">
                <div class="row justify-content-center m-5">
                    <div class=" col-12 text-center glass-background vh-75 d-flex align-items-center justify-content-center">
                        <form class="text-white w-75" method="POST" action="{{ route('transition.store') }}">
                            @csrf
                            <!-- Tipo di transazione -->
                            <div class="mb-3 ">
                                <label for="type" class="form-label">Tipo di Transazione</label>
                                <select name="type" id="type" class="form-select" required>
                                    <option value="" disabled selected>Seleziona il tipo</option>
                                    <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Entrata
                                    </option>
                                    <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>Uscita
                                    </option>
                                </select>
                            </div>
                            <!-- Importo -->
                            <div class="mb-3">
                                <label for="amount" class="form-label">Importo</label>
                                <input type="number" step="0.01" name="amount" id="amount" class="form-control"
                                    value="{{ old('amount') }}" required>
                            </div>
                            <!-- Descrizione -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    value="{{ old('description') }}">
                            </div>
                            <!-- Categoria -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="" disabled selected>Seleziona una categoria</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Data della transazione -->
                            <div class="mb-3">
                                <label for="transaction_date" class="form-label">Data</label>
                                <input type="date" name="transaction_date" id="transaction_date" class="form-control"
                                    value="{{ old('transaction_date') }}" required>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Carica</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row justify-content-center m-5">
                    <div class="col-12 text-center glass-background vh-75">
                        <div class="text-center mt-4">
                            <h1 class="dispaly-1 text-white">Report Entrate e Uscite</h1>
                        </div>
        
        
                        <canvas id="transactionsChart" width="400" height="250"></canvas>
        
                        <script>
                            // Dati forniti dal controller
                            const incomeData = @json($incomeData);
                            const expenseData = @json($expenseData);
        
                            // Etichette dei mesi
                            const labels = [
                                'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
                                'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
                            ];
        
                            // Configurazione del grafico
                            const ctx = document.getElementById('transactionsChart').getContext('2d');
                            const transactionsChart = new Chart(ctx, {
                                type: 'bar', // Puoi usare anche 'line', 'pie', etc.
                                data: {
                                    labels: labels,
                                    datasets: [{
                                            label: 'Entrate (€)',
                                            data: incomeData,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Uscite (€)',
                                            data: expenseData,
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1
                                        }
                                    ]
                                },
                                options: {
                                    responsive: true,
                                    plugins: {
                                        legend: {
                                            position: 'top',
                                        },
                                        title: {
                                            display: true,
                                            text: 'Report Mensile: Entrate vs Uscite'
                                        }
                                    },
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
