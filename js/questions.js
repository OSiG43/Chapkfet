class Question{
	constructor(id, name, pos, level, requestDay, requestLevel) {
		this.id = id;
		this.name = name;
		this.pos = pos;
		this.level = level;
		this.requestDay = requestDay;
		this.requestLevel = requestLevel;
	}
}

let question1 = new Question(1, "Ascenseur", {x:100,y:200}, 1, 1, 0);
let question2 = new Question(2, "Salle de Bain", {x:50,y:100}, 1, 1, 0);
let question3 = new Question(3, "Dessin", {x:400,y:400}, 1, 1, 0);
let question4 = new Question(4, "Cuisine", {x:1,y:2}, 2, 2, 1);
let question5 = new Question(5, "Biaude kfet", {x:1,y:2}, 2, 2, 1);
let question6 = new Question(6, "Ronflement", {x:1,y:2}, 2, 2, 1);
let question7 = new Question(7, "Cookies", {x:1,y:2}, 3, 3, 2);
let question8 = new Question(8, "Fillot", {x:1,y:2}, 3, 3, 2);
let question9 = new Question(9, "Poids", {x:1,y:2}, 3, 3, 2);
let question10 = new Question(10, "Boisson", {x:1,y:2}, 3, 3, 2);


let questionList = [question1, question2, question3,question4,question5,question6,question7,question8,question9,question10];

export default questionList;