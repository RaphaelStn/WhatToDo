//Tippy is the tooltip library
tippy('.heart', {
    content: 'Add to favorites',
    placement: 'right',
});

//Logic for the heart function
$(function() {
    $(".heart").on("click", function() {
      $(this).toggleClass("is-active");
    });
  });