$(document).ready(function() {
    $.ajax({
        url: "/api/chart-data",
        method: "GET",
        success: function(response) {
            console.log("API válasz:", response);

            const ctx = document.getElementById("myChart").getContext("2d");

            new Chart(ctx, {
                type: "line",
                data: {
                    labels: response.labels,
                    datasets: [{
                        label: "Új Dolgozók",
                        fill: false,
                        lineTension: 0.1,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.5)",
                        data: response.data
                    }]
                },
                options: {
                    legend: { display: true },
                    scales: {
                        yAxes: [{
                            ticks: { beginAtZero: true }
                        }]
                    },
                    annotation: {
                        annotations: [{
                            type: 'line',
                            mode: 'vertical',
                            scaleID: 'x-axis-0',
                            value: response.maxMonth,
                            borderColor: 'red',
                            borderWidth: 2,
                            label: {
                                enabled: true,
                                content: `${response.maxMonth} (${response.maxCount})`,
                                position: 'top'
                            }
                        }]
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error("Hiba az adatok betöltése közben:", error);
        }
    });
});

fetch('/get-job-titles')
    .then(response => response.json())
    .then(data => {
        const xArray = [];
        const yArray = [];

        data.forEach(item => {
            xArray.push(item.munkakor);
            yArray.push(item.count);
        });

        const layout = {title: "Cég összetétele", height: 400, width: 400};
        const plotData = [{labels: xArray, values: yArray, type: "pie"}];

        Plotly.newPlot("myPlot", plotData, layout);
    })
    .catch(error => console.error('Hiba történt a munkakörök lekérése közben:', error));
