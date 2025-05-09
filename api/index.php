<?php

// sesuaikan path ke bootstrap/app.php
require __DIR__ . '/../bootstrap/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// jalankan kernel
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = tap($kernel->handle(
    $request = Illuminate\Http\Request::capture()
))->send();
$kernel->terminate($request, $response);