class Slider {
	constructor(slider){
		this.slider = slider;
		this.slides = this.slider.children;
		this.img = this.slider.querySelector('img');
		this.containerWidth =  this.slider.offsetWidth; // getting the total width of div
		this.imgWidth = this.img.offsetWidth; // getting the width of one img
		this.index = 1; //Index for next slide
		this.value = 1; // value for css translate method
		this.slideLength = this.slides.length;
		this.setButtons();
		this.slides = Array.prototype.slice.call(this.slides)
		
	}
	//setting of buttons of sliders
	setButtons() {
		this.nextBtn = document.createElement('div');
		this.nextBtn.innerHTML = "<i class='fas fa-chevron-right'></i>"
		this.nextBtn.className = "btn-poster btn-right";
		this.nextBtn.addEventListener('click', _ => {
			this.nextSlide();
		});
		this.slider.appendChild(this.nextBtn);
		this.prevBtn = document.createElement('div');
		this.prevBtn.innerHTML = "<i class='fas fa-chevron-left'></i>";
		this.prevBtn.className = "btn-poster btn-left";
		this.prevBtn.addEventListener('click', _ => {
			this.prevSlide();
		});
		this.slider.appendChild(this.prevBtn);
	}
	//logic for navigation, using total div width in relation of image width, without forgetting the gap between each img to prevent overflowing
	nextSlide() {
		if(this.index < this.slideLength - (this.containerWidth/this.imgWidth - 1)) {
			for (let slide of this.slides.slice(0, -2)) {
				this.value = this.index * -(this.imgWidth+15);
				slide.style.transform = `translate(${this.value}px, 0)`
			};
			this.index++;
		}
	}
	prevSlide() {
		if(this.index>1) {
			for (let slide of this.slides.slice(0, -2)) {
				this.value = (this.index * -(this.imgWidth+15)) + 2*(this.imgWidth+15);
				slide.style.transform = `translate(${this.value}px, 0)`
			};
			this.index--;
		}
	}

}