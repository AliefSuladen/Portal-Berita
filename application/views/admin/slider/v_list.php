<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <a href="<?=base_url('slider/add')?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i>Add</a>
        </div>
        <div class="panel-body">

<?php
        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';    
                           }?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
             <tr>
              <th>No</th>
              <th>Judul Slider</th>
              <th>Isi Slider</th>
              <th>foto</th> 
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach ($slider as $key => $value) {?>
               <tr>
               <td><?= $no++?></td>
               <td><?= $value->judul?></td>
               <td><?= $value->isi?></td>
               <td><img src="<?= base_url('foto_slider/'.$value->foto)?>" width="100px" height=""></td>

               <td>
               
               <a href="<?=base_url('slider/delete/'.$value->id_slider)?>"onclick="return confirm('Anda Yakin...?')" class="btn btn-xs btn-danger"> <i class="fa fa-trash"> Hapus</i>  </a>
               </td>
               </tr>
               <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>