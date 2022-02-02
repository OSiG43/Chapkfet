import {eventsCenter} from "../event.js"

class Overlay extends Phaser.Scene {

constructor(){
	super({key:'overlay', active:true});
}

preload(){
	this.load.image('logout_button', 'assets/logout_button.png');
	this.load.image('qr_button', 'assets/qrcode_gold.png');
	
}

create(){
	

	var logout_button = this.add.image(this.game.scale.width-20*(window.innerWidth/700),5,'logout_button').setOrigin(1,0).setInteractive();
	logout_button.setScale(0.4*(window.innerWidth/700));

	logout_button.on('pointerdown', function (pointer) {

         document.location.href="logout.php";

    });

    var qr_button = this.add.image(15*(window.innerWidth/700),10,'qr_button').setOrigin(0).setInteractive();
	qr_button.setScale(0.4*(window.innerWidth/400));

	qr_button.on('pointerdown', function (pointer) {

         document.location.href="qrscan.php";

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