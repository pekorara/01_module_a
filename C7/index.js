let x = 0;
let y = 0;
const canvas = document.querySelector('canvas');
const ctx = canvas.getContext('2d');
let list = [];
let colors = ['rgba(128, 81, 196, 0.6)', 'rgba(224, 124, 193, 0.6)', 'rgba(99, 232, 200, 0.6)', 'rgba(98, 110, 193, 0.6)','#6264c1','#6261c1']
document.addEventListener('mousemove',e => {
    x = e.clientX;
    y = e.clientY;
    list.push(new Circle());
})
class Circle{
    constructor() {
        this.x = x + Math.random() * 40 * (Math.random() > 0.5 ? 1 : -1);
        this.y = y + Math.random() * 40 * (Math.random() > 0.5 ? 1 : -1);
        this.size = 50;
        this.color = colors[Math.floor(Math.random() * colors.length)];
        this.print();
    }


    print(){
        ctx.beginPath();
        ctx.fillStyle = this.color;
        ctx.arc(this.x,this.y,this.size,0,Math.PI * 2);
        ctx.fill();
    }

    update(){
        if (this.size >= 1) this.size -= 1;
        this.print();
    }
}

function r(){
    requestAnimationFrame(r);
    ctx.fillStyle = 'white';
    ctx.fillRect(0,0,canvas.width,canvas.height);
    list.forEach((z,index)=> {
        if (z.size < 1){
            list.splice(index,1);
        }
        z.update();
    })
}

r();