@extends('consultores.consultores')
@section('consultores-content')
<div class="col-md-8 col-lg-7">
    <div class="box box-success" >
        <div class="box-header with-border">
            <h3 class="box-title">Detalhes</h3>
        </div>
        <form method="POST" action="{{ URL('consultores/update/'.$consultor->id) }}" accept-charset="UTF-8" id="consultor-form" data-toggle="validator">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group has-feedback col-md-7">
                        <label for="nome">Nome</label>
                        <input class="form-control" name="nome" type="text" id="nome"  value="{{ $consultor->nome }}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-5">
                        <label for="hab_literarias">Hab.Literárias</label>
                        <input class="form-control" name="hab_literarias" type="text" id="hab_literarias" style="width:100%;" value="{{ $consultor->hab_literarias }}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="form-group has-feedback col-md-6">
                        <label for="cc">CC</label>
                        <input class="form-control" name="cc" pattern="\d{8}\s?(\d{1}\s?\w{2}\s?\d{1})?\b" type="text" id="cc" value="{{ $consultor->cc }}" data-error="Formato: 12345678 | 1234567895AA7" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label for="cc_validade">CC Validade</label>
                        <input class="form-control" name="cc_validade" type="text" id="cc_validade" value="{{ $consultor->cc_validade }}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-md-6">
                        <label for="nif">NIF</label>
                        <input class="form-control" name="nif" type="text" pattern="[0-9\s]{9,12}" id="nif" value="{{ $consultor->nif }}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label for="nib">IBAN</label>
                        <input class="form-control" name="nib" type="text" pattern="[0-9\s\-\.]{21,40}" value="{{ $consultor->nib }}" id="nib" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="morada">Morada</label>
                    <input class="form-control" name="morada" type="text" id="morada" value="{{ $consultor->morada }}" required="required"/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-xs-6 col-sm-8 col-md-3">
                        <label for="cp4">C&oacute;digo Postal</label>
                        <input class="form-control" pattern="[0-9]{4}" maxlength="4" value="{{ $consultor->cp4 }}" name="cp4" type="text" id="cp4" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-xs-6 col-sm-4 col-md-3">
                        <label class="invisible" for="cp3">&nbsp;</label>
                        <input class="form-control" pattern="[0-9]{3}" maxlength="3" name="cp3" value="{{ $consultor->cp3 }}" type="text" id="cp3" required="required"/>
                    </div>
                    <div class="form-group has-feedback col-xs-12 col-sm-12 col-md-6">
                        <label for="localidade">Localidade</label>
                        <input class="form-control" name="localidade" type="text" id="localidade" value="{{ $consultor->localidade }}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group has-feedback col-md-5">
                        <label for="Nome">Regime de Iva</label>
                        <div class="radio">
                            <label>
                                <input {{ $consultor->regime_iva == 1 ? 'checked' : '' }} type="radio" name="regime_iva" id="regime_iva" value="1" >
                                Sim
                            </label>
                            <label>
                                <input {{ $consultor->regime_iva == 0 ? 'checked' : '' }} type="radio" name="regime_iva" id="regime_iva" value="0">
                                Não
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-7">
                        <label for="retencao_fonte">Retenção na Fonte</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="retencao_na_fonte" id="retencao_na_fonte" value="25" {{ $consultor->retencao_na_fonte == 25 ? 'checked' : '' }} >
                                25%
                            </label>
                            <label>
                                <input type="radio" name="retencao_na_fonte" id="retencao_na_fonte" value="20" {{ $consultor->retencao_na_fonte == 20 ? 'checked' : '' }}>
                                20%
                            </label>
                            <label>
                                <input type="radio" name="retencao_na_fonte" id="retencao_na_fonte" value="16.5" {{ $consultor->retencao_na_fonte == 16.5 ? 'checked' : '' }}>
                                16.5%
                            </label>
                            <label>
                                <input type="radio" name="retencao_na_fonte" id="retencao_na_fonte" value="11.5" {{ $consultor->retencao_na_fonte == 11.5 ? 'checked' : '' }}>
                                11.5%
                            </label>
                             <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="0" {{ $consultor->retencao_na_fonte == 0 ? 'checked' : '' }}>
                                Sem Retenção
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6" id="additional_email">
                        <div class="form-group has-feedback div_email">
                            <label for="Email">Email</label>
                            <div class="input-group">
                                <input type="hidden" class="form-control" value="Email" name="consultor_email[0][type]">
                                <input class="form-control" name="consultor_email[0][value]" type="text" id="consultor_email" />
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="_email" type="button"><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                            <div class="help-block with-errors"></div>
                        </div>
                        @foreach ($consultor->contatos()->where('type', '=', 'Email')->get() as $email)
                        <div class="form-group has-feedback div_email">
                            <div class="input-group">
                                <input type="hidden" class="form-control email_tipo" value="Email" name="consultor_email[{{ $email->id }}][type]">
                                <input class="form-control" name="consultor_email[{{ $email->id }}][value]" type="text" id="consultor_email" value="{{ $email->value }}" required="required" />
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
                                <input type="text" pattern="[0-9\s\-\3]{9,20}" class="form-control contato_numero" name="contatos[0][value]" aria-label="...">
                                <span class="input-group-btn">
                                    <button class="btn btn-flat bg-green add_field" id="_contato" type="button"><i class="fa fa-plus"></i></button>
                                </span>
                            </div>
                        </div>
                        @foreach ($consultor->contatos()->where('type', '!=', 'Email')->get() as $contato)
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
                                <input type="text" class="form-control contato_numero" name="contatos[{{ $contato->id }}][value]" value="{{ $contato->value }}" pattern="[0-9\s\-\3]{9,20}" aria-label="..." required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-flat btn-danger remove_field" id="_contato" type="button"><i class="fa fa-minus"></i></button>
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <small>* Campos Obrigatórios</small>
                <input class="btn bg-green btn-flat pull-right" type="submit" value="Guardar" />
            </div>
        </form> 
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/consultores/detalhes_consultor.js") }}"></script>
@endsection