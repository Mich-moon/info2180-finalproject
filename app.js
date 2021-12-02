"use strict";

window.onload = function() {

    let email = document.getElementById("email");
    let password = document.getElementById("password");


    $('#login').on('click', function(event) {
        event.preventDefault();
        $('#doc').load('login.php'); 
    });

    $('#logout').on('click', function(event) {
        event.preventDefault();
        $('#doc').load('logout.php'); 
        window.location.href = "index.php";   
    });

    $('#home').on('click', function(event) {
        event.preventDefault();
        $('#main').load('issues.php'); 
    });

    $('#add-user').on('click', function(event) {
        event.preventDefault();
        $('#main').load('add-user.php'); 
    });

    $('#new-issue').on('click', function(event) {
        event.preventDefault();
        $('#main').load('new-issue.php'); 
    });
};



