let loc = location.hash;
let links = [].slice.call(document.querySelectorAll('aside a'));
let contents = [].slice.call(document.querySelectorAll('.content'));
let adminOptions = [].slice.call(document.querySelectorAll("#admins form div a"));
let propertyOptions = [].slice.call(document.querySelectorAll("#manage form div a"));
let underline = [].slice.call(document.querySelectorAll('div.underline'));


checkLink();
let interval = setInterval(() => {
	contents.forEach(content => {
		if (matchMedia("only screen and (min-width: 768px)").matches) {
			content.style.height = window.innerHeight - document.querySelector("header").offsetHeight - document.querySelector("footer").offsetHeight + "px";
		} else {
			content.style.height = 'auto';
		}
	});
}, 500);

links.forEach(link => {
	if (links.indexOf(link) > 3) {
		//a los últimos tres, desplegar su respectivo contenedor
		link.addEventListener('click', event => {
			//si la pantalla es de más de 768px, añadir el evento para cambiar de manual, sino no hacer nada
			if (matchMedia('only screen and (min-width: 768px)').matches) {
				event.preventDefault();
				displaySection(link.hash);
			}
		});
	} else {
		link.addEventListener('click', () => {
			displaySection();
		});
	}
	link.addEventListener('click', () => {
		checkLink(link.hash);
	});
});

adminOptions.forEach(option => {
	option.addEventListener('click', () => {
		changeForm(option);
	});
});

propertyOptions.forEach(option => {
	option.addEventListener('click', () => {
		changeForm(option);
	});
});


//verificar cuál es el link que se corresponde con la url actual
function checkLink(hash) {
	links.forEach(link => {
		if (link.hash === hash) {
			if (link.classList.value === "") {
				link.classList.toggle("current");
			}
		} else {
			link.classList = "";
		}
	});
}

function displaySection(hash="removeAll") {
	contents.forEach(content => {
		if (hash === "removeAll") {
			content.classList.remove('displayed');
		} else {
			if (("#" + content.children[0].id) === hash) {
				content.classList.add('displayed');
			} else {
				content.classList.remove('displayed');
			}	
		}
	});
}

function changeForm(source) {
	let formSections = [].slice.call(document.querySelectorAll('#manage form div'));
	formSections.shift();
	formSections.shift();
	if (source.id) {
		formSections.forEach(section => {
			if (section.classList.contains(source.id)) {
				if (section.classList.contains('toggled')) {
					underline[1].style.transform = 'scale(1.1)';
					setTimeout(() => {
						underline[1].style.transform = 'scale(1)';
					}, 300);
				} else {
					if (source.id === 'add') {
						underline[1].classList.value = 'underline';
					} else {
						underline[1].classList.value = 'underline toggled';
						if (source.id === 'mod') {
							underline[1].classList.add('toggled-2');
						}
					}
					//codigo de los formularios
					section.classList.add('toggled');
				}
			} else {
				//codigos de los formularios
				section.classList.remove('toggled');
			}
		});
		document.querySelector('#confirmarP').value = source.id;
	} else {
		if (source.text === "Añadir") {
			if (underline[0].classList.value === 'underline') {
				underline[0].style.transform = 'scale(1.1)';
				setTimeout(() => {
					underline[0].style.transform = 'scale(1)';
				}, 300);
			} else {
				underline[0].classList.remove('toggled');
				document.querySelector('#confirmar').value = 'añadir';
				document.querySelector('.contraseña').style.display = 'flex';
				setTimeout(() => {
					document.querySelector('.contraseña').classList.remove('toggled');
				}, 25);
			}
		} else if (source.text === 'Eliminar') {
			if (underline[0].classList.value === 'underline toggled') {
				underline[0].style.transform = 'scale(1.1)';
				setTimeout(() => {
					underline[0].style.transform = 'scale(1)';
				}, 300);
			} else {
				underline[0].classList.add('toggled');
				document.querySelector('#confirmar').value = 'eliminar';
				document.querySelector('.contraseña').classList.add('toggled');
				setTimeout(() => {
					document.querySelector('.contraseña').style.display = 'none';
				}, 300);
			}
		}
	}
}

let closeButton = document.querySelector('.close');

closeButton.addEventListener('click', () => {
	document.querySelector('.alert').style.display = 'none';
})