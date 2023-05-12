function idr(money){
    let formatted = "Rp" + money.toLocaleString("id-ID");
    return formatted;
};

function count(price,value){
    return price * value;
};

function myFunction(price) {    
    let x = document.getElementById("typeNumber").value;
    if(x > 10){             
        document.getElementById("jumlah").value = 10;
        document.getElementById("typeNumber").value = 10;
        document.getElementById("hideTotal").value = count(price,10);
        document.getElementById("msg").innerHTML = "<div class='alert alert-danger d-flex align-items-center mt-2 p-2' role='alert'><i class='fa-solid fa-triangle-exclamation'></i><div class='px-1'>Jumlah tidak boleh lebih dari 10</div></div>";
        document.getElementById("total").innerHTML = idr(count(price,10))
        document.getElementById("total2").innerHTML = idr(count(price,10))
    }else{
        document.getElementById("msg").innerHTML = "";
        document.getElementById("jumlah").value = x;
        document.getElementById("hideTotal").value = count(price,x);
        document.getElementById("total").innerHTML = idr(count(price,x))
        document.getElementById("total2").innerHTML = idr(count(price,x))
    }    
};

function note(){
    let x = document.getElementById("footNote").value;
    document.getElementById("hideNote").value = x;
}



