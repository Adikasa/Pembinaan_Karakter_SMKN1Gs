<?php
include "lib/config.php";
include "lib/koneksi.php";
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
elseif ($_SESSION['akses']==1 or $_SESSION['akses']==2 or $_SESSION['akses']==5){ ?>              
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Penghargaan dan Apresiasi -<small><font color="red"> Prestasi</font></small></h3>
                <h5>Sesuai dengan surat keputusan Kadisdik Prov. Jawa Barat Nomor: 15942 /Pk.09.05/Gtk, Tentang Pedoman Pendidikan Karakter Pancawaluya</h5>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

              <!-- Table -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Poin Penghargaan dan Apresiasi</h2>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            
                            <th class="column-title">No </th>
                            <th class="column-title">Prestasi </th>
                            <th class="column-title">Poin </th>
                            <?php 
                            if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                            ?>
                            <th class="column-title no-link last"><span class="nobr">Aksi</span>
                            </th>
                            <?php
                              }
                            ?>
                          </tr>
                        </thead>

                        <tbody>
                          <?php 
                            $prestasi = mysqli_query($connect,"SELECT * FROM prestasi");
                            $no=1;
                            while($pres=mysqli_fetch_array($prestasi)){
                            if ($no%2==1) {
                          ?>
                          <tr class="even pointer">
                            <!--<td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>-->

                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $pres['nama_prestasi'];?></td>
                            <td class=" "><?php echo $pres['poin'];?></td>
                            <?php 
                            if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_prestasi&id_prestasi=<?php echo $pres['id_prestasi']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                              </div>
                            </td>
                            <?php 
                              } 
                            ?>
                          </tr>
                            <?php
                            }
                            else{
                            ?>

                          <tr class="odd pointer">
                            
                            <td class=" "><?php echo $no;?></td>
                            <td class=" "><?php echo $pres['nama_prestasi'];?></td>
                            <td class=" "><?php echo $pres['poin'];?></td>
                            <?php 
                            if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                            ?>
                            <td class=" last">
                              <div class="btn-group">
                                <a href="main.php?module=edit_prestasi&id_prestasi=<?php echo $pres['id_prestasi']; ?>" class="btn btn-warning btn-sm"><i class='fa fa-pencil'></i> Edit</button></a>
                              </div>
                            </td>
                            <?php 
                              } 
                            ?>
                          </tr>
                          <?php 
                            }
                            $no++;
                          }
                          ?>
                          
                        </tbody>
                      </table>
                      <?php 
                        if($_SESSION['akses']==1 or $_SESSION['akses']==2){
                      ?>
                      <div align="right">
                      <a href="main.php?module=tambah_prestasi"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Tambah Prestasi</button></a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Penutup Tabel -->

            </div>
          </div>
        </div>
<?php 
}
else{
  echo "Anda Harus Login Untuk Mengakses Halaman Ini";
}
 ?>
