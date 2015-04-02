<?php $this->load->view('template/header'); ?>

<div class="row">
<!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title; ?></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <?php
                $userView = new User_model();
                if(isset($user['id']))
                    $this->useful->populate($userView, $user);
            ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open(current_url(), array('method'=>'post', 'name'=>'frmUserEdit', 'id'=>'frmUserEdit', 'accept-charset'=>'utf-8')) ?>
                <input type="hidden" id="id" name="id" value="<?php echo set_value('id', ($userView->getId() !== NULL) ? $userView->getId() : ''); ?>">
                <div class="box-body">
                    <div class="form-group<?php echo (form_error('fullName') ? ' has-error' : '') ?>">
                        <label for="fullName">Nome Completo</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" size="100" value="<?php echo set_value('fullName', ($userView->getFullName() !== NULL) ? $userView->getFullName() : ''); ?>" placeholder="Nome Completo">
                    </div>
                    <div class="form-group<?php echo (form_error('email') ? ' has-error' : '') ?>">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email', ($userView->getEmail() !== NULL) ? $userView->getEmail() : ''); ?>" placeholder="seu@email.com">
                    </div>
                    <div class="form-group<?php echo (form_error('id_profile') ? ' has-error' : '') ?>">
                        <label>Perfil</label>
                        <select class="form-control" id="id_profile" name="id_profile">
                            <option value="">Selecione um perfil</option>
                            <?php
                            $profiles = $userView->getProfiles();

                            foreach($profiles as $idProfile => $profile):
                            ?>
                            <option value="<?php echo $idProfile?>" <?php if (set_value('id_profile', ($userView->getIdProfile() !== NULL) ? $userView->getIdProfile() : '') == $idProfile) echo 'selected="selected"'; ?>><?php echo $profile?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group<?php echo (form_error('status') ? ' has-error' : '') ?>">
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="status" value="1" <?php if (set_value('status', ($userView->getStatus() !== NULL) ? $userView->getStatus() : '') == '1') echo 'checked="checked"'; ?>>
                                Ativo&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" name="status" id="status" value="2" <?php if (set_value('status', ($userView->getStatus() !== NULL) ? $userView->getStatus() : '') == '2') echo 'checked="checked"'; ?>>
                                Inativo
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div><!-- /.box -->
    </div><!--/.col (left) -->
</div>

<?php $this->load->view('template/footer'); ?>