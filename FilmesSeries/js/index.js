jQuery(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	
    $("#login").click(function(){
        var md5 = $.md5($("input[name='senha']").val());
        $("input[name='senha']").val(md5);
        $("form[name='form_login']").submit();
    });

});