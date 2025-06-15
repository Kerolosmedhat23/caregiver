<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body class="page-background">
    <x-nav-bar />

    <div class="monitor-container heart-rate-monitor-container">
        <h1 class="monitor-main-title">Heart Rate Monitor</h1>

        <div class="hr-display-card">
            <i class="fas fa-heartbeat hr-icon"></i>
            <div class="hr-value-section">
                <p id="heart-rate-value" class="vital-value hr-value">-- <span class="unit">bpm</span></p>

            </div>
            <span class="hr-status status-normal">No risk</span>
        </div>

        <p class="hr-info-text">
            Normal resting heart rate for adults is between <strong>60</strong> and <strong>100</strong> bpm.
        </p>
    </div>
    <x-buttonsForhealth />

    <x-footer />
    <x-js-link />
    <script>
        function fetchAndDisplayVitalSigns() {
            fetch('/api/latest-vital-signs') // المسار الذي عرفناه في routes/api.php
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(data => {
                    // تحديث عنصر معدل نبضات القلب
                    const heartRateElement = document.getElementById('heart-rate-value');
                    if (data.heart_rate !== null && data.heart_rate !== undefined) {
                        heartRateElement.innerHTML =
                            `${parseFloat(data.heart_rate).toFixed(0)} <span class="unit">bpm</span>`;
                    } else {
                        heartRateElement.innerHTML = `-- <span class="unit">bpm</span>`;
                    }
                });
        }

        // يمكنك استدعاء الدالة عند تحميل الصفحة مثلاً:
        document.addEventListener('DOMContentLoaded', fetchAndDisplayVitalSigns);
    </script>
    <script>
        // function fetchAndDisplayAiPrediction() {
        //     fetch('/api/ai-prediction/latest')
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error('Network response was not ok ' + response.statusText);
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             const statusSpan = document.querySelector('.hr-status');
        //             if (data.prediction_result) {
        //                 statusSpan.textContent = data.prediction_result;
        //             }
        //         });
        // }

        document.addEventListener('DOMContentLoaded', fetchAndDisplayAiPrediction);
    </script>

</body>

</html>
