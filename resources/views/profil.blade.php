<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="kepek/icon.png">
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <title>Comproller - Profil</title>
</head>
<body>
    @include('navbarandfooter/nav')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-0">Fiók Beállítások</h1>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" role="tablist">
                            <li class="nav-item"></li>
                                <a class="nav-link active" data-bs-toggle="tab" href="#username" role="tab">Felhasználónév</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#password" role="tab">Jelszó</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="username" role="tabpanel">
                                <form action="/profile/username" method="POST">
                                    <div class="mb-3">
                                        <label for="current-username" class="form-label">Jelenlegi felhasználónév</label>
                                        <input type="text" class="form-control" id="current-username" placeholder="Írja be a felhasználónevét">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="new-username" class="form-label">Új felhasználónév</label>
                                        <input type="text" class="form-control" id="new-username" placeholder="Írja be az új felhasználónevet">
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm-password-username" class="form-label">Jelszó megerősítése</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="confirm-password-username" placeholder="Írja be a jelszavát">
                                            <span class="input-group-text">
                                                <img src="kepek/szem_be.png" onclick="megnez('confirm-password-username', this)" style="width: 20px; cursor: pointer;">
                                            </span>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary w-100" onclick="changeUsername()">Felhasználónév Módosítása</button>
                                    <div id="username-message" class="alert mt-3" role="alert" style="display: none;"></div>
                                </form>
                            </div>
                            
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <form action="/profile/password" method="POST">
                                    <div class="mb-3">
                                        <label for="current-password" class="form-label">Jelenlegi jelszó</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="current-password" placeholder="Írja be a jelenlegi jelszavát">
                                            <span class="input-group-text">
                                                <img src="kepek/szem_be.png" onclick="megnez('current-password', this)" style="width: 20px; cursor: pointer;">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="new-password" class="form-label">Új jelszó</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="new-password" placeholder="Írja be az új jelszavát">
                                            <span class="input-group-text">
                                                <img src="kepek/szem_be.png" onclick="megnez('new-password', this)" style="width: 20px; cursor: pointer;">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirm-new-password" class="form-label">Új jelszó megerősítése</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="confirm-new-password" placeholder="Írja be újra az új jelszavát">
                                            <span class="input-group-text">
                                                <img src="kepek/szem_be.png" onclick="megnez('confirm-new-password', this)" style="width: 20px; cursor: pointer;">
                                            </span>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary w-100" onclick="changePassword()">Jelszó Módosítása</button>
                                    <div id="password-message" class="alert mt-3" role="alert" style="display: none;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></span></span>

    <script src="js/profil.js"></script> 
    @include('navbarandfooter/footer')
    <script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>
</body>
</html>
