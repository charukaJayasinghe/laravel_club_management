var RegitserOption = "none";

$("#option-1").click(function () {
    RegitserOption = "Nalanda";
    $("#other").hide(1000);
    $("#CS").show(1000);
    $("#nbtn").css("background-color", "#CEEDC7");
    $("#ndot").css("background-color", "#0069d9");
    $("#obtn").css("background-color", "#fff");
    $("#odot").css("background-color", "#d9d9d9");
});
$("#option-2").click(function () {
    $("#CS").hide(1000);
    $("#other").show(1000);
    RegitserOption = "Other";
    $("#obtn").css("background-color", "#CEEDC7");
    $("#odot").css("background-color", "#0069d9");
    $("#nbtn").css("background-color", "#fff");
    $("#ndot").css("background-color", "#d9d9d9");
});

function signup() {
    if (RegitserOption == "none") {
        Swal.fire({
            title: "Warning",
            text: "Please Select a User type",
            icon: "warning",
            confirmButtonText: "Close",
        });
    } else {
        var f = new FormData();
        f.append("_token", $('meta[name="csrf-token"]').attr("content"));
        if (RegitserOption == "Nalanda") {
            f.append("fullName", $("#fullName").val());
            f.append("index", $("#index").val());
            f.append("address", $("#address").val());
            f.append("grade", $("#grade").val());
            f.append("class", $("#class").val());
            f.append("email", $("#email").val());
            f.append("mobile", $("#mobile").val());
            f.append("password", $("#password").val());
            f.append("repassword", $("#repassword").val());
            f.append("utype", RegitserOption);
        } else if (RegitserOption == "Other") {
            f.append("fullName", $("#ofullname").val());
            f.append("school", $("#oschool").val());
            f.append("grade", $("#ograde").val());
            f.append("email", $("#oemail").val());
            f.append("mobile", $("#omobile").val());
            f.append("password", $("#opassword").val());
            f.append("repassword", $("#orepassword").val());
            f.append("utype", RegitserOption);
        }

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                if (r.responseText == "Success") {
                    Swal.fire(
                        "Success",
                        "Signup Success",
                        "success"
                    ).then(function () {
                        window.location = "/login";
                    });
                }else{
                    Swal.fire("Warning", r.responseText, "warning");
                }
            }
        };

        r.open("POST", "/userSignup", false);
        r.send(f);
    }
}

function login() {
    var f = new FormData();
    f.append("email", $("#email").val());

    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    f.append("password", $("#password").val());

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if(r.responseText == "Login Success"){
                Swal.fire(
                    "Success",
                    "Login Success",
                    "success"
                ).then(function () {
                  window.location = "/userDashboard";
                });
            }else{

                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/userLoginProcess", true);
    r.send(f);
}

function resetPassword() {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            alert(r.responseText);
        }
    };
    r.open(
        "GET",
        "restpasswordProcess.php?email=" + $("#resetemail").val(),
        true
    );
    r.send();
}
