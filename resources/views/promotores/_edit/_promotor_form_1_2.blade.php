<div class="row">
    <div class="form-group has-feedback col-md-7">
        <label for="nome">Nome</label>
        <input class="form-control" name="nome" type="text" id="nome" value="{{ $promotor->nome }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-5">
        <label for="hab_literarias">Hab.Literárias</label>
        <select class="form-control" id="hab_literarias" name="hab_literarias" required="required" style="width:100%;" required="required">
        <option value="{{ $promotor->hab_literarias }}">{{ $promotor->hab_literarias }}</option>
        </select>
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="form-group has-feedback col-md-4">
        <label for="cc">CC</label>
        <input class="form-control" name="cc" type="text" id="cc" value="{{ $promotor->cc }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-4">
        <label for="cc_validade">CC Validade</label>
        <input class="form-control date" name="cc_validade" type="text" value="{{ $promotor->cc_validade }}" id="cc_validade" required="required" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-4">
        <label for="data_nascimento">Data de Nascimento</label>
        <input class="form-control date" name="data_nascimento" type="text" value="{{ $promotor->data_nascimento }}" id="data_nascimento" required="required" />
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
    <div class="form-group has-feedback col-md-4">
        <label for="nif">NIF</label>
        <input class="form-control" name="nif" type="text" value="{{ $promotor->nif }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-md-8">
        <label for="nib">IBAN</label>
        <input class="form-control" name="nib" type="text" id="nib" value="{{ $promotor->nib }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="form-group has-feedback">
    <label for="morada">Morada</label>
    <input class="form-control" name="morada" type="text" id="morada" value="{{ $promotor->morada }}" required="required" />
    <div class="help-block with-errors"></div>
</div>
<div class="row">
    <div class="form-group has-feedback col-xs-8 col-sm-8 col-md-3">
        <label for="cp4">C&oacute;digo Postal</label>
        <input class="form-control" pattern="[0-9]{4}" maxlength="4" name="cp4" type="text" id="cp4" value="{{ $promotor->cp4 }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
    <div class="form-group has-feedback col-xs-4 col-sm-4 col-md-3">
        <label class="invisible" for="cp3">&nbsp;</label>
        <input class="form-control" pattern="[0-9]{3}" maxlength="3" name="cp3" type="text" id="cp3" value="{{ $promotor->cp3 }}" required="required" />
    </div>
    <div class="form-group has-feedback col-xs-12 col-sm-12 col-md-6">
        <label for="localidade">Localidade</label>
        <input class="form-control" name="localidade" type="text" id="localidade" value="{{ $promotor->localidade }}" required="required" />
        <div class="help-block with-errors"></div>
    </div>
</div>
<div class="row">
   <div class="col-md-6" id="additional_email">
      <div class="form-group has-feedback div_email">
         <label for="Email">Email</label>
         <div class="input-group">
            <input type="hidden" class="form-control email_tipo" value="Email" name="promotor_email[0][type]"/>
            <input class="form-control" name="promotor_email[0][value]" type="text" id="promotor_email" />
            <span class="input-group-btn">
               <button class="btn btn-flat bg-green add_field" id="_email" type="button"><i class="fa fa-plus"></i></button>
            </span>
         </div>
         <div class="help-block with-errors"></div>
      </div>
      @foreach ($promotor->contatos()->where('type', '=', 'Email')->get() as $email)
      <div class="form-group has-feedback div_email">
         <div class="input-group">
            <input type="hidden" class="form-control email_tipo" value="Email" name="promotor_email[{{ $email->id }}][type]">
            <input class="form-control" name="promotor_email[{{ $email->id }}][value]" type="text" id="promotor_email" value="{{ $email->value }}" required="required" />
            <span class="input-group-btn">
               <button class="btn btn-flat btn-danger remove_field" id="_email" type="button"><i class="fa fa-minus"></i></button>
            </span>
         </div>
         <div class="help-block with-errors"></div>
      </div>
   @endforeach
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
            <input type="text" class="form-control contato_numero" name="contatos[0][value]" aria-label="..." >
            <span class="input-group-btn">
               <button class="btn btn-flat bg-green add_field" id="_contato" type="button"><i class="fa fa-plus"></i></button>
            </span>
         </div>
      </div>
      @foreach ($promotor->contatos()->where('type', '!=', 'Email')->get() as $contato)
         <div class="form-group has-feedback div_contato">
            <div class="input-group">
               <div class="input-group-btn">
                  <button type="button" class="btn btn-flat bg-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="dropdown_text">{{ $contato->type }} </span><span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                     <li><a href="javascript:;">Telefone </a></li>
                     <li><a href="javascript:;">Telemóvel </a></li>
                     <li><a href="javascript:;">Fax </a></li>
                     <li><a href="javascript:;">Outro </a></li>
                  </ul>
               </div>
               <input type="hidden" class="form-control contato_tipo" value="{{ $contato->type }}" name="contatos[{{ $contato->id }}][type]">
               <input type="text" class="form-control contato_numero" name="contatos[{{ $contato->id }}][value]" value="{{ $contato->value }}" aria-label="..." required="required">
               <span class="input-group-btn">
                  <button class="btn btn-flat btn-danger remove_field" id="_contato" type="button"><i class="fa fa-minus"></i></button>
               </span>
            </div>
         </div>
          @endforeach
   </div>
</div>