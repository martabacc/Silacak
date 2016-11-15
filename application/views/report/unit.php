<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
	var fakultas = "<?php echo $fakultas; ?>";
	var awal = "<?php echo $awal; ?>";
	var akhir = "<?php echo $akhir; ?>";
</script>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="note note-warning">
			<p><?php echo $this->lang->line('module_description'); ?></p>
		</div> -->
		<div id="master-page">
			<div class="table-page portlet light bg-inverse">
				<div class="portlet-body">
					<div class="masterpage-filter form-inline" >
						<div class="filter-part col-md-5">
							<input type="hidden" id="filter_tarik" name="filter_tarik" />
							<div class="row">
								<label class="control-label col-md-5"><?php echo 'Fakultas' ?></label>
								<div class="col-md-5 input-placement">
									<?php make_object_combobox($filter_fakultas, 'fak_id', 'fak_singkatan', array('id'=>'filter_fakultas', 'class'=>'form-control input-medium'), TRUE, TRUE, 'master_all'); ?>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="filter-part col-md-5">
							<div class="row">
								<div class="form-group">
								<label class="control-label col-md-4"><?php echo $this->lang->line('pub_filterstart'); ?></label>
								<div class="col-md-8 input-placement" style="padding-left:3px">
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
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase">Statistik Pengunduhan Data Per Unit</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="stats-penarikan-data" class="display-none">

                                        <div id="stats-penarikan" style="height: 228px;"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
					</div>
					<a href="#" id="btn-download" class="btn green-seagreen">Download Laporan</a>
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th >Kode</th>
									<th >Fakultas</th>
									<th ><?php echo $this->lang->line('penarikan_total'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_jurnal'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_seminar'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_unknown'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_lainnya'); ?></th>
								</tr>
							</thead>
							<tbody>

								<?php if(count($result) == 0): ?>
								<tr>
									<td colspan="3" class="text-center">Data Tidak Ditemukan</td>
								</tr>
								<?php endif; ?>
								<?php 
								$number = 1; 
								$jumlah_all = 0;
								$jumlah_jurnal = 0;
								$jumlah_seminar = 0;
								$jumlah_unknown = 0;
								foreach ($all as $key => $value) { ?>
								<tr>
									<td><?php echo $number++; ?></td>
									<td ><?php echo $value->kode ?></td>
									<td ><?php echo $value->unit ?></td>
									<td class="text-right" ><?php $jumlah_all += $value->jumlah; echo number_format($value->jumlah,0,',','.'); ?></td>
									<td class="text-right" ><?php 
										if(!isset($result['jurnal'][$value->kode])) $result['jurnal'][$value->kode] = 0;
										$jumlah_jurnal += $result['jurnal'][$value->kode]; 
										echo number_format($result['jurnal'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php 
										if(!isset($result['seminar'][$value->kode])) $result['seminar'][$value->kode] = 0;
										$jumlah_seminar += $result['seminar'][$value->kode]; 
										echo number_format($result['seminar'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php 
										if(!isset($result['unknown'][$value->kode])) $result['unknown'][$value->kode] = 0;
										$jumlah_unknown += $result['unknown'][$value->kode]; 
										echo number_format($result['unknown'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php echo number_format($value->jumlah-($result['jurnal'][$value->kode] + $result['seminar'][$value->kode] + $result['unknown'][$value->kode]),0,',','.'); ?></td>
								</tr>	
								<?php } ?>
								<tr>
									<td colspan=3>Jumlah</td>
									<td class="text-right" ><?php echo number_format($jumlah_all,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_jurnal,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_seminar,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_unknown,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_all-($jumlah_jurnal + $jumlah_seminar + $jumlah_unknown),0,',','.'); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
                            <!-- BEGIN PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-red-sunglo bold uppercase"><?php echo $this->lang->line('detailpub')?></span>
                                    </div>
                                </div>
                                <div class='portlet-body'>
					<div class="table-scrollable">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th >Kode</th>
									<th >Fakultas</th>
									<th ><?php echo $this->lang->line('penarikan_total'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_jurnal'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_seminar'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_unknown'); ?></th>
									<th ><?php echo $this->lang->line('penarikan_lainnya'); ?></th>
								</tr>
							</thead>
							<tbody>

								<?php if(count($result) == 0): ?>
								<tr>
									<td colspan="3" class="text-center">Data Tidak Ditemukan</td>
								</tr>
								<?php endif; ?>
								<?php 
								$number = 1; 
								$jumlah_all = 0;
								$jumlah_jurnal = 0;
								$jumlah_seminar = 0;
								$jumlah_unknown = 0;
								foreach ($newClassifier as $key => $value) { ?>
								<tr>
									<td><?php echo $number++; ?></td>
									<td ><?php echo $value->kode ?></td>
									<td ><?php echo $value->unit ?></td>
									<td class="text-right" ><?php $jumlah_all += $value->jumlah; echo number_format($value->jumlah,0,',','.'); ?></td>
									<td class="text-right" ><?php 
										if(!isset($result['jurnal'][$value->kode])) $result['jurnal'][$value->kode] = 0;
										$jumlah_jurnal += $result['jurnal'][$value->kode]; 
										echo number_format($result['jurnal'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php 
										if(!isset($result['seminar'][$value->kode])) $result['seminar'][$value->kode] = 0;
										$jumlah_seminar += $result['seminar'][$value->kode]; 
										echo number_format($result['seminar'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php 
										if(!isset($result['unknown'][$value->kode])) $result['unknown'][$value->kode] = 0;
										$jumlah_unknown += $result['unknown'][$value->kode]; 
										echo number_format($result['unknown'][$value->kode],0,',','.');
										?>
									</td>
									<td class="text-right" ><?php echo number_format($value->jumlah-($result['jurnal'][$value->kode] + $result['seminar'][$value->kode] + $result['unknown'][$value->kode]),0,',','.'); ?></td>
								</tr>	
								<?php } ?>
								<tr>
									<td colspan=3>Jumlah</td>
									<td class="text-right" ><?php echo number_format($jumlah_all,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_jurnal,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_seminar,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_unknown,0,',','.'); ?></td>
									<td class="text-right" ><?php echo number_format($jumlah_all-($jumlah_jurnal + $jumlah_seminar + $jumlah_unknown),0,',','.'); ?></td>
								</tr>
							</tbody>
						</table>
					</div>

                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php echo "var dataGrafik = ["; 
		foreach ($all as $key => $value) { 
			echo "['".$value->unit."',".$value->jumlah."],";
		}
	echo "];"?>
</script>