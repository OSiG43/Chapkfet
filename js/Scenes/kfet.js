import {onPointerMove} from "../event.js"

class Kfet extends Phaser.Scene {

	constructor() {
		super('kfet');
	}


	preload(){
		this.load.image('kfet', 'assets/kfet.png');
	}

	create(){

	let map;
	let circle;

		
	map = this.add.image(0,0,'kfet').setOrigin(0);
	
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

export default Kfet;