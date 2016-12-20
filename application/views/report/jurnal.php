<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
	var list_jurusan = JSON.parse('<?php echo $list_jurusan_json; ?>');
	var fakultas = "<?php echo $fakultas; ?>";
	var jurusan = "<?php echo $jurusan; ?>";
	var kode = "<?php 
		$flag = 0;
		if(is_array($kode)) {
			if(in_array(JIT, $kode)) {
				echo 'jurnal';
				$flag = 1; //jurnal
			}
			else {
				echo 'seminar';
				$flag = 2 ; //seminar;
			}
		}
		else{
			echo $kode;
			if(is_array($kode)) {
				if(in_array($kode, [SIT,SITT, SNL])) {
					$flag = 1; //jurnal
				}
				else if(in_array($kode, [JNT,JNTT,JIT,JITT])) {
					$flag = 2 ; //seminar;
				}
				else{
					$flag = -1;
				}
			}
		}
	?>";
	var kode_jurnal = "<?php echo KODE_JURNAL; ?>";
	var kode_seminar = "<?php echo KODE_SEMINAR; ?>";
	</script>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="note note-warning">
			<p><?php echo $this->lang->line('module_description'); ?></p>
		</div> -->
		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user font-green-seagreen"></i>
								<span class="caption-subject bold font-green-seagreen uppercase"><?php if ($flag==1 ) echo $this->lang->line('report_jurnal_master'); else if ($flag==2 ) echo $this->lang->line('report_seminar_master'); else echo ' Lainnya'; ?></span>
							</div>
							<div class="actions filter-control">
								<div class="btn-group main-control"></div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="masterpage-filter form-inline" >
								<div class="filter-part col-md-5">
									<div class="form-group">
										<label class="control-label col-md-4"><?php echo $this->lang->line('peg_fakultas'); ?></label>
										<div class="col-md-8 input-placement">
											<?php make_object_combobox($list_fakultas, 'fak_id', 'fak_singkatan', array('id'=>'filter_fakultas', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
										</div>
									</div>
								</div>
								<form method="post" action="<?php echo base_url()?>publikasi_dosen/listpub" style='display:none;'>
								<input type="hidden" id="filter_keterangan" 
								value="<?php
									if(is_array($kode)) {
										if(in_array(JIT, $kode)) {
											echo 'jurnal';
										}
										else {
											echo 'seminar';
										}
									}
									else{
										echo $kode;
									}
								 ?>" />
								<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>" />
								<input type="hidden" name="journalName" id='journalName'>
								<input type="hidden" name="kode" id='kode' value='<?php echo $kode; ?>'>
								<input type='submit' id='hiddenSubmit' style='display:none'>
								</form>
								<div class="filter-part col-md-5">
									<div class="form-group">
										<label class="control-label col-md-4"><?php echo $this->lang->line('pub_tahun'); ?></label>
										<div class="col-md-8 input-placement">
											<input type="text"  id="filter_tahun" value="<?php echo $tahun; ?>" class="form-control input-medium" />
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="filter-part col-md-5">
									<div class="form-group">
										<label class="control-label col-md-4"><?php echo $this->lang->line('peg_jurusan'); ?></label>
										<div class="col-md-8 input-placement">
											<?php make_object_combobox($list_jurusan, 'jur_id', 'jur_nama_indonesia', array('id'=>'filter_jurusan', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="filter-part col-md-5">
									<div class="form-group">
										<label class="control-label col-md-4">Jenis Publikasi</label>
										<div class="col-md-8 input-placement">
											<?php make_object_combobox($detil_kode_publikasi, 'dkp_id', 'dkp_keterangan', array('id'=>'filter_keterangan', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
								<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
								<hr class="no-margin"/>
								<a href="#" id="btn-download" class="btn green-seagreen margin-top-10">Download Laporan</a>
							</div>
							<!-- <form method="post" action="javascript:void(null);" class="form-master"> -->
								<table class="table-master table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th><?php if ($flag==1 ) echo $this->lang->line('report_jurnal_table'); else if ($flag==2 ) echo $this->lang->line('report_seminar_table'); else echo 'Nama Publikasi'; ?></th>
											<th><?php echo $this->lang->line('penarikan_total'); ?></th>
										</tr>
									</thead>
									<tbody id='lolo'>
										
									</tbody>
								</table>
							<!-- </form> -->
						</div>
					</div>
		</div>

	</div>
</div>

