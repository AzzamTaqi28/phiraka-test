@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="bg-white d-flex align-items-center justify-content-center border border-dark rounded"
            style="width: 50%;height:50%">
            <div class="w-75 ">
                <h3>Form Login</h3>
                <hr style="border: 2px solid black;">

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('signin') }}" method="POST">
                    <!-- Email input -->
                    @csrf
                    <div class=" d-flex flex-column justify-content-start w-75">

                        <div class="form-outline d-flex justify-content-between mb-4 ">
                            <label for="username">Nama</label>
                            <input type="text" id="username" name="username" />
                        </div>
                        <div class="form-outline d-flex justify-content-between mb-4">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="form-outline d-flex justify-content-between mb-4">
                            <label for="cpch">Security Image</label>
                            <span class="captcha">{!! captcha_img() !!}</span>
                        </div>
                        <div class="form-outline d-flex justify-content-between mb-4">
                            <label for="captcha">Input karakter yang muncul pada tampilan di atas</label>
                            <input type="text" id="captcha" name="captcha" />
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
