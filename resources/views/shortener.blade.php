<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        form { margin-bottom: 2rem; }
        input[type="text"] { width: 300px; padding: 0.5rem; }
        button { padding: 0.5rem 1rem; }
        .result { margin-top: 1rem; font-size: 1.2rem; }
    </style>
</head>
<body>
    <h1>URL Shortener</h1>
    <form method="POST" action="{{ route('shorten') }}">
        @csrf
        <input type="text" name="url" placeholder="Enter your long URL" required>
        <button type="submit">Shorten</button>
    </form>

    @if (session('short_url'))
        <div class="result">
            <strong>Short URL:</strong> <a href="{{ session('short_url') }}" target="_blank">{{ session('short_url') }}</a>
        </div>
    @endif

    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <p style="color: red;">{{ $error }}</p>
            @endforeach
        </div>
    @endif
</body>
</html>
