<!DOCTYPE html>
<html>
<head>
    <title>Dolgozók diagramja</title>
    <link rel="stylesheet" href="{{ asset('css\bootstrap-5.3.3\css\bootstrap.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/emberek_diagram.css">
</head>
<body>
<div class="container my-4">
    <div class="card">
        <div class="card-header">
            <h5 class="kartya_ertek">Áttekintés</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <canvas id="myChart" class="d-none d-md-block"></canvas>
                </div>
                <div class="col">
                    <div id="myPlot"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/emberek_diagram.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="css\bootstrap-5.3.3\js\bootstrap.js"></script>

</body>
</html>
