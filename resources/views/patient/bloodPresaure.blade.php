<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />

    <x-css-links />
</head>

<body class="page-background">
    <x-nav-bar />

    <div class="monitor-container">
        <h1 class="monitor-main-title">Oxygen Saturation Monitor</h1>

        <div class="bp-reading-cards">
            <div class="bp-card spo2-card">
                <span class="bp-card-label">Oxygen Saturation (SpO2)</span>
                <span class="bp-card-value" id="spo2-value">--</span>
                <span class="bp-card-unit">%</span>
            </div>
        </div>

        <div class="bp-prediction-section">
            <span class="bp-prediction-label">Prediction</span>
            <span class="bp-prediction-value status-normal" id="">No risk</span>
        </div>

        <div class="bp-info-box">
            <h3 class="bp-info-title">Normal Oxygen Saturation</h3>
            <p class="bp-info-text">
                <i class="fas fa-info-circle"></i>
                Normal SpO2 values are typically between <strong>95%</strong> and <strong>100%</strong>.
            </p>
        </div>
    </div>

    <x-buttonsForhealth />
    <x-footer />
    <x-js-link />


    <script>
        function fetchAndDisplayOxygenSaturation() {
            fetch('/api/ai-prediction/latest')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    // Update SpO2 value
                    const spo2Element = document.getElementById('spo2-value');
                    if (data.spo2_value !== null && data.spo2_value !== undefined) {
                        spo2Element.textContent = parseFloat(data.spo2_value).toFixed(1);
                    } else {
                        spo2Element.textContent = '--';
                    }

                    // Update prediction
                    const predictionSpan = document.getElementById('spo2-prediction');
                    if (data.prediction_result) {
                        predictionSpan.textContent = data.prediction_result;
                    } else {
                        predictionSpan.textContent = '--';
                    }
                });
        }

        document.addEventListener('DOMContentLoaded', fetchAndDisplayOxygenSaturation);
    </script>
</body>

</html>
