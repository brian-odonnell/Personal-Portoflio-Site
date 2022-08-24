
/**
 * 
 * @param {string} link A URL Reference to a Breadcrumb item
 * @param {string} name A Name for the breadcrumb link ite, used as link text
 */
const TestComponent = class {
	constructor(link, name) {
		this.link = link;
		this.name = name;
	}

	/** 
	 * Class Method for Rendering Breadcrumbs
	 */
	breadcrumbs() {
		console.log(this.link);
		console.log(this.name);
	}
}

export { TestComponent };