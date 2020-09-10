setInterval(() => {
    let gridItems = document.getElementsByClassName('grid-item');
    gridItems = [].slice.call(gridItems);
    let height = gridItems[2].offsetWidth;
    if (document.querySelector('html').offsetWidth >= 768) {
        document.querySelector('div.grid-container').style.gridTemplateRows = `repeat(2, ${height + "px"})`;
    } else {
        document.querySelector('div.grid-container').style.gridTemplateRows = `repeat(4, ${height / 2 + "px"})`;
    }
}, 500);