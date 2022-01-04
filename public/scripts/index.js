//Tippy is the tooltip library
tippy('.favorite', {
    content: 'Add to favorites',
});

//Logic for the heart function
$(function() {
    $(".heart").on("click", function() {
      $(this).toggleClass("is-active");
    });
  });