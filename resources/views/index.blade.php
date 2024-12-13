<x-layout conto="Saldo €{{ number_format($balance, 2) }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5  glass-background min-vh-100 m-5">
                <div class="text-white text-center mt-3">
                    <h1 class="display-3">Report Entrate</h1>
                </div>
                <!-- Entrate -->
                <h2 class="text-white text-center mt-2">Entrate</h2>
                @foreach ($incomeData as $month => $transactions)
                    <div class="mb-4">
                        <h3 class="text-white">{{ \Carbon\Carbon::parse($month.'-01')->format('F Y') }}</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Importo</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>€{{ number_format($transaction->total, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
    
            </div>
            <div class="col-5  glass-background min-vh-100 m-5">
                <div class="text-white text-center mt-3">
                    <h1 class="display-3">Report Uscite</h1>
                </div>
                <!-- Uscite -->
                <h2 class="text-white text-center mt-2">Uscite</h2>
                @foreach ($expenseData as $month => $transactions)
                    <div class="mb-4">
                        <h3 class="text-white">{{ \Carbon\Carbon::parse($month.'-01')->format('F Y') }}</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Importo</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>€{{ number_format($transaction->total, 2) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            
        </div>   
    </div>
</x-layout>


