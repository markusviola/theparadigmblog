initNotifications = () => {
    switch(window.location.hash) {
        case "#unauth-access":
                notifyUser("Please log in to your account!");
            break;
        case "#admin-only":
                notifyUser("You need administrative privileges!");
            break;
        case "#regular-only":
                notifyUser("Limited to regular users only!");
            break;
        default:
            console.log("OK");
    }
}

notifyUser = (message) => {
    $('#notify-message').text(message);
    $('#notify-toast').toast('show');
}