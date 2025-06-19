document.addEventListener('DOMContentLoaded', function () {
    const profileLink = document.getElementById('profileLink');
    const profilePopup = document.getElementById('profilePopup');

    console.log('DOM Content Loaded!'); // Confirms the script is running
    console.log('profileLink element:', profileLink); // Checks if profileLink is found
    console.log('profilePopup element:', profilePopup); // Checks if profilePopup is found
    

    profileLink.addEventListener('click', function (e) {
        e.preventDefault();
        console.log('profileLink clicked!');
        profilePopup.classList.toggle('hidden');
    });

    document.addEventListener('click', function (e) {
        // Only log if the popup actually exists
        if (profilePopup) {
            // Check if the click was outside both the link and the popup
            if (!profileLink.contains(e.target) && !profilePopup.contains(e.target)) {
                if (!profilePopup.classList.contains('hidden')) { // Only hide if it's currently visible
                    profilePopup.classList.add('hidden');
                    console.log('Clicked outside profileLink and profilePopup. Hiding popup.');
                }
            }
        }
    });
});