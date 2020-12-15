let buttons = document.querySelectorAll('.slide-button');
let slides = document.querySelectorAll('.slide');
slides = [].slice.call(slides);
let current = 0;

buttons.forEach(button => {

	button.addEventListener('click', () => {

		let towards = button == buttons[0] ? 'left' : 'right';
		slide(towards, current);

	});

});

function slide(towards) {

	if (towards === 'right') {

		current++;

	} else {

		slides[current].classList.remove('passed');
		current--;

	}

	if (current == 0) {

		slides.forEach(slide => {

			slide.classList.remove('passed');

		});

	} else {

		if (current < 0) {

			current = slides.length - 1;
			slides.forEach(slide => {

				slide.classList.add('passed');
	
			});

		} else if (current > slides.length - 1) {

			current = 0;

			slides.forEach(slide => {

				slide.classList.remove('passed');
	
			});

		}

		slides[current].classList.add('passed');
	}

}

//introducir los saltos de línea como debería
let desc = document.querySelector('p');

desc.innerHTML = [].slice.call(desc.innerHTML.split('\n')).join('<br>')

//hacer visible y ocultar el mapa

document.getElementById('mapbutton').addEventListener('click', () => {
	document.getElementById('map').classList.toggle('visible');
});