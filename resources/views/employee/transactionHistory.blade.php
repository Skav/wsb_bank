@extends('employee.resources.layout')

@section('content')
        <h2 class="text-center mb-4">Historia Tranzakcji</h2>
        <div class="table-responsive">
            @if(count($transactions) > 0)
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                    <tr>
                        <th>Data</th>
                        <th>Typ</th>
                        <th>Nadawca</th>
                        <th>Konto nadawcy</th>
                        <th>Odbiorca</th>
                        <th>Konto odbiorcy</th>
                        <th>Tytuł przelewu</th>
                        <th>Kwota (PLN)</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                @if($transaction->sender_account_number == session('account_number'))
                                    <span class="text-danger">Wychodzący</span>
                                @else
                                    <span class="text-success">Przychodzący</span>
                                @endif
                            </td>
                            <td> {{ $transaction->sender_fullname }} </td>
                            <td> {{ $transaction->sender_account_number }} </td>
                            <td> {{ $transaction->receiver_fullname }} </td>
                            <td> {{ $transaction->receiver_account_number }} </td>
                            <td>{{ $transaction->title }}</td>
                            <td>{{ number_format($transaction->amount, 2, ',', '') }}</td>
                            @if($transaction->send == 1)
                                <td class="text-success">Zrealizowany</td>
                            @else
                                <td class="text-warn">Oczekujacy</td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $transactions->links() }}
            @else
                <h3 class="text-center text-info">Twoja historia tranzakcji jest pusta!</h3>
            @endif
        </div>
@endsection
