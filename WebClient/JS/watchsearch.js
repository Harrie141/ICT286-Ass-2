function SearchWatches(watch){
    var wsearch;
    wsearch = "Searched item: "+ watch;
    document.getElementById("srch").innerHTML=wsearch;
    console.log("R1");

    var xhr = new XMLHttpRequest();
    xhr.open("GET","../Server/WatchSearch.php?q=" + watch, true);
    console.log("stage1");
    xhr.onreadystatechange = function () {
        console.log("stage2");        
        if (xhr.readyState == 4 && xhr.status == 200) {
            
            document.getElementById("watchp").innerHTML = xhr.responseText;
        }  
    };
    xhr.send();
}