const seriesData = [
    {
        name: "Product Sales",
        color: "#1A56DB",
        data: []
    }
];

for (let i = 0; i < products.length; i++) {
    const product = products[i];

    seriesData[0].data.push({
        x: product.name,
        y: product.quantity_sold
    });
}

const options = {
    colors: ["#1A56DB"],
    series: seriesData,
    chart: {
        type: "bar",
        height: "320px",
        fontFamily: "Inter, sans-serif",
        toolbar: {
            show: true,
        },
    },
    plotOptions: {
        bar: {
            horizontal: true,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 1,
        },
    },
    tooltip: {
        shared: false,
        intersect: true,
        style: {
            fontFamily: "Inter, sans-serif",
        },
    },
    states: {
        hover: {
            filter: {
                type: "darken",
                value: 1,
            },
        },
    },
    stroke: {
        show: true,
        width: 0,
        colors: ["transparent"],
    },
    grid: {
        show: true,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -14
        },
    },
    dataLabels: {
        enabled: true,
    },
    legend: {
        show: true,
    },
    xaxis: {
        floating: true,
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            },
            rotate: -45,
        },
        axisBorder: {
            show: true,
        },
        axisTicks: {
            show: true,
        },
    },
    yaxis: {
        show: true,
    },
    fill: {
        opacity: 1,
    },
}

if (document.getElementById("product-report") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("product-report"), options);
    chart.render();
}
