tippy('.favorite', {
    content: 'Add to favorites',
});

$(function() {
    $(".heart").on("click", function() {
      $(this).toggleClass("is-active");
    });
  });