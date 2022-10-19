@extends('layouts/main')

@section('container')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page">Medidas Cadastradas</li>
          </ol>
        </nav>
      </div>
      <div class="col-12">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">
            <h1>Medidas Cadastradas</h1>
          </div>
          <div class="card-body">
            <div class="container px-3 my-3">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data da medição</th>
                    <th scope="col">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($measurements->isEmpty())
                    <tr>
                      <td colspan="3" class="text-center">
                        Nenhuma medida cadastrada
                      </td>
                    </tr>
                  @else

                  @foreach ($measurements as $measurement)
                  <tr>
                    <th scope="row">{{$measurement->id}}</th>
                    <td>{{$measurement->date}}</td>
                    <td>
                      <a href="/measurements/edit/{{$measurement->id}}"
                         class="btn btn-secondary"
                         role="button">Editar</a>

                      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationModal" data-measurement-id="{{$measurement->id}}">
                        Excluir
                      </button>

                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
          </div>

          </div>
        </div> <!-- fim do card -->
      </div> <!-- fim da coluna -->
    </div> <!-- fim da row-->
  </div> <!-- fim da container -->


<!-- Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir essa medida?
        <p id="paragrafo"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="/measurements/"
              method="POST" id="formDeleteMeasurements">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-primary">Sim</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  //variável que recebe o elemento html(Modal)
  const confirmationModal = document.getElementById('confirmationModal');

  //adiciona um evento, toda vez que o modal for aberto
  confirmationModal.addEventListener('show.bs.modal', function (event) {

    //variável que recebe o botão que acionou o modal
    const button = event.relatedTarget

    //variável que recebe o formulário do modal
    const form = document.getElementById('formDeleteMeasurements');

    //Alterando o Action(rota) do formulário
    form.action = "/measurements/" + button.getAttribute('data-measurement-id');

  });


</script>


@endsection
