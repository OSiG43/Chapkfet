import {onPointerMove, onPointerDown, onPointerUp, eventsCenter} from "../event.js"
import questionList from "../questions.js"
import tpList from "../tp.js"

class Floor0 extends Phaser.Scene {

	constructor(){
		super('floor0');
	}

	preload(){
		let mapPath;

		let level = currentLevel<=3 ? currentLevel : 3;
		switch(level){
			case 1:
				mapPath='assets/floor0_level1';
			break;
			case 2:
				mapPath='assets/floor0_level2';
			break;
			case 3:
				mapPath='assets/floor0_level3';
			break;

			default:
				mapPath='assets/floor0_level1';
			break;
		}
		this.preloadMap('floor0', mapPath, 5, 4);

		this.load.image('qrcode', 'assets/qrcode.png');
		this.load.image('mask', 'assets/soft-mask.png');

		this.load.spritesheet('player', 'assets/player.png', {frameWidth: 32, frameHeight: 62});
	}

	create(){
		let map;
		let toFloor1Object;
		this.questionMarkList = [];
		this.level = currentLevel<=3 ? currentLevel : 3;
		this.floor = 0;
		
		this.createMap('floor0',5,4, 0.5);	
		//map = this.add.image(0,0,'Floor0').setOrigin(0);
		//map.setScale(0.5);
		//this.add.image(0,0,'floor0_map_r1_c1').setOrigin(0);

		this.addQuestionSpots();
		this.createPlayer();


		this.cameras.main.setZoom(1);
	    this.cameras.main.setBounds(-100,-100,this.mapSize.width+100,this.mapSize.height+100);

	    this.maskImage = this.make.image({
	            x: 0,
	            y: 0,
	            key: 'mask',
	            add: false
	        }).setOrigin(0);

	   	const mask = this.maskImage.createBitmapMask();

	    this.cameras.main.setMask(mask);

	    this.maskImage.setDisplaySize(this.scale.width,this.scale.height);

	    this.input.on('pointermove', onPointerMove);
	    this.input.on('pointerdown', onPointerDown);
	    this.input.on('pointerup', onPointerUp);

	    

		this.scale.on('resize', resize, this);

		this.wasIn=false;
		
	}

	update(){
		

		if (this.player.body.speed > 0)
    	{
    		this.player.play('walk', true);
    	}else{
    		this.player.anims.stop();
    		this.player.setFrame(0);
    	}

    	tpList.forEach(tp => {
    		if(tp.floor == this.floor){
    			if((Math.min(tp.pos1.x,tp.pos2.x)<this.player.x && this.player.x<Math.max(tp.pos1.x,tp.pos2.x)) && (Math.min(tp.pos1.y,tp.pos2.y)<this.player.y && this.player.y<Math.max(tp.pos1.y,tp.pos2.y))){
    				if(tp.requestLevel<=currentLevel){
    					this.scene.start(tp.destKey, {pos: tp.destPos});
    				}else{
    					if(tp.instructions==null){
    					tp.instructions = this.add.text((tp.pos1.x+tp.pos2.x)/2, (tp.pos1.y+tp.pos2.y)/2, 
			   				 'Reviens plus tard !', 
			   				 {font: '30px monospace', fill: '#ffd700', boundsAlignH: "center", boundsAlignV: "middle"}
			  					).setOrigin(0.5);
			 			
						this.time.delayedCall(3000, () => {tp.instructions.destroy(); tp.instructions=null;});
    					}
    				}
    				
    			}else{
    				
    			}
    		}
    	});
			

    }

	createPlayer(){
		this.player = this.physics.add.sprite(200,200, 'player');
		this.player.setBounce(0.2);
		this.player.setScale(0.8);
		this.player.setPosition(766,3383);

	    
    	this.player.anims.create({
            key: 'walk',
            frames: this.anims.generateFrameNames('player', {start: 1, end: 2 }),
            frameRate: 8,
            repeat: -1
        });

        

		this.cameras.main.startFollow(this.player);


	}

	addQuestionSpots(){
		//Ajout des positions des questions
	    questionList.forEach(question => {
	    	if (question.level==this.level) {
	    		let mark = this.add.image(question.pos.x,question.pos.y,'qrcode').setOrigin(0).setInteractive();
	    		mark.setScale(0.2);
	    		mark.on('pointerdown', function (pointer) {

        			openForm();

   				});
	    		this.questionMarkList.push(mark);
	    	}
	    });
	}

	preloadMap(key, mapPath, nbRow, nbCol){
		for (var row = 1; row <= nbRow; row++) {
			for (var col = 1; col <= nbCol; col++) {
				this.load.image(key+'_map_r'+row+'_c'+col, mapPath+'/row-'+row+'-column-'+col+'.png');
			}
		}
	}

	createMap(key, nbRow, nbCol, scale){
		var currentImage;
		var x = 0;
		var y = 0;

		var pos = {x: 0, y:0};

		for (var row = 1; row <= nbRow; row++) { 
			for (var col = 1; col <= nbCol; col++) {
				currentImage =  this.add.image(x,y,key+'_map_r'+row+'_c'+col).setOrigin(0);
				currentImage.setScale(scale);
				currentImage.getBottomRight(pos);
				x=pos.x

			}
			y=pos.y;
			x=0;
		}
		this.mapSize = {widht: x, height: y};
	}
}



function resize (gameSize, baseSize, displaySize, resolution)
{
	
    var width = gameSize.width;
    var height = gameSize.height;

    this.cameras.resize(width, height);

    this.maskImage.setDisplaySize(gameSize.width,gameSize.height);
}




export default Floor0;
