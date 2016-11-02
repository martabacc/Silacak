<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">
							<!-- TODO LANG -->
							Tambah Data Scopus
						</span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">

						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3">
									<!-- TODO LANG -->
									File Scopus
									</label>
								<div class="col-md-9 input-placement" >
									<div class="input-group input-large">
										<input id="file" name="file" type="file" class="form-control" />
										<span class="input-group-btn">
											<!-- <a class=" btn green search"><i class="fa fa-search"></i> Pilih File...</a> -->
										</span>
									</div>
								</div>
							</div>
							
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<button id="btn-save" type="button" class="btn green-seagreen mp-save-button">
											<i class="fa fa-download"></i> <span>Upload</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="modal fade" id="lookup-pegawai" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		
      </div>
      <div class="modal-body">
      	<div id="master-pegawai">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_master'); ?></span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group column-visibility margin-right-10">
							
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" style="display: none;">
						<h4><?php echo $this->lang->line('master_filter'); ?></h4>

						<div class="clearfix"></div>
						<hr class="no-margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th></th>
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
									<th><?php echo $this->lang->line('peg_program_studi'); ?></th>
									<th><?php echo $this->lang->line('peg_jenjang_pendidikan'); ?></th>
									<th><?php echo $this->lang->line('peg_satuan_kerja'); ?></th>
									<th><?php echo $this->lang->line('peg_ikatan_kerja_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_status_aktivitas_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_pegawai'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_dosen'); ?></th>
									<th><?php echo $this->lang->line('peg_pangkat_pns'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_kelamin'); ?></th>
									<th><?php echo $this->lang->line('peg_provinsi'); ?></th>
									<th><?php echo $this->lang->line('peg_kota'); ?></th>
									<th><?php echo $this->lang->line('peg_kode_validasi'); ?></th>
									<th><?php echo $this->lang->line('peg_log_audit'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_baru'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_lama'); ?></th>
									<th><?php echo $this->lang->line('peg_nidn'); ?></th>
									<th><?php echo $this->lang->line('peg_name'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_depan'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_belakang'); ?></th>
									<th><?php echo $this->lang->line('peg_alamat'); ?></th>
									<th><?php echo $this->lang->line('peg_telepon'); ?></th>
									<th><?php echo $this->lang->line('peg_handphone'); ?></th>
									<th><?php echo $this->lang->line('peg_email'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_berhenti'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_masuk'); ?></th>
									<th><?php echo $this->lang->line('peg_is_dosen'); ?></th>
									<th><?php echo $this->lang->line('peg_google_schoolar'); ?></th>
									<th><?php echo $this->lang->line('peg_penelitian'); ?></th>
									<th><?php echo $this->lang->line('peg_created_at'); ?></th>
									<th><?php echo $this->lang->line('peg_updated_at'); ?></th>
									<th><?php echo $this->lang->line('peg_deleted_at'); ?></th>
									<th><?php echo $this->lang->line('peg_fakultas'); ?></th>
									<th><?php echo $this->lang->line('peg_jurusan'); ?></th>
									
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div> -->