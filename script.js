
let letters = document.querySelector('#read').innerHTML.split('');


// Converts integer to hex 
const colToHex = (c) => {
  // Hack so colors are bright enough
  let color = (c < 75) ? c + 75 : c
  let hex = color.toString(16);
  return hex.length == 1 ? "0" + hex : hex;
}

// uses colToHex to concatenate
// a full 6 digit hex code
const rgbToHex = (r,g,b) => {
  return "#" + colToHex(r) + colToHex(g) + colToHex(b);
}

// Returns three random 0-255 integers
const getRandomColor = () => {
  return rgbToHex(
    Math.floor(Math.random() * 255),
    Math.floor(Math.random() * 255),
    Math.floor(Math.random() * 255));
}

// This is the prototype function
// that changes the color of each
// letter by wrapping it in a span
// element.
Array.prototype.randomColor = function() {
  let html = '';
  this.map( (letter) => {
    let color = getRandomColor();
    html +=
      "<span style=\"color:" + color + "\">"
      + letter +
      "</span>";
  }) 
  return html;
};

// Set the text

document.querySelector('#read').innerHTML = letters.randomColor();


menu.onclick = function showMenu(){
  console.log('works');
  var x = document.getElementById('mynavigationpanel');
  
  if(x.className === "navigationpanel"){
    x.className += " responsive";
  }else{
    x.className = "navigationpanel";
  }
}


