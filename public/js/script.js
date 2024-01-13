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
        // Myswitch();
    }
}

function Myswitch() {
    if (sidebar.classList.contains("close")) {
    } else {
        sidebar.classList.toggle("close");
        // document.getElementById("editText").innerHTML = "Edit";
        // localStorage.setItem("status", "open");
        document.getElementById("editText").innerHTML = "";
        localStorage.setItem("status", "close");
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
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
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
                Swal.fire("Success", "Login Success", "success").then(
                    function () {
                        window.location = "/dashboard";
                    }
                );
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/adminLogin", true);
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

function userSignout() {
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
    r.open("POST", "/user/sigout", true);
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
            document.getElementById("userImg").src = obj.image;
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

function closeModel() {
    bm.hide();
}

function searchUser() {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("word", document.getElementById("word").value);
    f.append("grade", document.getElementById("Mgrade").value);
    f.append("class", document.getElementById("Mclass").value);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            document.getElementById("userBody").innerHTML = r.responseText;
        }
    };
    r.open("POST", "/dashboard/searchUser", true);
    r.send(f);
}

function approveUser(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("id", id);

    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Approved") {
                Swal.fire(
                    "Success",
                    "User Approved Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            }
        }
    };
    r.open("POST", "/dashboard/approveUserProcess", true);
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
var unsetImg = 0;

function removeImage() {
    if (unsetImg != 1) {
        var prev = document.getElementById("prev0");
        prev.src = document.getElementById("defImgPath").innerHTML;
        issetImg = 0;
        unsetImg = 1;
    }
}

function publishPost() {
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    f.append("title", title);
    f.append("description", description);
    f.append("i", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "success") {
                Swal.fire(
                    "Success",
                    "Post Published Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };

    r.open("POST", "/createPostProcess", true);
    r.send(f);
}

function updateProfile() {
    var full_name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var index = document.getElementById("index").value;
    var mobile = document.getElementById("mobile").value;
    var grade = document.getElementById("grade").value;
    var address = document.getElementById("address").value;
    var Userclass = document.getElementById("class").value;
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    f.append("full_name", full_name);
    f.append("email", email);
    f.append("index", index);
    f.append("mobile", mobile);
    f.append("grade", grade);
    f.append("address", address);
    f.append("class", Userclass);
    f.append("isset", issetImg);
    f.append("unset", unsetImg);
    f.append("i", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "success") {
                Swal.fire(
                    "Success",
                    "Profile Updated Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };

    r.open("POST", "/updateProfileProcess", true);
    r.send(f);
}

function showPostDetails(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("id", id);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var obj = JSON.parse(r.responseText);
            document.getElementById("user").value = obj.user;
            document.getElementById("title").value = obj.title;
            document.getElementById("description").innerHTML = obj.description;
            document.getElementById("created_date").value = obj.created_date;
            document.getElementById("created_time").value = obj.created_time;
            document.getElementById("postImg").src = obj.image;

            var m = document.getElementById("myModal");
            bm = new bootstrap.Modal(m);
            bm.show();
        }
    };
    r.open("POST", "/dashboard/viewPost", true);
    r.send(f);
}

function showNewsDetails(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("id", id);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var obj = JSON.parse(r.responseText);
            document.getElementById("user").value = obj.user;
            document.getElementById("title").value = obj.title;
            document.getElementById("description").innerHTML = obj.description;
            document.getElementById("created_date").value = obj.created_date;
            document.getElementById("created_time").value = obj.created_time;
            document.getElementById("postImg").src = obj.image;

            var m = document.getElementById("myModal");
            bm = new bootstrap.Modal(m);
            bm.show();
        }
    };
    r.open("POST", "/dashboard/viewNews", true);
    r.send(f);
}

function approvePost(id) {
    var f = new FormData();
    f.append("id", id);
    var r = new XMLHttpRequest();

    f.append("id", id);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Post Approved Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            }
        }
    };
    r.open("POST", "/dashboard/approvePostProcess", true);
    r.send(f);
}

function deletePost(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4c30 ",
        cancelButtonColor: "#007BFF",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", id);
            var r = new XMLHttpRequest();

            f.append("id", id);
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Success",
                            "Post Deleted Successfully",
                            "success"
                        ).then(function () {
                            location.reload();
                        });
                    }
                }
            };
            r.open("POST", "/dashboard/deletePostProcess", true);
            r.send(f);
        }
    });
}

function deleteNews(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4c30 ",
        cancelButtonColor: "#007BFF",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", id);
            var r = new XMLHttpRequest();

            f.append("id", id);
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Success",
                            "Post Deleted Successfully",
                            "success"
                        ).then(function () {
                            location.reload();
                        });
                    }
                }
            };
            r.open("POST", "/dashboard/deleteNewsProcess", true);
            r.send(f);
        }
    });
}

function postComment(id) {
    var comment = document.getElementById("comment").value;
    var f = new FormData();
    f.append("id", id);
    var r = new XMLHttpRequest();

    f.append("id", id);
    f.append("comment", comment);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Comment Posted Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/user/postCommentProcess", true);
    r.send(f);
}

function postNewsComment(id) {
    var comment = document.getElementById("comment").value;

    var f = new FormData();
    f.append("id", id);

    var r = new XMLHttpRequest();

    f.append("id", id);
    f.append("comment", comment);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Comment Posted Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/user/postNewsCommentProcess", true);
    r.send(f);
}

function adminMakeEvent() {
    var title = document.getElementById("title").value;

    var stime = document.getElementById("stime").value;

    var etime = document.getElementById("etime").value;
    var date = document.getElementById("date").value;

    var location = document.getElementById("location").value;
    var description = document.getElementById("description").value;
    var f = new FormData();
    f.append("title", title);
    f.append("stime", stime);
    f.append("etime", etime);
    f.append("date", date);
    f.append("location", location);
    f.append("description", description);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Event Added Successfully",
                    "success"
                ).then(function () {
                    document.getElementById("title").value = "";
                    document.getElementById("stime").value = "00:00";
                    document.getElementById("etime").value = "00:00";
                    document.getElementById("date").value = "";
                    document.getElementById("location").value = "";
                    document.getElementById("description").value = "";
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/admin/createEventProcess", true);
    r.send(f);
}

function deleteEvent(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4c30 ",
        cancelButtonColor: "#007BFF",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", id);
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Success",
                            "Event Deleted Successfully",
                            "success"
                        ).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Warning", r.responseText, "warning");
                    }
                }
            };
            r.open("post", "/admin/deleteEvent", true);
            r.send(f);
        }
    });
}

function publishNews() {
    var title = document.getElementById("title").value;
    var description = document.getElementById("description").value;
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    f.append("title", title);
    f.append("description", description);
    f.append("i", image.files[0]);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "success") {
                Swal.fire(
                    "Success",
                    "Post Published Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };

    r.open("POST", "/admin/createNewsProcess", true);
    r.send(f);
}

function sendTestEmail() {
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("email", email);

    f.append("name", name);
    f.append("_token", document.getElementById("csrf").getAttribute("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            document.getElementById("text").innerHTML = r.responseText;
        }
    };
    r.open("post", "/sendtestEmailProcess", true);
    r.send(f);
}

var selectedPos = 0;
var lastIdPos = 0;
var enabledPos = false;
function selectPosition(id) {
    selectedPos = id;

    if (lastIdPos != 0) {
        document.getElementById("row" + lastIdPos).className = "text2 Trow";
    }
    lastIdPos = id;
    document.getElementById("row" + id).className = "text2  hoverClr text-dark";
    if (!enabledPos) {
        document.getElementById("deleteBtn").disabled = false;
        document.getElementById("updateBtn").disabled = false;

        enabledPos = true;
    }
}

function deletePosition() {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("id", selectedPos);
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Deleted!",
                            "Position has been deleted.",
                            "success"
                        ).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Warning", r.responseText, "warning");
                    }
                }
            };
            r.open("POST", "/dashboard/removePosition", true);
            r.send(f);
        }
    });
}

function addBoardPosition() {
    var name = document.getElementById("posName").value;
    var index = document.getElementById("indexVal").value;
    var f = new FormData();
    var r = new XMLHttpRequest();
    f.append("name", name);
    f.append("index", index);

    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Position Added Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };

    r.open("POST", "/dashBoard/addPosition", true);
    r.send(f);
}

function addBoardMember() {
    var name = document.getElementById("memberName").value;
    var email = document.getElementById("memberEmail").value;
    var position = document.getElementById("position").value;
    var mobile = document.getElementById("memberMobile").value;
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    f.append("name", name);
    f.append("email", email);
    f.append("position", position);
    f.append("mobile", mobile);
    f.append("i", image.files[0]);
    f.append("isset", issetImg);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Board Member Added Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/addBoardMemberProcess", true);
    r.send(f);
}

function showMemberDetails(id) {
    var r = new XMLHttpRequest();
    var f = new FormData();
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    f.append("id", id);
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText != "Error") {
                var obj = JSON.parse(r.responseText);
                document.getElementById("name").value = obj.name;
                document.getElementById("position").value = obj.position;
                document.getElementById("mobile").value = obj.mobile;
                document.getElementById("email").value = obj.email;
                document.getElementById("prev0").src = obj.image;
                document.getElementById("mID").innerHTML = obj.id;
                var m = document.getElementById("myModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert("There was an error Please Try again");
            }
        }
    };
    r.open("POST", "/dashboard/viewMemberDetails", true);
    r.send(f);
}

function saveMemberChanges() {
    var id = document.getElementById("mID").innerHTML;
    var name = document.getElementById("name").value;
    var position = document.getElementById("position").value;
    var mobile = document.getElementById("mobile").value;
    var email = document.getElementById("email").value;
    var image = document.getElementById("profileimg");
    var f = new FormData();
    f.append("id", id);
    f.append("name", name);
    f.append("position", position);
    f.append("mobile", mobile);
    f.append("email", email);
    f.append("i", image.files[0]);
    f.append("isset", issetImg);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            if (r.responseText == "Success") {
                Swal.fire(
                    "Success",
                    "Board Member Updated Successfully",
                    "success"
                ).then(function () {
                    location.reload();
                });
            } else {
                Swal.fire("Warning", r.responseText, "warning");
            }
        }
    };
    r.open("POST", "/updateMemberDetails", true);
    r.send(f);
}

function deleteMember(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ff4c30 ",
        cancelButtonColor: "#007BFF",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            var f = new FormData();
            f.append("_token", $('meta[name="csrf-token"]').attr("content"));
            f.append("id", id);
            var r = new XMLHttpRequest();
            r.onreadystatechange = function () {
                if (r.readyState == 4) {
                    if (r.responseText == "Success") {
                        Swal.fire(
                            "Success",
                            "Board Member Deleted Successfully",
                            "success"
                        ).then(function () {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Warning", r.responseText, "warning");
                    }
                }
            };

            r.open("POST", "/deleteMember", true);
            r.send(f);
        }
    });
}

function vieWUpdatePosition() {
    var f = new FormData();

    f.append("id", selectedPos);
    f.append("_token", $('meta[name="csrf-token"]').attr("content"));
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4) {

            if(r.responseText != "Error"){
                var obj = JSON.parse(r.responseText);
                document.getElementById("name").value = obj.name;
                document.getElementById("index").value = obj.index;
                document.getElementById("pID").innerHTML = obj.id;
                var m = document.getElementById("myModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            }

        }
    };

    r.open("POST", "/updatePosition", true);
    r.send(f);
}

function savePositionChanges(){
   var id = document.getElementById("pID").innerHTML;
   var index = document.getElementById("index").value;
   var name = document.getElementById("name").value;

   var f = new FormData();
   f.append("_token", $('meta[name="csrf-token"]').attr("content"));
   f.append("id", id);
   f.append("index",index);
   f.append("name",name);
   var r = new XMLHttpRequest();
   r.onreadystatechange = function () {
       if (r.readyState == 4) {

           if (r.responseText == "Success") {
               Swal.fire(
                   "Success",
                   "Board Position Updated Successfully",
                   "success"
               ).then(function () {
                   location.reload();
               });
           } else {
               Swal.fire("Warning", r.responseText, "warning");
           }
       }
   };

   r.open("POST", "/updatePositionProcess", true);
   r.send(f);
}
