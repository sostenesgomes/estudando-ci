<?php $this->load->view('template/header'); ?>
<style>
    .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
    }
    .example-modal .modal {
        background: transparent!important;
    }
</style>

<div class="example-modal">
    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title"><?php echo $title ?></h4>
                </div>
                <div class="modal-body">
                    <p>Confirma cancelamento do usuário de ID: <?php echo $id?>?</p>
                </div>
                <div class="modal-footer">
                    <a href="/user"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button></a>
                    <a href="/user/delete/<?php echo $id; ?>/true"><button type="button" class="btn btn-primary">Confirmar</button></a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

<?php $this->load->view('template/footer'); ?>