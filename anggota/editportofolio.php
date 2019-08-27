		<div class="content" style="margin-top:0;">
				<form class="content-form" action="proses_portofolio.php" method="POST">
				<label>Bidang Keahlian</label>
				<input type="text" name="bidang" value="<?= $dataportofolio['bidang_keahlian'];?>" class="content-form-text">
				<label>Riwayat Pelatihan</label>
				<textarea placeholder="Pelatihan pernah anda ikuti" class="content-form-text" name="riwayat"><?= $dataportofolio['riwayat_pelatihan'];?></textarea>
				<label>Sertifikat</label>
				<textarea placeholder="Sertifikat yang di miliki ..." class="content-form-text" name="sertifikat"><?= $dataportofolio['sertifikasi_pelatihan'];?></textarea>
				<label>Project</label>
				<textarea placeholder="Project yang pernah di miliki ..." class="content-form-text" name="project"><?= $dataportofolio['riwayat_project'];?></textarea>
				<input type="submit" name="save" class="content-form-submit" value="Update Portofolio">
			</form>
			<br>
				<br>
		</div>