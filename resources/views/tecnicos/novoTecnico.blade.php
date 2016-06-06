@extends('tecnicos.tecnicos')
@section('content2')
<div class="col-md-8 col-lg-7">
   <div class="box box-success" >
      <div class="box-header with-border">
         <h3 class="box-title">Novo Técnico</h3>
      </div>
      <form method="POST" action="{{ URL('tecnicos/create') }}" accept-charset="UTF-8" id="tecnico_form">
         {{ csrf_field() }}
         <div class="box-body">
            <div class="form-group">
               <label for="Entidade">Organismo/Entidade</label>
               <select class="form-control" id="organismo_entidade_id" name="organismo_entidade_id" required="required" style="width:100%;">
               </select>
               <div class="help-block with-errors"></div>
            </div>
            <div class="form-group has-feedback" >
               <label for="nome">Nome</label>
               <input class="form-control" name="nome" type="text" id="nome" required="required" />
               <div class="help-block with-errors"></div>
            </div>
            <div class="row">
               <div class="col-md-6" id="additional_email">
                  <div class="form-group has-feedback div_email">
                     <label for="Email">Email</label>
                     <div class="input-group">
                        <input type="hidden" class="form-control" value="Email" name="tecnico_email[0][type]">
                        <input class="form-control" name="tecnico_email[0][value]" type="text" id="tecnico_email" />
                        <span class="input-group-btn">
                           <button class="btn btn-flat bg-green add_field" id="_email" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                     </div>
                     <div class="help-block with-errors"></div>
                  </div>
               </div>
               <div class="col-md-6" id="additional_contato">
                  <div class="form-group has-feedback div_contato">
                     <label for="Email">Contato</label>
                     <div class="input-group">
                        <div class="input-group-btn">
                           <button type="button" class="btn btn-flat bg-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="dropdown_text">Telefone </span><span class="fa fa-caret-down"></span></button>
                           <ul class="dropdown-menu">
                              <li><a href="javascript:;">Telefone </a></li>
                              <li><a href="javascript:;">Telemóvel </a></li>
                              <li><a href="javascript:;">Fax </a></li>
                              <li><a href="javascript:;">Outro </a></li>
                           </ul>
                        </div>
                        <input type="hidden" class="form-control contato_tipo" value="Telefone" name="contatos[0][type]">
                        <input type="text" class="form-control contato_numero" name="contatos[0][value]" aria-label="...">
                        <span class="input-group-btn">
                           <button class="btn btn-flat bg-green add_field" id="_contato" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <small>* Campos de Preenchimento Obrigatório</small>
            <input class="btn bg-green btn-flat pull-right" type="submit" value="Registar" />
         </div>
      </form>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/tecnicos/novo_tecnico.js") }}"></script>
@endsection

