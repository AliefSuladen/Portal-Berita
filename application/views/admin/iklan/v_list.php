<div class="col-lg-12">
    <div class="panel panel-primary ">
        <div class="panel-heading">
        <a href="<?=base_url('iklan/add')?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Add</a>
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
              <th>Nama Iklan</th>
              <th>Foto</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($iklan as $key => $value) {?>
               <tr>
               <td><?= $no++?></td>
               <td><?= $value->nama_iklan?></td>
               <td><img src="<?= base_url('foto_iklan/'.$value->foto_iklan)?>" width="100px" height=""></td>

               <td>
               <a href="<?=base_url('iklan/edit/'.$value->id_iklan)?>" class="btn btn-xs btn-success"> <i class="fa fa-pencil"> </i></a>
               <a href="<?=base_url('iklan/delete/'.$value->id_iklan)?>"onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"> </i></a>
               </td>
               </tr>
               <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>