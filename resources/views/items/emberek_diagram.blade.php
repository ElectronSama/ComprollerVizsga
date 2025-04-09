<!DOCTYPE html>
<html>
<head>
    <title>Dolgozók diagramja</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/emberek_diagram.css">
</head>
<body>
<div class="container my-4 d-none d-md-block">
    <div class="card">
        <div class="card-header">
            <h5 class="kartya_ertek">Áttekintés</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <canvas id="myChart" class=""></canvas>
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
</body>
</html>
