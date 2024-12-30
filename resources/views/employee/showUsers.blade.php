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
                    <th>Ranga</th>
                    <th>Wiek</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Akcje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }} {{ $user->surname }}</td>
                        <td>{{ $user->rank->first()->name }}</td>
                        <td>{{ $user->age }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            @if($user->rank_id != 1)
                                <a href="/employee/editUser/{{ $user->id }}" type="submit" class="btn btn-success">Edytuj</a>
                                @if($user->active)
                                <form method="post" action="/employee/deactivateUser/{{ $user->id }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Deaktywuj</button>
                                </form>
                                @else
                                <form method="post" action="/employee/acceptUser/{{ $user->id }}">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-info">Aktywuj</button>
                                </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach

                {{ $users->links() }}
                </tbody>
            </table>
        </div>
    </div>
@endsection
