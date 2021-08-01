let symps = document.querySelectorAll(".symps");
let send = document.getElementById("send");
let gono = document.getElementById("gono");
let syph = document.getElementById("syph");
let gen = document.getElementById("gen");
// let ginp = document.getElementById("ginp");
symps.forEach(sign =>{

    sign.addEventListener("click",()=>{
       if(sign.id == "unchecked"){
        sign.id = "checked";
        if(sign.value == "Gonorrhoea"){
           gono.value = Number(gono.value) + 1
        //    ginp.value = gono.innerHTML.length;
        
       }else if(sign.value == "Syphilis"){
           syph.value = Number(syph.value) + 1
       }else if(sign.value == "Genital"){
           gen.value = Number(gen.value) + 1
       }
       }else{
           sign.id = "unchecked"
        if(sign.value == "Gonorrhoea"){
           gono.value = Number(gono.value) - 1
          
        
       }else if(sign.value == "Syphilis"){
        syph.value = Number(syph.value) - 1
       }else if(sign.value == "Genital"){
        gen.value = Number(gen.value) - 1
       }
       }
    })
})
