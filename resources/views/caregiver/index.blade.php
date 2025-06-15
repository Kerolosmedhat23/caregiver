<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body>
    <x-navbar_caregiver />

    <div class="container">

        <div class="popup-messages-container">

            <div class="popup-message alert-info">
                <div class="popup-icon-container">
                    <i class="fa-solid fa-pills"></i>
                </div>
                <div class="popup-content">
                    <h4>Medication Reminder</h4>
                    <p class="popup-subtitle">Time for your medication</p>
                    <p>Please take your prescribed dose of 20mg of Lisinopril.</p>
                    <div class="popup-actions">
                        <button class="btn-popup btn-taken">Taken</button>
                        <button class="btn-popup btn-snooze">Snooze</button>
                    </div>
                </div>
                <button class="popup-close">&times;</button>
            </div>

            <div class="popup-message alert-warning">
                <div class="popup-icon-container">
                    <i class="fa-solid fa-utensils"></i>
                </div>
                <div class="popup-content">
                    <h4>Mealtime Reminder</h4>
                    <p class="popup-subtitle">It's time for lunch</p>
                    <p>Enjoy your meal and remember to eat healthy.</p>
                    <div class="popup-actions">
                        <button class="btn-popup btn-okay">Okay</button>
                        <button class="btn-popup btn-snooze">Snooze</button>
                    </div>
                </div>
                <button class="popup-close">&times;</button>
            </div>

            <div class="popup-message alert-danger">
                <div class="popup-icon-container">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="popup-content">
                    <h4>Danger Alert</h4>
                    <p class="popup-subtitle">Emergency Alert</p>
                    <p>Your blood pressure is critically high. Please seek immediate medical attention.</p>
                    {{-- لا توجد أزرار إجراءات في الصورة لهذا التنبيه، ولكن يمكن إضافتها إذا لزم الأمر --}}
                </div>
                <button class="popup-close">&times;</button>
            </div>

        </div>
        <header>
            <h1>CareGiver Dashboard</h1>
        </header>

        <section class="vital-signs">
            <h2>Patient Statistics</h2>
            <div class="vital-cards">
                <div class="card">
                    <div class="card-icon heart-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <a style="text-decoration: none" href="{{ route('patient.heartRate') }}">
                        <div class="card-content">
                            <h3>Heart Rate</h3>
                            <p class="vital-value" id="heart-rate-value">-- <span class="unit">bpm</span></p>
                        </div>
                    </a>

                </div>
                <div class="card">
                    <div class="card-icon blood-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <a style="text-decoration: none" href="{{ route('patient.bloodPressure') }}">
                        <div class="card-content">
                            <h3>Oxygen Saturation (SpO2)</h3>
                            <p class="vital-value" id="spo2-value">-- <span class="unit">%</span></p>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <div class="card-icon temp-icon">
                        <i class="fas fa-thermometer-half"></i>
                    </div>
                    <a style="text-decoration: none" href="{{ route('patient.temperature') }}">
                        <div class="card-content">
                            <h3>Temperature</h3>
                            <p class="vital-value" id="temperature-value">-- <span class="unit">°C</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        @if ($patient)
            <section class="caregiver-details">
                <h2>Patient Details</h2>
                <div class="details-grid">
                    <div class="detail-item">
                        <label>Name</label>
                        <p>{{ $patient->full_name }}</p>
                    </div>
                    <div class="detail-item">
                        <label>Phone</label>
                        <p>{{ $patient->phone }}</p>
                    </div>
                    <div class="detail-item">
                        <label>Email</label>
                        <p>{{ $patient->email }}</p>
                    </div>
                </div>
            </section>
        @endif

        <section class="important-information">
            <h2>Important Information</h2>
            <p>As a caregiver, monitoring vital signs is crucial for maintaining the health and well-being of your loved
                ones. This dashboard provides a quick overview of key health metrics, including heart rate, blood
                pressure, and temperature. Regular monitoring can help detect early signs of potential health issues,
                allowing for timely intervention and care.</p>
            <p>Understanding these vital signs and their normal ranges is essential for effective caregiving. For
                instance, a normal resting heart rate typically ranges from 60 to 100 beats per minute, while a healthy
                blood pressure reading is around 120/80 mmHg. Body temperature usually hovers around 98.6°F. Keeping
                track of these metrics over time can provide valuable insights into overall health trends and help
                ensure the best possible care for those under your supervision.</p>

            <h3>Monitoring Tips:</h3>
            <ul>
                <li>Ensure the patient is relaxed and calm before taking measurements.</li>
                <li>Use calibrated and reliable monitoring devices.</li>
                <li>Take readings at consistent times each day.</li>
                <li>Keep a log of all measurements to track trends.</li>
                <li>Consult a healthcare professional for any concerns or abnormal readings.</li>
            </ul>
        </section>
    </div>
    <x-footer />
    <x-js-link />

    <script>
        function fetchAndDisplayVitals() {
            fetch('/api/latest-vital-signs')
                .then(response => response.json())
                .then(data => {
                    // Heart Rate
                    const heartRateElement = document.getElementById('heart-rate-value');
                    if (data.heart_rate !== null && data.heart_rate !== undefined) {
                        heartRateElement.innerHTML =
                            `${parseFloat(data.heart_rate).toFixed(0)} <span class="unit">bpm</span>`;
                    } else {
                        heartRateElement.innerHTML = `-- <span class="unit">bpm</span>`;
                    }

                    // SpO2
                    const spo2Element = document.getElementById('spo2-value');
                    if (data.spo2 !== null && data.spo2 !== undefined) {
                        spo2Element.innerHTML = `${parseFloat(data.spo2).toFixed(1)} <span class="unit">%</span>`;
                    } else {
                        spo2Element.innerHTML = `-- <span class="unit">%</span>`;
                    }

                    // Temperature
                    const temperatureElement = document.getElementById('temperature-value');
                    if (data.temperature !== null && data.temperature !== undefined) {
                        temperatureElement.innerHTML =
                            `${parseFloat(data.temperature).toFixed(1)} <span class="unit">°C</span>`;
                    } else {
                        temperatureElement.innerHTML = `-- <span class="unit">°C</span>`;
                    }
                })
                .catch(error => {
                    document.getElementById('heart-rate-value').innerHTML = `Error <span class="unit">bpm</span>`;
                    document.getElementById('spo2-value').innerHTML = `Error <span class="unit">%</span>`;
                    document.getElementById('temperature-value').innerHTML = `Error <span class="unit">°C</span>`;
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchAndDisplayVitals();
            setInterval(fetchAndDisplayVitals, 5000); // تحديث كل 5 ثواني
        });
    </script>
</body>

</html>
