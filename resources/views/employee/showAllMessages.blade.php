@extends('employee.resources.layout')

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
                        <th>Status</th>
                        <th>Data utworzenia</th>
                        <th>Data modyfikacji</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->sender_name }}</td>
                            <td>{{ $message->sender_email }}</td>
                            <td>{{ $message->sender_message }}</td>
                            <td>
                                @if($message->is_read)
                                    <span class="text-success">Przeczytana</span>
                                @else
                                    <span class="text-warning">Oczekujaca</span>
                                @endif
                            </td>
                            <td>{{ $message->created_at }}</td>
                            <td>{{ $message->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $messages->links() }}
            </div>
            @if($errors->has('success'))
                <div class="alert alert-success text-center">
                    {{ $errors->first('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
