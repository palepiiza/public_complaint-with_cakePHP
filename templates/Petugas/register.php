<div class="petugas form content">
    <?= $this->Form->create($petuga) ?>
    <fieldset>
        <legend><?= __('Daftar Akun') ?></legend>
        <?php
            echo $this->Form->control('nik');
            echo $this->Form->control('nama');
            echo $this->Form->control('username');
            echo $this->Form->control('password');
            echo $this->Form->control('telp');
            echo $this->Form->control('level',['type'=>'hidden','value'=>'masyarakat']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
