let buttonLeft = document.querySelector('.grid-wrapper .left'), buttonRight = document.querySelector('.grid-wrapper .right');
let items = document.querySelectorAll('.grid-wrapper .grid-item');
items = [].slice.call(items);
let iterations = 0;

buttonLeft.addEventListener('click', () => {
	let side = "left";
	slide(side);
});
buttonRight.addEventListener('click', () => {
	let side = "right";
	slide(side);
});

function slide(side) {
	let width = document.querySelector('html').offsetWidth;
	if (side === "right") {
		if (width < 600 && iterations > -4) {
			iterations--;
		} else if ((width > 600 && width < 1200) && iterations > -3) {
			iterations--;
		} else if(iterations > -2) {
			iterations--;
		}
	} else if (side === "left" && iterations < 0) {
		iterations++;
	}
	items.forEach(item => {
		item.style.left = `calc(${100 * iterations}% + ${15 * iterations}px)`;
	});
}