function nav() {
    let menu = document.getElementById("navDemo");
    if (menu.className.indexOf("w3-show") == -1) {
        menu.className += " w3-show";
    } else { 
        menu.className = menu.className.replace(" w3-show", "");
    }
  }