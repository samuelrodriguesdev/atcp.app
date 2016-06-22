@extends('tecnicos.tecnicos')
@section('content2')
<div class="col-md-8 col-lg-7">
   <div class="box box-success" >
      <div class="box-header with-border">
         <h3 class="box-title">Nova Instituição</h3>
      </div>
      <form method="POST" action="{{ URL('organismos_entidades/create') }}" accept-charset="UTF-8" id="organismo_entidade_form">
         {{ csrf_field() }}
         <div class="box-body">
            <div class="row">
               <div class="form-group  has-feedback col-md-8">
                  <label for="nome">Instituição</label>
                  <input type="text" name="nome" id="nome" class="form-control" required="required">
                  <div class="help-block with-errors"></div>
               </div>
               <div class="form-group has-feedback col-md-4">
                  <label for="distrito_id">Distrito</label>
                  <select class="form-control" id="distrito_id" name="distrito_id" required="required" style="width:100%;">
                  </select>
                  <div class="help-block with-errors"></div>
               </div>
            </div>
            <div class="form-group has-feedback">
               <label for="morada">Morada</label>
               <input class="form-control" name="morada" type="text" id="morada" required="required" />
               <div class="help-block with-errors"></div>
            </div>
            <div class="row">
               <div class="form-group has-feedback col-xs-8 col-sm-8 col-md-3">
                  <label for="cp4">C&oacute;digo Postal</label>
                  <input class="form-control" pattern="[0-9]{4}" maxlength="4" name="cp4" type="text" id="cp4" required="required" />
                  <div class="help-block with-errors"></div>
               </div>
               <div class="form-group has-feedback col-xs-4 col-sm-4 col-md-3">
                  <label class="invisible" for="cp3">&nbsp;</label>
                  <input class="form-control" pattern="[0-9]{3}" maxlength="3" name="cp3" type="text" id="cp3" required="required" />
               </div>
               <div class="form-group has-feedback col-xs-12 col-sm-12 col-md-6">
                  <label for="localidade">Localidade</label>
                  <input class="form-control" name="localidade" type="text" id="localidade" required="required" />
                  <div class="help-block with-errors"></div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6" id="additional_email">
                  <div class="form-group has-feedback div_email">
                     <label for="Email">Email</label>
                     <div class="input-group">
                        <input type="hidden" class="form-control email_tipo" value="Email" name="organismo_email[0][type]">
                        <input class="form-control" name="organismo_email[0][value]" type="text" id="organismo_email" required="required" />
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
                        <input type="text" class="form-control contato_numero" name="contatos[0][value]" aria-label="..." required="required">
                        <span class="input-group-btn">
                           <button class="btn btn-flat bg-green add_field" id="_contato" type="button"><i class="fa fa-plus"></i></button>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="box-footer">
            <small>* Campos Obrigatórios</small>
            <input class="btn bg-green btn-flat pull-right" type="submit" id="submit_btn" value="Registar" />
         </div>
      </form>
   </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/organismos_entidades/novo_organismo_entidade.js") }}"></script>
@endsection
