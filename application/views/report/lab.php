<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
	var fakultas = "<?php echo $fakultas; ?>";
	var awal = "<?php echo $awal; ?>";
	var akhir = "<?php echo $akhir; ?>";
</script>
<div class="row">
	<div class="col-md-12">	


		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" >
						<div class='col-md-12 alert alert-info'>
							
							<p><strong>Notice</strong> <br>Mohon memilih hanya satu filter (fakultas saja/jurusan saja/laboratorium saja). <br>Jika memilih lebih dari satu, maka akan dipilih filter di subunit terkecil (misal : jika difilter dari jurusan & fakultas, maka akan difilter berdasarkan jurusan) </p>
						</div>
						<div class="filter-part col-md-8">
							<input type="hidden" id="filter_tarik" name="filter_tarik" />
							<div class="row">
								<label class="col-md-3">Fakultas</label>
								<div class="col-md-5">
									<?php make_object_combobox($filter_fakultas, 'FAKULTAS_ID', 'FAKULTAS_NAMA_SINGKATAN', array('id'=>'filter_fakultas', 'class'=>'select2 form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-8">
							<div class="row">
								<label class="col-md-3">Jurusan</label>
								<div class="col-md-7">
									<?php make_object_combobox($filter_jurusan, 'JURUSAN_ID', 'JURUSAN_NAMA', array('id'=>'filter_jurusan', 'class'=>' select2 form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<div class="form-group">
								<label class=" col-md-4"><?php echo $this->lang->line('pub_filterstart'); ?></label>
								<div class="col-md-8 " style="padding-left:3px">
									<div class="input-group">
										<input type="text" id="filter_tahunawal" class="form-control input-medium mask-integer" />
										<span class="input-group-addon"><?php echo $this->lang->line('pub_filterend'); ?></span>
										<input type="text" id="filter_tahunakhir" class="form-control input-medium mask-integer" />
									</div>
								</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>

						<?php 

			        	$helper = [
			        		SNL => 'SNL',
			        		JIT => 'JIT',
			        		SIT => 'SIT',
			        		SITT => 'SITT',
			        		JITT => 'JITT',
			        		JNT => 'JNT',
			        		JNTT => 'JNTT',
			        		L => 'Lainnya'
			        	];
						foreach ($result as $p1=>$fak) {?> 
							<h2> <?php echo $p1 + 1 .'. ' . $fak['nama_fak']; ?></h2>

							<?php foreach($fak['depts'] as $p2=>$dept){
								if(isset($dept['nama_jur'])) ?> <h3> <?php echo ++$p2 . '. ' . $dept['nama_jur'];?></h3>
						<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Laboratorium</th>
									<?php foreach($dkp as $dkp_ket){ ?>
									<th>
										Jumlah <br>Data <br> <?php echo $dkp_ket; ?></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($dept['labs'] as $key=>$lab){ ?>
								<tr>
									<td><?php echo $key+1; ?></td>
									<td><?php echo $lab['nama_lab']; ?></td>
									<?php foreach($dkp as $dkp_id=>$dkp_ket){ ?>
									<td class="text-right">
										<?php 
											echo $lab['table']!=null && isset($lab['table'][$dkp_id] ) ? $lab['table'][$dkp_id] : '0';

										?>
									</td>
									<?php } ?>
								</tr>
								<?php } ?>

							</tbody>
						</table>
						</div>
						<?php } } ?>

					</div>
					
					

				</div>
			</div>
		</div>
	</div>
</div>
