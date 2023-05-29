@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="bg-white d-flex align-items-center justify-content-center border border-dark rounded"
            style="width: 50%;height:50%">
            <div class="w-75 ">
                <a href="{{ route('dashboard') }} ">
                    <- kembali</a>
                        <h3>Form Penambah User</h3>
                        <hr style="border: 2px solid black;">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('create-account') }}" method="POST">
                            <!-- Email input -->
                            @csrf
                            <div class=" d-flex flex-column justify-content-start w-75">

                                <div class="form-outline d-flex justify-content-between mb-4 ">
                                    <label for="username">Name</label>
                                    <input type="text" id="username" name="username" />
                                </div>
                                <div class="form-outline d-flex justify-content-between mb-4">
                                    <label for="password">Password</label>
                                    <input type="text" id="password" name="password" />
                                </div>

                                <!-- Submit button -->

                                <div class="d-flex align-items-center justify-content-end ">
                                    <button type="submit" class="border border-dark" style="width:31.5%">Submit</button>
                                </div>
                            </div>
                        </form>

            </div>
        </div>
    </div>
@endsection
