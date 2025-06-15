<nav class="navbar">
    <div class="logo">HealthCare</div>
    <div class="nav-links">
        @if (Auth::check())
            <a href="{{ route('patient.index') }}" class="nav-item">Home</a>
            <a href="{{ route('history') }}" class="nav-item">History</a>
        @endif
        @if (!Auth::check())
            <a href="{{ route('register') }}" class="nav-item btn btn-signup">Sign Up</a>
            <a href="{{ route('login') }}" class="nav-item btn btn-login">Login</a>
        @else
            <a href="{{ route('patient.index') }}" class="nav-item">Dashboard</a>
        @endif
        @if (Auth::check() == false)
        @else
            <div class="profile-dropdown">
                <div class="profile-trigger">
                    <img src="{{ asset(Auth::user()->avatar ?? 'default.png') }}" alt="User Profile"
                        class="profile-pic">
                    <span class="profile-name-preview">{{ Auth::user()->full_name }}</span>
                </div>
                <div class="dropdown-content">
                    <a href="{{ route('updatePatientForm') }}">Profile Settings</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
