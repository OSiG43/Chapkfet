class Tp{
	constructor(id, name, pos1, pos2, floor, requestLevel, destKey, destPos) {
		this.id = id;
		this.name = name;
		this.pos1 = pos1;
		this.pos2 = pos2;
		this.floor = floor;
		this.requestLevel = requestLevel;
		this.destKey = destKey;
		this.destPos = destPos;
	}
}

let tp1 = new Tp(1, "Escalier kfet atrium", {x:546,y:2807}, {x:626,y:2886}, 0, 6, 'kfet', {x:200,y:200});
let tp2 = new Tp(2, "Escalier kfet ", {x:1128,y:3452}, {x:1385,y:3670}, 0, 6, 'kfet', {x:0,y:0});

let tp3 = new Tp(3, "Escalier vers 1", {x:4029,y:3526}, {x:4121,y:3753}, 0, 4, 'floor1', {x:4018,y:3388}); 
let tp4 = new Tp(4, "Escalier vers 1", {x:2626,y:3505}, {x:2685,y:3683}, 0, 4, 'floor1', {x:2493, y:3406});
let tp5 = new Tp(5, "Escalier vers 1", {x:1544,y:3171}, {x:1544,y:3171}, 0, 4, 'floor1', {x:0,y:0});
let tp6 = new Tp(6, "Escalier vers 1", {x:1544,y:3171}, {x:1544,y:3171}, 0, 4, 'floor1', {x:0,y:0});
let tp7 = new Tp(7, "Escalier vers 1", {x:1544,y:3171}, {x:1544,y:3171}, 0, 4, 'floor1', {x:0,y:0});
let tp8 = new Tp(8, "Escalier vers 1", {x:1544,y:3171}, {x:1544,y:3171}, 0, 4, 'floor1', {x:0,y:0});

let tp9 = new Tp(9, "vers 0", {x:2394,y:3481}, {x:2455,y:3616}, 1, 4, 'floor0', {x:0,y:0});
let tp10 = new Tp(10, "Escalier vers 0", {x:4080,y:3412}, {x:3806,y:3340}, 1, 4, 'floor0', {x:0,y:0});

let tp11 = new Tp(11, "Escalier vers 1", {x:4029,y:3526}, {x:4121,y:3753}, 1, 4, 'floor2', {x:4018,y:3388}); 
let tp12 = new Tp(12, "Escalier vers 1", {x:2626,y:3505}, {x:2685,y:3683}, 1, 4, 'floor2', {x:2493, y:3406});

let tpList = [tp1, tp2, tp3, tp4, tp5, tp6, tp7, tp8];

export default tpList;