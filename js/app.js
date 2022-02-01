
import Floor0 from "./scenes/floor0";
import Floor1 from "./scenes/floor1";
import Floor2 from "./scenes/floor2";
import Floor3 from "./scenes/floor3";
import Kfet from "./scenes/kfet";
import Overlay from "./scenes/overlay";

const config = {
	type: Phaser.AUTO,
	scale: {
		mode: Phaser.Scale.RESIZE,
		parents: 'game',
		width: '100%',
        height: '100%'
	},
	physics: {
        default: 'arcade',
        matter: {
            debug: true,
            gravity: {
                y: 0
            },
        }
    },
	autoCenter: Phaser.Scale.CENTER_BOTH,
	input: {
        touch: {
            capture: true
        }
    },
	scene: [Floor0, Floor1, Floor2, Floor3, Kfet, Overlay]
}

var game = new Phaser.Game(config);



