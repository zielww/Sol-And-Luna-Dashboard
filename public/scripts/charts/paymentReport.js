// Sort payments by the created_at date to ensure the correct order
const sortedPayments = [...payments].sort((a, b) => new Date(a.created_at) - new Date(b.created_at));

// Get the sorted order dates
const orderDates = sortedPayments.map(payment => new Date(payment.created_at).toLocaleDateString('en-US', {
    month: 'short',
    day: '2-digit',
    year: 'numeric'
}));

// Count the number of 'paid' orders for each date
const paidCountData = orderDates.map(date => {
    const count = sortedPayments.filter(payment => {
        const paymentDate = new Date(payment.created_at).toLocaleDateString('en-US', {
            month: 'short',
            day: '2-digit',
            year: 'numeric'
        });
        return payment.status === 'delivered' && payment.payment_status === 'paid' && paymentDate === date;
    }).length;
    return count;
});

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
            name: "Successful Payments",
            data: paidCountData,
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

if (document.getElementById("payment-report") && typeof ApexCharts !== 'undefined') {
    const chart = new ApexCharts(document.getElementById("payment-report"), options);
    chart.render();
}
