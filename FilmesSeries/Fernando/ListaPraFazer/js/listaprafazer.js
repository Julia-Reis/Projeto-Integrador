$(function () {

  var url = "http://localhost/Fernando/listaprafazer/php";

  function addTarefa(texto, id, status, data) {
    var $tarefa = $("<tr />")
      .addClass("tarefa-item")
      .append($("<td />")
        .addClass("tarefa-id")
        .text(id))
      .append($("<td />")
        .addClass("tarefa-data")
        .text(function () {
          // Convert 'yyyy-mm-dd hh:mm:ss' to 'dd/mm/yyyy hh:mm:ss'
          return data.replace(/^(\d{4})-(\d{2})-(\d{2})/, '$3/$2/$1');
        }))
      .append($("<td />")
        .addClass("tarefa-texto")
        .text(texto))
      .append($("<td />")
        .addClass("tarefa-status")
        .append($("<span />")
          .addClass(function () {
            switch (status) {
              case "1":
                return "badge badge-primary";
              case "2":
                return "badge badge-warning";
              case "3":
                return "badge badge-success";
            }
          })
          .text(function () {
            switch (status) {
              case "1":
                return "Nova";
              case "2":
                return "Em Andamento";
              case "3":
                return "Finalizada";
            }
          }))
      )
      .append($("<td />")
        .addClass("text-center")
        .append($("<div />")
          .addClass('tarefa-change-status')
          .append($("<i />")
            .addClass("material-icons text-success")
            .attr("data-toggle", "tooltip")
            .attr("title", "Mudar status")
            .text("check")
          )
        )
        .append($("<div />")
          .addClass('tarefa-edit')
          .append($("<i />")
            .addClass("material-icons text-warning")
            .attr("data-toggle", "tooltip")
            .attr("title", "Editar")
            .text("create")
          )
        )
        .append($("<div />")
          .addClass('tarefa-delete')
          .append($("<i />")
            .addClass("material-icons text-danger")
            .attr("data-toggle", "tooltip")
            .attr("title", "Excluir")
            .text("delete")
          )
        )
      );

    $('#tarefa-list').append($tarefa);
    $('.tarefa-delete').click(onTarefaDeleteClick);
    $('.tarefa-change-status').click(onTarefaChangeStatusClick);
    $('.tarefa-edit').click(onTarefaEditClick);

    $('[data-toggle="tooltip"]').tooltip();
  }

  function loadTarefas() {
    $("#tarefa-list").empty();
    $.getJSON(url + "/listarTarefas.php",
      { id_usuario: $.cookie("id_usuario") })
      .done(function (data) {
        for (var tarefa = 0; tarefa < data.length; tarefa++) {
          addTarefa(data[tarefa].texto, data[tarefa].id, data[tarefa].status, data[tarefa].data);
        }
      });
  }

  function onBtnLogoutClick() {
    $.get(url + '/logout.php')
      .done(function () {
        window.location.href = "../login.html";
      });
  }

  function onTarefaDeleteClick() {
    var linha = $(this).closest('.tarefa-item');

    linha
      .hide('slow', function () {
        var id = linha.children(".tarefa-id").text();
        $.post(url + "/removerTarefa.php",
          { id: id },
        );
        linha.remove();
      });
  }

  function onTarefaChangeStatusClick() {
    var linha = $(this).closest('.tarefa-item');
    var id = linha.children(".tarefa-id").text();
    var texto = linha.children(".tarefa-texto").text();
    var data = linha.children(".tarefa-data").text();
    var status = linha.children(".tarefa-status").text();

    switch (status) {
      case "Nova":
        status = 2;
        break;
      case "Em Andamento":
        status = 3;
        break;
      case "Finalizada":
        status = 3;
        break;
    }

    $.post(url + "/salvarTarefa.php",
      { id: id, descricao: texto, data: data, status: status },
      function () {
        location.reload();
      }
    );

  }

  function onTarefaEditClick() {
    var linha = $(this).closest('.tarefa-item');
    var id = linha.children(".tarefa-id").text();
    var texto = linha.children(".tarefa-texto").text();
    var data = linha.children(".tarefa-data").text();
    var status = linha.children(".tarefa-status").text();

    switch (status) {
      case "Nova":
        status = "1";
        break;
      case "Em Andamento":
        status = "2";
        break;
      case "Finalizada":
        status = "3";
        break;
    }

    $('#id').val(id);
    $('#descricao').val(texto);
    $('#status option')
      .removeAttr('selected')
      .filter('[value=' + status + ']')
      .prop('selected', 'selected')
    $('#data').val(data);
    $('#NovaTarefa').modal();

  }

  $('#btnLogout').click(onBtnLogoutClick);

  // limpar o modal quando for fechado
  $('#NovaTarefa').on('hidden.bs.modal', function () {
    $('#id').val(0);
    $('#descricao').val("");
    $('#status option')
      .removeAttr('selected');
    $('#data').val("");
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
    $("#tarefa-list").empty();
    var texto = $('#busca').val();
    $.getJSON(url + "/buscarTarefa.php",
      { query: texto, id_usuario: $.cookie("id_usuario") })
      .done(function (data) {
        if (data.length > 0) {
          for (var tarefa = 0; tarefa < data.length; tarefa++) {
            addTarefa(data[tarefa].texto, data[tarefa].id, data[tarefa].status, data[tarefa].data);
          }
        } else {
          loadTarefas();
        }
      });
  }

  $('#btnBuscar').click(onBtnBuscarClick);
  loadTarefas();
});