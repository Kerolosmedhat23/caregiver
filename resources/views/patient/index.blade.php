<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body>
    <x-nav-bar />

    <div class="container">
        <header>
            <h1>Patient Dashboard</h1>
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
                            {{-- تم إضافة id هنا --}}
                            <p id="heart-rate-value" class="vital-value">-- <span class="unit">bpm</span></p>
                        </div>
                    </a>

                </div>
                <div class="card">
                    <div class="card-icon blood-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <a style="text-decoration: none" href="{{ route('patient.bloodPressure') }}">
                        <div class="card-content">
                            <div class="card-content">
                                <h3>Oxygen Saturation (SpO2)</h3> {{-- تم تغيير العنوان لـ SpO2 --}}
                                {{-- تم إضافة id هنا --}}
                                <p id="spo2-value" class="vital-value">-- <span class="unit">%</span></p>
                            </div>
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
                            {{-- تم إضافة id هنا وتغيير الوحدة --}}
                            <p id="temperature-value" class="vital-value">-- <span class="unit">°C</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        @if ($caregiver)
            <section class="caregiver-details">
                <h2>Caregiver Details</h2>
                <div class="details-grid">
                    <div class="detail-item">
                        <label>Name</label>
                        <p>{{ $caregiver->full_name }}</p>
                    </div>
                    <div class="detail-item">
                        <label>Phone</label>
                        <p>{{ $caregiver->phone }}</p>
                    </div>
                    <div class="detail-item">
                        <label>Email</label>
                        <p>{{ $caregiver->email }}</p>
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
        // دالة لجلب وتحديث بيانات العلامات الحيوية
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

                    // تحديث عنصر تشبع الأكسجين
                    const spo2Element = document.getElementById('spo2-value');
                    if (data.spo2 !== null && data.spo2 !== undefined) {
                        spo2Element.innerHTML = `${parseFloat(data.spo2).toFixed(1)} <span class="unit">%</span>`;
                    } else {
                        spo2Element.innerHTML = `-- <span class="unit">%</span>`;
                    }

                    // تحديث عنصر درجة الحرارة
                    const temperatureElement = document.getElementById('temperature-value');
                    if (data.temperature !== null && data.temperature !== undefined) {
                        temperatureElement.innerHTML =
                            `${parseFloat(data.temperature).toFixed(1)} <span class="unit">°C</span>`;
                    } else {
                        temperatureElement.innerHTML = `-- <span class="unit">°C</span>`;
                    }
                })
                .catch(error => {
                    console.error('Error fetching vital signs:', error);
                    // يمكنك اختيار عرض رسالة خطأ للمستخدم هنا
                    document.getElementById('heart-rate-value').innerHTML = `Error <span class="unit">bpm</span>`;
                    document.getElementById('spo2-value').innerHTML = `Error <span class="unit">%</span>`;
                    document.getElementById('temperature-value').innerHTML = `Error <span class="unit">°C</span>`;
                });
        }

        // استدعاء الدالة عند تحميل الصفحة لأول مرة
        document.addEventListener('DOMContentLoaded', function() {
            fetchAndDisplayVitalSigns();

            // تحديث البيانات كل 5 ثوانٍ (5000 ميلي ثانية)
            setInterval(fetchAndDisplayVitalSigns, 5000);
        });
    </script>

</body>

</html>
