<?php
defined('BASEPATH') or exit('No direct script access allowed');

$this->load->view('slicer/navbar');
?>

<body>
	<div class="container">
		<div class="mt-5">
			<h1>We’ve got you. Let’s get it.</h1>
		</div>

		<?php
		$typestudio = '';
		$harga = '';

		if (isset($studio)) {
			$name = $studio->nama_studio;
			$harga = $studio->harga;
		}
		?>
		<div class="mt-4">
			<a href="<?= site_url('Studio/studio_info/' . $name) ?>"><button class="btn btn-primary">back</button></a>
		</div>
		<div class="mt-3">
			<form method="post">
				<div>
					<label for="exampleFormControlInput1" class="form-label">Type Studio</label>
					<input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $name ?>" disabled>
				</div>
				<div class="">
					<label for="exampleFormControlInput1" class="form-label">Date</label>
					<input id="startDate" class="form-control" type="date" name="tgl_booking" required />
					<span id="startDateSelected"></span>
				</div>
				<div>
					<label for="time" class="form-label">Time</label>
					<input type="time" class="form-control" id="time" name="jam_mulai" step='3600' name="jam_mulai"
						required />
				</div>
				<div>
					<label for="durasi" class="form-label">Durasi</label>
					<input type="number" class="form-control" min="1" id="durasi" name="durasi" value="1"
						onclick="Myfunction()" required>
				</div>
				<div class="input-group mt-4">
					<span class="input-group-text">Rp.</span>
					<input type="text" class="form-control" min="1" id="durasiHasilP" disabled>
				</div>
				<div>
					<input type="submit" value="Submit" class="btn btn-primary mt-4" name="submit">
					<input type="hidden" class="form-control" min="1" id="durasiHasilA" value="<?= $harga ?>" disabled>
					<input type="reset" value="Reset" name="reset" class="btn btn-primary mt-4">
				</div>
			</form>
		</div>
	</div>

	<script>
		let startDate = document.getElementById('startDate')
		let endDate = document.getElementById('endDate')
		let hasilP = document.getElementById('durasiHasilP')
		let hasilA = document.getElementById('durasiHasilA').value

		let studio = document.getElementById('studio')

		var today = new Date();
		var date = today.getFullYear() + '-' + 0 + (today.getMonth() + 1) + '-' + today.getDate();
		startDate.setAttribute("min", date);

		function numberWithCommas(x) {
			var parts = x.toString().split(".");
			parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			return parts.join(".");
		}


		function Myfunction() {
			var durasi = document.getElementById('durasi').value
			const total = hasilA * durasi;
			const out = total.toLocaleString(['id']);
			hasilP.setAttribute("value", out)
			console.log(out)
		}

		startDate.addEventListener('change', (e) => {
			let startDateVal = e.target.value
			document.getElementById('startDateSelected').innerText = startDateVal
		})
	</script>





















</body>