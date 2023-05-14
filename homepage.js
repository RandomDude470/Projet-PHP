const nav_items =[...document.querySelectorAll('.nav-item')];
const tabs = [...document.querySelectorAll('main section')];


nav_items.forEach(item=>{
    item.onclick = function () { 
        if (item==nav_items[0]) {
            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                element.style.height='0';
                
            }
            for (let index = 0; index < nav_items.length; index++) {
                const element = nav_items[index];
                element.style.backgroundColor='';
                
            }
            item.style.backgroundColor= '35275F'
            tabs[0].style.height = '100vh'

        } else if(item==nav_items[1]) {
            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                element.style.height='0';
                
            }
            for (let index = 0; index < nav_items.length; index++) {
                const element = nav_items[index];
                element.style.backgroundColor='';
                
            }
            item.style.backgroundColor= '35275F'
            tabs[1].style.height = '100vh'
        }else{
            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                element.style.height='0';
                
            }
            for (let index = 0; index < nav_items.length; index++) {
                const element = nav_items[index];
                element.style.backgroundColor='';
                
            }
            item.style.backgroundColor= '35275F'
            tabs[2].style.height = '100vh'
        }
    }
})
