export function onPointerMove(pointer){

	if(pointer.isDown){

			this.cameras.main.scrollX += (pointer.prevPosition.x - pointer.x)*0.5;
			this.cameras.main.scrollY += (pointer.prevPosition.y - pointer.y)*0.5;
		
	}
}