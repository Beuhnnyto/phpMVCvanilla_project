
<style><?php include './views/css/styles.css' ?></style>

    <div>
        <h1>Color Race</h1>
        <canvas id="colorChart" width="400" height="200"></canvas>
    </div>

    <h1>Add Color</h1>
    <a href="/addRVB?rvb=red">Add Red</a>
    <a href="/addRVB?rvb=green">Add Green</a>
    <a href="/addRVB?rvb=blue">Add Blue</a>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('colorChart').getContext('2d');
        var data = <?php echo json_encode($data); ?>;

        var colors = Object.keys(data); // Extract color names
        var counts = Object.values(data); // Extract color counts

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: colors,
                datasets: [{
                    label: 'Color Counts',
                    data: counts,
                    backgroundColor: ['#ff0000', '#00ff00', '#0000ff'], // Red, Green, Blue
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
