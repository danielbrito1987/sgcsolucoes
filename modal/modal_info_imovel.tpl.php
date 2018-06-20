<!--MODAL LIGAMOS PARA VOCÊ-->
<div class="modal modal_contato fade modal-vcenter" id="myModalContatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog cont_ligamos_paravoce" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
                <h4 class="modal-title titulo-modal" id="myModalLabel">Contatar</h4>
            </div>
            
            <div class="modal-body" style="min-height: 328px;">
                <form class="form-horizontal col-lg-12" method="post" action="<?=$data['path']?>/<?=(!empty($_GET['secao']) ? $_GET['secao']."/" : "")?><?=(!empty($_GET['id']) ? $_GET['id']."/" : "")?><?=(!empty($_GET['titulo']) ? $_GET['titulo']."/" : "")?><?=(!empty($_GET['valor1']) ? $_GET['valor1']."/" : "")?>?acao=contatar">
                    <div class="form-group ">
                        <div class="col-sm-12">
                            <div class="input-group col-sm-12">
                               <span class="input-group-addon bg_azul cl_branco"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                               <input type="text" class="form-control" placeholder="* Nome" id="campo_nome" name="campo_nome" aria-describedby="input_nome_contato" required>
                            </div>

                            <div class="input-group col-sm-12">
                                <span class="input-group-addon bg_azul cl_branco"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
                                <input type="email" class="form-control" placeholder="* Email" id="campo_email" name="campo_email" aria-describedby="input_email_contato" required>
                            </div>

                             <div class="input-group col-sm-6">
                                <span class="input-group-addon bg_azul cl_branco"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></span>
                                <input type="text" class="form-control telefone" placeholder="* Telefone" name="campo_telefone" id="campo_telefone" aria-describedby="input_nome_contato"  required>
                            </div>

                            <div class="input-group col-sm-12">
                                <span class="input-group-addon "><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
                                <textarea class="form-control" placeholder="* Mensagem" id="campo_mensagem" name="campo_mensagem" rows="5" required>Olá, gostaria de mais informações sobre o imóvel Ref: xxx por favor, entre em contato comigo com os dados informados.</textarea>
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