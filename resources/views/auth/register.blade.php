<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />


</head>

<body class="signup-page-body">
    <x-nav-bar />
    <div class="signup-container">
        <div class="signup-card">
            <h2>Patient Sign Up</h2>

            <form enctype="multipart/form-data" method="POST" action="{{ route('store') }}">
                @csrf
                <div class="form-group-icon">
                    <label for="fullName">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" id="full_name" name="full_name" placeholder="Enter your full name"
                            required>
                    </div>
                    @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group-icon">
                    <label for="Image">Image</label>
                    <div class="input-with-icon">
                        <input type="file" id="avatar" name="avatar" placeholder="Your profile picture" required>
                    </div>
                    @error('avatar')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group-icon">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                < <div class="form-group-icon">
                    <label for="phone">Phone Number</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone form-icon"></i>
                        <input type="text" id="phone" name="phone" placeholder="Enter your phone number";>
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
        </div>
        <div class="form-group-icon">
            <label for="address">Address</label>
            <div class="input-with-icon">
                <i class="fas fa-map-marker-alt form-icon"></i>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group-icon form-column">
                <label for="gender">Gender</label>
                <div class="input-with-icon">
                    <i class="fas fa-venus-mars form-icon"></i> <select id="gender" name="gender" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        <option value="prefer_not_to_say">Prefer not to say</option>
                    </select>
                </div>
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group-icon form-column">
                <label for="dob">Date of Birth</label>
                <div class="input-with-icon">
                    <i class="fas fa-calendar-alt form-icon"></i>
                    <input type="text" id="dateOfbirth" name="dateOfbirth" placeholder="MM/DD/YYYY"
                        onfocus="(this.type='date')" onblur="(this.type='text')" required>
                </div>
                @error('dateOfbirth')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group-icon">
            <label for="chronicDisease">Chronic Disease (if any)</label>
            <div class="input-with-icon">
                <i class="fas fa-notes-medical form-icon"></i>
                <select id="chronic_diseases" name="chronic_diseases">
                    <option value="" disabled selected>Select chronic disease(s)</option>
                    <option value="none">None</option>
                    <option value="diabetes">Diabetes</option>
                    <option value="hypertension">Hypertension</option>
                    <option value="asthma">Asthma</option>
                    <option value="arthritis">Arthritis</option>
                </select>
            </div>
            @error('chronic_diseases')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-icon">
            <label for="password">Password</label>
            <div class="input-with-icon">
                <i class="fas fa-lock form-icon"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group-icon">
            <label for="confirmPassword">Confirm Password</label>
            <div class="input-with-icon">
                <i class="fas fa-lock form-icon"></i>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Confirm your password" required>
            </div>
            @error('confirmPassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-signup-submit">Sign Up</button>
        </form>
        <p class="signup-page-link caregiver-signup-text">Are you a caregiver? <a href="#"
                class="actual-caregiver-signup-link">Sign up as a caregiver</a></p>
    </div>
    </div>

    <footer>
        <p>&copy; 2024 VitalCare. All rights reserved.</p>
    </footer>

    <x-js-link />


    <script>
        // Optional: Basic form submission handling
        // document.getElementById('patientSignupForm')?.addEventListener('submit', function(event) {
        //     event.preventDefault();
        //     console.log('Patient Sign Up form submitted!');
        //     // Add actual sign up logic here, like validation and API calls
        // });
    </script>
</body>

</html>
