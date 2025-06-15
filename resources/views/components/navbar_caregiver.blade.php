<nav class="navbar">
    <div class="logo">HealthCare</div>
    <div class="nav-links">
        @if (Auth::guard('care_giver')->check())
            <a href="{{ route('careGiver.index') }}" class="nav-item">Home</a>
            <a href="{{ route('history') }}" class="nav-item">History</a>
            <a href="{{ route('patient.index') }}" class="nav-item">Dashboard</a>
            <div class="profile-dropdown">
                <div class="profile-trigger">
                    <img src="{{ asset(Auth::guard('care_giver')->user()->avatar ?? 'default.png') }}"
                        alt="User Profile" class="profile-pic">
                    <span class="profile-name-preview">{{ Auth::guard('care_giver')->user()->full_name }}</span>
                </div>
                <div class="dropdown-content">
                    <a href="{{ route('careGiver.updateForm') }}">Profile Settings</a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('register') }}" class="nav-item btn btn-signup">Sign Up</a>
            <a href="{{ route('login') }}" class="nav-item btn btn-login">Login</a>
        @endif
    </div>
</nav>
