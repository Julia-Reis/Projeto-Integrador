var acao="salvar";
var id = "NULL";
$(function(){
    
    //REMOVER
    function define_acao_remover(){

     
        $(".remover").click(function(){
            
            i = $(this).val();
            t = $(this).attr("name");

            // estrutura JSON.
            p = {id:i,tabela:t};
            

            $.post("remover.php",p,function(r){
                
                if(r=='1'){
                    $("#tr"+i).remove();
                }
                if($("tr.dados").length==0){
                    tr = "<tr><td colspan='3'>Não há dados cadastrados</td>";
                    $("tbody").append(tr);
                }
            });

        });
    }

    define_acao_remover();
    //////// FIM REMOVER//////////////////////////////////////////
	
	
		$("input[name='tipo']").change(function(){
        valor = $(this).val();
        if(valor=='f'){
            $(".filme").css("display","block");
            $(".serie").css("display","none");
        }
        else{
            $(".filme").css("display","none");
            $(".serie").css("display","block");
        }
    });
	
	
    //INSERIR/////////////////////////////////////////
    $(".inserir").click(function(){
        
        tabela = $("form[name='f']").attr("value");
		
		if(tabela=="Usuario"){
			nome = $("input[name='nome']").val();
            email = $("#email_cadastro").val();
			var senha = $.md5($("#senha_cadastro").val());          			
            p = {
                    nome:nome, 
                    email:email,
					senha:senha
                };    
		}else if(tabela=="Lancamento"){
			tipo = $("input[name='tipo']").val();
			
			imagem_filme = $("input[name='imagem_filme']")[0].files[0];
            nome_filme = $("input[name='nome_filme']").val();
            data_filme = $("input[name='data_filme']").val();            
			duracao_filme = $("input[name='duracao_filme']").val();
			genero_filme = $("input[name='genero_filme']").val();
			classificacao_filme = $("select[name='classificacao_filme']").val();
			sinopse_filme = $("textarea[name='sinopse_filme']").val();
			
			imagem_serie = $("input[name='imagem_serie']")[0].files[0];
			nome_serie = $("input[name='nome_serie']").val();
            data_serie = $("input[name='data_serie']").val();  
			temporada_serie = $("input[name='temporada_serie']").val(); // aqui é input pq estou informando a quantidade apenas
			genero_serie = $("select[name='genero_serie']").val();
			classificacao_serie = $("select[name='classificacao_serie']").val();
			sinopse_serie = $("textarea[name='sinopse_serie']").val();
			
				var p = new FormData();


				//append vem de anexar
				p.append('tipo',tipo);
				
				p.append('imagem_filme',imagem_filme);
				p.append('nome_filme',nome_filme);
				p.append('data_filme',data_filme);
				p.append('duracao_filme',duracao_filme);
				p.append('genero_filme',genero_filme);
				p.append('classificacao_filme',classificacao_filme);
				p.append('sinopse_filme',sinopse_filme);
				
				p.append('imagem_serie',imagem_serie);
				p.append('nome_serie',nome_serie);
				p.append('data_serie',data_serie);
				p.append('temporada_serie',temporada_serie);
				p.append('genero_serie',genero_serie);
				p.append('classificacao_serie',classificacao_serie);
				p.append('sinopse_serie',sinopse_serie);		
				
				p.append('id',id);
				
		}else if(tabela=="Filme"){
			
			nome = $("input[name='nome']").val();
			ano = $("input[name='ano']").val();
			duracao = $("input[name='duracao']").val();
			genero = $("input[name='genero']").val();
			classificacao = $("select[name='classificacao']").val();
			sinopse = $("textarea[name='sinopse']").val();
			foto = $("input[name='foto']")[0].files[0];

				var p = new FormData();

				//append vem de anexar
				p.append('foto', foto);
				p.append('nome',nome);
				p.append('ano',ano);
				p.append('duracao',duracao);
				p.append('genero',genero);
				p.append('classificacao',classificacao);
				p.append('sinopse',sinopse);		
				p.append('id',id);
				
		}else if(tabela =="Serie"){
			nome = $("input[name='nome']").val();
			ano = $("input[name='ano']").val();
			genero = $("select[name='genero']").val();
			classificacao = $("select[name='classificacao']").val();
			temporada = $("input[name='temporada']").val();
			sinopse = $("textarea[name='sinopse']").val();
			foto = $("input[name='foto']")[0].files[0];

				var p = new FormData();

				//append vem de anexar
				p.append('foto', foto);
				p.append('nome',nome);
				p.append('ano',ano);
				p.append('temporada',temporada);
				p.append('genero',genero);
				p.append('classificacao',classificacao);
				p.append('sinopse',sinopse);		
				p.append('id',id);
				
		}else if(tabela=="AvaliarFilme"){
			cod_filme = $("select[name='cod_filme']").val();
			nota = $("input[name='nota']").val();
			titulo= $("input[name='titulo']").val();
			descricao = $("textarea[name='descricao']").val();
			spoiler = $("input[name='spoiler']").val();
				p = {
					cod_filme:cod_filme,
					nota:nota,
					titulo:titulo,
					descricao:descricao,
					spoiler:spoiler,
					id:id
				}
		}else if(tabela=="AvaliarSerie"){
			nome = $("input[name='nome']").val();
			nota = $("input[name='nota']").val();
			titulo= $("input[name='titulo']").val();
			descricao = $("input[name='descricao']").val();
			spoiler = $("input[name='spoiler']").val();
				p = {
					nome:nome,
					temporada:temporada,
					nota:nota,
					titulo:titulo,
					descricao:descricao,
					spoiler:spoiler,
					id:id
				}
		}
		console.log(acao+tabela);
        // $.post(acao+tabela+".php",p,function(r){
			$.ajax({
				url: acao+tabela+".php",
				type: "POST",
				data: p,
				contentType: false, // não é um formulario comum, não é apenas texto 
				processData: false,
				success: function(r){
			
            console.log(r);
               if(r.erro == 0){
				if(tabela=="Usuario") {
					location.href= 'index.php';
				}
			   tbody = "";
                $.each(r,function(i,v){
					if(i != 'erro'){
                    if(tabela=="Lancamento"){
                        tbody+="<tr class='dados' id='tr"+ v.id_lancamento + "'>";
						tbody+="<td>" +v.imagem + "</td>";
                        tbody+="<td>"+v.nome+ "</td>";
                        tbody+="<td>"+v.data + "</td>";
						tbody+="<td>" +v.duracao_temporada+ "</td>";
						tbody+="<td>" +v.genero+ "</td>";
						tbody+="<td>" +v.classificacao + "</td>";
						tbody+="<td>" +v.sinopse+ "</td>";
                        tbody+="<td><button class='alterar' type='button' value='"+v.id_lancamento+"' name='lancamento' data-toggle='modal' data-target='#novo"+tabela+"'>";
                        tbody+="<i class='material-icons text-warning'>create</i>";
                        tbody+="</button>";

                        tbody+="<button class='remover' type='button' value='"+v.id_lancamento+"' name='lancamento'>";
                        tbody+="<i class='material-icons text-danger'>delete</i>";
                        tbody+="</button></td>";
                        tbody+="</tr>";
                    }
					
					if(tabela=="Filme"){
                        tbody+="<tr class='dados' id='tr"+ v.id_filme + "'>";
						tbody+="<td>"+ v.foto + "</td>";
                        tbody+="<td>"+ v.nome + "</td>";
						tbody+="<td>"+ v.ano + "</td>";
                        tbody+="<td>" + v.duracao + "</td>";
						tbody+="<td>" + v.genero + "</td>";
						tbody+="<td>" + v.classificacao + "</td>";
						tbody+="<td>" + v.sinopse + "</td>";
                        tbody+="<td><button class='alterar' type='button' value='"+v.id_filme+"' name='filme' data-toggle='modal' data-target='#novo"+tabela+"'>";
                        tbody+="<i class='material-icons text-warning'>create</i>";
                        tbody+="</button>";

                        tbody+="<button class='remover' type='button' value='"+v.id_filme+"' name='filme'>";
                        tbody+="<i class='material-icons text-danger'>delete</i>";
                        tbody+="</button></td>";
                        tbody+="</tr>";
                    }
					
					if(tabela=="Serie"){
                        tbody+="<tr class='dados' id='tr"+ v.id_serie + "'>";
						tbody+="<td>"+ v.foto + "</td>";
                        tbody+="<td>"+ v.nome + "</td>";
						tbody+="<td>"+ v.ano + "</td>";
						tbody+="<td>" + v.genero + "</td>";
						tbody+="<td>" + v.classificacao + "</td>";
						tbody+="<td>"+ v.temporada + "</td>";
						tbody+="<td>" + v.sinopse + "</td>";
                        tbody+="<td><button class='alterar' type='button' value='"+v.id_serie+"' name='serie' data-toggle='modal' data-target='#novo"+tabela+"'>";
                        tbody+="<i class='material-icons text-warning'>create</i>";
                        tbody+="</button>";

                        tbody+="<button class='remover' type='button' value='"+v.id_serie+"' name='serie'>";
                        tbody+="<i class='material-icons text-danger'>delete</i>";
                        tbody+="</button></td>";
                        tbody+="</tr>";
                    }
					
					if(tabela=="AvaliarSerie"){
                        tbody+="<tr class='dados' id='tr"+ v.id_avaliacao_serie + "'>";
						 tbody+="<td>"+ v.usuario + "</td>";
						tbody+="<td>"+ v.foto + "</td>";
                        tbody+="<td>"+ v.nome + "</td>";
						tbody+="<td>"+ v.nota + "</td>";
						tbody+="<td>" + v.titulo + "</td>";
						tbody+="<td>" + v.descricao + "</td>";
						tbody+="<td>" + v.spoiler + "</td>";
                        tbody+="<td><button class='alterar' type='button' value='"+v.id_avaliacao_serie+"' name='serie' data-toggle='modal' data-target='#novo"+tabela+"'>";
                        tbody+="<i class='material-icons text-warning'>create</i>";
                        tbody+="</button>";

                        tbody+="<button class='remover' type='button' value='"+v.id_avaliacao_serie+"' name='serie'>";
                        tbody+="<i class='material-icons text-danger'>delete</i>";
                        tbody+="</button></td>";
                        tbody+="</tr>";
                    }
					
					if(tabela=="AvaliarFilme"){
                        tbody+="<tr class='dados' id='tr"+ v.id_avaliacao_filme + "'>";
                        tbody+="<td>"+ v.usuario + "</td>";
						tbody+="<td>"+ v.foto + "</td>";
						tbody+="<td>"+ v.filme + "</td>";
						tbody+="<td>"+ v.nota + "</td>";
						tbody+="<td>" + v.titulo + "</td>";
						tbody+="<td>" + v.descricao + "</td>";
						tbody+="<td>" + v.spoiler + "</td>";
                        tbody+="<td><button class='alterar' type='button' value='"+v.id_avaliacao_filme+"' name='filme' data-toggle='modal' data-target='#novo"+tabela+"'>";
                        tbody+="<i class='material-icons text-warning'>create</i>";
                        tbody+="</button>";

                        tbody+="<button class='remover' type='button' value='"+v.id_avaliacao_filme+"' name='filme'>";
                        tbody+="<i class='material-icons text-danger'>delete</i>";
                        tbody+="</button></td>";
                        tbody+="</tr>";
                    }
				  }
                });
                $("tbody").html("");
                $("tbody").append(tbody);
                $(".close").click();
                if(acao=='alterar'){
                    acao_msg = "alterad@";
                }
                else{
                    acao_msg = "inserid@";
                }
                $("#msg").html(tabela + " " + acao_msg + " com sucesso.");   
                
                if(tabela=="Lancamento"){
                    $("input[name='nome']").val("");
                    $("input[name='data']").val("");
                }
				
				if(tabela=="Filme"){
					$("input[name='foto']").val();
					$("input[name='nome']").val();
					$("input[name='ano']").val();
					$("input[name='duracao']").val();
					$("input[name='genero']").val();
					$("input[name='classificacao']").val();
					$("input[name='sinopse']").val();
				}
				
				if(tabela=="Serie"){
					$("input[name='nome']").val();
					$("input[name='ano']").val();
					$("input[name='genero']").val();
					$("input[name='classificacao']").val();
					$("input[name='temporada']").val();
					$("input[name='sinopse']").val();
				}
				
				if(tabela=="AvaliarFilme"){
					$("input[name='nome']").val();
					$("input[name='nota']").val();
					$("input[name='titulo']").val();
					$("input[name='descricao']").val();
					$("input[name='spoiler']").val();				
				}
				
				if(tabela=="AvaliarSerie"){
					$("input[name='nome']").val();
					$("input[name='temporada']").val();
					$("input[name='nota']").val();
					$("input[name='titulo']").val();
					$("input[name='descricao']").val();
					$("input[name='spoiler']").val();				
				}
				
                define_acao_remover();
                define_acao_alterar();
                acao='salvar';
			}else{
				// location.href = 'login.php';
			}

                
			}
        });
    });
    //////////////FIM INSERIR/////////////////
    
    
    //// Alterar
    function define_acao_alterar(){
        $(".alterar").click(function(){

            i = $(this).val();
            t = $(this).attr("name");

            p = {id:i,tabela:t};

            $.post("selecionarAlterar.php",p,function(r){
                console.log(p);
                if(t=='lancamento'){
                    $("input[name='nome']").val(r[0].nome);
                    $("input[name='data']").val(r[0].data);
                }
				
				if(t=="filme"){
					$("input[name='nome']").val(r[0].nome);
					$("input[name='ano']").val(r[0].ano);
					$("input[name='duracao']").val(r[0].duracao);
					$("input[name='genero']").val(r[0].genero);
					$("input[name='classificacao']").val(r[0].classificacao);
					$("input[name='sinopse']").val(r[0].sinopse);
				}
				
				if(t=="serie"){
					$("input[name='nome']").val(r[0].nome);
					$("input[name='ano']").val(r[0].ano);
					$("select[name='genero']").val(r[0].genero);
					$("select[name='classificacao']").val(r[0].classificacao);
					$("input[name='temporada']").val(r[0].temporada);
					$("textarea[name='sinopse']").val(r[0].sinopse);
				}
				
				if(t=="avaliacao_filme"){
					$("input[name='nome']").val(r[0].nome);
					$("input[name='nota']").val(r[0].nota);
					$("input[name='titulo']").val(r[0].titulo);
					$("input[name='descricao']").val(r[0].descricao);
					$("input[name='spoiler']").val(r[0].spoiler);
				}
				
				if(t=="AvaliarSerie"){
					$("input[name='nome']").val(r[0].nome);
					$("input[name='temporada']").val(r[0].temporada);
					$("input[name='nota']").val(r[0].nota);
					$("input[name='titulo']").val(r[0].titulo);
					$("input[name='descricao']").val(r[0].descricao);
					$("input[name='spoiler']").val(r[0].spoiler);
				}
                
                acao="alterar";
                id = i;
            });

        });
    }
    define_acao_alterar();
    /////////////////////////////////////////
});

