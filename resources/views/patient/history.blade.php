<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body class="page-background">
    <x-nav-bar />

    <div class="history-page-container">
        <h1 class="history-main-title">Health History</h1>

        <div class="history-list">
            <div class="history-item-card">
                <div class="history-item-icon temp-icon-bg">
                    <i class="fas fa-thermometer-half"></i>
                </div>
                <div class="history-item-details">
                    <span class="history-item-label">Temperature</span>
                    <span class="history-item-value temp-value-color" id="history-temp">--<span
                            class="history-item-unit-symbol">°</span>C</span>
                </div>
                <span class="history-item-timestamp">Today</span>
            </div>

            <div class="history-item-card">
                <div class="history-item-icon heart-icon-bg">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div class="history-item-details">
                    <span class="history-item-label">Heart Rate</span>
                    <span class="history-item-value heart-value-color" id="history-heart-rate">--<span
                            class="history-item-unit"> bpm</span></span>
                </div>
                <span class="history-item-timestamp">Today</span>
            </div>



            <div class="history-item-card">
                <div class="history-item-icon blood-icon-bg">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="history-item-details">
                    <span class="history-item-label">Oxygen Saturation (SpO2)</span>
                    <span class="history-item-value blood-value-color" id="history-spo2">--<span
                            class="history-item-unit"> %</span></span>
                </div>
                <span class="history-item-timestamp">Today</span>
            </div>
        </div>
    </div>
    <x-footer />
    <x-js-link />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/api/latest-vital-signs')
                .then(response => response.json())
                .then(data => {
                    // Temperature
                    const tempEl = document.getElementById('history-temp');
                    if (data.temperature !== undefined && data.temperature !== null) {
                        tempEl.innerHTML = parseFloat(data.temperature).toFixed(1) +
                            '<span class="history-item-unit-symbol">°</span>C';
                    }

                    // Heart Rate
                    const hrEl = document.getElementById('history-heart-rate');
                    if (data.heart_rate !== undefined && data.heart_rate !== null) {
                        hrEl.innerHTML = parseFloat(data.heart_rate).toFixed(0) +
                            '<span class="history-item-unit"> bpm</span>';
                    }

                    // SpO2
                    const spo2El = document.getElementById('history-spo2');
                    if (data.spo2 !== undefined && data.spo2 !== null) {
                        spo2El.innerHTML = parseFloat(data.spo2).toFixed(1) +
                            '<span class="history-item-unit"> %</span>';
                    }
                });
        });
    </script>
</body>

</html>
