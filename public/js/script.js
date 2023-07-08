const body = document.querySelector("body"),
    modeToggle = body.querySelector(".mode-toggle");
sidebar = body.querySelector("nav");
sidebarToggle = body.querySelector(".sidebar-toggle");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "dark") {
    body.classList.toggle("dark");
}

let getStatus = localStorage.getItem("status");
if (getStatus && getStatus === "close") {
    sidebar.classList.toggle("close");
}

modeToggle.addEventListener("click", () => {
    body.classList.toggle("dark");
    if (body.classList.contains("dark")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

var count = 0;

function checkMobile() {
    const isMobile = window.matchMedia(
        "only screen and (max-width: 768px)"
    ).matches;
    if (isMobile) {
        Myswitch();
    }
}

function Myswitch() {
    if (sidebar.classList.contains("close")) {
    } else {
        sidebar.classList.toggle("close");
        document.getElementById("editText").innerHTML = "Edit";
        localStorage.setItem("status", "open");
    }
    // document.getElementById("editText").innerHTML = "";
    // localStorage.setItem("status", "close");
}

sidebarToggle.addEventListener("click", () => {
    switchNav();
});

function switchNav() {
    sidebar.classList.toggle("close");
    if (sidebar.classList.contains("close")) {
        document.getElementById("editText").innerHTML = "";
        localStorage.setItem("status", "close");
    } else {
        document.getElementById("editText").innerHTML = "Edit";
        localStorage.setItem("status", "open");
    }
}

$("#classSubmit").on("click", function () {
    var name = $("#name").val();
    var grade = $("#grade").val();
    var f = new FormData();
    f.append("name", name);
    f.append("grade", grade);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire("Success", "Registeration Success", "success").then(
                    function () {
                        refreachClassTable();
                    }
                );
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/dashboard/addClass", true);
    r.send(f);
});

function refreachClassTable() {
    var r2 = new XMLHttpRequest();
    var f2 = new FormData();
    f2.append("_token", $('meta[name="csrf-token"]').attr("content"));

    r2.onreadystatechange = function () {
        if (r2.readyState == 4) {
            $("#Tbody").html(r2.responseText);
            selected = 0;
            lastId = 0;
            document.getElementById("btn").disabled = true;
            enabled = false;
        }
    };
    r2.open("POST", "/dashboard/viewClass", true);
    r2.send(f2);
}

var selected = 0;
var lastId = 0;
var enabled = false;
function selectClass(id) {
    selected = id;

    if (lastId != 0) {
        document.getElementById("row" + lastId).className = "text2 Trow";
    }
    lastId = id;
    document.getElementById("row" + id).className = "text2  hoverClr text-dark";
    if (!enabled) {
        document.getElementById("btn").disabled = false;

        enabled = true;
    }
}

$("#btn").on("click", function () {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", selected);
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Deleted!",
                            "Record has been deleted.",
                            "success"
                        ).then(function () {
                            refreachClassTable();
                        });
                    } else {
                        Swal.fire("Warning", r.responseText, "warning");
                    }
                }
            };
            r.open("POST", "/dashboard/removeClass", true);
            r.send(f);
        }
    });
});

function adminLogin() {
    var email = $("#email").val();
    var password = $("#pswd").val();
    var f = new FormData();
    f.append("email", email);
    f.append("password", password);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire("Success", "Registeration Success", "success").then(
                    function () {
                        window.location = "/dashboard";
                    }
                );
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/login", true);
    r.send(f);
}

function signout() {
    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire("Success", "Sign Out Success", "success").then(
                    function () {
                        window.location = "/";
                    }
                );
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/dashboard/sigout", true);
    r.send(f);
}

function blockUser(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("id", id);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "blocked") {
                Swal.fire(
                    "Success",
                    "User Blocked Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else if (r.responseText == "unblocked") {
                Swal.fire(
                    "Success",
                    "User Activated Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            }
        }
    };
    r.open("POST", "/dashboard/blockUser", true);
    r.send(f);
}
var bm;
function showStudentDetails(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("id", id);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var obj = JSON.parse(r.responseText);
            document.getElementById("fullName").value = obj.fullName;
            document.getElementById("addno").value = obj.addno;
            document.getElementById("mobile").value = obj.mobile;
            document.getElementById("grade").value = obj.grade;
            document.getElementById("class").value = obj.class;
            document.getElementById("address").value = obj.address;
            document.getElementById("email").value = obj.email;
            var m = document.getElementById("myModal");
            bm = new bootstrap.Modal(m);
            bm.show();
        }
    };
    r.open("POST", "/dashboard/viewUser", true);
    r.send(f);
}

function closeModel(){
   bm.hide();
}

function searchUser(){
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("word", document.getElementById("word").value);
    f.append("grade", document.getElementById("grade").value);
    f.append("class", document.getElementById("class").value);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
           document.getElementById("userBody").innerHTML = r.responseText;
        }
    };
    r.open("POST", "/dashboard/searchUser", true);
    r.send(f);
}
