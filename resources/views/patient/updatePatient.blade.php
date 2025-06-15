<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body class="page-background">
    <x-nav-bar />
    <div class="settings-page-container">
        <div class="settings-header">
            <h1 class="settings-title">Settings (Patient)</h1>
            <a href="#" class="edit-settings-link" aria-label="Edit Settings">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </div>

        <div class="settings-card">
            <form action="{{ route('updatePatient') }}" method="post" enctype="multipart/form-data"
                id="patientSettingsForm">
                @csrf
                @method('PUT')
                <div class="form-group-icon">
                    <label for="full_name">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" id="full_name" name="full_name" value="{{ Auth::user()->full_name }}"
                            placeholder="Enter your full name" required>
                    </div>
                    @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                            placeholder="Enter your email" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon">
                    <label for="phone">Phone Number</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone form-icon"></i>
                        <input type="tel" id="phone" name="phone" value="{{ Auth::user()->phone }}"
                            placeholder="Enter your phone number" required>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon">
                    <label for="address">Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-map-marker-alt form-icon"></i>
                        <input type="text" id="address" name="address" value="{{ Auth::user()->address }}"
                            placeholder="Enter your address" required>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon">
                    <label for="chronic_diseases">Chronic Disease</label>
                    <div class="input-with-icon">
                        <i class="fas fa-notes-medical form-icon"></i>
                        <select id="chronic_diseases" name="chronic_diseases">
                            <option value="" disabled>Select a disease</option>
                            <option value="none" {{ Auth::user()->chronic_diseases == 'none' ? 'selected' : '' }}>None
                            </option>
                            <option value="diabetes"
                                {{ Auth::user()->chronic_diseases == 'diabetes' ? 'selected' : '' }}>
                                Diabetes
                            </option>
                            <option value="hypertension"
                                {{ Auth::user()->chronic_diseases == 'hypertension' ? 'selected' : '' }}>
                                Hypertension
                            </option>
                            <option value="asthma" {{ Auth::user()->chronic_diseases == 'asthma' ? 'selected' : '' }}>
                                Asthma
                            </option>
                            <option value="arthritis"
                                {{ Auth::user()->chronic_diseases == 'arthritis' ? 'selected' : '' }}>
                                Arthritis
                            </option>
                        </select>
                    </div>
                    @error('chronic_diseases')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon password-settings-group">
                    <label for="password">Password</label>
                    <div class="input-with-icon password-input-wrapper">
                        <i class="fas fa-lock form-icon"></i>
                        <input type="password" id="password" name="password" placeholder="Enter new password">
                        <a href="#" class="password-change-link">Change</a>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-save-changes">Save Changes</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 VitalCare. All rights reserved.</p>
    </footer>

    <x-js-link />
    <script>
        // Basic interactivity for "Change" password link (example)
        const passwordInput = document.getElementById('settingsPassword');
        const changePasswordLink = document.querySelector('.password-change-link');

        if (changePasswordLink && passwordInput) {
            changePasswordLink.addEventListener('click', function(event) {
                event.preventDefault();
                if (passwordInput.hasAttribute('readonly')) {
                    passwordInput.removeAttribute('readonly');
                    passwordInput.value = ''; // Clear the dummy value
                    passwordInput.focus();
                    this.textContent = 'Cancel'; // Optionally change link text
                } else {
                    passwordInput.setAttribute('readonly', 'true');
                    passwordInput.value = '••••••••••'; // Reset dummy value
                    this.textContent = 'Change';
                }
            });
        }
    </script>
</body>

</html>
