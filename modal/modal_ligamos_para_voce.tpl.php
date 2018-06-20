<!--MODAL LIGAMOS PARA VOCÊ-->
<div class="modal fade modal-vcenter" id="ModalLigamos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog cont_ligamos_paravoce" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <h4 class="modal-title titulo-modal" id="ModalLabel">Ligamos para você</h4>
            </div>
            
            <div class="modal-body" style="min-height:200px;">
                <form class="form-horizontal col-lg-12" method="post" action="<?=$data['path']?>/<?=(!empty($_GET['secao']) ? $_GET['secao']."/" : "")?><?=(!empty($_GET['id']) ? $_GET['id']."/" : "")?><?=(!empty($_GET['titulo']) ? $_GET['titulo']."/" : "")?>?acao=ligamos_para_voce">
                    <div class="form-group ">
                        <div class="col-sm-12">
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon bg_azul cl_branco">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" class="form-control" placeholder="Nome" id="input_nome" name="input_nome" aria-describedby="input_nome_contato" required/>
                            </div>
                            
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon bg_azul cl_branco">
                                    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" class="form-control telefone tel" placeholder="Telefone" id="input_telefone" name="input_telefone" aria-describedby="input_nome_contato" required />
                            </div>

                            <div class="input-group col-sm-12">
                                <span class="input-group-addon bg_azul cl_branco">
                                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                </span>
                                
                                <input type="text" class="form-control horario" placeholder="Horário" id="input_horario" name="input_horario" aria-describedby="input_nome_contato" required />
                            </div>                          
                            
                            <div class="input-group pull-right">
                                <button class="btn btn-modal-contato" type="submit">ENVIAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer hidden"></div>
        </div>
    </div>
</div>