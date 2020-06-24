import $ from 'jquery';

$('.theme-mode').on('click', (e) => {
	e.preventDefault();
	e.stopPropagation();
	console.log('dark theme');
	var element = document.getElementsByTagName("BODY")[0];
	element.classList.toggle("dark");
});

