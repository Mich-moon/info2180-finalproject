"use strict";

window.onload = function() {

    $('#login').on('click', function(event) {
        event.preventDefault();
        $('#doc').load('login.php'); 
    });

    // ------ NAV LINKS ------
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
        //console.log(iid);

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
        
        var valid = $("#add-user-form").checkValidity();

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
                    alert("User added");
                }
            };
            xmlhttp.send('firstname=' + encodeURIComponent(first_name_val) + "&lastname=" + encodeURIComponent(last_name_val) + "&addpassword=" + encodeURIComponent(new_paswd_val) + "&addemail=" + encodeURIComponent(new_email_val));
        } else {
            alert("Failed to add user");
        }
    });


    // ------ NEW ISSUE ------
    $("#new-issue-btn").on('click', function(event) {
        event.preventDefault();
        
        var valid = $("#new-issue-form").checkValidity();

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
                    alert("Issue created");
                }
            };
            xmlhttp.send('title=' + encodeURIComponent(title_val) + "&description=" + encodeURIComponent(description_val) + "&assignedto=" + encodeURIComponent(assignedto_val) + "&type=" + encodeURIComponent(type_val)  + "&priority=" + encodeURIComponent(priority_val) );
        } else {
            alert("Failed to create issue");
        }
    });


    // ------ ISSUE FILTER ALL ------
    $("#issues-all-btn").on('click', function(event) {
        event.preventDefault();

        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                $("#issues-rows").text() = this.responseText;
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
                $("#issues-rows").innerHTML = this.responseText;
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
                $("#issues-rows").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "issues.php?query=my-tickets", true);
        xmlhttp.send();
    });

};



