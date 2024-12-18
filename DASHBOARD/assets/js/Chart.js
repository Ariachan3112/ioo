
    document.addEventListener('DOMContentLoaded', function () {
        var ctxCollege = document.getElementById('collegeChart').getContext('2d');
        var ctxShs = document.getElementById('shsChart').getContext('2d');

        var collegeData = {
            labels: ['IT', 'Engineering', 'Electronics', 'Marine'],
            datasets: [{
                data: [30, 45, 25, 20], // Example data, replace with actual values
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
            }]
        };

        var shsData = {
            labels: ['IT', 'Engineering', 'Electronics', 'Marine'],
            datasets: [{
                data: [50, 40, 30, 10], // Example data, replace with actual values
                backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
            }]
        };

        var collegeChart = new Chart(ctxCollege, {
            type: 'pie',
            data: collegeData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'College Students Enrolled'
                    }
                }
            }
        });

        var shsChart = new Chart(ctxShs, {
            type: 'pie',
            data: shsData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Senior High School Students Enrolled'
                    }
                }
            }
        });
    });
