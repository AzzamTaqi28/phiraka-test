@extends('layouts.layout')

@section('title', 'Edit')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="bg-white d-flex align-items-center justify-content-center border border-dark rounded"
            style="width: 50%;height:50%">
            <div class="w-75 ">
                <a href="{{ route('dashboard') }}" class="mb-4">
                    <- Kembali</a>

                        <h3>Form Edit</h3>
                        <hr style="border: 2px solid black;">

                        <form action="{{ route('edit') }}" method="POST">
                            <!-- Email input -->
                            @csrf
                            <div class=" d-flex flex-column justify-content-start w-75">
                                <input type="text" name="id"  hidden value="{{ $data->id }}">
                                <div class="form-outline d-flex justify-content-between mb-4 ">
                                    <label for="username">Nama</label>
                                    <input type="text" id="username" name="username" value="{{ $data->username }}" />
                                </div>
                                <div class="form-outline d-flex justify-content-between mb-4">
                                    <label for="password">Password</label>
                                    <input type="text" id="password" name="password"  />
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
    </div>
@endsection
