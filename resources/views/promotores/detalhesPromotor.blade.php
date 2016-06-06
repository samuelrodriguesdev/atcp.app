@extends('promotores.promotores')
@section('promotores-content')
<div class="col-md-8 col-lg-9">
    <form method="POST" action="{{ URL('promotores/update/'.$promotor->id) }}" accept-charset="UTF-8" id="myForm">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="active"><a href="#DadosDoPromotor" data-toggle="tab">Dados do Promotor</a></li>
                <li><a href="#DadosDoProjecto" data-toggle="tab">Dados do Projecto</a></li>
                <li><a href="#Consultores" data-toggle="tab">Consultores</a></li>
                <li><a href="#PedidosDePagamento" data-toggle="tab">Pedidos de Pagamento</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="DadosDoPromotor">
                    @include('promotores._edit._promotor_form_1')
                </div>
                <div class="tab-pane" id="DadosDoProjecto">
                    @include('promotores._edit._promotor_form_2')
                </div> 
                <div class="tab-pane" id="Consultores">
                    @include('promotores._edit._promotor_form_3')
                </div> 
                <div class="tab-pane" id="PedidosDePagamento">
                    @include('promotores._edit._promotor_form_4')
                </div>   
            </div>
        </div>
    </form>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    var ias = "{{ DB::table('app_vars')->where('name', 'IAS')->value('value') }}";
</script>
<script src="{{ asset("js/promotores/detalhes_promotor_projecto.js") }}"></script>
<script type="text/javascript">
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
    });

    var hash = window.location.hash;
    $('#myTabs a[href="' + hash + '"]').tab('show');
    
    $('body').on('hidden.bs.modal', '.modal', function () {
      $(this).removeData('bs.modal');
    });
</script>
@endsection