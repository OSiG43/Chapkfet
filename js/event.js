export function onPointerMove(pointer){

	if(pointer.isDown){

			this.cameras.main.scrollX += pointer.prevPosition.x - pointer.x;
			this.cameras.main.scrollY += pointer.prevPosition.y - pointer.y;
		
	}
}