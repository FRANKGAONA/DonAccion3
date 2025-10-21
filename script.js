// Fade-in al hacer scroll
const faders = document.querySelectorAll('.fade-in');
const appearOptions = { threshold: 0.3, rootMargin: "0px 0px -50px 0px" };
const appearOnScroll = new IntersectionObserver(function(entries, observer){
  entries.forEach(entry => {
    if(!entry.isIntersecting) return;
    entry.target.style.opacity = 1;
    entry.target.style.transform = "translateY(0px)";
    observer.unobserve(entry.target);
  });
}, appearOptions);

faders.forEach(fader => appearOnScroll.observe(fader));

// Partículas interactivas
const canvas = document.getElementById('hero-particles');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

let particlesArray = [];
const colors = ['rgba(255,59,48,0.05)', 'rgba(10,31,60,0.05)'];

class Particle {
  constructor(){
    this.x = Math.random()*canvas.width;
    this.y = Math.random()*canvas.height;
    this.size = Math.random()*2 + 1;
    this.speedX = Math.random()*0.5 - 0.25;
    this.speedY = Math.random()*0.5 - 0.25;
    this.color = colors[Math.floor(Math.random()*colors.length)];
  }
  update(){
    this.x += this.speedX;
    this.y += this.speedY;
    if(this.x <0 || this.x>canvas.width) this.speedX *= -1;
    if(this.y <0 || this.y>canvas.height) this.speedY *= -1;
  }
  draw(){
    ctx.fillStyle = this.color;
    ctx.beginPath();
    ctx.arc(this.x,this.y,this.size,0,Math.PI*2);
    ctx.fill();
  }
}

function init(){
  particlesArray = [];
  for(let i=0; i<100; i++){
    particlesArray.push(new Particle());
  }
}
function animate(){
  ctx.clearRect(0,0,canvas.width,canvas.height);
  particlesArray.forEach(p => {p.update(); p.draw();});
  requestAnimationFrame(animate);
}

init();
animate();

window.addEventListener('resize',()=>{
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  init();
});