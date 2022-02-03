class Question{
	constructor(id, name, pos, level, requestDay, requestLevel, floor) {
		this.id = id;
		this.name = name;
		this.pos = pos;
		this.level = level;
		this.requestDay = requestDay;
		this.requestLevel = requestLevel;
		this.floor = floor;
	}
}

let question1 = new Question(1, "Ascenseur", {x:1544,y:3171}, 1, 1, 0, 0);
let question2 = new Question(2, "Salle de Bain", {x:1425,y:3160}, 1, 1, 0, 0);
let question3 = new Question(3, "Dessin", {x:1410,y:3400}, 1, 1, 0, 0);
let question4 = new Question(4, "Cuisine", {x:3743,y:3297}, 2, 2, 1, 0);
let question5 = new Question(5, "Biaude kfet", {x:4103,y:3532}, 2, 2, 1, 0);
let question6 = new Question(6, "Ronflement", {x:2471,y:3600}, 2, 2, 1, 0);
let question7 = new Question(7, "Cookies", {x:453,y:2984}, 3, 3, 2, 0);
let question8 = new Question(8, "Fillot", {x:5104,y:3114}, 3, 3, 2, 0);
let question9 = new Question(9, "Poids", {x:4179,y:3505}, 3, 3, 2, 0);
let question10 = new Question(10, "Boisson", {x:737,y:294}, 3, 3, 2, 0);


let questionList = [question1, question2, question3,question4,question5,question6,question7,question8,question9,question10];

export default questionList;