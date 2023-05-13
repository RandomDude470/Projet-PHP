let burger_menu = document.querySelector('.nav-menu');
let nav_menu = document.querySelector('.navigation');
console.log(document.querySelector('.nav-menu'));
let button_state =1;
burger_menu.onclick = function () {
    if (button_state == 0) {
       nav_menu.style.width = '0';
       burger_menu.style.backgroundImage = 'url(\'assests/burger-menu.svg\')';
 
        button_state++;
        
    } else {
       nav_menu.style.width = '100%';
      burger_menu.style.backgroundImage = 'url(\'assests/cross1.svg\')';
       button_state--;
    }
    console.log('sldkhd')
}