function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;
  
    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  function openVistaEditDatos(evto, tabMain) {
    // Declare all variables
    var sub_i, sub_tabcontent, sub_tablinks;
   
    // Get all elements with class="tabcontent" and hide them
    sub_tabcontent = document.getElementsByClassName("sub-tabcontent-editDatos");
    for (sub_i = 0; sub_i < sub_tabcontent.length; sub_i++) {
      sub_tabcontent[sub_i].style.display = "none";
    }
   
    // Get all elements with class="tablinks" and remove the class "active"
    sub_tablinks = document.getElementsByClassName("sub-tablinks");
    for (sub_i = 0; sub_i < sub_tablinks.length; sub_i++) {
      sub_tablinks[i].className = sub_tablinks[sub_i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabMain).style.display = "block";
    evto.currentTarget.className += " active";
  }
 
  function openMain(evto, tabMain) {
    // Declare all variables
    var sub_i, sub_tabcontent, sub_tablinks;
   
    // Get all elements with class="tabcontent" and hide them
    sub_tabcontent = document.getElementsByClassName("sub-tabcontent");
    for (sub_i = 0; sub_i < sub_tabcontent.length; sub_i++) {
      sub_tabcontent[sub_i].style.display = "none";
    }
   
    // Get all elements with class="tablinks" and remove the class "active"
    sub_tablinks = document.getElementsByClassName("sub-tablinks");
    for (sub_i = 0; sub_i < sub_tablinks.length; sub_i++) {
      sub_tablinks[i].className = sub_tablinks[sub_i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabMain).style.display = "block";
    evto.currentTarget.className += " active";
  }



  function openTabEmpleador(evto, tabMain) {
    // Declare all variables
    var sub_i, sub_tabcontent, sub_tablinks;
   
    // Get all elements with class="tabcontent" and hide them
    sub_tabcontent = document.getElementsByClassName("emplea-tabcontent");
    for (sub_i = 0; sub_i < sub_tabcontent.length; sub_i++) {
      sub_tabcontent[sub_i].style.display = "none";
    }
   
    // Get all elements with class="tablinks" and remove the class "active"
    sub_tablinks = document.getElementsByClassName("emplea-tablinks");
    for (sub_i = 0; sub_i < sub_tablinks.length; sub_i++) {
      sub_tablinks[i].className = sub_tablinks[sub_i].className.replace(" active", "");
    }
  
    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabMain).style.display = "block";
    evto.currentTarget.className += " active";
  }