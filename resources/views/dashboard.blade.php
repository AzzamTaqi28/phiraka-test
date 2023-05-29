@extends('layouts.layout')
@section('title', 'Dashboard')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center flex-column">
        <div class="bg-white d-flex align-items-center justify-content-center border border-dark rounded"
            style="width: 90%;height:50%">
            <div class="w-75 ">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <h3><b>Daftar User</b></h3>
                <hr style="border: 2px solid black;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Password</th>
                            <th scope="col">Ctime</th>
                            <th scope="col">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->CreateTime }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-around">
                                        <a href="{{ route('edit-account', $item->id) }}">Edit</a>
                                        <a href="#" onclick="deleteAccount({{ $item->id }})">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('register') }}" class="btn btn-primary">Tambah User</a>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        function deleteAccount(id) {
            $.ajax({
                url: "{{ route('delete-account') }}",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    location.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
@endpush
