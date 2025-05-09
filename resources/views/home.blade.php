@extends('layouts.app')

@section('content')
@php
    // Ambil semua iklan secara random
    $iklans = \App\Models\Iklan::inRandomOrder()->get();
    $topAds = $iklans->take(2);
    $bottomAds = $iklans->skip(2);
@endphp

@if ($topAds->count() > 0)
    <!-- Top Ads (selalu 2 iklan) -->
    <div class="text-center mb-4">
        <div class="d-flex justify-content-center flex-wrap gap-2">
            @foreach ($topAds as $iklan)
                <a href="{{ $iklan->link }}" target="_blank">
                    <img src="{{ asset('storage/' . $iklan->gambar) }}" class="img-fluid rounded" alt="Iklan" style="max-height: 100px;">
                </a>
            @endforeach
        </div>
    </div>
@endif

<h2 class="mb-4">🎬 Rekomendasi Film</h2>

<!-- Filter Genre -->
<div class="mb-4">
    @foreach(\App\Models\Genre::all() as $genre)
        <a href="/?genre={{ $genre->nama }}" class="btn btn-sm btn-outline-warning me-2 mb-2">{{ $genre->nama }}</a>
    @endforeach
</div>

@if ($films->count() === 0)
    <p class="text-center text-danger fw-bold">😢 Film tidak tersedia.</p>
@endif

<div class="row">
    @foreach ($films as $film)
        <div class="col-md-3 mb-4">
            <div class="card bg-dark text-white border-0 h-100">
                <img src="{{ asset('storage/' . $film->thumbnail) }}" class="card-img-top" alt="{{ $film->judul }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $film->judul }}</h5>
                    <p class="card-text">⭐ {{ $film->rating ?? 'NR' }} | {{ $film->tahun }}</p>
                    <a href="/film/{{ $film->id }}" class="btn btn-outline-warning w-100">Tonton</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if ($bottomAds->count() > 0)
    <!-- Bottom Ads -->
    <div class="text-center mb-4">
        <div class="d-flex justify-content-center flex-wrap gap-2">
            @foreach ($bottomAds as $iklan)
                <a href="{{ $iklan->link }}" target="_blank">
                    <img src="{{ asset('storage/' . $iklan->gambar) }}" class="img-fluid rounded" alt="Iklan" style="max-height: 100px;">
                </a>
            @endforeach
        </div>
    </div>
@endif

<div class="d-flex justify-content-center">
    {{ $films->links('pagination::bootstrap-5') }}
</div>
@endsection
