<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript">
	var pst_all = JSON.parse('<?php echo $pst_all_json; ?>');
</script>
<div class="row">
	<div class="col-md-12">
		<div class="portlet light bg-inverse form-fit">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-user font-green-seagreen"></i>
					<span class="caption-subject bold font-green-seagreen uppercase"><?php echo $this->lang->line('module_detail'); ?></span>
				</div>
				<div class="actions"></div>
			</div>
			<div class="portlet-body form">
				<form action="<?php echo base_url()?>setting/update_setting/" method="post" class="form-detail form-horizontal form-bordered form-label-stripped">
					<div class="portlet box">
						<div class="form-body">
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
							<?php foreach ($pst_all as $pst) { ?>
								<div class="form-group">

									<?php if (substr($pst->pst_name, -3) == "_cb") { ?>
										<label class="col-md-3 control-label" style="padding-top:15px;" ><?php echo $this->lang->line($pst->pst_name); ?></label>
										<div class="col-md-9">
											<input id="pst_value_<?php echo $pst->pst_id ?>" name="pst_value_<?php echo $pst->pst_id ?>" type="checkbox" class="form-control" value="1" />
										</div>
									<?php } else { ?>
										<label class="col-md-3 control-label" ><?php echo $this->lang->line($pst->pst_name); ?></label>
										<div class="col-md-9">
											<input id="pst_value_<?php echo $pst->pst_id ?>" name="pst_value_<?php echo $pst->pst_id ?>" type="text" class="form-control col-md-12" value="<?php echo $pst->pst_value ?>" />
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<div class="form-actions">
							<div class="row">
								<div class="col-md-offset-3 col-md-3">
									<button type="submit" class="btn green-seagreen mp-save-button"><i class="fa fa-floppy-o"></i> <span><?php echo $this->lang->line('pst_save'); ?></span></button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
