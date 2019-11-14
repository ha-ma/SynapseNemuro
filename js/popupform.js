popupnum_id=84;
popupnum_id2=91;
popupcancelflg=true;
document.addEventListener('wpcf7submit', function (event) {
  if ( '67' == event.detail.contactFormId ) {
    popupnum_id2=91;
  } else if ( '154' == event.detail.contactFormId ) {
    popupnum_id2=152;
  }
  switch (event.detail.status) {
    case 'wpcf7c_confirmed':
      jQuery('#popmake-'+popupnum_id+' #popup_company').html(jQuery('[name="text-182"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_depname').html(jQuery('[name="text-183"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_name').html(jQuery('[name="text-184"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_add').html(jQuery('[name="text-185"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_tel1').html(jQuery('[name="text-186"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_tel2').html(jQuery('[name="text-187"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_tel3').html(jQuery('[name="text-188"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_email').html(jQuery('[name="email-801"]').val());
      jQuery('#popmake-'+popupnum_id+' #popup_textarea').html(jQuery('[name="textarea-26"]').val());
      PUM.open(popupnum_id);
      break;
    case 'mail_sent':
      PUM.open(popupnum_id2);
      break;
  }
}, false);
 
 
jQuery(document).on('pumBeforeClose', '.pum', function () {
    popupcancel();
});
 
jQuery(document).on('click', '#pop-cancel', function () {
    popupcancel();
    PUM.close(popupnum_id);
});
 
function popupcancel()
{
  if(popupcancelflg)
  {
        wpcf7c_to_step1(jQuery("form"), true);
  }
}
 
jQuery(document).on('click', '#pop-submit', function () {
    popupcancelflg =false;
    PUM.close(popupnum_id);
    jQuery('.wpcf7-submit').click();
});