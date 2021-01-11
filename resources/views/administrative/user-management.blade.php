@extends('layouts.mini',[
'activePage' => 'user-management',
'titlePage' => __('Pengguna Sistem'),
])

@section('topscripts')
<script>
    <link href="/mini/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="StyleSheet" type="text/css">
    <link href="/mini/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="StyleSheet" type="text/css">
    <link href="/mini/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="StyleSheet" type="text/css">
</script>
@endsection

@section('content')
<form action="" method="post">
    @csrf
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">Default Datatable</h4>
            <p class="card-title-desc">DataTables has most features enabled by
                default, so all you need to do to use it with your own tables is to call
                the construction function: <code>$().DataTable();</code>.
            </p>

            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 167px;" aria-label="Position: activate to sort column ascending">Position</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 74px;" aria-label="Office: activate to sort column ascending">Office</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 27px;" aria-label="Age: activate to sort column ascending">Age</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69px;" aria-label="Start date: activate to sort column ascending">Start date</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 61px; display: none;" aria-label="Salary: activate to sort column ascending">Salary</th></tr>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                    <td class="sorting_1 dtr-control">Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td style="display: none;">$162,700</td>
                </tr><tr role="row" class="even">
                    <td class="sorting_1 dtr-control">Angelica Ramos</td>
                    <td>Chief Executive Officer (CEO)</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2009/10/09</td>
                    <td style="display: none;">$1,200,000</td>
                </tr><tr role="row" class="odd">
                    <td class="sorting_1 dtr-control">Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td style="display: none;">$86,000</td>
                </tr><tr role="row" class="even">
                    <td class="sorting_1 dtr-control">Bradley Greer</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>41</td>
                    <td>2012/10/13</td>
                    <td style="display: none;">$132,000</td>
                </tr><tr role="row" class="odd">
                    <td class="sorting_1 dtr-control">Brenden Wagner</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>28</td>
                    <td>2011/06/07</td>
                    <td style="display: none;">$206,850</td>
                </tr><tr role="row" class="even">
                    <td class="sorting_1 dtr-control">Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td style="display: none;">$372,000</td>
                </tr><tr role="row" class="odd">
                    <td class="sorting_1 dtr-control">Bruno Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>38</td>
                    <td>2011/05/03</td>
                    <td style="display: none;">$163,500</td>
                </tr><tr role="row" class="even">
                    <td class="sorting_1 dtr-control">Caesar Vance</td>
                    <td>Pre-Sales Support</td>
                    <td>New York</td>
                    <td>21</td>
                    <td>2011/12/12</td>
                    <td style="display: none;">$106,450</td>
                </tr><tr role="row" class="odd">
                    <td class="sorting_1 dtr-control">Cara Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>46</td>
                    <td>2011/12/06</td>
                    <td style="display: none;">$145,600</td>
                </tr><tr role="row" class="even">
                    <td class="sorting_1 dtr-control">Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td style="display: none;">$433,060</td>
                </tr></tbody>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>

        </div>
    </div>

</form>
@endsection

@section('bottomscripts')
<script src="/mini/libs/select2/js/select2.min.js"></script>
<script src="/mini/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="assets/js/pages/datatables.init.js"></script>
@endsection
