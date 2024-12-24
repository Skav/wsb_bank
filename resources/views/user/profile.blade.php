@extends('user.resources.layout')

@section('content')

    <main class="container my-4 flex-grow-1">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="Profil" class="rounded-circle mb-3">
                        <h5 class="card-title">{{  session()->get('name') }} {{ session()->get('surname') }}</h5>
                        <p class="card-text">{{  session()->get('email') }}</p>
                        <a href="#" class="btn btn-primary w-100">Edytuj profil</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Podsumowanie konta</div>
                    <div class="card-body">
                        <h6>Saldo:</h6>
                        <p class="text-success fs-4">{{ number_format($cash->amount, 2, '.', '') }} PLN</p>

                        <h6>Ostatnie transakcje:</h6>
                        @foreach($transactions as $transaction)
                        <ul class="list-group">
                            <li class="list-group-item">Przelew
                                @if($transaction->receiver_account_number == session()->get('account_number'))
                                    od {{ $transaction->sender_fullname }}
                                    - {{ $transaction->title }}
                                    - <span class="text-success">{{ number_format($transaction->amount, 2, '.', '')  }} PLN</span>
                                @else
                                    do {{  $transaction->receiver_fullname }}
                                    - {{ $transaction->title }}
                                    - <span class="text-danger">{{ number_format($transaction->amount, 2, '.', '')  }} PLN</span>
                                @endif
                            </li>
                        </ul>
                        @endforeach

                        <a href="#" class="btn btn-link mt-3">Zobacz więcej</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
