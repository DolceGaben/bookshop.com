menu.onclick = function showMenu(){
  console.log('works');
  var x = document.getElementById('mynavigationpanel');
  
  if(x.className === "navigationpanel"){
    x.className += " responsive";
  }else{
    x.className = "navigationpanel";
  }
}





