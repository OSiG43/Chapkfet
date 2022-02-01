class Overlay extends Phaser.Scene {

constructor(){
	super({key:'overlay', active:true});
}

preload(){
	this.load.image('logout_button', 'assets/logout_button.png');
	
}

create(){
	
	var div = document.createElement('div');
    div.style = 'background-color: rgba(255,0,0,1); width: 1000px; height: 1000px; font: 48px Arial; font-weight: bold';
    div.innerText = 'Phaser 3';
	var element = this.add.dom(500, 500, div).setOrigin(0);
	console.log(element);

	var logout_button = this.add.image(this.game.scale.width-20*(window.innerWidth/700),5,'logout_button').setOrigin(1,0).setInteractive();
	logout_button.setScale(0.4*(window.innerWidth/700));

	logout_button.on('pointerdown', function (pointer) {

        alert("Indice cliqué")

    });

	//this.scale.fullScreenScaleMode = Phaser.ScaleManager.EXACT_FIT;

    this.input.on('pointerup', function (pointer) {
    if(this.scene.scale.fullscreen.available){
    	if (!this.scene.scale.isFullscreen)
    	{
        	this.scene.scale.startFullscreen();
    	}
    }
    });
}

}

function actionOnClick() {
	// body...
}

export default Overlay;