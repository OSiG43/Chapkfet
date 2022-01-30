const config = {
	width: window.innerWidth,
	height: window.innerHeight,
	type: Phaser.AUTO,
	input: {
        touch: {
            capture: true
        }
    },
	scene: {
		preload: preload,
		create: create,
		update: update
	}
}

var game = new Phaser.Game(config);
let map;
let circle;

function preload() {
	this.load.image('map', 'assets/map.jpg');
}

function create() {
	game.input.touch.capture = false;

	map = this.add.image(400,600,'map');
	map.setScale(1.5);
	map.rotation += 3.14/2;

	circle = this.add.circle(125, 115, 10, 0x6666ff).setInteractive();

	circle.on('pointerdown', function (pointer) {

        alert("Indice cliqué")

    });
console.log(this)
}

function update() {

	if (this.game.input.activePointer.isDown){	
		if (this.game.origDragPoint) {
			// move the camera by the amount the mouse has moved since last update
			this.cameras.main.x += this.game.origDragPoint.x - this.game.input.activePointer.position.x;	
			this.game.camera.y += this.game.origDragPoint.y - this.game.input.activePointer.position.y;	
			}	
			// set new drag origin to current position	
			this.game.origDragPoint = this.game.input.activePointer.position.clone();
	}else {	
		this.game.origDragPoint = null;
	}
}