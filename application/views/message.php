<?php if ($this->session->has_userdata('danger')) { ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <ion-icon name="warning-outline"></ion-icon>
  <?= $this->session->flashdata('danger');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <ion-icon name="shield-checkmark-outline"></ion-icon>
  <?= $this->session->flashdata('success');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <ion-icon name="warning-outline"></ion-icon>
  <?= $this->session->flashdata('warning');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <ion-icon name="information-circle-outline"></ion-icon>
  <?= $this->session->flashdata('info');?>    
</div>
<?php } ?>