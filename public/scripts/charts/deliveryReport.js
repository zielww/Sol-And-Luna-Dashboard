// Sort the deliveries by created_at
const sortedDeliveries = [...deliveries].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

// Group deliveries by date
const deliveryCountsByDate = sortedDeliveries.reduce((acc, delivery) => {
    const date = new Date(delivery.delivered_on).toLocaleDateString('en-US', {
        month: 'short',
        day: '2-digit',
        year: 'numeric'
    });

    if (!acc[date]) {
        acc[date] = 0;
    }
    acc[date]++;

    return acc;
}, {});

// Get the unique sorted dates
const orderDates = Object.keys(deliveryCountsByDate);

// Get the number of deliveries for each date
const deliveryCounts = orderDates.map(date => deliveryCountsByDate[date]);

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
            name: "Deliveries",
            data: deliveryCounts,
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

if (document.getElementById("delivery-report") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("delivery-report"), options);
    chart.render();
}