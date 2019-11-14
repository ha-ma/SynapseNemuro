jQuery(function($) {

  jQuery  ('#entry_submit').click(function() {
    $(".entry_confirmbtn").hide();
    $(".entry_backbtn").hide();
    $(".entry_submitbtn").hide();
    $('#file_name').empty();
  });

  jQuery("#entry_file").change(function() {
    $('#file_name').text($('#entry_file').val());
  });
});
