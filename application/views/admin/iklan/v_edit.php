<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        Add Data 
        </div>
        <div class="panel-body">
            <?php

            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
            }
            echo form_open_multipart('iklan/edit/'.$iklan->id_iklan);
            ?>
            <div class="form-group">
                 <label>Nama Iklan</label>
                 <input class="form-control" type="text" name="nama_iklan" placeholder="Nama Iklan" value="<?=$iklan->nama_iklan?>" required >
            </div>
            

            <div class="form-group">
                    <img  src="<?=base_url('foto_iklan/'.$iklan->foto_iklan)?>" width="150px" alt="">
                </div>

                <div class="form-group">
                    <label>Foto Iklan</label>
                    <input type="file" class="form-control" name="foto_iklan">
                </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>




        <?php echo form_close();?>
        </div>
    </div>
</div>