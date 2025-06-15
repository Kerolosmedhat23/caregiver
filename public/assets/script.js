console.log("VitalCare Dashboard Script Loaded");

document.addEventListener('DOMContentLoaded', function () {
    const profileDropdown = document.querySelector('.profile-dropdown');
    const profileTrigger = profileDropdown ? profileDropdown.querySelector('.profile-trigger') : null;
    const dropdownContent = profileDropdown ? profileDropdown.querySelector('.dropdown-content') : null;

    if (profileTrigger && dropdownContent) {
        profileTrigger.addEventListener('click', function (event) {
            event.stopPropagation(); // Important to prevent immediate closing by the window listener

            // Check current display state and toggle
            const isVisible = dropdownContent.style.display === 'block';
            dropdownContent.style.display = isVisible ? 'none' : 'block';
        });

        // Optional: Close dropdown if clicked outside of it
        window.addEventListener('click', function (event) {
            // Check if the click is outside the entire profile-dropdown container
            // and if the dropdown is currently visible
            if (dropdownContent.style.display === 'block' && !profileDropdown.contains(event.target)) {
                dropdownContent.style.display = 'none';
            }
        });
    }

    // ... (rest of your existing JS if any)
});