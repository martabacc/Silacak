<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
	var pegawai = JSON.parse('<?php echo $pegawai; ?>');
</script>
<div class="row">
	<div class="col-md-12">
		<div id="master-page">
			<div class="detail-page portlet light bg-inverse form-fit" >
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase">
							Laporan Publikasi per Pegawai
						</span>
						
					</div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">
						<input type="hidden" id="peg_id" name="peg_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('peg_name'); ?></label>
								<div class="col-md-9 input-placement" >
									<div class="input-group input-large">
										<input id="peg_name" name="peg_name" type="text" class="form-control" readonly style="cursor:pointer"/>
										<span class="input-group-btn">
											<a class=" btn green search" onclick="javascript:showModalPegawai()"><i class="fa fa-search"></i> Cari</a>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control">
										<!-- <button type="button" class="btn red-thunderbird mp-cancel-button">
											<i class="fa fa-times"></i> Batal
										</button> -->
										<button id="btn-show" type="button" class="btn green-seagreen mp-show-button">
											<i class="fa fa-floppy-o"></i> <span>Tampilkan</span>
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

<div class="modal fade" id="lookup-pegawai" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		<!-- <h4><?php echo $this->lang->line('module_pegawai_master'); ?></h4> -->
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
</div>

<div class="modal fade" id="form-import-pengarang" tabindex="-1" role="dialog" aria-hidden="true" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
		Impor Data Pengarang
      </div>
      <div class="modal-body">
      	<form id="import-file" class="form-detail form-horizontal">
      		<div class="form-body">
				<div class="form-group">
					<label class="control-label col-md-3">Pilih File</label>
					<div class="col-md-9 input-placement" style="padding-left: 0px; margin-top:8px">
						<div class="col-md-6">
							<input width="100%" type="file" name="file-input" id="file-input" accept=".csv"/>
						</div>
					</div>
				</div>
			</div>
			<p>File harus bertipe .csv</p>
			<p>Silahkan download <a href="<?php echo base_url();?>assets/template/impor_pengarang.csv" download="template impor pengarang.csv">template ini</a></p>
			<p>Format harus sesuai dengan template yang disediakan</p>
	    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button id="btn-import" class="btn green-seagreen">
			<i class="fa fa-download"></i> <span>Import Data</span>
		</button>
      </div>
    </div>
  </div>
</div>