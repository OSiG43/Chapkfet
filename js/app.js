
import Floor0 from "./scenes/floor0";
import Floor1 from "./scenes/floor1";
import Floor2 from "./scenes/floor2";
import Floor3 from "./scenes/floor3";
import Kfet from "./scenes/kfet";
import Overlay from "./scenes/overlay";

const config = {
	width: window.innerWidth,
	height: window.innerHeight,
	type: Phaser.AUTO,
	parents: 'game',
	input: {
        touch: {
            capture: true
        }
    },
	scene: [Floor0, Floor1, Floor2, Floor3, Kfet, Overlay]
}

var game = new Phaser.Game(config);



