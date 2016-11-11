<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">

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
								<span class="caption-subject bold font-green-seagreen uppercase">
								<!-- TODO LANGLINE-->
								Data ISSN
								</span>
							</div>
							<div class="actions filter-control">
								<div class="btn-group main-control"></div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="masterpage-filter form-inline" >
								<a href="<?php echo base_url()?>issn/add_data" id="btn-download" class="btn green-seagreen margin-top-10">Data ISSN</a>
							</div>
							<form method="post" action="javascript:void(null);" class="form-master">
								<table class="table-master table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>Check</th>
											<th>
												<!-- TODO LANGLINE -->
												Nama Jurnal
											</th>
										</tr>
									</thead>
									<tbody>
										<!-- harusnya diappend disini -->
									</tbody>
								</table>
							</form>
						</div>
					</div>
		</div>
	</div>
</div>