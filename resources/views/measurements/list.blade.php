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
                  @foreach ($measurements as $measurement)
                  <tr>
                    <th scope="row">{{$measurement->id}}</th>
                    <td>{{$measurement->date}}</td>
                    <td>
                      <button class="btn btn-secondary">Editar</button>
                      <button class="btn btn-danger">Excluir</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>

          </div>
        </div> <!-- fim do card -->
      </div> <!-- fim da coluna -->
    </div> <!-- fim da row-->
  </div> <!-- fim da container -->
@endsection
