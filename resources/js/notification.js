initNotifications = () => {
    switch(window.location.hash) {
        case "#active-only":
                notifyUser("This account cannot be accessed!");
            break;
        case "#unauth-access":
                notifyUser("Please log in to your account!");
            break;
        case "#admin-only":
                notifyUser("You need administrative privileges!");
            break;
        case "#regular-only":
                notifyUser("Limited to regular users only!");
            break;
        case "#guest-only":
                notifyUser("Limited to guest users only!");
            break;
        case "#non-admin-only":
                notifyUser("This feature is for non-admin users only!");
            break;
        case "#post-create":
                notifyUser("Article published!");
            break;
        case "#post-update":
                notifyUser("Article updated!");
            break;
        case "#post-delete":
                notifyUser("Article deleted!");
            break;
        case "#profile-update":
                notifyUser("Profile updated!");
            break;
        case "#settings-update":
                notifyUser("Account settings updated!");
            break;
        case "#wrong-password":
                notifyUser("Provided wrong password!");
            break;
        case "#toggle-user":
                notifyUser("User status changed!");
            break;
        case "#temp-unhandled":
                notifyUser("Something went wrong.");
            break;
        case "#unavailable":
                notifyUser("Temporarily unavailable.");
            break;
        default:
            console.log("The Paradigm Articles");
    }
}

notifyUser = (message) => {
    $('#notify-message').text(message);
    $('#notify-toast').toast('show');
}
