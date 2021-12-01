<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Priki</title>

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>

</head>
<body class="container-fluid">
<div class="bg-info p-5 text-center">
    <h1>Priki</h1>
    <div class="form-group">
        <label class="control-label col-1">Domaine:</label>
        <select id="dpdDomain" class="col-3">
            <option value="0">Tous (xxx)</option>
            @foreach(\App\Models\Domain::all() as $domain)
                <option value="{{ $domain->id }}">{{ $domain->name }} (xxx)</option>
            @endforeach
        </select>
    </div>
</div>
@yield('content')
</body>
</html>
