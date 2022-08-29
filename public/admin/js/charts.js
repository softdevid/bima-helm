const myChart = new Chart(document.getElementById("myChart"), {
    type: "line",
    data: {
        labels: ["Senin", "Selasa", "Rabu", "Kamis", `Jum'at`, "Sabtu"],
        datasets: [
            {
                label: "Full Face",
                data: [20, 25, 10, 18, 9, 20, 10],
                fill: true,
                backgroundColor: ["rgba(255, 99, 132, 0.2)"],
                borderColor: ["rgb(255, 99, 132)"],
                borderWidth: 3,
                tension: 0.1,
            },
            {
                label: "Half Face",
                data: [30, 9, 17, 20, 30, 16, 15],
                fill: true,
                backgroundColor: ["rgba(255, 159, 64, 0.2)"],
                borderColor: ["rgb(255, 159, 64)"],
                borderWidth: 3,
                tension: 0.1,
            },
            {
                label: "Aksesoris",
                data: [5, 10, 19, 15, 11, 17, 20],
                fill: true,
                backgroundColor: ["rgba(255, 205, 86, 0.2)"],
                borderColor: ["rgb(255, 205, 86)"],
                borderWidth: 3,
                tension: 0.1,
            },
            {
                label: "Spareparts",
                data: [6, 8, 3, 11, 9, 5, 17],
                fill: true,
                backgroundColor: ["rgba(75, 192, 192, 0.2)"],
                borderColor: ["rgb(75, 192, 192)"],
                borderWidth: 3,
                tension: 0.1,
            },
            {
                label: "Lainnya",
                data: [13, 14, 18, 8, 6, 15, 21],
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
