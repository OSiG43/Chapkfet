import {onPointerMove} from "../event"

class Floor0 extends Phaser.Scene {

	constructor(){
		super('floor0');
	}

	preload(){
		this.load.image('Floor0', 'assets/floor0_level1.jpg');
	}

	create(){

	let map;
	let toFloor1Object;

		
	map = this.add.image(0,0,'Floor0').setOrigin(0);
	
	map.setScale(1.5);
	

	toFloor1Object = this.add.circle(125, 115, 10, 0x6666ff).setInteractive();

	this.cameras.main.setZoom(2);
    this.cameras.main.centerOn(0, 0);
    this.cameras.main.setBounds(0,0,1000,1000);

	circle.on('pointerdown', () => this.scene.start("floor1"));

	this.input.on('pointermove', onPointerMove);
	
	}
}

export default Floor0;