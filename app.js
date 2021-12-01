// Here is one way you could do it using jQuery
$(document).ready(function() {
    var doc = $('#doc');

    var login = $('#login');
    var logout = $('#logout');
    var home = $('#home');
    var add_user = $('#add-user');
    var new_issue = $('#new-issue');


    var main = $('#main');

    var loggedIn = true;

    login.on('click', function(event) {
        event.preventDefault();

        if (loggedIn) {
            doc.load('login.php');
        } 
    });

    logout.on('click', function(event) {
        event.preventDefault();

        if (loggedIn) {
            doc.load('index.php');
        } 
    });

    home.on('click', function(event) {
        event.preventDefault();

        if (loggedIn) {
            main.load('issues.php');
        } 
    });

    add_user.on('click', function(event) {
        event.preventDefault();

        if (loggedIn) {
            main.load('add-user.php');
        } 
    });

    new_issue.on('click', function(event) {
        event.preventDefault();

        if (loggedIn) {
            main.load('new-issue.php');
        } 
    });

    
});



