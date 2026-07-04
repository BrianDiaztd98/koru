import Chart from 'chart.js/auto';

export function initLandingPageVisitsChart() {
    const canvas = document.getElementById('landing-page-visits-chart');

    if (!canvas || canvas.dataset.chartInitialized === 'true') {
        return;
    }

    let labels = [];
    let values = [];

    try {
        labels = JSON.parse(canvas.dataset.chartLabels || '[]');
        values = JSON.parse(canvas.dataset.chartValues || '[]');
    } catch (error) {
        console.warn('Unable to parse landing page visit chart data.', error);
        return;
    }

    if (!labels.length || !values.length) {
        return;
    }

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'Visits',
                data: values,
                backgroundColor: 'rgba(14, 179, 185, 0.8)',
                borderColor: 'rgba(14, 179, 185, 1)',
                borderWidth: 1,
                borderRadius: 6,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: '#94a3b8',
                    },
                    grid: {
                        color: 'rgba(148, 163, 184, 0.15)',
                    },
                },
                x: {
                    ticks: {
                        color: '#94a3b8',
                    },
                    grid: {
                        display: false,
                    },
                },
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
        },
    });

    canvas.dataset.chartInitialized = 'true';
}
