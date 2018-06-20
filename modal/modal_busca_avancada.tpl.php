    <!-- CONTEUDOS POPUP/EXTERNOS -->
<div class="modal fade modal-vcenter" id="buscaAvancada" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999 !important;">
    <div class="modal-dialog" role="document">
        <div class="modal-content bgModal_buscaAvancada">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                
                <h4 class="modal-title" id="myModalLabel">
                    Busca Avançada 
                </h4>
            </div>
            
            <form action="<?=$data['path']?>/venda/" method="post" id="form-busca-avancada" data-pagina="venda">
                <input type="hidden" name="data_pagina" class="data_pagina" value="venda">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 text-center tabs_body">
                            <div class="btn-group tab_buttons" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="tipo_busca" id="venda" autocomplete="off" value="venda" checked> Comprar
                                </label>

                                <label class="btn btn-primary">
                                    <input type="radio" name="tipo_busca" id="aluguel" autocomplete="off" value="aluguel" checked> Alugar
                                </label>
                                
                                <label class="btn btn-primary tab_lancamentos">
                                    <input type="radio" name="tipo_busca" id="lancamentos" autocomplete="off" value="lancamentos"> Lançamentos
                                </label>
                            </div>
                        </div>
                        
                        <div class="tab_busca tab_venda tab_aluguel">
                            <div class="col-xs-12 referencia">
                                <input type="text" name="palavra_chave" id="palavra-chave" class="form-control avancada input-padrao" placeholder="Referência ou palavra chave" style="width:100% !important;" /> 
                            </div>

                            <div class="envolve-select-busca-avancada">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="tipo" id="busca_avancada_tipo_imovel" class="wide niceSelect busca_avancada_tipo_imovel form-control input-padrao">
                                            <option value="">Tipo de imóvel</option>
                                            <?=$data['option_tipo_imovel']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="cidade" id="busca_avancada_cidade" class="wide niceSelect busca_avancada_cidade form-control input-padrao" onChange="return atualizar_bairros($('#form-busca-avancada').attr('data-pagina'),$('#busca_avancada_cidade').val());">
                                            <option value="">Cidade</option>
                                            <?=$data['option_cidades']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="bairro" id="busca_avancada_bairro" class="wide niceSelect busca_avancada_bairro form-control input-padrao">
                                            <option value="">Bairro</option>
                                            <?=$data['option_bairros']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="qtos" id="busca_avancada_qtos" class="wide niceSelect busca_avancada_qtos form-control input-padrao">
                                            <option value="">Quartos</option>
                                            <?=$data['option_quartos']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="vagas" id="busca_avancada_vagas" class="wide niceSelect busca_avancada_vagas form-control input-padrao">
                                            <option value="">Vagas</option>
                                            <?=$data['option_garagem']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="valor" id="busca_avancada_valor" class="wide niceSelect busca_avancada_valor form-control input-padrao">
                                            <option value="">Valor</option>
                                            <?=$data['option_valores']?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="tab_busca tab_lancamentos" style="display: none;">
                            <div class="col-xs-12 referencia">
                                <input type="text" name="palavra_chave_lancamento" id="palavra-chave" class="form-control avancada input-padrao" placeholder="Referência ou palavra chave" style="width:100% !important;" /> 
                            </div>

                            <div class="envolve-select-busca-avancada">

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="cidade_lancamento" id="busca_avancada_cidade_lancamento" class="wide niceSelect busca_avancada_cidade form-control input-padrao" onChange="return atualizar_bairros($('#form-busca-avancada').attr('data-pagina'),$('#busca_avancada_cidade_lancamento').val());">
                                            <option value="">Cidade</option>
                                            <?=$data['option_cidades_lancamentos']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="bairro_lancamento" id="busca_avancada_bairro_lancamento" class="wide niceSelect busca_avancada_bairro form-control input-padrao">
                                            <option value="">Bairro</option>
                                            <?=$data['option_bairros_lancamentos']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="qtos_lancamento" id="busca_avancada_qtos_lancamento" class="wide niceSelect busca_avancada_qtos form-control input-padrao">
                                            <option value="">Quartos</option>
                                            <?=$data['option_quartos']?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 envolve-input-busca-avancada">
                                    <div class="select-style">
                                        <select name="construtora_lancamento" id="busca_avancada_construtora_lancamento" class="wide niceSelect busca_avancada_construtora form-control input-padrao">
                                            <option value="">Construtoras</option>
                                            <?=$data['option_construtoras']?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <center>
                            <button type="submit" id="btn-busca-avancada" class="btn btn-primary text-center <?=($data['secao'] == 'main' ? '' : 'internas')?>">
                                Buscar
                            </button>
                        <center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>