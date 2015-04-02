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
            <?php $userView = new User_model(); ?>
            <?php echo validation_errors(); ?>
            <?php echo form_open('user/register', array('method'=>'post', 'name'=>'frmUserRegister', 'id'=>'frmUserRegister', 'accept-charset'=>'utf-8')) ?>
                <div class="box-body">
                    <div class="form-group<?php echo (form_error('fullName') ? ' has-error' : '') ?>">
                        <label for="fullName">Nome Completo</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" size="100" value="<?php echo set_value('fullName'); ?>" placeholder="Nome Completo">
                    </div>
                    <div class="form-group<?php echo (form_error('email') ? ' has-error' : '') ?>">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="seu@email.com">
                    </div>
                    <div class="form-group<?php echo (form_error('id_profile') ? ' has-error' : '') ?>">
                        <label>Perfil</label>
                        <select class="form-control" id="id_profile" name="id_profile">
                            <option value="">Selecione um perfil</option>
                            <?php
                            $profiles = $userView->getProfiles();
                            foreach($profiles as $idProfile => $profile):
                            ?>
                            <option value="<?php echo $idProfile?>" <?php if (set_value('id_profile') == $idProfile) echo 'selected="selected"'; ?>><?php echo $profile; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group<?php echo (form_error('password') ? ' has-error' : '') ?>">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                    </div>
                    <div class="form-group<?php echo (form_error('retypePassword') ? ' has-error' : '') ?>">
                        <label for="retypePassword">Confirme a Senha</label>
                        <input type="password" class="form-control" id="retypePassword" name="retypePassword" size="15" placeholder="Confirme a senha">
                    </div>
                    <div class="form-group<?php echo (form_error('status') ? ' has-error' : '') ?>">
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="status" value="1" checked="">
                                Ativo&nbsp;&nbsp;&nbsp;
                            </label>
                            <label>
                                <input type="radio" name="status" id="status" value="2">
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