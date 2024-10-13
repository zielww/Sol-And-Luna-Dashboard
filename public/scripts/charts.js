const chartConfig = {
    chart: {
        height: 200,  // Fixed height in pixels for all charts
        maxWidth: "100%",
        type: "area",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
            enabled: false,
        },
        toolbar: {
            show: false,
        },
        dataLabels: {
            enabled: false,
        },
    },
};

const revenue = {
    ...chartConfig,
    fill: {
        type: "gradient",
        gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
        },
    },
    series: [
        {
            name: "Revenue",
            data: [6500, 6418, 6456, 6526, 6356, 6456],
            color: "#1A56DB",
        },
    ],
};

const customers = {
    ...chartConfig,
    fill: {
        type: "gradient",
        gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#FF0000",
            gradientToColors: ["#FF0000"],
        },
    },
    series: [
        {
            name: "New Customers",
            data: [10, 3, 12, 4, 25, 12],
            color: "#FF0000",
        },
    ],
};

const orders = {
    ...chartConfig,
    series: [
        {
            name: "New Orders",
            data: [6500, 6418, 6456, 6526, 6356, 6456],
            color: "#1A56DB",
        },
    ],
};

if (document.getElementById("revenue-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("revenue-chart"), revenue);
    chart.render();
}

if (document.getElementById("customers-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("customers-chart"), customers);
    chart.render();
}

if (document.getElementById("orders-chart") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("orders-chart"), orders);
    chart.render();
}
