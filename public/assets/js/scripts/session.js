var sessionTimeout = 15 * 60 * 1000;    // 15 minutes in milliseconds
var checkInterval = 1000;               // check every second
var messageInterval = setInterval(function() {
    var remainingTime = sessionTimeout - (new Date() - startTime);
    if (remainingTime <= 0) {           // session has expired
        clearInterval(messageInterval);
        // redirect to login page or display expired message
        return;
    }
    var minutes = Math.floor(remainingTime / 60000);
    var seconds = Math.floor((remainingTime % 60000) / 1000);
    document.getElementById('session_timer').innerHTML = minutes + ' minutes ' + seconds + ' seconds';
    if (remainingTime <= 3 * 60 * 1000) { // 5 minutes left
        document.getElementById('session_message').style.display = 'block';
    }
}, checkInterval);
var startTime = new Date();