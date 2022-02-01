export function onPointerMove(pointer){

	if(pointer.isDown){

			/*this.cameras.main.scrollX += (pointer.prevPosition.x - pointer.x)*0.5;
			this.cameras.main.scrollY += (pointer.prevPosition.y - pointer.y)*0.5;*/
			
		movePlayer(pointer, this.scene);
	}
}

export function onPointerDown(pointer){
		movePlayer(pointer, this.scene);
		console.log('x:'+pointer.worldX+'|y:'+pointer.worldY);
}

export function onPointerUp(pointer){

		if (this.scene.player.body.speed > 0)
    	{
    		this.scene.player.body.stop();
           	this.scene.player.anims.stop();
       		 
       	}
}

function movePlayer(pointer, scene){

		var distance = Phaser.Math.Distance.Between(scene.player.x, scene.player.y, pointer.worldX, pointer.worldY);
		if(distance>=5){
			scene.target={x: pointer.worldX, y: pointer.worldY};

			scene.physics.moveToObject(scene.player,  scene.target, 240);

		}
}