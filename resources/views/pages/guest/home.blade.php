@extends('layouts.guest')

@section('content')
    {{-- Navbar --}}
    @include('partials.navbar')
    {{-- Carousel --}}
    @include('partials.carousel')

    <div class="container py-5">
        <h3 class="text-center">
            Berisi tentang pengumuman
        </h3>
    </div>
@endsection
