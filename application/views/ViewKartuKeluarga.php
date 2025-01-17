<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
        <?= validation_errors() ?>
            <form role='form' method='post' >
                <div class="form-group">
                    <label for="nik">Nomor KK</label>
                    <input type="number" class="form-control" name='nik' id="nik" placeholder="masukkan nomor KK">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kepala Keluarga</label>
                    <input type="text" name='nama' class="form-control" id="nama" placeholder="masukkan nama kepala keluarga">
                </div>
                <label for="">Alamat</label>
                <div class="form-row">                
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Desa</label>
                            <select class="form-control" name='desa' id="desas">
                                <option >Pilih desa</option>
                                <option value="3">Bandar Khalipah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dusun</label>
                            <select class="form-control" name='dusun' id="dusun">
                                <option >Pilih Dusun</option>
                                <?php foreach ($dusun as $dusun): ?>
                                    <option value='<?= $dusun->id_dusun ?>'> <?= $dusun->nama_dusun?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jalan</label>
                            <select class="form-control" name='jalan' id="jalan">
                                <option >Pilih jalan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gang</label>
                            <select class="form-control" name='gang' id="gang">
                                <option>Pilih Gang</option>                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Latitude</label>
                    <input type="text" name='latitude' class="form-control" id="latitude" placeholder="masukkan latitude">
                </div>
                <div class="form-group">
                    <label for="nama">Longitude</label>
                    <input type="text" name='longitude' class="form-control" id="longitude" placeholder="masukkan longitude">
                </div>
                    <!--Google map -->

                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php var_dump($dusun) ?>
<script>
    $(document).ready(function(){
        // dusun
        $('#desa').change(function(){
            // tangkap value dari desa
            var id_desa    = $(this).val();
            // jalankan ajax
            $.ajax({
                // sumber data
                url    : "<?php base_url()?>"+'dusun1',
                method : 'POST',
                data   : {desa:id_desa},// dikirim ke controoler sebagain input->post('desa')
                success:function(data){
                    console.log(id_desa);
                    console.log(data);
                    $('#dusun').html(data);
                }
            })
        });

        // jalan
        $('#dusun').change(function(){
            // tangkap value dusun
            var id_dusun    = $(this).val();
            // jalankan ajax
            $.ajax({
                // sumber data
                url     : "<?php base_url()?>"+'jalan1',
                method  :'POST',
                data    : {dusun:id_dusun},
                success : function(data){
                    console.log(id_dusun);
                    $('#jalan').html(data);
                }
            })
        })
        // gang
        $('#jalan').change(function(){
            // tankap value jalan
            var id_jalan    = $(this).val();
            // jalankan ajax
            $.ajax({
                //sumber data
                url     : "<?php base_url()?>"+'gang1',
                method  : 'POST',
                data    : {jalan:id_jalan},
                success : function(data){
                    console.log(id_jalan);
                    $('#gang').html(data);
                }
            })
        })
    })
</script>