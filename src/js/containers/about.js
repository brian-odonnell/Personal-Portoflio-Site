import { Helpers } from "../helpers/helpers";

let module = {};

/**
 * Container Initilization
 */
module.init = function () {
	console.log(Helpers.AddTwoNumbers(5, 4));
};

document.addEventListener("DOMContentLoaded", () => {
	module.init();
});
