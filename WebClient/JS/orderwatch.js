function OrderWatch(model){
    if(model == ""){
        alert("Enter A Valid Model Number");
    }
    else{
        var xhr = new XMLHttpRequest();
        xhr.open("GET","../Server/OrderWatch.php?q=" + model, true);
        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                document.getElementById("WatchOrder").innerHTML += xhr.responseText;
            }  
        };
        xhr.send();
        document.getElementById("searchbox").value="";
        
        GetPrices(model);
        
    }
}
function ShowAllWatches(){
    var xhr = new XMLHttpRequest();
        xhr.open("GET","../Server/GetAllWatches.php", true);
        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                document.getElementById("vision").innerHTML = xhr.responseText;
            }  
        };
        xhr.send();
}
function GetPrices(model){
    var xhr = new XMLHttpRequest();
    xhr.open("GET","../Server/WatchPrice.php?q=" + model, true);
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200) {
            var c_price= xhr.responseText;
            if(c_price!=0){
            var netcost;
            netcost = document.getElementById("currentprice").innerHTML;
            document.getElementById("currentprice").innerHTML = parseFloat(netcost)+parseFloat(c_price);
            console.log(c_price)
            }
            
            
        }  
    };
    xhr.send();
}
function CLearCart(){
    document.getElementById("WatchOrder").innerHTML = "";
    document.getElementById("currentprice").innerHTML = 0;
}
function OrderCart(){
    if(document.getElementById("currentprice").innerHTML != 0){
    window.alert("Cart has been recieved, We will ship your order in 3-5 Business Days. HAPPY SHOPPING!!");
    document.getElementById("WatchOrder").innerHTML = "";
    document.getElementById("currentprice").innerHTML = 0;
    }
    else{
        window.alert("Add Something in cart");
    }
}
