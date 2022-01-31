class Overlay extends Phaser.Scene {

constructor(){
	super({key:'overlay', active:true});
}

preload(){
	this.load.image('logout_button', 'assets/logout_button.png');
}

create(){
	//console.log(this);
	var logout_button = this.add.image(this.game.scale.width-20*(window.innerWidth/700),5,'logout_button').setOrigin(1,0).setInteractive();
	logout_button.setScale(0.4*(window.innerWidth/700));

	logout_button.on('pointerdown', function (pointer) {

        alert("Indice cliqué")

    });

	//this.scale.fullScreenScaleMode = Phaser.ScaleManager.EXACT_FIT;

    this.input.on('pointerup', function (pointer) {
    console.log(this);
    if (!this.scene.scale.isFullscreen)
    {
        this.scene.scale.startFullscreen();
    }
    

    });
}

}

function actionOnClick() {
	// body...
}

export default Overlay;