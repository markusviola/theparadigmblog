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
        case "#deleted-post":
                notifyUser("Article deleted!");
            break;
        case "#temp-unhandled":
                notifyUser("Something went wrong.");
        case "#unavailable":
                notifyUser("Temporarily unavailable.")
        default:
            console.log("OK");
    }
}

notifyUser = (message) => {
    $('#notify-message').text(message);
    $('#notify-toast').toast('show');
}
