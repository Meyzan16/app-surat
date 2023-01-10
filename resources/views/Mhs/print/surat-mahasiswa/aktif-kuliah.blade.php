
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>

				<td><img src="/assets/images/logo.png" width="90" height="90"></td>
				<td>
				<center>
					<font size="4">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,</font><br>
					<font size="4">RISET, DAN TEKNOLOGI</font><br>
					<font size="4"><b>UNIVERSITAS BENGKULU</b></font><br>
					<font size="4"><b>FAKULTAS MATEMATIKA DAN ILMU PENGTAHUAN ALAM</b></font><br>
					<font size="2">Jalan W.R Supratman, Kandang Limun (Dekanat MIPA), Bengkulu 38371A</font><br>
					<font size="2">Telepon: (0736) 20919, 21170 ext. 208 Faksimile: (0736) 20919</font><br>
					<font size="2">Laman: <i>http://www.fmipa.unib.ac.id </i>  <i>e-mail</i>: dekanat_fmipa@unib.ac.id </font>
				</center>
				</td>
			</tr>
            
			<tr>
				<td colspan="2"><hr></td>
			</tr>

            <table width="625">
                <tr>
                    <td>
                        <center>
                            <font size="4"><b>SURAT KETERANGAN MASIH KULIAH</b></font> <br>
                            <font size="3"><b>Nomor : 2400/UN30.12/TU/2022</b></font>
                        </center>
                    </td>
                </tr>
            </table>
		</table>

        <table width="625">
               <tr>
                   <td>
                       <font size="2">Yang bertanda tangan dibawah ini</font>
                   </td>
               </tr>
		</table>

		<table>
            <tr class="text2">
				<td>Nama</td>
				@if($data->status_persetujuan == 'Y')
					<td width="512">: {{ $data->user->nama }}</td>
				@else
					<td width="512">:</td>
				@endif
			</tr>
			<tr>
				<td>NIP</td>
				@if($data->status_persetujuan == 'Y')
					<td>: {{ $data->user->tb_persetujuan->nip }}</td>
				@else
					<td width="512">:</td>
				@endif
			</tr>
			<tr>
				<td>Pangkat/Golongan</td>
				@if($data->status_persetujuan == 'Y')
					<td>: {{ $data->user->tb_persetujuan->golongan }}</td>
				@else
					<td width="512">:</td>
				@endif
			</tr>
			<tr>
				<td>Jabatan</td>
				@if($data->status_persetujuan == 'Y')
				<td>: {{ $data->user->tb_persetujuan->jabatan }}</td>
				@else
					<td width="512">:</td>
				@endif
			</tr>
		</table>

		<table width="625">
            <tr>
                <td>
                    <font size="2">Dengan ini menerangkan bahwa mahasiswa berikut ini,</font>
                </td>
            </tr>
        </table>

        <table width="625">
            <tr class="text2">
				<td>Nama</td>
				<td width="512">: {{ $data->tb_data_mahasiswa->nama }}</td>
			</tr>
            <tr class="text2">
				<td>NPM</td>
				<td>: {{ $data->tb_data_mahasiswa->npm }}</td>
			</tr>
            <tr class="text2">
				<td>Semester</td>
				<td>:  {{ $data->semester }}</td>
			</tr>
            <tr class="text2">
				<td>Jurusan/Prodi</td>
				<td>:  {{ $data->tb_data_mahasiswa->tb_prodi->nama_prodi }}</td>
			</tr>
            <tr class="text2">
				<td>Fakultas</td>
				<td>: Matematika dan Ilmu Pengtahuan Alam</td>
			</tr>
            <tr class="text2">
				<td>Perguruan Tinggi</td>
				<td>: Universitas Bengkulu</td>
			</tr>
            <tr class="text2">
				<td>Masa Studi</td>
				<td>: {{ $data->masa_studi }}</td>
			</tr>
		</table>

		<table width="625">
			<tr>
		       <td>
			       <font size="2">Mahasiswa tersebut saat ini masih aktif kuliah dibuktikan dengan surat yang telah ditanda tangani</font>
		       </td>
		    </tr>
		</table>

		<table width="625">
			<tr>
				<td>
					<font size="2">Orang tua/wali mahasiswa tersebut adalah :</font>
				</td>
			</tr>
	 	</table>

	 <table width="625">
		 <tr class="text2">
			 <td>Nama</td>
			 <td width="512">: {{ $data->nama_ortu}} </td>
		 </tr>
		 @if($data->nip)
			<tr>
				<td>NIP</td>
				<td>: {{$data->nip}}</td>
			</tr>
			<tr>
				<td>Pangkat/Golongan</td>
				<td>: {{$data->golongan}}</td>
			</tr>
		 @endif
		
		 <tr>
			 <td>Pekerjaan</td>
			 <td>: {{$data->pekerjaan}}</td>
		 </tr>
		 
		 <tr>
			 <td>Alamat</td>
			 <td>: {{$data->alamat}}</td>
		 </tr>
	 </table>

		<table width="625">
			<tr>
		       <td>
			       <font size="2">Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagimana mestinya.
		       </td>
		    </tr>
		</table>
		<br>

		@if($data->status_persetujuan == 'Y')
			<table width="625">
				<tr>
					<td width="430"><br><br><br><br></td>
					<td class="text" style="text-align-last: left">Bengkulu, {{date('d F Y')}}<br>a.n. Dekan<br>{{ $data->user->tb_persetujuan->jabatan}}
					<br><br><br><br>

					{{ $data->user->nama}} <br>
					NIP. {{ $data->user->tb_persetujuan->nip }}
					</td>	
				</tr>		
			</table>
		 @endif
	</center>
</body>
</html>
