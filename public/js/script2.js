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

async function signup() {
    await new Promise(promisFunction);
    function promisFunction(resolve, reject) {
        function step1() {
            document.getElementById("signUpBtn").innerHTML = "Loading...";
            document.getElementById("signUpBtn").disabled = true;
            resolve();
        }
        step1();
    }

    var input = document.getElementById("profileimg");
    var image = input.files[0];
    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    if (image) {
        if (image.type.startsWith("image/")) {
            if (image.size <= 40 * 1024 * 1024) {
                f.append("fullName", $("#fullName").val());
                f.append("index", $("#index").val());
                f.append("address", $("#address").val());
                f.append("grade", $("#grade").val());
                f.append("class", $("#class").val());
                f.append("email", $("#email").val());
                f.append("mobile", $("#mobile").val());
                f.append("password", $("#password").val());
                f.append("isset", issetImg);
                f.append("i", image);
                f.append("repassword", $("#repassword").val());
                f.append("utype", RegitserOption);

                var r = new XMLHttpRequest();
                r.onreadystatechange = function () {
                    if (r.readyState == 4) {
                        document.getElementById("signUpBtn").innerHTML =
                            "Sign Up";

                        document.getElementById("signUpBtn").disabled = false;

                        if (r.responseText == "Success") {
                            Swal.fire(
                                "Success",
                                "Signup Success",
                                "success"
                            ).then(function () {
                                window.location = "/login";
                            });
                        } else {
                            Swal.fire("Warning", r.responseText, "warning");
                        }
                    }
                };

                r.open("POST", "/userSignup", true);
                r.send(f);
            } else {
                Swal.fire(
                    "Warning",
                    "Image size exceeds 40MB. Please select a smaller image.",
                    "warning"
                );
                document.getElementById("signUpBtn").innerHTML = "Sign Up";

                document.getElementById("signUpBtn").disabled = false;
            }
        } else {
            Swal.fire(
                "Warning",
                "Invalid file type. Please select an image file.",
                "warning"
            );
            document.getElementById("signUpBtn").innerHTML = "Sign Up";

            document.getElementById("signUpBtn").disabled = false;
        }
    } else {
        f.append("fullName", $("#fullName").val());
        f.append("index", $("#index").val());
        f.append("address", $("#address").val());
        f.append("grade", $("#grade").val());
        f.append("class", $("#class").val());
        f.append("email", $("#email").val());
        f.append("mobile", $("#mobile").val());
        f.append("password", $("#password").val());
        f.append("isset", issetImg);
        f.append("repassword", $("#repassword").val());
        f.append("utype", RegitserOption);

        var r = new XMLHttpRequest();
        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                document.getElementById("signUpBtn").innerHTML = "Sign Up";

                document.getElementById("signUpBtn").disabled = false;
                if (r.responseText == "Success") {
                    Swal.fire("Success", "Signup Success", "success").then(
                        function () {
                            window.location = "/login";
                        }
                    );
                } else {
                    Swal.fire("Warning", r.responseText, "warning");
                }
            }
        };

        r.open("POST", "/userSignup", true);
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
            if (r.responseText == "Login Success") {
                Swal.fire("Success", "Login Success", "success").then(
                    function () {
                        window.location = "/userDashboard";
                    }
                );
            } else {
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

function directToLogin() {
    window.location = "/login";
}

function sendVerificationCode() {
    var email = document.getElementById("email").value;
    var button = document.getElementById("sendBtn");
    button.innerHTML = "Loading...";
    button.disabled = true;

    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("_token", document.getElementById("csrf").getAttribute("content"));
    f.append("email", email);
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Email sent successfully. Please Check your inbox",
                    "success"
                ).then(function () {
                    window.location = "/enterVerifyCode";
                });
            } else {
                button.innerHTML = "Send Code";
                Swal.fire("Warning", r.responseText, "warning").then(
                    function () {
                        window.location = "/fogotPassword";
                    }
                );
            }
        }
    };

    r.open("POST", "/sendEmailProcess", true);
    r.send(f);
}

function verifyUser() {
    var number1 = document.getElementById("number1").value;
    var number2 = document.getElementById("number2").value;
    var number3 = document.getElementById("number3").value;
    var number4 = document.getElementById("number4").value;
    var number5 = document.getElementById("number5").value;
    var number6 = document.getElementById("number6").value;
    var button = document.getElementById("verifyBtn");
    button.innerHTML = "Loading...";
    button.disabled = true;
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("_token", document.getElementById("csrf").getAttribute("content"));
    f.append("code", number1 + number2 + number3 + number4 + number5 + number6);
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "The verification Code is Correct!",
                    "success"
                ).then(function () {
                    window.location = "/updatePassword";
                });
            } else {
                button.innerHTML = "Verify";
                Swal.fire("Warning", r.responseText, "warning").then(
                    function () {
                        window.location = "/enterVerifyCode";
                    }
                );
            }
        }
    };
    r.open("POST", "/verifyProcess", true);
    r.send(f);
}
function updatePassword() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("Repassword").value;
    var button = document.getElementById("updateBtn");
    button.innerHTML = "Loading...";
    button.disabled = true;
    var r = new XMLHttpRequest();
    var f = new FormData();

    f.append("_token", document.getElementById("csrf").getAttribute("content"));
    f.append("pass1", pass1);
    f.append("pass2", pass2);
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire("Success", "Password Reset Success!", "success").then(
                    function () {
                        window.location = "/login";
                    }
                );
            } else if (r.responseText == "expired") {
                Swal.fire("Warning", r.responseText, "warning").then(
                    function () {
                        window.location = "/fogotPassword";
                    }
                );
            } else {
                button.innerHTML = "Update";
                Swal.fire("Warning", r.responseText, "warning").then(
                    function () {
                        window.location = "/updatePassword";
                    }
                );
            }
        }
    };
    r.open("POST", "/updatePasswordProcess", true);
    r.send(f);
}

var issetImg = 0;
function changeImage() {
    var image = document.getElementById("profileimg");
    var prev = document.getElementById("prev0");

    image.onchange = function () {
        var file0 = this.files[0];
        var url0 = window.URL.createObjectURL(file0);
        prev.src = url0;
        issetImg = 1;
        unsetImg = 0;
    };
}
