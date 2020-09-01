let footerButtons = document.querySelectorAll('footer .slide-buttons');
footerButtons = [].slice.call(footerButtons);
let footerItems = document.querySelectorAll('.footer-item');
footerItems = [].slice.call(footerItems);
let times = 0;

footerButtons[0].addEventListener('click', () => {
	let side = "left";
	changeFooterInfo(side);
});
footerButtons[1].addEventListener('click', () => {
	let side = "right";
	changeFooterInfo(side);
});

function changeFooterInfo(side) {
	if (side === "left") {
		if (times === 0) {
			times = -(footerItems.length - 1);
		} else {
			times++;
		}
	} else {
		if (times === -(footerItems.length - 1)) {
			times = 0;
		} else {
			times--;
		}
	}
	footerItems.forEach(item => {
		item.style.left = 100 * times + "%";
	});
}



