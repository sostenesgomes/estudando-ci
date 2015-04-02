<?php $this->load->view('template/header'); ?>

<?php
    if($this->session->flashdata('message')){
        $message = $this->session->flashdata('message');
?>
<div class="alert alert-<?php echo $message['type']?> alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4>
        <i class="icon fa <?php echo ($message['type'] == 'danger') ? 'fa-ban' : 'fa-check'?>"></i>
    </h4>
    <?php echo $message['msg']; ?>
</div>
<?php } ?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo $title ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
            <table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 280px;">Nome</th>
                        <th class="sorting" role="columnheader" tabindex="2" aria-controls="example1" rowspan="1" colspan="1" style="width: 343px;" aria-sort="ascending" aria-label="Browser: activate to sort column descending">E-mail</th>
                        <th class="sorting" role="columnheader" tabindex="3" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Perfil</th>
                        <th class="sorting" role="columnheader" tabindex="4" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 150px;">Status</th>
                        <th class="sorting" role="columnheader" tabindex="5" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 170px;">Data de Cadastro</th>
                        <th class="sorting" role="columnheader" tabindex="6" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">Última Atualização</th>
                        <th class="sorting" role="columnheader" tabindex="7" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 130px;">&nbsp;</th>
                    </tr>
                </thead>

                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    <?php foreach ($users as $user):
                        $objUser = new User_model();
                        $this->useful->populate($objUser, $user);?>
                        <tr class="odd">
                            <td class=""><?php echo $objUser->getFullName(); ?></td>
                            <td class=""><?php echo $objUser->getEmail(); ?></td>
                            <td class=""><?php echo $objUser->getProfileTitle()?></td>
                            <td class=""><?php echo $objUser->getStatusTitle()?></td>
                            <td class=""><?php echo $objUser->getDateCreateFormatted(); ?></td>
                            <td class=""><?php echo $objUser->getDateUpdateFormatted(); ?></td>
                            <td class="">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Ações</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?php echo site_url(array('user', 'edit', $user['id']))?>"><i class="fa fa-fw fa-edit"></i>Editar</a></li>
                                        <li><a href="<?php echo site_url(array('user', 'delete', $user['id']))?>"><i class="fa fa-fw fa-trash-o"></i>Excluir</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    <?php
                    unset($objUser);
                    endforeach ?>

                </tbody>
            </table>
            <!--<div class="row">
                <div class="col-xs-6">
                    <div class="dataTables_info" id="example1_info">Mostrando 1 a 10 de 57 registros</div>
                </div>
                <div class="col-xs-6">
                    <div class="dataTables_paginate paging_bootstrap">
                        <ul class="pagination">
                            <li class="prev disabled">
                                <a href="#">← Previous</a>
                            </li>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li class="next">
                                <a href="#">Next → </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>