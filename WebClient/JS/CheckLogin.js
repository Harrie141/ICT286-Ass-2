function CheckInput(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if(username == "" || password == ""){
        window.alert("Please don't leave any fields empty");
        return false;
    }
    else
    {
        return true;
    }
}