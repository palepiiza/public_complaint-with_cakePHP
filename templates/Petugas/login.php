<div class="users form content">
<?= $this->Html->link(__('New Petugas'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->link("Daftar Akun", ['action' => 'register']) ?>
</div>