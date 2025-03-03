<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token Laravel-hez. -->
<link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto"> 
                @if(!session('isAdmin'))
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/">Kezdőlap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/contact">Kapcsolat</a>
                </li>
                @endif
                @if(session('isAdmin'))
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/dashboard">Irányítópult</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/events">Események</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/registry">Nyilvántartás</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/worktime">Munkaidő</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/payroll-calculation">Bérszámfejtés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/profile">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/register">Regisztráció</a>
                </li>
                @endif
            </ul>
        </div>
        <div class="d-flex align-items-center">
            @if(session('isAdmin'))
            <ul class="navbar-nav me-auto"> 
                <a class="nav-link me-3" href="#" onclick="kijelentkezes()">Kijelentkezés</a>
            </ul>
            @endif
            <a class="navbar-brand" href="#">
                <img src="{{ asset('kepek/logo.svg') }}" alt="Logo" class="logo" width="50" height="50">
            </a>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
<script>
    function kijelentkezes() // Kijelentkezési parancs küldése.
    {
        fetch('{{ route('logout') }}', 
        {
            method: 'POST',
            headers: 
            {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        })
        .then(function(valasz) 
        {
            if (valasz.ok) 
            {
                window.location.href = '/';
            } 
            else 
            {
                alert('Kijelentkezési hiba!');
            }
        })
        .catch(function(hiba) 
        {
            console.error('Hiba a kijelentkezés során:', hiba);
        });
    }
</script>
