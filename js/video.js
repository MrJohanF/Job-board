
 var asignar_id = 1;


function add_video() {
    try {

        var code_video = document.getElementById("url-video").value;
        var x = new Boolean(false);
        x = code_video.includes('https://www.youtube.com/watch?v=');
        console.log(x);
        if (x == true) {
    
         var res = code_video.replace("watch?v=", "embed/");
         document.getElementById("videocontainer").insertAdjacentHTML("beforeend", "<iframe width='560' height='315' src='"+res+"' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>");
        asignar_id = asignar_id + 1;

        }if(x == false){
            console.log("no es una url")
        }
        
    } catch (error) {
       
    } 
  }
  
  
  function delete_id(item_id){

    
  }