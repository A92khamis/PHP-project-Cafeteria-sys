// home page script

class Product{

	constructor(name, price){
		this.name = name;	
		this.price = price;
		}

	setName(name) {
		this.name = name;
	}

	setPrice(price) {
		this.price = price;
	} 
}

var tea = new Product('tea', 5);
var coffe = new Product('coffe', 7);
var juice = new Product('juice', 12);
var pepsi = new Product('pepsi', 8);

var teaAdd = document.getElementById('tea');
var juiceAdd = document.getElementById('juice');
var coffeAdd = document.getElementById('coffe');
var pepsiAdd = document.getElementById('pepsi');
var totalPriceDisplay = document.getElementById('totalPriceDisplay');

var teaAmount = document.getElementsByName('teaAmount')[0];
var juiceAmount = document.getElementsByName('juiceAmount')[0];
var coffeAmount = document.getElementsByName('coffeAmount')[0];
var pepsiAmount = document.getElementsByName('pepsiAmount')[0];
var totalPrice = document.getElementsByName('totalPrice')[0];

//console.log(totalPrice.value);

// add event listener on each product

teaAdd.addEventListener("click", function () {
	teaAmount.value++;
	orderFn()
});

juiceAdd.addEventListener("click", function () {
	juiceAmount.value++;
	orderFn()
});

pepsiAdd.addEventListener("click", function () {
	pepsiAmount.value++;
	orderFn()
});

coffeAdd.addEventListener("click", function () {
	coffeAmount.value++;
	orderFn()
});


teaAmount.addEventListener("change", function () {
	orderFn();
});

pepsiAmount.addEventListener("change", function () {
	orderFn();
});

coffeAmount.addEventListener("change", function () {
	orderFn();
});

juiceAmount.addEventListener("change", function () {
	orderFn();
});

// a function to show the total price and increase it

var orderFn = function () {
	totalPrice.value = teaAmount.value*tea.price + juiceAmount.value*juice.price + coffeAmount.value*coffe.price + pepsiAmount.value*pepsi.price;
	totalPriceDisplay.textContent = totalPrice.value+' EGP';
}

var NameTag = document.getElementById('userName');
NameTag.textContent = userName;
// totalPrice.value = teaAmount.value;//*tea.price + juiceAmount.value*juice.price + coffeAmount.value*coffe.price + pepsiAmount.value*pepsi.price;
// totalPriceDisplay.textContent = teaAmount.value;

// getting the user name from the php


// var userName = "<?php echo $_SESSION[\"iemail\"] ?>";

// var userName = "<?php echo $val ?>";
// console.log(userName);