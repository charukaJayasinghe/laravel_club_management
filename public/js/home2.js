
function subscribe(){

var email = document.getElementById("emailSub").value;
var name = document.getElementById("nameSub").value;

var csrf = document.getElementById("csrf").getAttribute("content");

document.getElementById("emailSub").style.borderColor = "hsla(216, 33%, 68%, 1)";
document.getElementById("nameSub").style.borderColor ="hsla(216, 33%, 68%, 1)";
var f = new FormData();
f.append("_token",csrf);

f.append("name",name);

f.append("email",email);

var r = new XMLHttpRequest();

r.onreadystatechange = function(){
  if(r.readyState == 4){
    if(r.responseText == "name email"){
        document.getElementById("emailSub").style.borderColor = "red";
        document.getElementById("nameSub").style.borderColor = "red";
    }else if( r.responseText == "name"){
        document.getElementById("nameSub").style.borderColor = "red";
    }else if(r.responseText == "email"){
        document.getElementById("emailSub").style.borderColor = "red";
    }else if(r.response == "sucess"){
        Swal.fire(
            "Success",
            "<h1>Subsription added Successfully</h1>",
            "success"
        )
    }else{
        Swal.fire("Warning", "<h1>"+ r.responseText+"</h1>", "warning");
    }

  }
}
r.open("POST","/guestSubscribe",true);
r.send(f);


}


