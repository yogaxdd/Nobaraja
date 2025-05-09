@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <img src="{{ asset('storage/' . $film->thumbnail) }}" class="img-fluid rounded mb-3" alt="{{ $film->judul }}">
        <h3>{{ $film->judul }}</h3>
        <ul class="list-unstyled">
            <li><strong>Rating:</strong> ⭐ {{ $film->rating ?? 'NR' }}</li>
            <li><strong>Durasi:</strong> {{ $film->durasi }}</li>
            <li><strong>Kualitas:</strong> {{ $film->kualitas }}</li>
            <li><strong>Genre:</strong> {{ $film->genre }}</li>
            <li><strong>Tahun:</strong> {{ $film->tahun }}</li>
            <li><strong>Rilis:</strong> {{ optional($film->tanggal_rilis)->format('d M Y') }}</li>
        </ul>

        <h5>⬇️ Download Links</h5>
        @if ($film->download_links)
            <ul class="list-unstyled">
                @foreach ($film->download_links as $dl)
                    <li><a href="{{ $dl['link'] }}" class="text-warning" target="_blank">{{ $dl['label'] }}</a></li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Tidak ada link download.</p>
        @endif
    </div>

    <div class="col-md-8">
        <h4>📺 Streaming</h4>
        <div class="ratio ratio-16x9 mb-3">
            <iframe id="mainPlayer" src="{{ $film->embed_link }}" frameborder="0" allowfullscreen></iframe>
        </div>

        @if ($film->server_backup)
            <div class="mb-3">
                <strong>Ganti Server:</strong><br>
                @foreach ($film->server_backup as $server)
                    <button class="btn btn-sm btn-outline-light mt-2 me-2" onclick="switchServer('{{ $server['link'] }}')">
                        {{ $server['server'] }}
                    </button>
                @endforeach
            </div>
        @endif

        <!-- Iklan di area streaming -->
        @php
            $streamAd = \App\Models\Iklan::inRandomOrder()->first();
        @endphp
        @if ($streamAd && $streamAd->gambar)
            <div class="text-center mb-3">
                <a href="{{ $streamAd->link }}" target="_blank">
                    <img src="{{ asset('storage/' . $streamAd->gambar) }}" class="img-fluid rounded" alt="Iklan" style="max-height: 100px;">
                </a>
            </div>
        @endif

        @if ($film->trailer_link)
            <h5>🎞️ Trailer</h5>
            <div class="ratio ratio-16x9 mb-3">
                <iframe src="{{ $film->trailer_link }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endif

        <h5>📜 Sinopsis</h5>
        <p>{{ $film->sinopsis }}</p>

        
    </div>
</div>

<script>
    function switchServer(link) {
        document.getElementById('mainPlayer').src = link;
    }
</script>
@endsection
