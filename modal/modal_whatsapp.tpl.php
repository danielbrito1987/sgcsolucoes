<!--MODAL DO LIGAMOS PARA VOCÊ-->
<div class="modal modal_contato fade modal-vcenter" id="whats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modalZap" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Whatsapp</h4>
            </div>
            

            <div class="modal-body">	             
	            <center>  
                    <p id="mensagem_whats"></p>
                    <h3 class="vermelho" style="margin-top:12px;">(27) 99764-7904</h3>
                    <p>Após adicionar, clique no botão "ir para WhatsApp”</p>

                    <br clear="all">
                    <p>
                    <a id="link-modal-whatsapp" class="btn btn-danger" target="blank" href="intent://send/5527997647904#Intent;scheme=smsto;package=com.whatsapp;action=android.intent.action.SENDTO;end">Ir para o whatsapp</a>
                    </p>

                    <script>
                    $(function(){
                        if($(window).innerWidth() > 992){
                            $('#link-modal-whatsapp').attr('href','http://web.whatsapp.com/');
                        }
                    });
                    </script>
	            </center> 
            </div>

            
            <div class="modal-footer"></div>
        </div>
    </div>
</div>