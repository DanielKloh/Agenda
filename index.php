<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="style/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

</head>

<body>

<h2>Agenda</h2>

<span id="msg"></span>
    <div id='calendar' class="container mt-5 mb-5"></div>




    <!-- Modal visualizar -->
    <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="visualizarModalLabel">Detalhes do Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9" id="visualizarId"></dd>

                        <dt class="col-sm-3">Title:</dt>
                        <dd class="col-sm-9" id="visualizarTitle"></dd>

                        <dt class="col-sm-3">Start:</dt>
                        <dd class="col-sm-9" id="visualizarStart"></dd>

                        <dt class="col-sm-3">End:</dt>
                        <dd class="col-sm-9" id="visualizarEnd"></dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastrarModal" tabindex="-1" aria-labelledby="cadastrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cadastrarModalLabel">Cadastar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <samp id="msgCadEvento"></samp>

                    <form method="POST" id="formCadEvento">
                        <div class="row mb-3">
                            <label for="inputTitle" class="col-sm-2 col-form-label">Titulo</label>
                            <div class="col-sm-10">
                                <input type="text" name="inputTitle" class="form-control" id="inputTitle">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputStart" class="col-sm-2 col-form-label">Inicio</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="inputStart" class="form-control" id="inputStart">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEnd" class="col-sm-2 col-form-label">Fim</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="inputEnd" class="form-control" id="inputEnd">
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label for="inputColor" class="col-sm-2 col-form-label">Cor</label>
                            <div class="col-sm-10">
                                <select name="inputColor" id="inputColor" class="form-control">
                                    <option>Selecione</option>
                                    <option style="color: #8B0000;" value="#8B0000">Vermelho</option>
                                    <option style="color: #228B22;" value="#228B22">Verde</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="btnCadEvento" class="btn btn-success" id="btnCadEvento">Inserir</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src='script/index.global.min.js'></script>
    <script src="script/bootstrap5/index.global.min.js"></script>
    <script src='script/core/locales-all.global.min.js'></script>
    <script src="script/custom.js"></script>
</body>

</html>