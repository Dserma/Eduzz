@extends('layout/default')

@section('content')
    <section class="main">
        <div class="container-fluid limit">
            <div class="row text-center">
                <h3 class="text-info text-30-pt bold">Gerenciamento de Candidatos - Eduzz</h3>
            </div>
            <div class="row margin-top-50">
                <button class="btn btn-primary" data-toggle="modal" data-target="#candidate">Novo Candidato</button>
            </div>
            <div class="row margin-top-10">
                <table class="candidates-list table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidates as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->fullname }}</td>
                                <td>{{ $c->age }}</td>
                                <td>{{ $c->city }}</td>
                                <td>{{ $c->state }}</td>
                                <td>{{ $c->status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-default btn-edit" data-id="{{ $c->id }}" data-toggle="tooltip" data-placement="top" title="Ver / Editar Candidato"><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-danger btn-delete" data-name="{{ $c->fullname }}" data-id="{{ $c->id }}" data-toggle="tooltip" data-placement="top" title="Excluir Candidato"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Idade</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection

<footer>
    <div class="container-fluid limit">
        <div class="modal fade" id="candidate" tabindex="-1" role="dialog" aria-labelledby="">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="">Dados do candidato</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="" class="candidate">
                                <input type="hidden" id="id" name="id" value="" />
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="row">
                                            <label for="" class="text-14-pt bold">Nome Completo:</label>
                                            <input type="text" name="name" id="name" class="form-control" required="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <div class="row padding-left-10">
                                            <label for="" class="text-14-pt bold">Idade:</label>
                                            <input type="text" name="age" id="age" class="form-control" required="" />
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <label for="" class="text-14-pt bold">Logradouro:</label>
                                            <input type="text" name="address" id="address" class="form-control" required="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="row padding-left-10">
                                            <label for="" class="text-14-pt bold">Número:</label>
                                            <input type="text" name="number" id="number" class="form-control" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="row">
                                            <label for="" class="text-14-pt bold">Complemento:</label>
                                            <input type="text" name="complement" id="complement" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="row padding-left-10">
                                            <label for="" class="text-14-pt bold">Bairro:</label>
                                            <input type="text" name="neighborhood" id="neighborhood" class="form-control" required="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="row padding-left-10">
                                            <label for="" class="text-14-pt bold">CEP:</label>
                                            <input type="text" name="postal_code" id="postal_code" class="form-control" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <label for="" class="text-14-pt bold">UF:</label>
                                            <select name="state" id="state" class="form-control" required="">
                                                @foreach( $states as $k => $v )
                                                    <option value="{{ $k}}"> {{ $v }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <div class="row padding-left-10">
                                            <label for="" class="text-14-pt bold">Cidade:</label>
                                            <input type="text" name="city" id="city" class="form-control" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                        <div class="row">
                                            <label for="" class="text-14-pt bold">Status:</label>
                                            <select name="status" id="status" class="form-control" required="">
                                                <option value="0"> Rejeitado </option>
                                                <option value="1"> Aprovado </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row margin-top-20 text-right">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar <i class="fa fa-ban"></i></button>
                                    <button type="submit" class="btn btn-success btn-grava">Gravar Dados <i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" tabindex="-1" role="dialog" id ="loading">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Estamos workando nisso...</h4>
            </div>
            <div class="modal-body text-center">
              <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
              <h5>Aguarde, verificando dados...</h5>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</footer>
<script type="text/javascript">
    var ajax = {
        new:    '{{ route("ajax.new") }}',
        delete: '{{ route("ajax.delete") }}',
        get:    '{{ route("ajax.get") }}'
    };
</script>