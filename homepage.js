//check if admin
ver_password = $("p.security-verification")[0]? $("p.security-verification")[0].innerHTML: '';
const email = document.querySelector("#email").innerHTML;
var admin = 0;
xhrchechkadmin = new XMLHttpRequest();
xhrchechkadmin.open("GET", "isadmin.php?email=" + email, true);
xhrchechkadmin.onload = () => {
  if (xhrchechkadmin.status == 200) {
    if (xhrchechkadmin.responseText == "yes") {
      admin = 1;
    }
  }
};
xhrchechkadmin.send();

//switch tabs from navigation pannel
const nav_items = [...document.querySelectorAll(".nav-item")];
const tabs = [...document.querySelectorAll("main section")];

nav_items.forEach((item) => {
  item.onclick = function () {
    if (item == nav_items[0]) {
      for (let index = 0; index < tabs.length; index++) {
        const element = tabs[index];
        element.style.height = "0";
      }
      for (let index = 0; index < nav_items.length; index++) {
        const element = nav_items[index];
        element.style.backgroundColor = "";
        element.childNodes[3].style.color = "";
      }
      item.style.backgroundColor = "8211A9";
      item.childNodes[3].style.color = "white";

      tabs[0].style.height = "100vh";
    } else if (item == nav_items[1]) {
      for (let index = 0; index < tabs.length; index++) {
        const element = tabs[index];
        element.style.height = "0";
      }
      for (let index = 0; index < nav_items.length; index++) {
        const element = nav_items[index];
        element.style.backgroundColor = "";
        element.childNodes[3].style.color = "";
      }
      item.style.backgroundColor = "9f0e05";
      item.childNodes[3].style.color = "white";
      tabs[1].style.height = "100vh";
    } else {
      for (let index = 0; index < tabs.length; index++) {
        const element = tabs[index];
        element.style.height = "0";
      }
      for (let index = 0; index < nav_items.length; index++) {
        const element = nav_items[index];
        element.style.backgroundColor = "";
        element.childNodes[3].style.color = "";
      }
      item.style.backgroundColor = "8211A9";
      item.childNodes[3].style.color = "white";
      tabs[2].style.height = "100vh";
    }
  };
});

//collapse a collection's images tab

const collections_tab = document.querySelector(".mediagrid-wrapper");
const images = document.querySelector(".collapsable-img-tab");
const collpasebutton = document.querySelector(".collapsebutton");

collpasebutton.onclick = function () {
  collpasebutton.style.display = "none";
  images.style.width = "0";
  collections_tab.style.width = "100%";
};

//generate the images in the image collapsible

const collections = [...document.querySelectorAll(".mediabloc.real")];
addimage_from_ui = $("div[title='Add']")[0];

collections.forEach((element) => {
  element.onclick = function () {
    if ($('.image-card[title="Add"]')[0]) {
      $(".images").html("");
      $(".images").append(
        $.parseHTML(
          '<div class="image-card" title="Add"><div style="background-image:url(\'assests/add.svg\');"></div><p>Add image</p></div>'
        )
      );
    } else {
      $(".images").html("");
    }
    let collectionname = element.lastElementChild.innerHTML;
    var xhr_request = new XMLHttpRequest();
    xhr_request.open(
      "GET",
      "get_images.php?collection=" + collectionname,
      true
    );
    xhr_request.onload = function () {
      if ((xhr_request.status = 200)) {
        response = JSON.parse(xhr_request.responseText);

        response.forEach((ele) => {
          $(".images").append(
            $.parseHTML(
              '<div class="image-card realimg" title="' +
                ele.description +
                '" data-audio="' +
                ele.audio +
                '"><div style="background-image:url(\'' +
                ele.link +
                "')\"></div><p>" +
                ele.name +
                "</p></div>"
            )
          );
        });
      }
      //open image tab
      images.style.width = "100%";
      collections_tab.style.width = "0";
      setTimeout(() => {
        collpasebutton.style.display = "flex";
      }, 300);

      // play animal sounds and make add image clickable
      let collection_imgs = [...document.querySelectorAll(".image-card")];
      addimage_from_ui = $("div[title='Add']")[0];
      collection_imgs.forEach((a) => {
        if (a.classList.contains("realimg")) {
          a.onclick = function () {
            let audio = new Audio(a.getAttribute("data-audio"));
            audio.play();
            console.log(a.getAttribute("data-audio"));
          };
        } else {
          
          addimage_from_ui.addEventListener("click", function (ev) {
            $("dialog.collection_image_add")[0].showModal();
            $("dialog.collection_image_add")[0].style.opacity = "1";
          });
        }
      });
    };

    xhr_request.send();
  };
});

//collection animation
collections.forEach((coll) => {
  coll.firstElementChild.addEventListener("mouseover", (ev) => {
    coll.firstElementChild.style.transform =
      "translateX(-66px) translateY(2px) rotate(350deg)";
    coll.firstElementChild.firstElementChild.style.transform =
      " translateX(129px) translateY(31px) rotate(20deg)";
  });
  coll.firstElementChild.addEventListener("mouseout", (ev) => {
    coll.firstElementChild.style.transform = "";
    coll.firstElementChild.firstElementChild.style.transform = "";
  });
});
// change password

const ch_p_link = document.querySelector("span.pass-chang");
const confirm_button = document.querySelector(
  "dialog.changp .change-password-button"
);
const cancelbutton = document.querySelector("dialog.changp .cancel");
const dialogbox = document.querySelector("dialog.changp");
const resultdiv = document.querySelector("dialog.changp .result");

ch_p_link.onclick = function () {
  dialogbox.showModal();
  dialogbox.style.opacity = "1";
};
cancelbutton.onclick = function () {
  dialogbox.close();
  dialogbox.style.opacity = "0";
};

confirm_button.onclick = function () {
  const oldpass = document.querySelector("#oldp").value;
  const newpass = document.querySelector("#newp").value;

  xhrrequestpassword = new XMLHttpRequest();
  xhrrequestpassword.open(
    "GET",
    "changepass.php?oldpass=" +
      oldpass +
      "&newpass=" +
      newpass +
      "&email=" +
      email,
    true
  );
  xhrrequestpassword.onload = function () {
    if (xhrrequestpassword.status == 200) {
      if (xhrrequestpassword.responseText == "done") {
        resultdiv.innerHTML = "successfully changed";
        resultdiv.style.color = "green";
      } else if (xhrrequestpassword.responseText == "nomatch") {
        resultdiv.innerHTML = "the old password is wrong";
        resultdiv.style.color = "red";
      } else if (xhrrequestpassword.responseText == "empty") {
        resultdiv.innerHTML = "Please use a valid password ";
        resultdiv.style.color = "red";
      } else {
        resultdiv.innerHTML = " database error ";
        resultdiv.style.color = "red";
      }
    }
  };
  xhrrequestpassword.send();
};
//delete account
const deleteacclink = document.querySelector(".delete-acc");
const confirm_button_d = document.querySelector(
  "dialog.deleteacc .change-password-button"
);
const cancelbutton_d = document.querySelector("dialog.deleteacc .cancel");
const dialogbox_d = document.querySelector("dialog.deleteacc");
const resultdiv_d = document.querySelector("dialog .result_d");
deleteacclink.onclick = function () {
  dialogbox_d.showModal();
  dialogbox_d.style.opacity = "1";
};
cancelbutton_d.onclick = function () {
  dialogbox_d.close();
  dialogbox_d.style.opacity = "0";
};
confirm_button_d.onclick = function () {
  console.log("vghvgc");
  oldpass_d = document.querySelector("#oldp_d").value;
  xhrrequestpassword = new XMLHttpRequest();
  xhrrequestpassword.open(
    "GET",
    "deleteacc.php?oldpass=" + oldpass_d + "&email=" + email,
    true
  );
  xhrrequestpassword.onload = function () {
    if (xhrrequestpassword.status == 200) {
      if (xhrrequestpassword.responseText == "done") {
        window.location.replace("login.php");
      } else if (xhrrequestpassword.responseText == "nomatch") {
        resultdiv_d.innerHTML = "Wrong password  ";
        resultdiv_d.style.color = "red";
      } else {
        resultdiv_d.innerHTML = " database error ";
        resultdiv_d.style.color = "red";
      }
    }
  };
  xhrrequestpassword.send();
};
//add new collection
const addCollectionButton = document.querySelector(".addnewcollection");
const confirm_button_add_c = document.querySelector("dialog.collection button");
const cancelbutton_c = document.querySelector("dialog.collection .cancel");
const dialogbox_c = document.querySelector("dialog.collection");
const resultdiv_c = document.querySelector("dialog .result_d");

if (ver_password) {
  // if the person is not an admin addcollectionbutton is not generated and it creates an error when asigning onclick func = this if clause
  addCollectionButton.onclick = function () {
    dialogbox_c.showModal();
    dialogbox_c.style.opacity = "1";
  };
  cancelbutton_c.onclick = function () {
    dialogbox_c.close();
    dialogbox_c.style.opacity = "0";
  };
  confirm_button_add_c.onclick = function () {
    console.log("vghvgc");
    new_collection_name = document.querySelector(".collection input").value;
    new_collection_desc = document.querySelector(".collection textarea").value;
    xhr_add_collection_request = new XMLHttpRequest();
    xhr_add_collection_request.open(
      "GET",
      "addcollection.php?name=" +
        new_collection_name +
        "&desc=" +
        new_collection_desc +
        "&verification=" +
        ver_password,
      true
    );
    xhr_add_collection_request.onload = function () {
      if (xhr_add_collection_request.status == 200) {
        if (xhr_add_collection_request.responseText == "done") {
          window.location.reload();
        } else if (xhr_add_collection_request.responseText == "error") {
          resultdiv_d.innerHTML = "Database error ";
          resultdiv_d.style.color = "red";
        }
      }
    };
    xhr_add_collection_request.send();
  };
}
//add image
const addimagebutton = document.querySelector("button.addButton_img");
const addimgcancel = $("dialog.collection_image_add .cancel")[0];
async function sendform(url,form){
  const rsp = await fetch(url, {
    method: "POST",
    body: form,
  });
  const text = await rsp.text();
  if (text == 'ok') {
    $("dialog.collection_image_add")[0].close();
    $("dialog.collection_image_add")[0].style.opacity = "0";
  }else{
    $('.collection_image_add .result').html('<span class="red">error</span>')
  }

}

addimagebutton.addEventListener("click", function (event) {
  event.preventDefault();
  formdata = new FormData();
  formdata.append(
    "pass",
    ver_password
  );
  formdata.append(
    "imgname",
    $("dialog.collection_image_add #imgname")[0].value
  );
  formdata.append(
    "imgcollection",
    $("dialog.collection_image_add #imgcollection")[0].value
  );
  formdata.append(
    "imgdesc",
    $("dialog.collection_image_add #imgdesc")[0].value
  );
  formdata.append(
    "imgfile",
    $("dialog.collection_image_add #imgfile")[0].files[0],
    $("dialog.collection_image_add #imgfile")[0].files[0].name
  );
  if ($("dialog.collection_image_add #audiofile")[0].files[0] != null) {
    formdata.append(
      "audiofile",
      $("dialog.collection_image_add #audiofile")[0].files[0],
      $("dialog.collection_image_add #audiofile")[0].files[0].name
    );
  }
  sendform("upload.php",formdata)
});




addimgcancel.addEventListener("click", function (ev) {
  ev.preventDefault();
  $("dialog.collection_image_add")[0].close();
  $("dialog.collection_image_add")[0].style.opacity = "0";
});
//logout
logout = document.querySelector("#settings");
logout.onclick = () => {
  window.location.replace("login.php");
};
