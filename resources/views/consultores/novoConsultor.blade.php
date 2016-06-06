@extends('consultores.consultores')
@section('consultores-content')
<div class="col-md-8 col-lg-7">
    <div class="box box-success" >
        <div class="box-header with-border">
            <h3 class="box-title">Novo Consultor</h3>
        </div>
        <form method="POST" action="{{ URL('consultores/store') }}" accept-charset="UTF-8" id="consultor-form">
            <div class="box-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group has-feedback col-md-7">
                        <label for="nome">Nome</label>
                        <input class="form-control" name="nome" type="text" id="nome"  required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-5">
                        <label for="hab_literarias">Hab.Literárias</label>
                        <select class="form-control" id="hab_literarias" name="hab_literarias" required="required" style="width:100%;" required="required">
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="form-group has-feedback col-md-6">
                        <label for="cc">CC</label>
                        <input class="form-control" name="cc" type="text" pattern="\d{8}\s?(\d{1}\s?\w{2}\s?\d{1})?\b" id="cc" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label for="cc_validade">CC Validade</label>
                        <input class="form-control" name="cc_validade" type="text" id="cc_validade" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-md-6">
                        <label for="nif">NIF</label>
                        <input class="form-control" name="nif" type="text" id="nif" pattern="[0-9\s]{9,12}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-6">
                        <label for="nib">IBAN</label>
                        <input class="form-control" name="nib" type="text" id="nib" pattern="[0-9\s\-\.]{21,40}" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="morada">Morada</label>
                    <input class="form-control" name="morada" type="text" id="morada" required="required"/>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group has-feedback col-xs-8 col-sm-8 col-md-3">
                        <label for="cp4">C&oacute;digo Postal</label>
                        <input class="form-control" pattern="[0-9]{4}" maxlength="4" name="cp4" type="text" id="cp4" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-xs-4 col-sm-4 col-md-3">
                        <label class="invisible" for="cp3">&nbsp;</label>
                        <input class="form-control" pattern="[0-9]{3}" maxlength="3" name="cp3" type="text" id="cp3" required="required"/>
                    </div>
                    <div class="form-group has-feedback col-xs-12 col-sm-12 col-md-6">
                        <label for="localidade">Localidade</label>
                        <input class="form-control" name="localidade" type="text" id="localidade" required="required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group has-feedback col-md-5">
                        <label for="Nome">Regime de Iva</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="regime_iva" id="regime_iva" value="1" checked="checked">
                                Sim
                            </label>
                            <label>
                                <input type="radio" name="regime_iva" id="regime_iva" value="0">
                                Não
                            </label>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback col-md-7">
                        <label for="retencao_fonte">Retenção na Fonte</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="25" checked="checked">
                                25%
                            </label>
                            <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="20">
                                20%
                            </label>
                            <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="10">
                                16.5%
                            </label>
                            <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="11.5">
                                11.5%
                            </label>
                             <label>
                                <input type="radio" name="retencao_fonte" id="retencao_fonte" value="0">
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
                                <input type="text" class="form-control contato_numero" pattern="[0-9\s\-\3]{9,20}" name="contatos[0][value]" aria-label="...">
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
                <input class="btn bg-green btn-flat pull-right" type="submit" value="Registar" />
            </div>
        </form> 
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset("js/consultores/novo_consultor.js") }}"></script>
@endsection