let big_img = document.querySelector('#big-img');
let small_img = document.querySelectorAll('#small-img');
// small_img.forEach(function(value,index){
//     value.addEventListener('click',function(){
//         big_img.src=value.src;
//     })
// })
for(var i=0;i<small_img.length;++i){
    small_img[i].onclick = function(e){
        big_img.src = e.target.src;
    }
}
let chitiet = document.querySelector('#Home');
let baoquan = document.querySelector('#Menu1');
let thamkhao = document.querySelector('#Menu2');

let chitietchild = document.querySelector('#home');
let baoquanchild = document.querySelector('#menu1');
let thamkhaochild = document.querySelector('#menu2');
let tab = document.querySelectorAll(".tab-pan");

chitiet.addEventListener('click',function(){
    chitiet.classList.toggle("active");
    baoquan.classList.remove("active");
    thamkhao.classList.remove("active");
    chitietchild.classList.toggle("activ");
    baoquanchild.classList.remove("activ");
    thamkhaochild.classList.remove("activ");
})
baoquan.addEventListener('click',function(){
    chitiet.classList.remove("active");
    baoquan.classList.toggle("active");
    thamkhao.classList.remove("active");
    baoquanchild.classList.toggle("activ");
    chitietchild.classList.remove("activ");
    thamkhaochild.classList.remove("activ");
})
thamkhao.addEventListener('click',function(){
    chitiet.classList.remove("active");
    thamkhao.classList.toggle("active");
    baoquan.classList.remove("active");
    thamkhaochild.classList.toggle("activ");
    chitietchild.classList.remove("activ");
    baoquanchild.classList.remove("activ");
})
        
