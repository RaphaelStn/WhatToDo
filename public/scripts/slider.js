class Slider {
	constructor(slider){
		this.slider = slider;
		this.slides = this.slider.children;
		this.img = this.slider.querySelector('img');
		this.imgWidth = this.img.offsetWidth;
		console.log(this.imgWidth)
		this.index = 1; //Index for next slide
		this.value = 1;
		this.slideLenght = this.slides.length;
		this.setButtons();
		this.slides = Array.prototype.slice.call(this.slides)
	}
	setButtons() {
		this.nextBtn = document.createElement('div');
		this.nextBtn.innerHTML = "<i class='fas fa-chevron-right'></i>"
		this.nextBtn.className = "btn-right";
		this.nextBtn.addEventListener('click', _ => {
			this.nextSlide();
		});
		this.slider.appendChild(this.nextBtn);
		this.prevBtn = document.createElement('div');
		this.prevBtn.innerHTML = "<i class='fas fa-chevron-left'></i>";
		this.prevBtn.className = "btn-left";
		this.prevBtn.addEventListener('click', _ => {
			this.prevSlide();
		});
		this.slider.appendChild(this.prevBtn);
	}
	nextSlide() {
		if(this.index <= this.slideLenght-4) {
			for (let slide of this.slides.slice(0, -2)) {
				this.value = this.index * -(this.imgWidth+10);
				slide.style.transform = `translate(${this.value}px, 0)`
			};
			this.index++;
			console.log(this.index)
		}
	}
	prevSlide() {
		if(this.index>1) {
			for (let slide of this.slides.slice(0, -2)) {
				this.value = (this.index * -(this.imgWidth+10)) + 2*(this.imgWidth+10);
				slide.style.transform = `translate(${this.value}px, 0)`
			};
			this.index--;
			console.log(this.index)
		}
	}

}