<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style type="text/css">
body.dragging, body.dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.ol-anggota {
	list-style-type: none;
	padding-left: 0px;
}

ol.ol-anggota li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.ol-anggota li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
}</style>
<script type="text/javascript">
	var pegawai = <?php echo $pegawai ?>;
	var pegawai_name = "<?php echo $pegawai_name ?>";
	var status_tarik = <?php echo $status_tarik ?>;
</script>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="note note-warning">
			<p><?php echo $this->lang->line('module_description'); ?></p>
		</div> -->
		<div id="master-page">
			<div class="table-page portlet light bg-inverse" style="display:none">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_master'); ?></span>
					</div>
					<div class="actions filter-control">
						<div class="btn-group column-visibility margin-right-10">
							<button type="button" class="btn grey-gallery dropdown-toggle fix-nested-dropdown" data-toggle="dropdown">
								<i class="fa fa-columns"></i> Kolom <i class="fa fa-angle-down"></i>
							</button>
							<ul class="dropdown-menu">
								<li><input type="checkbox" data-column="1"><?php echo $this->lang->line('pub_detilkodepub'); ?></li>
								<li><input type="checkbox" data-column="12" checked><?php echo $this->lang->line('pub_tahun'); ?></li>
								<li><input type="checkbox" data-column="14" checked><?php echo $this->lang->line('pub_judul'); ?></li>
								<li><input type="checkbox" data-column="19" checked><?php echo $this->lang->line('pub_pengarang'); ?></li>
								<li><input type="checkbox" data-column="20" checked><?php echo $this->lang->line('pub_keterangan'); ?></li>
								<li><input type="checkbox" data-column="26" checked><?php echo $this->lang->line('pub_created_at'); ?></li>
								<li><input type="checkbox" data-column="30" checked><?php echo $this->lang->line('pub_status_tarik'); ?></li>
							</ul>
						</div>
						<div class="btn-group main-control"></div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="masterpage-filter form-inline">
						<div class="filter-part col-md-5">
							<input type="hidden" id="filter_tarik" name="filter_tarik" />
							<div class="row">
								<label class="control-label col-md-5"><?php echo $this->lang->line('pub_detilkodepub'); ?></label>
								<div class="col-md-5 input-placement">
									<?php make_object_combobox($detil_kode_publikasi, 'dkp_id', 'dkp_keterangan', array('id'=>'filter_detil_kode_publikasi', 'title'=>$this->lang->line('dkp_id_help'), 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-5"><?php echo $this->lang->line('pub_tahun'); ?></label>
								<div class="col-md-5 input-placement">
									<input type="text" id="filter_tahun" class="form-control input-medium" />
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<label class="control-label col-md-5"><?php echo $this->lang->line('pub_pegawai'); ?></label>
								<div class="col-md-5 input-placement">
									<input id="filter_pegawai" name="filter_pegawai" type="hidden" />
									<div class="input-group input-medium">
										<input id="peg_name" name="peg_name" type="text" class="form-control" readonly style="cursor:pointer" />
										<span class="input-group-btn">
											<a class=" btn green search" id="btn_show_pegawai" onclick="javascript:showPegawai(0,0)"><i class="fa fa-search"></i></a>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_reset">Reset</button>
						<button type="button" class="btn grey-gallery btn-sm" id="btn_filter">Filter</button>
						<hr class="no-margin"/>
					</div>
					<form method="post" action="javascript:void(null);" class="form-master">
						<table class="table-master table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th style="white-space:pre; vertical-align:middle;"></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_detilkodepub'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_kode'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_url_scholar'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_jenis_peneliti'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_media_publikasi'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_pelaksanaan_penelitian'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_jenis_pembiayaan'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_status_validasi'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_periode_pelaporan'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_kode_pegawai'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_jumlah_pembiayaan'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_tahun'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_bulan'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_judul'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_kata_kunci'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_total_waktu'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_lokasi'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_abstraksi'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_pengarang'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_keterangan'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_tanggal_mulai'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_tanggal_selesai'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_url_unduh'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_duplicate'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_citation'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_created_at'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_updated_at'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_deleted_at'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_deleted_at'); ?></th>
									<th style="white-space:pre; vertical-align:middle;"><?php echo $this->lang->line('pub_status_tarik'); ?></th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</form>
				</div>
			</div>
			<div class="detail-page portlet light bg-inverse form-fit" style="display:none;">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_detail'); ?></span>
					</div>
					<div class="actions"></div>
				</div>
				<div class="portlet-body form">
					<form action="javascript:void(0);" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">
						<input type="hidden" id="pub_id" name="pub_id"/>
						<div class="form-body">
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_tahun'); ?></label>
								<div class="col-md-3 input-placement">
									<input id="pub_tahun" name="pub_tahun" type="text"  placeholder="<?php echo $this->lang->line('pub_tahun_help'); ?>" title="<?php echo $this->lang->line('pub_tahun_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_tahun_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_judul'); ?></label>
								<div class="col-md-9 input-placement">
									<textarea id="pub_judul" name="pub_judul" type="text"  placeholder="<?php echo $this->lang->line('pub_judul_help'); ?>" title="<?php echo $this->lang->line('pub_judul_help'); ?>" class="form-control" >
									</textarea>
									<span class="help-block"><?php echo $this->lang->line('pub_judul_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_kata_kunci'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="pub_kata_kunci" name="pub_kata_kunci" type="text" maxlength="255" placeholder="" title="<?php echo $this->lang->line('pub_kata_kunci_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_kata_kunci_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_lokasi'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="pub_lokasi" name="pub_lokasi" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('pub_lokasi_help'); ?>" title="<?php echo $this->lang->line('pub_lokasi_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_lokasi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_abstraksi'); ?></label>
								<div class="col-md-9 input-placement">
									<textarea id="pub_abstraksi" name="pub_abstraksi" type="text"  placeholder="<?php echo $this->lang->line('pub_abstraksi_help'); ?>" title="<?php echo $this->lang->line('pub_abstraksi_help'); ?>" class="form-control" >
									</textarea>
									<span class="help-block"><?php echo $this->lang->line('pub_abstraksi_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_pengarang'); ?></label>
								<div class="col-md-9 input-placement">
									<input id="pub_pengarang" name="pub_pengarang" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('pub_pengarang_help'); ?>" title="<?php echo $this->lang->line('pub_pengarang_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_pengarang_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_detilkodepub'); ?></label>
								<div class="col-md-9 input-placement">
									<?php make_object_combobox($detil_kode_publikasi,
															  'dkp_id',
															  'dkp_keterangan',
															  array('id'=>'pub_detilkodepub',
															  		'name'=>'pub_detilkodepub',
															  		'title'=>$this->lang->line('pub_detilkodepub_help'),
															  		'class'=>'form-control'),
															  		TRUE,
															  		TRUE,
															  		'master_none'); ?>
									<span class="help-block"><?php echo $this->lang->line('pub_detilkodepub_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_volume'); ?></label>
								<div class="col-md-2 input-placement">
									<input type="text" id="pub_volume" name="pub_volume" type="text"  placeholder="<?php echo $this->lang->line('pub_volume_help'); ?>" title="<?php echo $this->lang->line('pub_volume_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_volume_help'); ?></span>
								</div>
								<label class="control-label col-md-1"><?php echo $this->lang->line('pub_halaman'); ?></label>
								<div class="col-md-2 input-placement">
									<input type="text" id="pub_halaman" name="pub_halaman" type="text"  placeholder="<?php echo $this->lang->line('pub_halaman_help'); ?>" title="<?php echo $this->lang->line('pub_halaman_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_halaman_help'); ?></span>
								</div>
								<label class="control-label col-md-1"><?php echo $this->lang->line('pub_issue'); ?></label>
								<div class="col-md-3 input-placement">
									<input type="text" id="pub_issue" name="pub_issue" type="text"  placeholder="<?php echo $this->lang->line('pub_issue_help'); ?>" title="<?php echo $this->lang->line('pub_issue_help'); ?>" class="form-control" />
									<span class="help-block"><?php echo $this->lang->line('pub_issue_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_keterangan'); ?></label>
								<div class="col-md-9 input-placement">
									<textarea id="pub_keterangan" name="pub_keterangan" type="text"  placeholder="<?php echo $this->lang->line('pub_keterangan_help'); ?>" title="<?php echo $this->lang->line('pub_keterangan_help'); ?>" class="form-control" >
									</textarea>
									<span class="help-block"><?php echo $this->lang->line('pub_keterangan_help'); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_url_scholar'); ?></label>
								<div class="col-md-9 input-placement">
									<textarea id="pub_url_scholar" name="pub_url_scholar" type="text" maxlength="255" placeholder="<?php echo $this->lang->line('pub_url_scholar_help'); ?>" title="<?php echo $this->lang->line('pub_url_scholar_help'); ?>" class="form-control" >
									</textarea>
									<span class="help-block"><a id="link_pub_url_scholar" href="#" target="_blank">Pergi ke halaman google scholar</a></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_citation'); ?></label>
								<div class="col-md-9 input-placement">
									<input type="text" id="pub_citation" name="pub_citation" readonly type="text" maxlength="255" placeholder="<?php echo $this->lang->line('pub_citation_help'); ?>" title="<?php echo $this->lang->line('pub_citation_help'); ?>" class="form-control" />
									<br/>
									<h4>Statistik Jumlah Dikutip</h4>
									<table id="table-citation" class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th width="30px">No</th>
												<th ><?php echo $this->lang->line('cit_tahun'); ?></th>
												<th ><?php echo $this->lang->line('cit_jumlah'); ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>1</td>
												<td>1</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3"><?php echo $this->lang->line('pub_anggota'); ?></label>
								<div class="col-md-9 input-placement">
									<input type="hidden" id="anggota_publikasi" name="anggota_publikasi" />
									<div id="daftar-anggota">
										<ol class="ol-anggota" id="ol-anggota">
										</ol>
									</div>
									
								</div>
							</div>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-9">
									<div class="detail-control"></div>
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
      <div class="modal-body">
      	<div id="master-pegawai">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-user font-green-seagreen"></i>
						<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_anggota_master'); ?></span>
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
									<th><?php echo $this->lang->line('peg_perguruan_tinggi'); ?></th>
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
									<th><?php echo $this->lang->line('peg_jabatan_fungsional'); ?></th>
									<th><?php echo $this->lang->line('peg_jabatan_struktural'); ?></th>
									<th><?php echo $this->lang->line('peg_jenis_kelamin'); ?></th>
									<th><?php echo $this->lang->line('peg_provinsi'); ?></th>
									<th><?php echo $this->lang->line('peg_kota'); ?></th>
									<th><?php echo $this->lang->line('peg_kode_pos'); ?></th>
									<th><?php echo $this->lang->line('peg_kode_validasi'); ?></th>
									<th><?php echo $this->lang->line('peg_log_audit'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_baru'); ?></th>
									<th><?php echo $this->lang->line('peg_nip_lama'); ?></th>
									<th><?php echo $this->lang->line('peg_nidn'); ?></th>
									<th><?php echo $this->lang->line('peg_name'); ?></th>
									<th><?php echo $this->lang->line('peg_nomor_ktp'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_depan'); ?></th>
									<th><?php echo $this->lang->line('peg_gelar_belakang'); ?></th>
									<th><?php echo $this->lang->line('peg_tempat_lahir'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_lahir'); ?></th>
									<th><?php echo $this->lang->line('peg_alamat'); ?></th>
									<th><?php echo $this->lang->line('peg_telepon'); ?></th>
									<th><?php echo $this->lang->line('peg_handphone'); ?></th>
									<th><?php echo $this->lang->line('peg_email'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_berhenti'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_masuk'); ?></th>
									<th><?php echo $this->lang->line('peg_nomor_sertifikasi'); ?></th>
									<th><?php echo $this->lang->line('peg_tanggal_keluar_sertifikasi'); ?></th>
									<th><?php echo $this->lang->line('peg_is_dosen'); ?></th>
									<th><?php echo $this->lang->line('peg_periode_pelaporan'); ?></th>
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