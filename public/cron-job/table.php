<?php

use Illuminate\Support\Arr;

$conn = mysqli_connect("localhost", "root", "dzaky654",  "bima_helm");

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$full_face = mysqli_query($conn, "SELECT store, storehouse FROM daily_stocks WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) AND category_id = 1");
$full_face_array = array();
while ($full_face_data = mysqli_fetch_array($full_face)) {
    $full_face_array[] = '"'.$full_face_data['store']+$full_face_data['storehouse'].'",';
}

$half_face = mysqli_query($conn, "SELECT store, storehouse FROM daily_stocks WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) AND category_id = 2");
$half_face_array = array();
while ($half_face_data = mysqli_fetch_array($half_face)) {
    $half_face_array[] = '"'.$half_face_data['store']+$half_face_data['storehouse'].'",';
}

$acc = mysqli_query($conn, "SELECT store, storehouse FROM daily_stocks WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) AND category_id = 2");
$acc_array = array();
while ($acc_data = mysqli_fetch_array($acc)) {
    $acc_array[] = '"'.$acc_data['store']+$acc_data['storehouse'].'",';
}

$sp_part = mysqli_query($conn, "SELECT store, storehouse FROM daily_stocks WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) AND category_id = 2");
$sp_part_array = array();
while ($sp_part_data = mysqli_fetch_array($sp_part)) {
    $sp_part_array[] = '"'.$sp_part_data['store']+$sp_part_data['storehouse'].'",';
}

$others = mysqli_query($conn, "SELECT store, storehouse FROM daily_stocks WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) AND category_id = 2");
$others_array = array();
while ($others_data = mysqli_fetch_array($others)) {
    $others_array[] = '"'.$others_data['store']+$others_data['storehouse'].'",';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabel</title>
</head>

<body>
    <table border="1" style="margin: 20px auto;">
        <thead>
            <tr>
                <th>category_id</th>
                <th>store</th>
                <th>storehouse</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT category_id, store, storehouse, date FROM daily_stocks WHERE DATE_ADD((SELECT DATE_ADD(CURDATE(), INTERVAL - WEEKDAY(CURDATE()) DAY)),INTERVAL 0 DAY) = date GROUP BY category_id";
            $data = mysqli_query($conn, $sql);
            while ($d = mysqli_fetch_assoc($data)) {
            ?>
                <tr>
                    <td><?= $d['category_id'] ?></td>
                    <td><?= $d['store'] ?></td>
                    <td><?= $d['storehouse'] ?></td>
                    <td><?= $d['date'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div style="margin: 60px auto 0 auto; height: 25rem;">
        <canvas id="myChart"></canvas>
    </div>
    <script src="/admin/js/chartjs/chart.min.js"></script>
    <script>
        const myChart = new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: ["Senin", "Selasa", "Rabu", "Kamis", `Jum'at`, "Sabtu"],
                datasets: [{
                        label: "Full Face",
                        data: [<?= implode("", $full_face_array)?>],
                        fill: true,
                        backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                        borderColor: ["rgb(255, 99, 132)"],
                        borderWidth: 3,
                        tension: 0.1,
                    },
                    {
                        label: "Half Face",
                        data: [<?= implode("", $half_face_array)?>],
                        fill: true,
                        backgroundColor: ["rgba(255, 159, 64, 0.2)"],
                        borderColor: ["rgb(255, 159, 64)"],
                        borderWidth: 3,
                        tension: 0.1,
                    },
                    {
                        label: "Aksesoris",
                        data: [<?= implode("", $acc_array)?>],
                        fill: true,
                        backgroundColor: ["rgba(255, 205, 86, 0.2)"],
                        borderColor: ["rgb(255, 205, 86)"],
                        borderWidth: 3,
                        tension: 0.1,
                    },
                    {
                        label: "Spareparts",
                        data: [<?= implode("", $sp_part_array)?>],
                        fill: true,
                        backgroundColor: ["rgba(75, 192, 192, 0.2)"],
                        borderColor: ["rgb(75, 192, 192)"],
                        borderWidth: 3,
                        tension: 0.1,
                    },
                    {
                        label: "Lainnya",
                        data: [<?= implode("", $others_array)?>],
                        fill: true,
                        backgroundColor: ["rgba(153, 102, 255, 0.2)"],
                        borderColor: ["rgb(153, 102, 255)"],
                        borderWidth: 3,
                        tension: 0.1,
                    },
                ],
            },
            options: {
                plugins: {
                    filler: {
                        propagate: false,
                    },
                    tooltip: {
                        mode: "index",
                    },
                },
                radius: 5,
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: "nearest",
                    axis: "x",
                    intersect: false,
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                        },
                    },
                    y: {
                        stacked: "single",
                        display: true,
                        title: {
                            display: true,
                            text: "Stok",
                        },
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
</body>

</html>
