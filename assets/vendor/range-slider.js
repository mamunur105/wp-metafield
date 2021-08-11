
// I've added annotations to make this easier to follow along at home. Good luck learning and check out my other pens if you found this useful
// First let's set the colors of our sliders
const settings={
	fill: '#007cba',
	background: '#d7dcdf'
}

// First find all our sliders
const sliders = document.querySelectorAll('.range-slider');

// Iterate through that list of sliders
// ... this call goes through our array of sliders [slider1,slider2,slider3] and inserts them one-by-one into the code block below with the variable name (slider). We can then access each of wthem by calling slider
Array.prototype.forEach.call(sliders,(slider)=>{
  	// Look inside our slider for our input add an event listener
	//   ... the input inside addEventListener() is looking for the input action, we could change it to something like change
	slider.querySelector('input.range-slider__range').addEventListener('input', (event)=>{
		slider.querySelector('input.range-slider__value').value = event.target.value;
		applyFill(event.target);
	});
	slider.querySelector('input.range-slider__value').addEventListener('input', (event)=>{
		let range_selector = slider.querySelector('input.range-slider__range') ;
		slider.querySelector('input.range-slider__range').value = event.target.value;
		if( Number( range_selector.max ) < Number( event.target.value ) ){
			slider.querySelector('input.range-slider__value').value = range_selector.max;
		}
		applyFill( range_selector );
	});
	// Don't wait for the listener, apply it now!
	applyFill(slider.querySelector('input.range-slider__range'));
});

// This function applies the fill to our sliders by using a linear gradient background
function applyFill(slider) {
	// Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
	const percentage = 100*(slider.value-slider.min)/(slider.max-slider.min);
	// now we'll create a linear gradient that separates at the above point
	// Our background color will change here
	const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
	slider.style.background = bg;
	// slider.nextElementSibling.style.left = percentage + "%";

}