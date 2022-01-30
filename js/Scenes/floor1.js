import {onPointerMove} from "../event"

class Floor1 extends Phaser.Scene {

	constructor() {
		super('floor1');
	}


	preload(){
		this.load.image('floor1', 'assets/floor1.png');
	}

	create(){

	let map;
	let circle;

		
	map = this.add.image(0,0,'floor1').setOrigin(0);
	
	map.setScale(1.5);
	

	circle = this.add.circle(125, 115, 10, 0x6666ff).setInteractive();

	this.cameras.main.setZoom(2);
    this.cameras.main.centerOn(0, 0);
    this.cameras.main.setBounds(0,0,1000,1000);

	/*circle.on('pointerdown', function (pointer) {

        alert("Indice cliqué")

    });*/

	this.input.on('pointermove', onPointerMove);
	
	}
}

export default Floor1;