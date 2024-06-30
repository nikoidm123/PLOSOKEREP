<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnH1z6B8+Zt1Z7gL8b9LaE6A5+aF6rrgh/s3Rqs8pPv1gxd5F2Zwx+wRT7OoXtY/8PeAqTxw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/kelamin.css">
    <title>Desa Plosokerep</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
@include('layout/navbar')
    <br>
    <br>
    <br>
    <div class="container mt-5">
        <h3>DATA AGAMA DI DESA PLOSOKEREP</h3>
        <div class="row">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Agama</th>
                            <th>No</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Islam</td>
                            <td contenteditable="true" class="data-value">1000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kristen</td>
                            <td contenteditable="true" class="data-value">500</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Hindu</td>
                            <td contenteditable="true" class="data-value">200</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Budha</td>
                            <td contenteditable="true" class="data-value">100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <canvas id="religionChart"></canvas>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    @include('layout/copyright')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"
        integrity="sha512-k6RqeWeci5ZR/Lv4MR0sA0FfDOMp0RSK9sB0UGaAcVEOl8SKSTBSkT8wCHd1/6hsLoRF4XsF06HUETeKRWPL5Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Fungsi untuk memperbarui chart
        function updateChart() {
            const dataValues = document.querySelectorAll('.data-value');
            const islam = parseInt(dataValues[0].textContent) || 0;
            const kristen = parseInt(dataValues[1].textContent) || 0;
            const hindu = parseInt(dataValues[2].textContent) || 0;
            const budha = parseInt(dataValues[3].textContent) || 0;

            religionChart.data.datasets[0].data = [islam, kristen, hindu, budha];
            religionChart.update();
        }

        const ctx = document.getElementById('religionChart').getContext('2d');
        const data = {
            labels: ['Islam', 'Kristen', 'Hindu', 'Budha'],
            datasets: [{
                data: [1000, 500, 200, 100],
                backgroundColor: ['#00d4ff', '#4B515D', '#FFBB28', '#FF8042']
            }]
        };
        const config = {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' orang';
                            }
                        }
                    }
                }
            },
        };
        const religionChart = new Chart(ctx, config);

        // Tambahkan event listener pada tabel untuk mendeteksi perubahan
        document.querySelectorAll('.data-value').forEach(cell => {
            cell.addEventListener('input', updateChart);
        });
    </script>
</body>

</html>
