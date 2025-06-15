<!DOCTYPE html>
<html lang="en">

<head>
    <x-tittle />
    <x-css-links />
</head>

<body class="page-background">
    <x-navbar_caregiver />

    <div class="settings-page-container caregiver-settings-container">
        <div class="settings-header">
            <h1 class="settings-title">Settings (Caregiver)</h1>
            <button class="btn-edit-settings">
                <i class="fas fa-pencil-alt"></i> Edit
            </button>
        </div>

        <div class="settings-card caregiver-settings-card">
            <form id="caregiverSettingsForm" method="POST" action="{{ route('careGiver.update', $careGiver->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group-icon">
                    <label for="full_name">Full Name</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" id="full_name" name="full_name"
                            value="{{ old('full_name', $careGiver->full_name) }}" required>
                    </div>
                </div>

                <div class="form-group-icon">
                    <label for="email">Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', $careGiver->email) }}" required>
                    </div>
                </div>

                <div class="form-group-icon">
                    <label for="phone">Phone Number</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone form-icon"></i>
                        <input type="tel" id="phone" name="phone"
                            value="{{ old('phone', $careGiver->phone) }}" required>
                    </div>
                </div>

                <div class="form-group-icon">
                    <label for="address">Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-home form-icon"></i>
                        <input type="text" id="address" name="address"
                            value="{{ old('address', $careGiver->address) }}" required>
                    </div>
                </div>

                <div class="form-group-icon">
                    <label for="emergency_phone">Emergency Phone Number</label>
                    <div class="input-with-icon">
                        <i class="fas fa-phone-plus form-icon"></i>
                        <input type="tel" id="emergency_phone" name="emergency_phone"
                            value="{{ old('emergency_phone', $careGiver->emergency_phone) }}" required>
                    </div>
                </div>

                <div class="form-group-icon">
                    <label for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock form-icon"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="btn-save-changes">Save Changes</button>
            </form>
        </div>
    </div>

    <x-footer />



    <x-js-link />

</body>

</html>
