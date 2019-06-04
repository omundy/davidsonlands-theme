// confetti for getting answers corret

let canvas = document.getElementById('confetti');

canvas.width = 640;
canvas.height = 400;

let ctx = canvas.getContext('2d');
let pieces = [];
let numberOfPieces = 100;
let lastUpdateTime = Date.now();

function randomColor () {
    let colors = ["#CD6155", "#EC7063", "#AF7AC5", "#A569BD", "#5499C7", "#F2D7D5", "#5DADE2", "#48C9B0","#45B39D", "#E74C3C", "#7D3C98", "#BA4A00", "#2ECC71", "#58D68D", "#F4D03F", "#F5B041", "#EB984E", "#DC7633"];
    return colors[Math.floor(Math.random() * colors.length)];
}

function update () {
    let now = Date.now(),
        dt = now - lastUpdateTime;

    for (let i = pieces.length - 1; i >= 0; i--) {
        let p = pieces[i];

        if (p.y > canvas.height || p.x < 0 || p.x > canvas.width) {
            pieces.splice(i, 1);
            continue;
        }

        p.x += p.sideMovement * dt;
        p.y += p.gravity * dt;
        p.rotation += p.rotationSpeed * dt;
    }


    while (pieces.length < numberOfPieces) {
        pieces.push(new Piece(Math.random() * canvas.width, -20));
    }

    lastUpdateTime = now;

    setTimeout(update, 1);
}

function draw () {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    pieces.forEach(function (p) {
        ctx.save();

        ctx.fillStyle = p.color;

        ctx.translate(p.x + p.size / 2, p.y + p.size / 2);
        ctx.rotate(p.rotation);

        ctx.fillRect(-p.size / 2, -p.size / 2, p.size, p.size);

        ctx.restore();
    });

    requestAnimationFrame(draw);
}

function Piece (x, y) {
    this.x = x;
    this.y = y;
    if (Math.random() < 0.5){
      this.sideMovement = (Math.random() + 0.2) * 0.1;
    }else{
      this.sideMovement = -((Math.random() + 0.2) * 0.1);
    }

    this.size = (Math.random() * 0.5 + 0.75) * 10;
    this.gravity = (Math.random() + 0.2) * 0.2;
    this.rotation = (Math.PI * 2) * Math.random();
    this.rotationSpeed = (Math.PI * 2) * (Math.random() - 0.5) * 0.001;
    this.color = randomColor();
}

while (pieces.length < numberOfPieces) {
    pieces.push(new Piece(Math.random() * canvas.width, Math.random() * canvas.height));
}

update();
draw();
