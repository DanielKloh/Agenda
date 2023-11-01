// Executar quando o documento HTML for completamente carregado
document.addEventListener("DOMContentLoaded", function () {
  // Receber o SELETOR calendar do atributo id
  var calendarEl = document.getElementById("calendar");

  //Receber o seletor da janela modal
  const visualizarModal = new bootstrap.Modal(
    document.getElementById("visualizarModal")
  );

  // Instanciar FullCalendar.Calendar e atribuir a variável calendar
  var calendar = new FullCalendar.Calendar(calendarEl, {
    //Incluindo bootstra 5
    themeSystem: "bootstrap5",

    // Criar o cabeçalho do calendário
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek,timeGridDay",
    },

    // Definir o idioma usado no calendário
    locale: "pt-br",

    // Definir a data inicial
    //initialDate: '2023-01-12',
    //initialDate: '2023-10-12',

    // Permitir clicar nos nomes dos dias da semana
    navLinks: true,

    // Permitir clicar e arrastar o mouse sobre um ou vários dias no calendário
    selectable: true,

    // Indicar visualmente a área que será selecionada antes que o usuário solte o botão do mouse para confirmar a seleção
    selectMirror: true,

    // Permitir arrastar e redimensionar os eventos diretamente no calendário.
    editable: true,

    // Número máximo de eventos em um determinado dia, se for true, o número de eventos será limitado à altura da célula do dia
    dayMaxEvents: true,

    events: "listarEvento.php",

    // Identificar o click do usuario sobre o evento
    eventClick: function (info) {
      //Enviar para a modal os dados do evento
      document.getElementById("visualizarId").innerText = info.event.id;
      document.getElementById("visualizarTitle").innerText = info.event.title;
      document.getElementById("visualizarStart").innerText =
        info.event.start.toLocaleString();
      document.getElementById("visualizarEnd").innerText =
        info.event.end !== null
          ? info.event.end.toLocaleString()
          : info.event.start.toLocaleString();

      //Visualizar a modal
      visualizarModal.show();
    },

    //Abrir uma modal quando clicar em algum dia
    select: function (info) {
      console.log(info.start);
      //Receber o seletor da janela modal
      let cadastrarModal = new bootstrap.Modal(
        document.getElementById("cadastrarModal")
      );

      //Chama a função que converte a data
      document.getElementById("inputStart").value = converterData(info.start);
      document.getElementById("inputEnd").value = converterData(info.start);

      //Abrir modal de cadastro
      cadastrarModal.show();
    },
  });

  calendar.render();

  // Converter a data
  function converterData(data) {
    // Converter a string em um objeto Date
    const dataObj = new Date(data);

    // Extrair o ano da data
    const ano = dataObj.getFullYear();

    // Obter o mês, mês começa de 0, padStart adiciona zeros à esquerda para garantir que o mês tenha dígitos
    const mes = String(dataObj.getMonth() + 1).padStart(2, "0");

    // Obter o dia do mês, padStart adiciona zeros à esquerda para garantir que o dia tenha dois dígitos
    const dia = String(dataObj.getDate()).padStart(2, "0");

    // Obter a hora, padStart adiciona zeros à esquerda para garantir que a hora tenha dois dígitos
    const hora = String(dataObj.getHours()).padStart(2, "0");

    // Obter minuto, padStart adiciona zeros à esquerda para garantir que o minuto tenha dois dígitos
    const minuto = String(dataObj.getMinutes()).padStart(2, "0");

    // Retornar a data
    return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
  }

  let formCadEvento = document.getElementById("formCadEvento");
  let msg = document.getElementById("msg");
  let msgCadEvento = document.getElementById("msgCadEvento")
  let btnCadEvento = document.getElementById("btnCadEvento");

  if (formCadEvento) {
    formCadEvento.addEventListener("submit", async (e) => {
      //Evita atualizar a pagina
      e.preventDefault();

      btnCadEvento.value = "Salvando...";

      //Receber os dados do formulario
      const dadosForm = new FormData(formCadEvento);

      //Chamar o arquivo PHP responsavel por salvar a marca
      const dados = await fetch("cadastrarEvento.php", {
        method: "POST",
        body: dadosForm,
      });

      //Ler os dados
      const resposta = await dados.json();

      //Falha ao cadastrar
      if (!resposta["status"]) {
        msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">
         ${resposta["msg"]}
       </div>`;
      } else {
        msg.innerHTML = `<div class="alert alert-success" role="alert">
         ${resposta["msg"]}
       </div>`;

       msgCadEvento.innerHTML = "";

        formCadEvento.reset();

        const novoEvento = {
          id: resposta["id"],
          title: resposta["title"],
          color: resposta["color"],
          start: resposta["start"],
          end: resposta["end"],
        };

        calendar.addEvent(novoEvento);
        removerMsg();
      //Da uma olhada nisso
        document.getElementById("cadastrarModal").setAttribute("style","display: none;");
      
      }

      btnCadEvento.value = "Cadastrar";
    });
  }


  function removerMsg(){
    setTimeout(() => {
      document.getElementById("msg").innerHTML = ""
    }, 3000);
  }
});
