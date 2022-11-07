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

            echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

            echo form_open_multipart('berita/add');
            ?>
            <div class="form-group">
                 <label>Judul Berita</label>
                 <input class="form-control" type="text" name="nama_berita" placeholder="Nama Berita" required>
            </div>
            <div class="form-group">
                    <label>Kategori Berita</label>
                   <select name="id_kategori" class="form-control">
                   <option value="">--Pilih Kategori Berita--</option>
                   <?php foreach ($kategori as $key => $value) {?>
                   <option value="<?= $value->id_kategori?>"><?= $value->nama_kategori?></option>
                   <?php }?>
                   </select>
                </div>

                <div class="form-group">
                 <label>Video Youtube</label>
                 <input class="form-control" type="text" name="iframe" placeholder="Video Youtube" required>
            </div>

            <div class="form-group">
                    <label>Gambar Berita</label>
                    <input type="file" class="form-control" name="foto_berita"  required>
                </div>
            <div class="form-group">
                 <label>Isi Berita</label>
                 <textarea name="isi_berita" id="editor" required  ></textarea>
            </div>
               

            <div class="form-group">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>




        <?php echo form_close();?>
        </div>
    </div>
</div>