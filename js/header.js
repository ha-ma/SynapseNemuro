jQuery(document).ready(function ($) {
  $('.spmenu').click(function () {
    $(this).toggleClass('op');
    $('#header').toggleClass('active');
  });
});