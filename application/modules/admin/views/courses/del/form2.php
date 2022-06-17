<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?> </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mb-3">
                	<a href="<?php echo site_url('admin/courses/'); ?>" class="alignToTitle btn btn-outline-secondary btn-rounded btn-sm"> <i class=" mdi mdi-keyboard-backspace"></i> kembali</a>
                </h4>
                <br>

                <div class="col-lg-12">
					<form class="required-form" action="https://dev.pertamina-ptc.com/academy/admin/course_actions/add" method="post" enctype="multipart/form-data">
						<div id="basicwizard">

							<ul class="nav nav-pills nav-justified form-wizard-header mb-3">
								<li class="nav-item">
									<a href="#basic" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-fountain-pen-tip mr-1"></i>
										<span class="d-none d-sm-inline">Basic</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#requirements" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-bell-alert mr-1"></i>
										<span class="d-none d-sm-inline">Requirements</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#outcomes" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-camera-control mr-1"></i>
										<span class="d-none d-sm-inline">Outcomes</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#pricing" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-currency-cny mr-1"></i>
										<span class="d-none d-sm-inline">Pricing</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#media" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-library-video mr-1"></i>
										<span class="d-none d-sm-inline">Media</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#seo" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-tag-multiple mr-1"></i>
										<span class="d-none d-sm-inline">Seo</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#finish" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
										<i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
										<span class="d-none d-sm-inline">Finish</span>
									</a>
								</li>
							</ul>

							<div class="tab-content b-0 mb-0">
							
								<div class="tab-pane" id="basic">
									<div class="row justify-content-center">
										<div class="col-xl-8">
										
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="course_title">Course title <span class="required">*</span> </label>
												<div class="col-md-10">
													<input type="text" class="form-control" id="course_title" name = "title" placeholder="Enter course title" required>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="short_description">Short description</label>
												<div class="col-md-10">
													<textarea name="short_description" id = "short_description" class="form-control"></textarea>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="description">Description</label>
												<div class="col-md-10">
													<textarea name="description" id = "description" class="form-control"></textarea>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="sub_category_id">Category<span class="required">*</span></label>
												<div class="col-md-10">
													<select class="form-control select2" data-toggle="select2" name="sub_category_id" id="sub_category_id" required>
														<option value="">Select a category</option>
														<optgroup label="Pertamina">
															<option value="3">Wajib</option>
															<option value="4">Pilihan</option>
															<option value="5">yrdy</option>
														</optgroup>
														<optgroup label="Design">
															<option value="7">Adobe Illustrator</option>
														</optgroup>
													</select>
												<small class="text-muted">Select sub category</small>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="level">Level</label>
												<div class="col-md-10">
													<select class="form-control select2" data-toggle="select2" name="level" id="level">
														<option value="beginner">Beginner</option>
														<option value="advanced">Advanced</option>
														<option value="intermediate">Intermediate</option>
													</select>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="language_made_in">Language made in</label>
												<div class="col-md-10">
													<select class="form-control select2" data-toggle="select2" name="language_made_in" id="language_made_in">
															<option value="english">English</option>
															<option value="indonesia">Indonesia</option>
															<option value="rusia">Rusia</option>
															<option value="sunda">Sunda</option>
													</select>
												</div>
											</div>
											
											<div class="form-group row mb-3">
												<div class="offset-md-2 col-md-10">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="is_top_course" id="is_top_course" value="1">
														<label class="custom-control-label" for="is_top_course">Check if this course is top course</label>
													</div>
												</div>
											</div>
											
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div> <!-- end tab pane -->

								<div class="tab-pane" id="requirements">
									<div class="row justify-content-center">
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="requirements">Requirements</label>
												<div class="col-md-10">
													<div id = "requirement_area">
														<div class="d-flex mt-2">
															<div class="flex-grow-1 px-3">
																<div class="form-group">
																	<input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="Provide requirements">
																</div>
															</div>
															<div class="">
																<button type="button" class="btn btn-success btn-sm" style="" name="button" onclick="appendRequirement()"> <i class="fa fa-plus"></i> </button>
															</div>
														</div>
														<div id = "blank_requirement_field">
															<div class="d-flex mt-2">
																<div class="flex-grow-1 px-3">
																	<div class="form-group">
																		<input type="text" class="form-control" name="requirements[]" id="requirements" placeholder="Provide requirements">
																	</div>
																</div>
																<div class="">
																	<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeRequirement(this)"> <i class="fa fa-minus"></i> </button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="outcomes">
									<div class="row justify-content-center">
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="outcomes">Outcomes</label>
												<div class="col-md-10">
													<div id = "outcomes_area">
														<div class="d-flex mt-2">
															<div class="flex-grow-1 px-3">
																<div class="form-group">
																	<input type="text" class="form-control" name="outcomes[]" id="outcomes" placeholder="Provide outcomes">
																</div>
															</div>
															<div class="">
																<button type="button" class="btn btn-success btn-sm" name="button" onclick="appendOutcome()"> <i class="fa fa-plus"></i> </button>
															</div>
														</div>
														<div id = "blank_outcome_field">
															<div class="d-flex mt-2">
																<div class="flex-grow-1 px-3">
																	<div class="form-group">
																		<input type="text" class="form-control" name="outcomes[]" id="outcomes" placeholder="Provide outcomes">
																	</div>
																</div>
																<div class="">
																	<button type="button" class="btn btn-danger btn-sm" style="margin-top: 0px;" name="button" onclick="removeOutcome(this)"> <i class="fa fa-minus"></i> </button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane" id="pricing">
									<div class="row justify-content-center">
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<div class="offset-md-2 col-md-10">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" class="custom-control-input" name="is_free_course" id="is_free_course" value="1" onclick="togglePriceFields(this.id)">
														<label class="custom-control-label" for="is_free_course">Check if this is a free course</label>
													</div>
												</div>
											</div>

											<div class="paid-course-stuffs">
												<div class="form-group row mb-3">
													<label class="col-md-2 col-form-label" for="price">Course price (Rp)</label>
													<div class="col-md-10">
														<input type="number" class="form-control" id="price" name = "price" placeholder="Enter course course price" min="0">
													</div>
												</div>

												<div class="form-group row mb-3">
													<div class="offset-md-2 col-md-10">
														<div class="custom-control custom-checkbox">
															<input type="checkbox" class="custom-control-input" name="discount_flag" id="discount_flag" value="1">
															<label class="custom-control-label" for="discount_flag">Check if this course has discount</label>
														</div>
													</div>
												</div>

												<div class="form-group row mb-3">
													<label class="col-md-2 col-form-label" for="discounted_price">Discounted price (Rp)</label>
													<div class="col-md-10">
														<input type="number" class="form-control" name="discounted_price" id="discounted_price" onkeyup="calculateDiscountPercentage(this.value)" min="0">
														<small class="text-muted">This course has <span id = "discounted_percentage" class="text-danger">0%</span> Discount</small>
													</div>
												</div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div> <!-- end tab-pane -->
								
								<div class="tab-pane" id="media">
									<div class="row justify-content-center">

										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="course_overview_provider">Course overview provider</label>
												<div class="col-md-10">
													<select class="form-control select2" data-toggle="select2" name="course_overview_provider" id="course_overview_provider">
														<option value="youtube">Youtube</option>
														<option value="vimeo">Vimeo</option>
														<option value="html5">Html5</option>
													</select>
												</div>
											</div>
										</div> <!-- end col -->

										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="course_overview_url">Course overview url</label>
												<div class="col-md-10">
													<input type="text" class="form-control" name="course_overview_url" id="course_overview_url" placeholder="E.g: https://www.youtube.com/watch?v=oBtf8Yglw2w">
												</div>
											</div>
										</div> <!-- end col -->
										<!-- this portion will be generated theme wise from the theme-config.json file Starts-->
										
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="course_thumbnail_label">Course thumbnail</label>
												<div class="col-md-10">
													<div class="wrapper-image-preview" style="margin-left: -6px;">
														<div class="box" style="width: 250px;">
														<div class="js--image-preview" style="background-image: url(https://dev.pertamina-ptc.com/academy/assets/frontend/default/img/course_thumbnail_placeholder.jpg); background-color: #F5F5F5;"></div>
														<div class="upload-options">
														<label for="course_thumbnail" class="btn"> <i class="mdi mdi-camera"></i> Course thumbnail <br> <small>(600 X 600)</small> </label>
														<input id="course_thumbnail" style="visibility:hidden;" type="file" class="image-upload" name="course_thumbnail" accept="image/*">
														</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- this portion will be generated theme wise from the theme-config.json file Ends-->

									</div> <!-- end row -->
								</div>
								
								<div class="tab-pane" id="seo">
									<div class="row justify-content-center">
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="website_keywords">Meta keywords</label>
												<div class="col-md-10">
													<input type="text" class="form-control bootstrap-tag-input" id = "meta_keywords" name="meta_keywords" data-role="tagsinput" style="width: 100%;" placeholder="Write a keyword and then press enter button"./>
												</div>
											</div>
										</div> <!-- end col -->
										<div class="col-xl-8">
											<div class="form-group row mb-3">
												<label class="col-md-2 col-form-label" for="meta_description">Meta description</label>
												<div class="col-md-10">
													<textarea name="meta_description" class="form-control"></textarea>
												</div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div>
								<div class="tab-pane" id="finish">
									<div class="row">
										<div class="col-12">
											<div class="text-center">
												<h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
												<h3 class="mt-0">Thank you !</h3>

												<p class="w-75 mb-2 mx-auto">You are just one click away</p>

												<div class="mb-3 mt-3">
													<button type="button" class="btn btn-primary text-center" onclick="checkRequiredFields()">Submit</button>
												</div>
											</div>
										</div> <!-- end col -->
									</div> <!-- end row -->
								</div>

								<ul class="list-inline mb-0 wizard text-center">
									<li class="previous list-inline-item">
										<a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-left-bold"></i> </a>
									</li>
									<li class="next list-inline-item">
										<a href="javascript::" class="btn btn-info"> <i class="mdi mdi-arrow-right-bold"></i> </a>
									</li>
								</ul>

							</div> <!-- tab-content -->
						</div> <!-- end #progressbarwizard-->
					</form>
				</div>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div>
</div>


<script type="text/javascript">
  $(document).ready(function () {
    initSummerNote(['#description']);
  });
</script>

<script type="text/javascript">
var blank_outcome = jQuery('#blank_outcome_field').html();
var blank_requirement = jQuery('#blank_requirement_field').html();
jQuery(document).ready(function() {
  jQuery('#blank_outcome_field').hide();
  jQuery('#blank_requirement_field').hide();
});
function appendOutcome() {
  jQuery('#outcomes_area').append(blank_outcome);
}
function removeOutcome(outcomeElem) {
  jQuery(outcomeElem).parent().parent().remove();
}

function appendRequirement() {
  jQuery('#requirement_area').append(blank_requirement);
}
function removeRequirement(requirementElem) {
  jQuery(requirementElem).parent().parent().remove();
}

function priceChecked(elem){
  if (jQuery('#discountCheckbox').is(':checked')) {

    jQuery('#discountCheckbox').prop( "checked", false );
  }else {

    jQuery('#discountCheckbox').prop( "checked", true );
  }
}

function topCourseChecked(elem){
  if (jQuery('#isTopCourseCheckbox').is(':checked')) {

    jQuery('#isTopCourseCheckbox').prop( "checked", false );
  }else {

    jQuery('#isTopCourseCheckbox').prop( "checked", true );
  }
}

function isFreeCourseChecked(elem) {

  if (jQuery('#'+elem.id).is(':checked')) {
    $('#price').prop('required',false);
  }else {
    $('#price').prop('required',true);
  }
}

function calculateDiscountPercentage(discounted_price) {
  if (discounted_price > 0) {
    var actualPrice = jQuery('#price').val();
    if ( actualPrice > 0) {
      var reducedPrice = actualPrice - discounted_price;
      var discountedPercentage = (reducedPrice / actualPrice) * 100;
      if (discountedPercentage > 0) {
        jQuery('#discounted_percentage').text(discountedPercentage.toFixed(2)+'%');

      }else {
        jQuery('#discounted_percentage').text('<?php echo '0%'; ?>');
      }
    }
  }
}

</script>

<style media="screen">
body {
  overflow-x: hidden;
}
</style>
