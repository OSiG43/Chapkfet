import {onPointerMove} from "../event"

class Floor3 extends Phaser.Scene {

	constructor() {
		super('floor3');
	}


	preload(){
		this.load.image('floor3', 'assets/floor3.png');
	}

	create(){

	let map;
	let circle;

		
	map = this.add.image(0,0,'floor3').setOrigin(0);
	
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

export default Floor3;