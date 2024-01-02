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

    //criar o input hidden para guardar o id da tarefa

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
    location.href = 'todas_tarefas.php?acao=remover&id'+id;
}
function marcarRealizada(id){
    location.href = 'todas_tarefas.php?status&id'+id;
}