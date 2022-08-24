import { TestComponent } from "../components/testComponent";

let module = {};

/**
 * Container Initilization
 */
module.init = function () {
	const testComponent = new TestComponent("Home", "/");
	testComponent.breadcrumbs();
};

document.addEventListener("DOMContentLoaded", () => {
	module.init();
});
