<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Footer</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap-5.3.3/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
<div class="content">
</div>
<footer class="d-flex justify-content-between align-items-center">
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="bi-facebook social-icon"></i></a>
    </div>
    <h3 class="text-center">Comproller 2024/2025</h3>
    <div class="social-icons">
        <a href="mailto:comprollerinfo@gmail.com"><i class="bi-envelope-fill social-icon"></i></a>
    </div>
</footer>
<style>
.content 
{
    padding-bottom: 80px;
}

footer 
{
    background-color: lightblue;
    font-weight: bold;
    width: 100%;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 1px;
    display: flex;
    align-items: center;
    padding: 15px 20px;
    box-sizing: border-box;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 5;
}

footer h3 
{
    font-size: 2.2em;
    text-transform: uppercase;
    margin: 0;
    flex-grow: 1;
    text-align: center;
}

.social-icons 
{
    display: flex;
    gap: 20px;
}

.left, .right 
{
    flex: 1;
}

footer a 
{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    border: 2px solid white;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s;
}

footer a:hover 
{
    background-color: white;
    color: lightblue;
}

footer .social-icon 
{
    font-size: 1.8em;
}
</style>