
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {{ method_field($methodfield) }}
    <div class="row">
        <div class="col-md-5 col-xs-12">
            <br />
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ isset($funcionarios)? $funcionarios->nome: old('nome') }}" required>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <input type="text" name="meio" class="form-control" placeholder="Meio" value="{{ isset($funcionarios)? $funcionarios->meio: old('meio') }}">
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome" value="{{ isset($funcionarios)? $funcionarios->sobrenome: old('sobrenome') }}" required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CPF</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="cpf" id="cpf" class="form-control" placeholder="999,999,999-99" value="{{ isset($funcionarios)? $funcionarios->cpf: old('cpf') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="text" name="email" class="form-control" placeholder="nome@email.com.br" value="{{ isset($funcionarios)? $funcionarios->email: old('email') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contato</label>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input type="text"  id="telefone"  name="telefone" class="form-control telefone" placeholder="(99) 99999-9999" value="{{ isset($funcionarios)? $funcionarios->telefone: old('telefone') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Contato Parente</label>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input type="text" name="contato" class="form-control" placeholder="Nome" value="{{ isset($funcionarios)? $funcionarios->contato: old('contato') }}">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input type="text"  id="telefone2"  name="tel_contato" class="form-control telefone" placeholder="(99) 99999-9999" value="{{ isset($funcionarios)? $funcionarios->tel_contato: old('tel_contato') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Endereco</label>
                <div class="col-md-5 col-sm-5 col-xs-5">
                    <input type="text" class="form-control" name="rua" placeholder="Rua" value="{{ isset($funcionarios)? $funcionarios->rua: old('rua') }}" required>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <input type="text" class="form-control" name="num" placeholder="Nº" value="{{ isset($funcionarios)? $funcionarios->num: old('num') }}" required>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <input style="border-radius: 4px;" type="text" class="form-control" name="comp" placeholder="Comp" value="{{ isset($funcionarios)? $funcionarios->comp: old('comp') }}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                <div class="col-md-3 col-sm-3 col-xs-4">
                    <input type="text" id="cep" name="cep" class="form-control" placeholder="99999-999" value="{{ isset($funcionarios)? $funcionarios->cep: old('cep') }}" required >
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <select class="select2_single form-control" name="estado" tabindex="-1" required>
                        <option disabled selected>Estado</option>
                        <option {{ (old('estado') == 'AC' OR (isset($funcionarios) AND ($funcionarios->estado == 'AC') )) ? 'selected' : '' }} value="AC">Acre</option>
                        <option {{ (old('estado') == 'AL' OR (isset($funcionarios) AND ($funcionarios->estado == 'AL') )) ? 'selected' : '' }} value="AL">Alagoas</option>
                        <option {{ (old('estado') == 'AP' OR (isset($funcionarios) AND ($funcionarios->estado == 'AP') )) ? 'selected' : '' }} value="AP">Amapá</option>
                        <option {{ (old('estado') == 'AM' OR (isset($funcionarios) AND ($funcionarios->estado == 'AM') )) ? 'selected' : '' }} value="AM">Amazonas</option>
                        <option {{ (old('estado') == 'BA' OR (isset($funcionarios) AND ($funcionarios->estado == 'BA') )) ? 'selected' : '' }} value="BA">Bahia</option>
                        <option {{ (old('estado') == 'CE' OR (isset($funcionarios) AND ($funcionarios->estado == 'CE') )) ? 'selected' : '' }} value="CE">Ceará</option>
                        <option {{ (old('estado') == 'DF' OR (isset($funcionarios) AND ($funcionarios->estado == 'DF') )) ? 'selected' : '' }} value="DF">Distrito Federal</option>
                        <option {{ (old('estado') == 'ES' OR (isset($funcionarios) AND ($funcionarios->estado == 'ES') )) ? 'selected' : '' }} value="ES">Espirito Santo</option>
                        <option {{ (old('estado') == 'GO' OR (isset($funcionarios) AND ($funcionarios->estado == 'GO') )) ? 'selected' : '' }} value="GO">Goiás</option>
                        <option {{ (old('estado') == 'MA' OR (isset($funcionarios) AND ($funcionarios->estado == 'MA') )) ? 'selected' : '' }} value="MA">Maranhão</option>
                        <option {{ (old('estado') == 'MS' OR (isset($funcionarios) AND ($funcionarios->estado == 'MS') )) ? 'selected' : '' }} value="MS">Mato Grosso do Sul</option>
                        <option {{ (old('estado') == 'MT' OR (isset($funcionarios) AND ($funcionarios->estado == 'MT') )) ? 'selected' : '' }} value="MT">Mato Grosso</option>
                        <option {{ (old('estado') == 'MG' OR (isset($funcionarios) AND ($funcionarios->estado == 'MG') )) ? 'selected' : '' }} value="MG">Minas Gerais</option>
                        <option {{ (old('estado') == 'PA' OR (isset($funcionarios) AND ($funcionarios->estado == 'PA') )) ? 'selected' : '' }} value="PA">Pará</option>
                        <option {{ (old('estado') == 'PB' OR (isset($funcionarios) AND ($funcionarios->estado == 'PB') )) ? 'selected' : '' }} value="PB">Paraíba</option>
                        <option {{ (old('estado') == 'PR' OR (isset($funcionarios) AND ($funcionarios->estado == 'PR') )) ? 'selected' : '' }} value="PR">Paraná</option>
                        <option {{ (old('estado') == 'PE' OR (isset($funcionarios) AND ($funcionarios->estado == 'PE') )) ? 'selected' : '' }} value="PE">Pernambuco</option>
                        <option {{ (old('estado') == 'PI' OR (isset($funcionarios) AND ($funcionarios->estado == 'PI') )) ? 'selected' : '' }} value="PI">Piauí</option>
                        <option {{ (old('estado') == 'RJ' OR (isset($funcionarios) AND ($funcionarios->estado == 'RJ') )) ? 'selected' : '' }} value="RJ">Rio de Janeiro</option>
                        <option {{ (old('estado') == 'RN' OR (isset($funcionarios) AND ($funcionarios->estado == 'RN') )) ? 'selected' : '' }} value="RN">Rio Grande do Norte</option>
                        <option {{ (old('estado') == 'RS' OR (isset($funcionarios) AND ($funcionarios->estado == 'RS') )) ? 'selected' : '' }} value="RS">Rio Grande do Sul</option>
                        <option {{ (old('estado') == 'RO' OR (isset($funcionarios) AND ($funcionarios->estado == 'RO') )) ? 'selected' : '' }} value="RO">Rondônia</option>
                        <option {{ (old('estado') == 'RR' OR (isset($funcionarios) AND ($funcionarios->estado == 'RR') )) ? 'selected' : '' }} value="RR">Roraima</option>
                        <option {{ (old('estado') == 'SC' OR (isset($funcionarios) AND ($funcionarios->estado == 'SC') )) ? 'selected' : '' }} value="SC">Santa Catarina</option>
                        <option {{ (old('estado') == 'SP' OR (isset($funcionarios) AND ($funcionarios->estado == 'SP') )) ? 'selected' : '' }} value="SP">São Paulo</option>
                        <option {{ (old('estado') == 'SE' OR (isset($funcionarios) AND ($funcionarios->estado == 'SE') )) ? 'selected' : '' }} value="SE">Sergipe</option>
                        <option {{ (old('estado') == 'TO' OR (isset($funcionarios) AND ($funcionarios->estado == 'TO') )) ? 'selected' : '' }} value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-4">
                    <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="{{ isset($funcionarios)? $funcionarios->cidade: old('cidade') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">
                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left datapicker" id="nascimento" name="nascimento" aria-describedby="inputSuccess2Status4" value="{{ isset($funcionarios)? $funcionarios->nascimento->format('d-m-Y'): old('nascimento') }}" required>
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Sexo
                    <br>
                    <small class="text-navy"></small>
                </label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="radio">
                        <label>
                            <input type="radio" class="flat" value="M" {{ (old('sexo') == 'F' OR (isset($funcionarios) AND ($funcionarios->sexo == 'M') )) ? 'checked' : '' }}  name="sexo"> Masculino
                        </label>
                        <label>
                            <input type="radio" class="flat" value="F" {{ (old('sexo') == 'F' OR (isset($funcionarios) AND ($funcionarios->sexo == 'F') )) ? 'checked' : '' }} name="sexo"> Feminino
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-5 col-xs-12">
            <br />

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Carteira</label>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <input type="text" class="form-control" name="ctps" placeholder="CTPS" value="{{ isset($funcionarios)? $funcionarios->ctps: old('ctps') }}" required>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <input type="text" class="form-control" name="serie" placeholder="SERIE" value="{{ isset($funcionarios)? $funcionarios->serie: old('serie') }}" required>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                    <input type="text" class="form-control" name="tipo" placeholder="TIPO" value="{{ isset($funcionarios)? $funcionarios->tipo: old('tipo') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Função</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <select class="select2_single form-control" placeholder="Cargo" name="cargo" tabindex="-1" value="{{ isset($funcionarios)? $funcionarios->funcao: old('funcao') }}" required>
                        <option disabled selected>Cargo</option>
                        <option {{ (old('cargo') == 1 OR (isset($funcionarios) AND ($funcionarios->cargo == 1) )) ? 'selected' : '' }} value="1">Garçom</option>
                        <option {{ (old('cargo') == 2 OR (isset($funcionarios) AND ($funcionarios->cargo == 2) )) ? 'selected' : '' }} value="2">Chefe de Cozinha</option>
                        <option {{ (old('cargo') == 3 OR (isset($funcionarios) AND ($funcionarios->cargo == 3) )) ? 'selected' : '' }} value="3">Sub-Chefe de Cozinha</option>
                        <option {{ (old('cargo') == 4 OR (isset($funcionarios) AND ($funcionarios->cargo == 4) )) ? 'selected' : '' }} value="4">Chefe de Salão</option>
                    </select>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="salario" name="salario" placeholder="Salário 9.999,99" value="{{ isset($funcionarios)? $funcionarios->salario: old('salario') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">PIS</label>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <input type="text" id="pis" name="pis" class="form-control" placeholder="999.9999.999-9" value="{{ isset($funcionarios)? $funcionarios->pis: old('pis') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Mesa Funcionário</label>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <input type="text"  id="mesa"  name="mesa" class="form-control" placeholder="105XX" value="{{ isset($funcionarios)? $funcionarios->mesa: old('mesa') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Admissão
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <fieldset>
                        <div class="control-group">
                            <div class="controls">
                                <div class="col-md-5 xdisplay_inputx form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left datapicker" id="admissao" name="admissao" aria-describedby="inputSuccess2Status4" value="{{ isset($funcionarios)? $funcionarios->admissao->format('d-m-Y'): old('admissao') }}" required>
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-4">
                    <button type="submit" class="btn btn-success">{{ $buttonlabel }}</button>
                    <a href="/funcionarios" class="btn btn-default" role="button">Cancelar</a>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
            <!-- FastClick -->
    <script src="{{ asset("vendors/fastclick/lib/fastclick.js") }}"></script>
    <!-- NProgress -->
    <script src="{{ asset("vendors/nprogress/nprogress.js") }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset("vendors/bootstrap-progressbar/bootstrap-progressbar.min.js") }}"></script>
    <!-- iCheck -->
    <script src="{{ asset("vendors/iCheck/icheck.min.js") }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset("js/moment/moment.min.js") }}"></script>
    <script src="{{ asset("js/datepicker/daterangepicker.js") }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset("vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js") }}"></script>
    <script src="{{ asset("vendors/jquery.hotkeys/jquery.hotkeys.js") }}"></script>
    <script src="{{ asset("vendors/google-code-prettify/src/prettify.js") }}"></script>
    <!-- Switchery -->
    <script src="{{ asset("vendors/switchery/dist/switchery.min.js") }}"></script>
    <!-- Select2 -->
    <script src="{{ asset("vendors/select2/dist/js/select2.full.min.js") }}"></script>
    <!-- Parsley -->
    <script src="{{ asset("vendors/parsleyjs/dist/parsley.min.js") }}"></script>
    <!-- jQuery Knob -->
    <script src="{{ asset("vendors/jquery-knob/dist/jquery.knob.min.js") }}"></script>
    <!-- starrr -->
    <script src="{{ asset("vendors/starrr/dist/starrr.js") }}"></script>


    <script>
        $(document).ready(function() {

            $('.datapicker').daterangepicker(datapicker_option, function(start, end, label) {
                console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
            });

        });
    </script>

    <!-- bootstrap-wysiwyg -->
    <script>
        $(document).ready(function() {
            function initToolbarBootstrapBindings() {
                var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'
                        ],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                $.each(fonts, function(idx, fontName) {
                    fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                });
                $('a[title]').tooltip({
                    container: 'body'
                });
                $('.dropdown-menu input').click(function() {
                            return false;
                        })
                        .change(function() {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function() {
                            this.value = '';
                            $(this).change();
                        });

                $('[data-role=magic-overlay]').each(function() {
                    var overlay = $(this),
                            target = $(overlay.data('target'));
                    overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                });

                if ("onwebkitspeechchange" in document.createElement("input")) {
                    var editorOffset = $('#editor').offset();

                    $('.voiceBtn').css('position', 'absolute').offset({
                        top: editorOffset.top,
                        left: editorOffset.left + $('#editor').innerWidth() - 35
                    });
                } else {
                    $('.voiceBtn').hide();
                }
            }

            function showErrorAlert(reason, detail) {
                var msg = '';
                if (reason === 'unsupported-file-type') {
                    msg = "Unsupported format " + detail;
                } else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
            }

            initToolbarBootstrapBindings();

            $('#editor').wysiwyg({
                fileUploadError: showErrorAlert
            });

            window.prettyPrint;
            prettyPrint();
        });
    </script>
    <!-- /bootstrap-wysiwyg -->

    <!-- Select2 -->
    <script>
        $(document).ready(function() {
            $(".select2_single").select2({            allowClear: true
            });
        });
    </script>
    <!-- /Select2 -->

    <!-- Parsley -->
    <script>
        $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
                validateFront();
            });
            $('#demo-form .btn').on('click', function() {
                $('#demo-form').parsley().validate();
                validateFront();
            });
            var validateFront = function() {
                if (true === $('#demo-form').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });

        $(document).ready(function() {
            $.listen('parsley:field:validate', function() {
                validateFront();
            });
            $('#demo-form2 .btn').on('click', function() {
                $('#demo-form2').parsley().validate();
                validateFront();
            });
            var validateFront = function() {
                if (true === $('#demo-form2').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });
        try {
            hljs.initHighlightingOnLoad();
        } catch (err) {}
    </script>
    <!-- /Parsley -->

    <!-- Starrr -->
    <script>
        $(document).ready(function() {
            $(".stars").starrr();

            $('.stars-existing').starrr({
                rating: 4
            });

            $('.stars').on('starrr:change', function (e, value) {
                $('.stars-count').html(value);
            });

            $('.stars-existing').on('starrr:change', function (e, value) {
                $('.stars-count-existing').html(value);
            });
        });
    </script>

    <!-- jquery.inputmask -->
    <script>
        $(document).ready(function() {
            //$(".telefone").inputmask({ mask: ["(99) 99999-9999", "(99) 9999-9999", ], keepStatic: true });
            var maskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    options = {onKeyPress: function(val, e, field, options) {
                        field.mask(maskBehavior.apply({}, arguments), options);
                    }
                    };

            $('#telefone').mask(maskBehavior, options);
            $('#telefone2').mask(maskBehavior, options);
            $('#cpf').mask("999.999.999-99");
            $('#cep').mask("99999-999");
            $('#salario').mask("9.999,99");
            $('#pis').mask("999.9999.999-9");
        });
    </script>
    <!-- /jquery.inputmask -->

    <!-- /Starrr -->
    @endpush