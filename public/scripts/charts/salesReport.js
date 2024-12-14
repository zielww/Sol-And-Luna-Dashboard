const sortedSales = [...sales].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

// Get the sorted order dates
const orderDates = sortedSales.map(sale => new Date(sale.created_at).toLocaleDateString('en-US', {
    month: 'short',
    day: '2-digit',
    year: 'numeric'
}));

// Get the sales data (total_amount) for each sorted sale
const salesData = sortedSales.map(sale => parseFloat(sale.total_amount));

const options = {
    chart: {
        height: 350,
        maxWidth: "100%",
        type: "line",
        fontFamily: "Inter, sans-serif",
        dropShadow: {
            enabled: true,
        },
        toolbar: {
            show: true,
        },
    },
    tooltip: {
        enabled: true,
        x: {
            show: true,
        },
    },
    dataLabels: {
        enabled: true,
    },
    stroke: {
        width: 6,
    },
    grid: {
        show: true,
        strokeDashArray: 4,
        padding: {
            left: 2,
            right: 2,
            top: -26
        },
    },
    series: [
        {
            name: "Sales",
            data: salesData,
            color: "#1A56DB",
        },
    ],
    legend: {
        show: true
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        categories: orderDates,
        labels: {
            show: true,
            style: {
                fontFamily: "Inter, sans-serif",
                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
            }
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
};

if (document.getElementById("sales-report") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("sales-report"), options);
    chart.render();
}
