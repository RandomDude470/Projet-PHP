//switch tabs from navigation pannel
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
                element.childNodes[3].style.color='';
                
            }
            item.style.backgroundColor= '8211A9'
            item.childNodes[3].style.color= 'white'
            
            tabs[0].style.height = '100vh'

        } else if(item==nav_items[1]) {
            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                element.style.height='0';
                
            }
            for (let index = 0; index < nav_items.length; index++) {
                const element = nav_items[index];
                element.style.backgroundColor='';
                element.childNodes[3].style.color='';
                
            }
            item.style.backgroundColor= '9f0e05'
            item.childNodes[3].style.color= 'white'
            tabs[1].style.height = '100vh'
        }else{
            for (let index = 0; index < tabs.length; index++) {
                const element = tabs[index];
                element.style.height='0';
                
            }
            for (let index = 0; index < nav_items.length; index++) {
                const element = nav_items[index];
                element.style.backgroundColor='';
                element.childNodes[3].style.color='';
                
            }
            item.style.backgroundColor= '8211A9'
            item.childNodes[3].style.color= 'white'
            tabs[2].style.height = '100vh'
        }
    }
})

//collapse images tab 

const collections_tab = document.querySelector('.mediagrid-wrapper')
const images = document.querySelector('.collapsable-img-tab')
const collpasebutton = document.querySelector('.collapsebutton')


collpasebutton.onclick = function () { 
    collpasebutton.style.display = 'none'
    images.style.width = '0'
    collections_tab.style.width = '100%'

 }

//generate the images in the image collapsible

const collections = [...document.querySelectorAll('.mediabloc')]
collections.forEach(element => {
    element.onclick = function () { 
        $('.images').html("") 
        let collectionname = element.lastElementChild.innerHTML
        var xhr_request = new XMLHttpRequest
        xhr_request.open('GET','get_images.php?collection='+collectionname, true)
        xhr_request.onload = function () { 
            if (xhr_request.status = 200) {
                response = JSON.parse(xhr_request.responseText)
                response.forEach(ele =>{
                    $(".images").append($.parseHTML("<div class=\"image-card\" title=\"loremhhhhhhhhhhhhhhhhhhhhhhhhh\" data-audio=\""+ele.audio+"\"><div style=\"background-image:url('"+ele.link+"')\"></div><p>"+ele.name+"</p></div>"))
                })

            }
            //open image tab
            images.style.width = '100%'
            collections_tab.style.width = '0'
            setTimeout(() => {  collpasebutton.style.display = 'flex'; }, 300);
            
            // play animal sounds
            let collection_imgs = [...document.querySelectorAll('.image-card')]
        collection_imgs.forEach(a =>{
            a.onclick = function () { 
                let audio = new Audio(a.getAttribute("data-audio"))
                audio.play()
                console.log(a.getAttribute("data-audio"));

             }
        })
         }

        xhr_request.send()
        

     }
});

//collection animation
collections.forEach(coll =>{
    coll.firstElementChild.addEventListener("mouseover",(ev)=>{
        console.log(coll);
        coll.firstElementChild.style.transform ="translateX(-66px) translateY(2px) rotate(350deg)"
        coll.firstElementChild.firstElementChild.style.transform = " translateX(129px) translateY(31px) rotate(20deg)"
    })
    coll.firstElementChild.addEventListener("mouseout",(ev)=>{
        console.log(coll);
        coll.firstElementChild.style.transform =""
        coll.firstElementChild.firstElementChild.style.transform = ""
    })
})
