@extends('layouts.sign')

@section('container')
<div class="pt-5 w-100 bg-white ">
    <img src="{{ asset('images/404.jpg') }}" alt="" srcset="" width="300" class="d-block m-auto pt-5">
    <h5 class="text-center mt-3">Tidak boleh</h5>
    <div class="d-flex justify-content-center mt-2">
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
    </div>
</div> 

@endsection