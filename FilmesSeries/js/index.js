jQuery(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	
    $("#login").click(function(){
        var md5 = $.md5($("input[name='senha']").val());
        $("input[name='senha']").val(md5);
        $("form[name='form_login']").submit();
    });
	
	$("select[name='cod_serie']").change(function(){
		var id = $(this).val();
		p = {
		cod_serie: id
		}
		
	$.post("quantidade_temporada.php",p,function(r){
	$("input[name='quantidade_temporada']").attr("max",r);
	$("input[name='quantidade_temporada']").val("1");
	});

	});

});