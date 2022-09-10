var colors = ['#f85532', '#2fac87', '#00c2d6', "#cf355a"];
var random_color = colors[Math.floor(Math.random() * colors.length)];

var colors = ['#2fac87', "#cf355a", '#00c2d6', '#f85532 , "#6c007c'];
var random_color2 = colors[Math.floor(Math.random() * colors.length)];

var colors = ['#00c2d6', '#2fac87', '#f85532' ,"#99ba73"];
var random_color3 = colors[Math.floor(Math.random() * colors.length)];

document.getElementById('random-color').style.color = random_color;
document.getElementById('random-color2').style.color = random_color2;
document.getElementById('random-color3').style.color = random_color3;