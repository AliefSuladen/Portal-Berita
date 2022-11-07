<div class="col-lg-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">
        <a href="<?=base_url('kategori/add')?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Add</a>
        </div>
        <div class="panel-body">

<?php
        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';    
                           }?>
        <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
             <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($kategori as $key => $value) {?>
               <tr>
               <td><?= $no++?></td>
               <td><?= $value->nama_kategori?></td>

               <td>
               <a href="<?=base_url('kategori/edit/'.$value->id_kategori)?>" class="btn btn-xs btn-success"> <i class="fa fa-pencil"> </i></a>
               <a href="<?=base_url('kategori/delete/'.$value->id_kategori)?>"onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
               </td>
               </tr>
               <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>