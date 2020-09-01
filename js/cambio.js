let buttonLeft = document.getElementById('left-footer'), buttonRight = document.getElementById('right-footer');
let items = document.querySelectorAll('.wrapper-footer .container-footer');
items = [].slice.call(items);
let itemsMarginLeft = 0, iterations = 0;

buttonLeft.addEventListener('click', () => {
	let side = "left-footer";
	slide(side);
});
buttonRight.addEventListener('click', () => {
	let side = "right-footer";
	slide(side);
});

function slide(side) {
	let width = document.querySelector('html').offsetWidth;
	if (side === "right-footer") {
		if (width < 600 && iterations > -4) {
			iterations--;
		} else if ((width > 600 && width < 1200) && iterations > -3) {
			iterations--;
		} else if(iterations > -2) {
			iterations--;
		}
	} else if (side === "left-footer" && iterations < 0) {
		iterations++;
	}
	items.forEach(item => {
		item.style.left = `calc(${100 * iterations}% + ${15 * iterations}px)`;
	});
}



