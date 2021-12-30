		// function to reload on resize, to refresh sliders to prevent bugs
		var resizeTimeout;
		window.addEventListener('resize', function(event) {
  			clearTimeout(resizeTimeout);
  			resizeTimeout = setTimeout(function(){
    			window.location.reload();
  			}, 1500);
		});