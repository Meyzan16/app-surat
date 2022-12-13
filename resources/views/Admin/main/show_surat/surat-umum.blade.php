
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
					<font size="2">Jalan W.R Supratman, Kandang Limun (Gedung T), Bengkulu 38371A</font><br>
					<font size="2">Telepon: (0736) 20919, 21170 ext. 208 Faksimile: (0736) 20919</font><br>
					<font size="2">Laman: <i>http://www.fmipa.unib.ac.id </i>  <i>e-mail</i>: dekanat_fmipa@unib.ac.id </font>
				</center>
				</td>
			</tr>
            
			<tr>
				<td colspan="2"><hr></td>
			</tr>           
		</table>

        

        <table width="600">
            <tr class="text2">
                <td>Nomor</td>
				<td width="512">: </td>
                <td width="480" class="text2 text-right"> {{date('d F Y')}} </td>
			</tr>   
			<tr>
				<td>Lampiran</td>
				<td>: {{$data->tb_lampiran->judul_lampiran}}</td>
			</tr>
			<tr>
				<td>Hal</td>
				<td>: {{$data->tb_perihal_surat->nama}} </td>
			</tr>
			
		</table>

        <br>

		<table width="600">
            <tr>
                <td>
                   
                    <font size="2">Yth, {{ $data->tb_tujuan_surat->nama}} <br>
                    {{$data->sub_tujuan}} 
                    </font>
                  
                </td>
            </tr>
        </table>

		<table width="600">
            <tr>
                <td>
                    <font size="2">{!! $data->isi_surat !!} </font>
                </td>
            </tr>
        </table>


	
		<table width="600">
			<tr>
		       <td>
			       <font size="2">Atas Perhatian dan kerjasama yang baik kami ucapkan terimakasih </font>
		       </td>
		    </tr>
		</table>
		<br>

		@if($data->status_persetujuan == 'Y')
		<table width="600">
			<tr>
				<td width="400"><br><br><br><br></td>
				<td class="text" style="text-align-last: left">a.n. Dekan<br>Wakil Dekan Bidang Akademik
				<br><br><br><br>

				Asahar Muda Lubis, Ph.D <br>
				NIP 1919922972972979
				</td>	
			</tr>
	     </table>
		 @endif

		 <br>
		 @if($data->tembusan)
		 <table width="600">
			<tr>
		       <td>
				<font size="2">Tembusan :<br>
                    {!!$data->tembusan!!} 
                    </font>
		       </td>
		    </tr>
		</table>
		@endif
	</center>
</body>
</html>
