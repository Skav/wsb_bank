@extends('employee.resources.layout')

@section('content')
    <div class="container py-5">
        @if($errors->has('info'))
        <div class="alert alert-warning">
            {{ $errors->first('info') }}
        </div>
        @endif
        <h2 class="text-center mb-4">Lista Użytkowników</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                <tr>
                    <th>Imię i nazwisko</th>
                    <th>Wiek</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Akcje</th>
                </tr>
                </thead>
                <tbody>
               @foreach($users as $user)
               <tr>
                   <td>{{ $user->name }} {{ $user->surname }}</td>
                   <td>{{ $user->age }}</td>
                   <td>{{ $user->email }}</td>
                   <td>{{ $user->phone }}</td>
                   <td>
                       <form method="post" action="/employee/acceptUser/{{ $user->id }}">
                           @csrf
                           <button type="submit" class="btn btn-success">Potwierdź</button>
                       </form>
                   </td>
               </tr>
               @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
