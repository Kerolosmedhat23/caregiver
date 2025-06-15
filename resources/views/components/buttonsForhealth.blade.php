<nav class="content-tab-nav">
    <a href="{{ route('patient.heartRate') }}"
        class="tab-item {{ Route::currentRouteName() == 'patient.heartRate' ? 'active' : '' }}">
        <i class="fas fa-heartbeat"></i>
        <span>Heart Rate</span>
    </a>
    <a href="{{ route('patient.bloodPressure') }}"
        class="tab-item {{ Route::currentRouteName() == 'patient.bloodPressure' ? 'active' : '' }}">
        <i class="fas fa-tint"></i>
        <span>Blood Pressure</span>
    </a>
    <a href="{{ route('patient.temperature') }}"
        class="tab-item {{ Route::currentRouteName() == 'patient.temperature' ? 'active' : '' }}">
        <i class="fas fa-thermometer-half"></i>
        <span>Temperature</span>
    </a>
</nav>
