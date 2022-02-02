import {onPointerMove} from "../event.js"

class Floor2 extends Phaser.Scene {

	constructor(){
		super('floor2');
	}

	preload(){
		this.load.image('floor2', 'assets/floor2.jpg');
	}

	create(){

	let map;
	let circle;

		
	map = this.add.image(0,0,'floor2').setOrigin(0);
	
	map.setScale(1.5);
	

	circle = this.add.circle(125, 115, 10, 0x6666ff).setInteractive();

	this.cameras.main.setZoom(2);
    this.cameras.main.centerOn(0, 0);
    this.cameras.main.setBounds(0,0,1000,1000);

	circle.on('pointerdown', () => this.scene.start("level2"));

	this.input.on('pointermove', onPointerMove);
	
	}
}

export default Floor2;