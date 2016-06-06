@extends('promotores.promotores')
@section('promotores-content')
<div class="col-md-8 col-lg-9">
    <form method="POST" action="{{ URL('promotores/newProject') }}" accept-charset="UTF-8" id="myForm">
    {{ csrf_field() }}
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Dados do Promotor</a></li>
                <li><a href="#tab_2" data-toggle="tab">Dados do Projecto</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                   @include('promotores._partials._promotor_form_1')
                </div>
                <div class="tab-pane" id="tab_2">
                    @include('promotores._partials._promotor_form_2')
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
<script src="{{ asset("js/promotores/novo_promotor_projecto.js") }}"></script>
@endsection