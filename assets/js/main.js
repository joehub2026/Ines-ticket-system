document.addEventListener("DOMContentLoaded", function() {

    // Registration form validation
    const regForm = document.querySelector('form[action*="store"]');
    if (regForm) {
        regForm.addEventListener("submit", function(e) {
            const fullName = regForm.full_name.value.trim();
            const email = regForm.email.value.trim();
            const phone = regForm.phone.value.trim();
            const eventName = regForm.event_name.value.trim();

            if (!fullName || !email || !phone || !eventName) {
                alert("All fields are required.");
                e.preventDefault();
            }
        });
    }

    // Ticket lookup validation
    const lookupForm = document.querySelector('form[action*="lookup"]');
    if (lookupForm) {
        lookupForm.addEventListener("submit", function(e) {
            const code = lookupForm.ticket_code.value.trim();
            if (!code) {
                alert("Please enter a ticket code.");
                e.preventDefault();
            }
        });
    }

    // Check-in validation
    const checkinForm = document.querySelector('form[action*="checkIn"]');
    if (checkinForm) {
        checkinForm.addEventListener("submit", function(e) {
            const code = checkinForm.ticket_code.value.trim();
            if (!code) {
                alert("Please enter a ticket code.");
                e.preventDefault();
            }
        });
    }

});