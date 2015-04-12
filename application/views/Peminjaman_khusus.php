<html>
<head>
</head>
    <body>
    
    <div id="menu">
    <? $this->load->view('books_menu'); ?>
    </div>

        <? echo form_open('books/input'); ?>
        <? echo $Nama; ?>: 
        <? echo form_input('Nama'); ?>
        </br>
        <? echo $Organisasi; ?>: 
        <? echo form_input('Organisasi'); ?>
        </br>
        <? echo $Jumlah_Spekun; ?>: 
        <? echo form_input('Jumlah_Spekun'); ?>
        </br>
        <? echo $Jam_Awal; ?>: 
        <? echo form_input('Jam_Awal'); ?>
        </br>
        <? echo $Jam_Akhir; ?>: 
        <? echo form_input('Jam_Akhir'); ?>
        </br>
        <? echo $Tanggal; ?>: 
        <? echo form_dropdown('Tanggal', $Tanggal); ?>
        </br>
         </br>
        <? echo $Bulan; ?>: 
        <? echo form_dropdown('Bulan', $Bulan); ?>
        </br>
         </br>
        <? echo $Tahun; ?>: 
        <? echo form_dropdown('Tahun', $Tahun); ?>
        </br>
        </br>
        <? echo $Keterangan; ?>: 
        <? echo form_textarea('Keterangan'); ?>
        </br>
        </br>
        <? echo $ID_Admin; ?>: 
        <? echo form_input('ID_Admin'); ?>
        </br>
        <? echo form_submit('mysubmit','Submit!');  ?>
        <? echo form_close(); ?>

    </body>
</html>