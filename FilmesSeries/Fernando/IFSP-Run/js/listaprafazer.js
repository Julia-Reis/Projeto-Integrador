$(function () {

  var url = "http://localhost/Fernando/IFSP-Run/php";

  function addCorrida(quilometro, id, caloria, duracao) {
    var $corrida = $("<tr />").addClass("corrida-item")
      .append($("<td />").addClass("corrida-id").text(id))
      .append($("<td />").addClass("corrida-quilometro").text(quilometro))
      .append($("<td />").addClass("corrida-duracao").text(duracao))
      .append($("<td />").addClass("corrida-caloria").text(caloria))
      .append($("<div />").addClass('corrida-edit'))
      .append($("<i />").addClass("material-icons text-warning").attr("data-toggle", "tooltip").attr("title", "Editar").text("create"))
      .append($("<div />").addClass('corrida-delete'))
      .append($("<i />").addClass("material-icons text-danger").attr("data-toggle", "tooltip").attr("title", "Excluir").text("delete"));

    $('#corrida-list').append($corrida);
    $('.corrida-delete').click(onCorridaDeleteClick);
    $('.corrida-change-status').click(onCorridaChangeStatusClick);
    $('.corrida-edit').click(onCorridaEditClick);

    $('[data-toggle="tooltip"]').tooltip();
  }

  function loadCorridas() {
    $("#corrida-list").empty();
    $.getJSON(url + "/listarTarefas.php",
      { id_usuario: $.cookie("id_usuario") })
      .done(function (data) {
        for (var corrida = 0; corrida < data.length; corrida++) {
          addCorrida(data[corrida].quilometro, data[corrida].id, data[corrida].duracao, data[corrida].caloria);
        }
      });
  }

  function onBtnLogoutClick() {
    $.get(url + '/logout.php')
      .done(function () {
        window.location.href = "../login.html";
      });
  }

  function onCorridaDeleteClick() {
    var linha = $(this).closest('.corrida-item');

    linha
      .hide('slow', function () {
        var id = linha.children(".corrida-id").text();
        $.post(url + "/removerTarefa.php",
          { id: id },
        );
        linha.remove();
      });
  }

  function onCorridaChangeStatusClick() {
    var linha = $(this).closest('.corrida-item');
    var id = linha.children(".corrida-id").text();
    var quilometro = linha.children(".corrida-quilometro").text();
    var duracao = linha.children(".corrida-duracao").text();
    var caloria = linha.children(".corrida-caloria").text();

    $.post(url + "/salvarTarefa.php",
      { id: id, quilometro: quilometro, duracao: duracao, caloria: caloria },
      function () {
        location.reload();
      }
    );

  }

  function onCorridaEditClick() {
    var linha = $(this).closest('.corrida-item');
    var id = linha.children(".corrida-id").text();
    var quilometro = linha.children(".corrida-quilometro").text();
    var duracao = linha.children(".corrida-duracao").text();
    var caloria = linha.children(".corrida-caloria").text();

    $('#id').val(id);
    $('#quilometro').val(quilometro);
    $('#duracao').val(duracao);
    $('#NovaCorrida').modal();

  }

  $('#btnLogout').click(onBtnLogoutClick);

  // limpar o modal quando for fechado
  $('#NovaCorrida').on('hidden.bs.modal', function () {
    $('#id').val(0);
    $('#quilometro').val("");
    $('#duracao').val("");
    $('#caloria').val("");
  });

  
  // buscar itens
  $('#busca').typeahead({
    source: function (query, result) {
      $.ajax({
        url: url + "/buscarTarefa.php",
        data: { query: query, id_usuario: $.cookie("id_usuario") },
        dataType: "json",
        type: "POST",
        success: function (data) {
          result($.map(data, function (item) {
            return item;
          }));
        }
      });
    }
  });

  function onBtnBuscarClick() {
    $("#corrida-list").empty();
    var texto = $('#busca').val();
    $.getJSON(url + "/buscarTarefa.php",
      { query: texto, id_usuario: $.cookie("id_usuario") })
      .done(function (data) {
        if (data.length > 0) {
          for (var corrida = 0; corrida < data.length; corrida++) {
            addCorrida(data[corrida].quilometro, data[corrida].id, data[corrida].duracao, data[corrida].caloria);
          }
        } else {
          loadCorridas();
        }
      });
  }

  $('#btnBuscar').click(onBtnBuscarClick);
  loadCorridas();
});