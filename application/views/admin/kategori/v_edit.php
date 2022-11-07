<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        Edit Data
        </div>
        <div class="panel-body">
            <?php

            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
            }
            echo form_open_multipart('kategori/edit/'.$kategori->id_kategori);
            ?>
            <div class="form-group">
                 <label>Nama Katgori</label>
                 <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori" value="<?=$kategori->nama_kategori?>" required >
            </div>
            


            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>




        <?php echo form_close();?>
        </div>
    </div>
</div>