<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />

</head>

<body class="page-background">
    <x-nav-bar />

    <div class="monitor-container temperature-monitor-container">
        <div class="monitor-header-flex">
            <h1 class="monitor-main-title">Body Temperature</h1>
            <i class="fas fa-cog title-icon-action"></i>
        </div>

        <div class="reading-cards-grid temp-reading-cards">
            <div class="stat-card temp-card">
                <span class="stat-card-label">Celsius</span>
                <span class="stat-card-value" id="temp-celsius">--<span class="stat-card-degree">°</span>C</span>
            </div>
            <div class="stat-card temp-card">
                <span class="stat-card-label">Fahrenheit</span>
                <span class="stat-card-value" id="temp-fahrenheit">--<span class="stat-card-degree">°</span>F</span>
            </div>
        </div>

        <div class="prediction-section temp-prediction-section">
            <span class="prediction-label">Prediction</span>
            <span class="prediction-value status-normal" id="temp-prediction">
                <i class="fas fa-check-circle prediction-icon"></i> --
            </span>
        </div>

        <div class="info-box temp-info-box">
            <h3 class="info-title">Normal Body Temperature</h3>
            <p class="info-text">
                Normal body temperature typically ranges from 36.5°C to 37.5°C (97.7°F to 99.5°F).
            </p>
        </div>

        <div class="monitor-actions">
            <button class="btn-monitor-action primary">
                <i class="fas fa-thermometer-half"></i> Record Temperature
            </button>
            <button class="btn-monitor-action secondary">
                <i class="fas fa-history"></i> View History
            </button>
        </div>
    </div>

    <x-buttonsForhealth />
    <x-footer />
    <x-js-link />

    <script>
        function fetchAndDisplayTemperature() {
            // أولاً: هات درجة الحرارة من sensor reading
            fetch('/api/latest-vital-signs')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(sensorData => {
                    // Celsius
                    const celsiusEl = document.getElementById('temp-celsius');
                    if (sensorData.temperature !== null && sensorData.temperature !== undefined) {
                        celsiusEl.innerHTML = parseFloat(sensorData.temperature).toFixed(1) +
                            '<span class="stat-card-degree">°</span>C';
                    } else {
                        celsiusEl.innerHTML = '--<span class="stat-card-degree">°</span>C';
                    }
                    // Fahrenheit
                    const fahrenheitEl = document.getElementById('temp-fahrenheit');
                    if (sensorData.temperature !== null && sensorData.temperature !== undefined) {
                        const fahrenheit = (parseFloat(sensorData.temperature) * 9 / 5) + 32;
                        fahrenheitEl.innerHTML = fahrenheit.toFixed(1) + '<span class="stat-card-degree">°</span>F';
                    } else {
                        fahrenheitEl.innerHTML = '--<span class="stat-card-degree">°</span>F';
                    }
                });

            // ثانياً: هات التوقع من ai prediction
            fetch('/api/ai-prediction/latest')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(aiData => {
                    const predictionEl = document.getElementById('temp-prediction');
                    if (aiData.prediction_result) {
                        predictionEl.innerHTML = '<i class="fas fa-check-circle prediction-icon"></i> ' + 'No Risk';
                    } else {
                        predictionEl.innerHTML = '<i class="fas fa-check-circle prediction-icon"></i> --';
                    }
                });
        }
        document.addEventListener('DOMContentLoaded', fetchAndDisplayTemperature);
    </script>

</body>

</html>
