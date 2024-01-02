<?php

$acao = 'recuperar';
require("tarefa_controller.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Lista Tarefas</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script>
		function editar(id, txt_tarefa) {
			let form = document.createElement('form');
			form.action = 'tarefa_controller.php?acao=atualizar';
			form.method = 'post';
			className = 'row';
			// imput
			let inputTarefa = document.createElement('input');
			inputTarefa.type = 'text';
			inputTarefa.name = 'tarefa';
			inputTarefa.className = 'col-9 form-control';
			inputTarefa.value = txt_tarefa;

		// 	// criar o input hidden para guardar o id da tarefa

			let inputId = document.createElement('input');
			inputId.type = 'hidden';
			inputId.name = 'id';
			inputId.value = id;
			// Botão
			let button = document.createElement('button');
			button.type = 'submit';
			button.className = 'col-3 btn btn-info';
			button.innerHTML = 'Atualizar';


			// colocando o input no form 
			form.appendChild(inputTarefa);
			// colocando o inputId no form
			form.appendChild(inputId);
			// colocando o button no form
			form.appendChild(button);
			let tarefa = document.getElementById('tarefa_' + id);
			// limpando conteudo interno

			tarefa.innerHTML = '';

			// incluir form na pagina
			tarefa.insertBefore(form, tarefa[0])
			return null;
		}
		function remover(id){
			location.href = 'todas_tarefas.php?acao=remover&id='+id;
		}
		function marcarRealizada(id) {
			location.href = 'index.php?acao=marcarRealizada&id=' + id;
}
	</script>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="img/logo.png" width="30" height="30" class="d-line-block align-top">
            App Lista Tarefas</img>
            </a>
        </div>
    </nav>
    <div class="container app">
        <div class="row">
            <div class="col-md-3 menu">
                <ul class="list-group">
                    <li class="list-group-item active"><a href="#">Tarefas pendentes</a></li>
                    <li class="list-group-item active"><a href="nova_tarefa.php">Nova tarefa</a></li>
                    <li class="list-group-item active"><a href="todas_tarefas.php">Todas tarefas</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="container pagina">
            <div class="row">
                <div class="col">
                    <h4>Tarefas pendentes</h4>
                    <hr>
                    <div class="col-sm-9">
						<?php foreach ($tarefas as $indice => $tarefa) { ?>
							<div class="row mb-3 d-flex align-items-center tarefa">
								<div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
                                <?php if($tarefa->status == 'pendente'){?>
									<?= $tarefa->tarefa ?> (<?= $tarefa->status ?>)
								</div>
								<div class="col-sm-3 mt-2 d-flex justify-content-between">
								<i class="fas fa-trash-alt fa-lg text-danger" id="remover" onclick="remover(<?= $tarefa->id ?>)"></i>
									<?php if($tarefa->status == 'pendente'){ ?>
										<i class="fas fa-edit fa-lg text-info" id="editar" onclick="editar(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
										<i class="fas fa-check-square fa-lg text-success" id="status" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
										
									<?php } ?>
                                    <?php }?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>