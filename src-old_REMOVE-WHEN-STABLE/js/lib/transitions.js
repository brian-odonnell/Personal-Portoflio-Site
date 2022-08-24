import Highway from '@dogstudio/highway';
import Fade from './highway/fade.js';

const H = new Highway.Core({
	transitions: {
		default: Fade
	}
});
