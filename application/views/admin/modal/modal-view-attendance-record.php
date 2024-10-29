
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document" style="max-width: 95%";>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $class['name']?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body" style="height: 100vh;">
            <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                <li class="nav-item mr-3">
                    <a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
                        <span class="nav-icon mr-2">
                            <span class="svg-icon mr-3">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
                                        <path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </span>
                        <span class="nav-text font-weight-bold">Student In This Class</span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <!--begin::Tab Content-->
                <div class="tab-pane active" id="kt_apps_contacts_view_tab_2" role="tabpanel">
                    <div class="card-body px-0">
                    <table class="table">
                            <caption>Attendance Record</caption>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class Date</th>
                                    <th>Time</th>
                                    <th>Subject</th>
                                    <th>Class Type</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? $no =1; ?>
                                <? foreach($attendance as $key){ ?>
                                <?
                                //$student_pic  = get_any_table_row(array('user_id' => $key['student_id']), 'profile_picture');    
                                ?>
                                <tr>
                                    <td><?= $no++;?></td>
                                    <td><?= dmy($key['class_dt']) ?></td>
                                    <td><?= $key['class_time']?></td>
                                    <td><span class="label label-inline label-lg label-light-info btn-sm font-weight-bold"><?= get_ref_subject($key['subject_id'])?></span></td>
                                    <td>
                                        
                                            <? if($key['class_type'] == '1'){ ?>
                                                    <span class="label label-inline label-lg label-light-danger btn-sm font-weight-bold">Online Class</span>
                                            <? } else { ?>
                                                     <span class="label label-inline label-lg label-light-success btn-sm font-weight-bold">Pysical Class</span>
                                            <? } ?>
                                        </span>
                                    </td>
                                    <td>
                                        <? if($key['class_attend'] == '1'){ ?>
                                                    
                                                <!-- <i class="icon-md text-dark-50 flaticon2-check-mark"></i> -->
                                                <a href="#" class="btn btn-primary font-weight-bold mr-2 btn-sm">
                                                    <i class="flaticon2-check-mark icon-sm"></i>Present
                                                </a>
                                                
                                        <? } else { ?>

                                                <? if (strtotime($now) < strtotime($key['class_dt'])) {  ?>
                                                        <font color="red"><b>Class Not Start Yet</b></font>
                                                <? } else { ?>
                                                        <a href="#" class="btn btn-danger font-weight-bold mr-2 btn-sm">
                                                            <i class="flaticon2-cross icon-sm"></i>Absent
                                                        </a>
                                                <? } ?>

                                        <? } ?>
                                    </td>
                                </tr>
                                <? } ?>
                            </tbody>
                        </table>
                        <?/*
                        <div class="row">
                            <? foreach($students as $student){ ?>
                            <?
                            $student_pic  = get_any_table_row(array('user_id' => $student['student_id']), 'profile_picture');    
                            ?>
                            <div class="col-xl-3 col-lg-3 col-sm-3">
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b card-stretch">
                                    <!--begin::Body-->
                                    <div class="card-body text-center pt-4">
                                        
                                        <!--begin::User-->
                                        <div class="mt-7">
                                            <div class="symbol symbol-circle symbol-lg-75">
                                                <!-- <img src="assets/media/users/300_14.jpg" alt="image" /> -->
                                                <img src="<?= view_profile_picture($student_pic)?>" alt="image" />
                                            </div>
                                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                                <span class="font-size-h3 font-weight-boldest">JB</span>
                                            </div>
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Name-->
                                        <div class="my-2">
                                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h6"><?= $student['name']?></a>
                                        </div>
                                        <!--end::Name-->
                                        <!--begin::Label-->
                                        <span class="label label-inline label-lg label-light-warning btn-sm font-weight-bold">Active</span>
                                        <!--end::Label-->
                                        <!--begin::Buttons-->
                                        <div class="mt-9 mb-6">
                                            <a href="#" class="btn btn-md btn-icon btn-light-facebook btn-pill mx-2">
                                                <i class="socicon-facebook"></i>
                                            </a>
                                            <!-- <a href="#" class="btn btn-md btn-icon btn-light-twitter btn-pill mx-2">
                                                <i class="socicon-twitter"></i>
                                            </a>
                                            <a href="#" class="btn btn-md btn-icon btn-light-linkedin btn-pill mx-2">
                                                <i class="socicon-linkedin"></i>
                                            </a> -->
                                        </div>
                                        <!--end::Buttons-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <? } ?>
                        </div>
                        */?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>




