$(document).ready(function(){
    
    $('[data-toggle="tooltip"]').tooltip();
    
    if( $('.candidates-list').length > 0 ){
        $(document).ready(function() {
            $('.candidates-list').DataTable({
                 "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                }
            });
        } );
    }
    
    $('.candidate').on('submit', function(){
        saveCandidate($(this));
        return false;
    });
    
    $('.btn-edit').on('click', function(){
        editCandidate($(this));
    });
    
    $('.btn-delete').on('click', function(){
        deleteCandidate($(this));
    });
    
    $('#candidate').on('hidden.bs.modal', function(){
        $fields = $(this).find('input, select');
        $fields.each(function(){
           $(this).val(''); 
        });
    });
});



function saveCandidate($this){
    if( $this.find('#id').val() == '' ){
        $text   = 'Confirma a <b>inclusão</b> do(a) candidato(a)' + $('#name').val() + '?';
        $text2  = 'Candidato <b>adicionado</b> com sucesso!';
    }else{
        $text = 'Confirma a <b>edição</b> do(a) candidato(a)' + $('#name').val() + '?';
        $text2  = 'Candidato <b>editado</b> com sucesso!';
    }
    swal({
        title: 'Tem certeza?',
        html: true,
        text: $text, 
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: "Não",
        confirmButtonText: "Sim",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    },function(){
        $.ajax({
            url:  ajax.new,
            headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
            },
            async: true,
            method: 'POST',
            data: $this.serialize(),
            success: function(data) {
                if( data != 'ok' ){
                    $resp = JSON.parse(data);
                    $content = '';
                    for($x = 0; $x < $resp.length; $x++){
                        $content += $resp[$x] + '<br/>';
                    }
                    swal({
                        title: 'Oops...',
                        html: true,
                        text: '<b>Ocorreram os seguintes erros:</b> <br>' + $content, 
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonText: "OK",
                        closeOnConfirm: true
                    });
                }else{
                    swal({
                        title: 'Aeeeee \o/',
                        html: true,
                        text: $text2, 
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonText: "OK",
                        closeOnConfirm: false
                    },function(){
                        window.location.reload();
                    });
                }
            },
            beforeSend: function(){
            },
            complete: function(){
            }
        });
    });
}

function deleteCandidate($this){
    swal({
        title: 'Opa!',
        html: true,
        text: 'Tem certeza que deseja <b>excluir</b> o(a) candidato(a) <b>' + $this.attr('data-name') + '</b> ?', 
        type: 'info',
        showCancelButton: true,
        cancelButtonText: "Não",
        confirmButtonText: "Sim, pode excluir",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    },function(){
        $.ajax({
            url:  ajax.delete,
            headers: {
                    'X-CSRF-Token': $('meta[name=_token]').attr('content')
            },
            async: true,
            method: 'POST',
            data: {sid: Math.random(), i: $this.attr('data-id') },
            success: function(data) {
                swal({
                    title: 'Sucesso!',
                    html: true,
                    text: '<b>Candidato excluído com sucesso!</b>', 
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },function(){
                    window.location.reload();
                });
            },
            beforeSend: function(){
            },
            complete: function(){
            }
        });
    });
}

function editCandidate($this){
    $.ajax({
        url:  ajax.get,
        async: true,
        method: 'GET',
        data: {sid: Math.random(), i: $this.attr('data-id') },
        success: function(data) {
            $('#loading').modal('hide');
            $('#id').val(data.id);
            $('#name').val(data.fullname);
            $('#age').val(data.age);
            $('#address').val(data.address);
            $('#number').val(data.number);
            $('#complement').val(data.complement);
            $('#neighborhood').val(data.neighborhood);
            $('#postal_code').val(data.postal_code);
            $('#state').val(data.state);
            $('#city').val(data.city);
            $('#status').val(data.status);
            $('#candidate').modal('show');
        },
        beforeSend: function(){
            $('#loading').modal('show');
        },
        complete: function(){
        }
    });
}