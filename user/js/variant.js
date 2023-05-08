function idr(money){
  let formatted = "Rp" + money.toLocaleString("id-ID");
  return formatted;
}

function myVariant(id,money){
  let sad= document.getElementsByName("var"); 
  for(let i = 0; i < sad.length; i++){
    if(sad[i].id == id){
      document.getElementById(id).classList.add("active");
      document.getElementById("pc").innerHTML = idr(money); 
      
    }
    else{
      document.getElementById(sad[i].id).classList.remove("active");
    }
  }  
}
