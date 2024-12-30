@extends('admin.resources.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-secondary text-center">
                    <tr>
                        <th>Imię</th>
                        <th>Email</th>
                        <th>Wiadomość</th>
                        <th>Akcja</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->sender_name }}</td>
                            <td>{{ $message->sender_email }}</td>
                            <td>{{ $message->sender_message }}</td>
                            <form action="/employee/setMessageAsRead/{{$message->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm">Oznacz jako przeczytana</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($errors->has('success'))
                <div class="alert alert-success text-center">
                    {{ $errors->first('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
