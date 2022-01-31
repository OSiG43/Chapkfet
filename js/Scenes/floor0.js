import {onPointerMove} from "../event"
import questionList from "../questions"

class Floor0 extends Phaser.Scene {

	constructor(){
		super('floor0');
	}

	preload(){
		let mapPath;
		let level = currentLevel<=3 ? currentLevel : 3;
		switch(level){
			case 1:
				mapPath='assets/floor0_level1.jpg';
			break;
			case 2:
				mapPath='assets/floor0_level2.jpg';
			break;
			case 3:
				mapPath='assets/floor0_level3.jpg';
			break;

			default:
				mapPath='assets/floor0_level1.jpg';
			break;
		}
		this.load.image('Floor0', mapPath);
		this.load.image('qrcode', 'assets/qrcode.png');
	}

	create(){

	let map;
	let toFloor1Object;
	let questionMarkList = [];
	let level = currentLevel<=3 ? currentLevel : 3;
	
		
	map = this.add.image(0,0,'Floor0').setOrigin(0);
	map.setScale(3);

	this.cameras.main.setZoom(2);
    this.cameras.main.centerOn(0, 0);
    this.cameras.main.setBounds(0,0,map.displayWidth,map.displayHeight);

    this.input.on('pointermove', onPointerMove);

    //Ajout des positions des questions
    questionList.forEach(question => {
    	if (question.level==level) {
    		let mark = this.add.image(question.pos.x,question.pos.y,'qrcode').setOrigin(0);
    		mark.setScale(0.2);
    		questionMarkList.push(mark);
    	}
    });
	

	toFloor1Object = this.add.circle(125, 115, 10, 0x6666ff).setInteractive();
	toFloor1Object.on('pointerdown', () => this.scene.start("floor1"));

	
	
	}
}

export default Floor0;