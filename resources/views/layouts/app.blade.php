<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nobaraja - Streaming Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.dark {
            background-color: #111;
            color: #fff;
        }
        body.light {
            background-color: #f8f9fa;
            color: #212529;
        }
        .running-text {
            background: #000;
            color: #0ff;
            padding: 8px 15px;
            white-space: nowrap;
            overflow: hidden;
            font-weight: bold;
            font-size: 14px;
        }
        .running-text span {
            display: inline-block;
            padding-left: 100%;
            animation: slide 30s linear infinite;
        }
        @keyframes slide {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body class="dark">
    <nav class="navbar navbar-dark bg-primary px-4">
        <a class="navbar-brand fw-bold" href="/">NOBARAJA</a>
        <form class="d-flex ms-auto me-3" method="GET" action="/">
            <input class="form-control me-2" name="search" type="search" placeholder="Cari film...">
        </form>
        <button id="toggleMode" class="btn btn-light btn-sm">🌙</button>
    </nav>

    <div class="running-text">
        <span>🔥 Selamat Datang di Nobaraja, Situs ini dalam pengembangan harap bersabar -yogaxd 🎬🍿</span>
    </div>

    <div class="container py-4">
        @yield('content')
    </div>

    <footer class="text-center py-3">
        <small style="color: inherit;">Disclaimer: Situs ini tidak menyimpan file apa pun di servernya. Semua konten disediakan oleh pihak ketiga yang tidak terafiliasi.</small>
    </footer>

    <script>
        const toggleBtn = document.getElementById('toggleMode');
        toggleBtn.addEventListener('click', () => {
            const body = document.body;
            if (body.classList.contains('dark')) {
                body.classList.remove('dark');
                body.classList.add('light');
                toggleBtn.textContent = '☀️';
            } else {
                body.classList.remove('light');
                body.classList.add('dark');
                toggleBtn.textContent = '🌙';
            }
        });
    </script>
</body>
</html>
