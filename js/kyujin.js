jQuery(document).ready(function($) {
	$(function(){
		// 設定
		var prop = {
			// 個人情報の取り扱いページURL
			PRIVACY_POLICY: "http://yukioo.co.jp/privacy/index.shtml"
		};


		// 個人情報の取り扱いリンクを設定する
		$(".aui .job-apply-control-portlet .form_entry_layout a.privacy_policy").attr("href", prop.PRIVACY_POLICY);
	});
});