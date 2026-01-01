// Offcanvas Menu
document.addEventListener("DOMContentLoaded", () => {
	const openMenuButton = document.getElementById("openMenu");
	const closeMenuButton = document.getElementById("closeMenu");
	const offCanvasMenu = document.getElementById("offCanvasMenu");
	const overlay = document.getElementById("overlay");

	if (openMenuButton && offCanvasMenu && overlay) {
		openMenuButton.addEventListener("click", () => {
			offCanvasMenu.classList.add("open");
			overlay.classList.add("show");
			document.documentElement.classList.add("popup-overflow-hidden");
		});
	}

	if (closeMenuButton && offCanvasMenu && overlay) {
		closeMenuButton.addEventListener("click", () => {
			offCanvasMenu.classList.remove("open");
			overlay.classList.remove("show");
			document.documentElement.classList.remove("popup-overflow-hidden");
		});
	}

	if (overlay && offCanvasMenu) {
		overlay.addEventListener("click", () => {
			offCanvasMenu.classList.remove("open");
			overlay.classList.remove("show");
			document.documentElement.classList.remove("popup-overflow-hidden");
		});
	}
});
