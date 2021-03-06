"use strict";

$(document).ready(function() {

    $('#login').on('click', function(event) {
        event.preventDefault();

        var valid = $("#login-form")[0].checkValidity();

        if(valid){

            var paswd_val = $('#password').val();
            var email_val = $('#email').val();

            var url = "login.php";
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST",url);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    var result = this.responseText;
                    console.log(result);
                    if(result == 1) {
                        $('#doc').load('dashboard.php');
                    } 
                }
            };
            xmlhttp.send("password=" + encodeURIComponent(paswd_val) + "&email=" + encodeURIComponent(email_val));
        }
    });

    // ------ NAV LINKS ------
    $('#logout').on('click', function(event) {
        event.preventDefault();
        $('#doc').load('logout.php'); 
        $('#doc').load('login.view.php');  
    });

    $('#home').on('click', function(event) {
        event.preventDefault();
        $('#main').load('issues.php'); 
    });

    $('#add-user').on('click', function(event) {
        event.preventDefault();
        $('#main').load('add-user.view.php'); 
    });

    $('#new-issue').on('click', function(event) {
        event.preventDefault();
        $('#main').load('new-issue.php'); 
    });

    // ------ BUTTONS ------
    $('#issue-create-btn').on('click', function(event) {
        event.preventDefault();
        $('#main').load('new-issue.php'); 
    });

    $('.issue-link').on('click', function(event) {
        event.preventDefault();

        $('#main').load('issue-details.view.php');

        // id for issue is retireved frm the span next to the link
        var iid = $(this).prev("span").text();
        console.log(iid);

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                var result = eval(this.responseText);
                console.log(result);

                $('#insert-issue-title').text( result[0]['title'] );
                $('#insert-description').text( result[0]['description'] );
                $('#issue-type').text( result[0]['type'] );
                $('#issue-priority').text( result[0]['priority'] );
                $('#issue-status').text( result[0]['status'] );
                $('#issue-assigned').text( result[0]['assigned_to'] );
                $('#insert-created-by').text( result[0]['created_by'] );
                $('#insert-create-date').text( result[0]['created'] );
                $('#insert-update-time').text( result[0]['updated'] );
                $('#insert-issue-num').text( iid );     
            }
        };
        xmlhttp.open("GET", "issue-details.php?iid="+iid, true);
        xmlhttp.send();
    });


    // ------ ADD USER ------
     $("#add-user-btn").on('click', function(event) {
        event.preventDefault();
        
        var valid = $("#add-user-form")[0].checkValidity();

        var first_name_val = $('#firstname').val();
        var last_name_val = $('#lastname').val();
        var new_paswd_val = $('#addpassword').val();
        var new_email_val = $('#addemail').val();

        if(valid){
            var url = "add-user.php";
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST",url);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    console.log("User added");
                }
            };
            xmlhttp.send('firstname=' + encodeURIComponent(first_name_val) + "&lastname=" + encodeURIComponent(last_name_val) + "&addpassword=" + encodeURIComponent(new_paswd_val) + "&addemail=" + encodeURIComponent(new_email_val));
        } else {
            console.log("Failed to add user");
        }
    });


    // ------ NEW ISSUE ------
    $("#new-issue-btn").on('click', function(event) {
        event.preventDefault();
        
        var valid = $("#new-issue-form")[0].checkValidity();

        var title_val = $('#title').val();
        var description_val = $('#description').val();
        var assignedto_val = $('#assignedto').find(":selected").text();
        var type_val = $('#type').find(":selected").text();
        var priority_val = $('#priority').find(":selected").text();

        if(valid){
            var url = "new-issue.php";
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.open("POST",url);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    console.log("Issue created");
                }
            };
            xmlhttp.send('title=' + encodeURIComponent(title_val) + "&description=" + encodeURIComponent(description_val) + "&assignedto=" + encodeURIComponent(assignedto_val) + "&type=" + encodeURIComponent(type_val)  + "&priority=" + encodeURIComponent(priority_val) );
        } else {
            console.log("Failed to create issue");
        }
    });


    // ------ ISSUE FILTER ALL ------
    $("#issues-all-btn").on('click', function(event) {
        event.preventDefault();

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.querySelector("#issues-rows").innerHTML = this.responseText;
                //$("#issues-rows").innerHTML = this.responseText;
                //console.log(this.responseText);
            }
        };
        xmlhttp.open("GET", "issues.php?query=all", true);
        xmlhttp.send();
    });
    
    // ------ ISSUE FILTER OPEN ------
    $('#issues-open-btn').on('click', function(event) {
        event.preventDefault();

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.querySelector("#issues-rows").innerHTML = this.responseText;
                //$("#issues-rows").innerHTML = this.responseText;
                //console.log(this.responseText);
            }
        };
        xmlhttp.open("GET", "issues.php?query=open", true);
        xmlhttp.send();
    });

    // ------ ISSUE FILTER MY TICKETS ------
    $('#issues-my-tickets-btn').on('click', function(event) {
        event.preventDefault();

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.querySelector("#issues-rows").innerHTML = this.responseText;
                //$("#issues-rows").innerHTML = this.responseText;
                //console.log(this.responseText);

            }
        };
        xmlhttp.open("GET", "issues.php?query=my-tickets", true);
        xmlhttp.send();
    });

    // ------ ISSUE MARK AS CLOSED ------
    $('#issue-close-btn').on('click', function(event) {
        event.preventDefault();


    });

    // ------ ISSUE MARK IN PROGRESS ------
    $('#issue-progress-btn').on('click', function(event) {
        event.preventDefault();


    });

    // ------ NAV BUTTON EFFECT ------
    $('.nav-li').on('click', function(e) {
        e.preventDefault();
        //e.stopPropagation();
        const target = e.currentTarget;

        if ( target.classList.contains("nav-active") ) {
            return;
        }

        $('.nav-li').removeClass("nav-active");
        target.classList.add("nav-active");
    });

});



