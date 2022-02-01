import {onPointerMove, onPointerDown, onPointerUp} from "../event"
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
		this.preloadMap('floor0', mapPath, 5, 3);

		this.load.image('qrcode', 'assets/qrcode.png');
		this.load.image('mask', 'assets/soft-mask.png');

		this.load.spritesheet('player', 'assets/player.png', {frameWidth: 32, frameHeight: 62});
	}

	create(){

		this.addGetPixels();

		let map;
		let toFloor1Object;
		let questionMarkList = [];
		let level = currentLevel<=3 ? currentLevel : 3;
		
		this.createMap('floor0',5,3, 0.5);	
		//map = this.add.image(0,0,'Floor0').setOrigin(0);
		//map.setScale(0.5);
		//this.add.image(0,0,'floor0_map_r1_c1').setOrigin(0);


		

		this.cameras.main.setZoom(0.5);
	    this.cameras.main.centerOn(600, 3500);
	    this.cameras.main.setBounds(-100,-100,this.mapSize.width+100,this.mapSize.height+100);

	    this.maskImage = this.make.image({
	            x: 0,
	            y: 0,
	            key: 'mask',
	            add: false
	        }).setOrigin(0);

	   	const mask = this.maskImage.createBitmapMask();

	    //this.cameras.main.setMask(mask);

	    this.maskImage.setDisplaySize(this.scale.width,this.scale.height);

	    this.input.on('pointermove', onPointerMove);
	    this.input.on('pointerdown', onPointerDown);
	    this.input.on('pointerup', onPointerUp);

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


		this.scale.on('resize', resize, this);
		this.createPlayer();

		// get all pixel data for cached image
		/*let data = this.textures.getPixelsData('myImage');
		console.log(data);

		// get colour of pixel at x = 3, y = 2
		let col = data.getColorAt(3, 2)
		console.log(col);*/
		
	}

	update(){

		if (this.player.body.speed > 0)
    	{
    		this.player.play('walk', true);
    	}else{
    		this.player.anims.stop();
    		this.player.setFrame(0);
    	}
			

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

	addGetPixels(){
		this.textures.getPixelsData = function(key, frame) {

        let textureFrame = this.getFrame(key, frame);

        if (textureFrame) {

            let w = textureFrame.width;
            let h = textureFrame.height;

            // have to create new as _tempCanvas is only 1x1
            let cnv = this.createCanvas('temp', w, h); // CONST.CANVAS, true);
            let ctx = cnv.getContext('2d');

            ctx.clearRect(0, 0, w, h);
            ctx.drawImage(textureFrame.source.image, 0, 0, w, h, 0, 0, w, h);

//            cnv.destroy();

            let rv = ctx.getImageData(0, 0, w, h);

            // add handy little method for converting specific pixel to Color object
            rv.getColorAt = function(x, y) {
                return new Phaser.Display.Color(
                    this.data[(x+y*this.width)*4],
                    this.data[(x+y*this.width)*4+1],
                    this.data[(x+y*this.width)*4+2],
                    this.data[(x+y*this.width)*4+3]
                );
            };

            return rv;
        }

        return null;
    };
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